# Dokumentasi Perbaikan Keamanan — Modul Manajemen User

Dokumen ini menjelaskan secara naratif setiap celah keamanan yang ditemukan dan langkah teknis yang telah diterapkan untuk menutupnya pada modul manajemen user aplikasi JDIH.

---

## TEMUAN 1 — BROKEN ACCESSS CONTROL

Saya menemukan celah **BROKEN ACCESSS CONTROL** pada fungsi `edit_manajemenuser` di controller `Administrator.php`. Fungsi ini dipakai bersama untuk dua keperluan: admin mengelola user lain, dan user biasa mengedit profil mereka sendiri. Masalahnya, ketika user biasa mengirim formulir edit profil (POST), sistem sama sekali tidak memfilter field `level` dan `blokir` yang ikut terkirim. Artinya, siapapun bisa menyelipkan `level=admin` atau `blokir=N` pada body permintaan POST, dan sistem akan langsung memprosesnya tanpa hambatan — user biasa bisa mempromosikan dirinya sendiri menjadi admin hanya dengan memanipulasi data form.

Berikut adalah **3 lapisan perbaikan** yang telah saya terapkan untuk menutup celah ini:

**1. Pembatasan di Sisi Model — `Model_users.php` (baris 48–51)**
Di fungsi `users_update()`, saya menambahkan kondisi yang memastikan bahwa nilai `level` dan `blokir` dari POST hanya akan dimasukkan ke dalam query UPDATE jika sesi yang aktif adalah seorang `admin`. Jika bukan, kedua parameter tersebut diabaikan sepenuhnya — berapapun nilai yang dikirim oleh user biasa, database tidak akan pernah memprosesnya.

```php
if ($this->session->level == 'admin') {
    $datadb['level'] = $this->db->escape_str($this->input->post('f'));
    $datadb['blokir'] = $this->db->escape_str($this->input->post('h'));
}
```

**2. Restriksi di Sisi View — `view_users_edit.php` (baris 38–53)**
Untuk user biasa yang mengakses profil sendiri, dropdown "Level User" dan radio button "Blokir" tidak ditampilkan sama sekali. Sebagai gantinya, nilai asli dari database dikirim lewat `<input type="hidden">`. Ini bukan sekadar kosmetik — ini mencegah manipulasi UI yang disengaja dan mempersempit attack surface formulir.

**3. Validasi Tambahan di Controller — `Administrator.php` (baris 731)**
Di awal fungsi `edit_manajemenuser`, ditambahkan pengecekan bahwa jika user yang login bukan admin, maka `$id` yang diambil dari URI **harus** cocok dengan `$this->session->username`. Jika tidak cocok, sistem langsung melakukan redirect ke halaman home — user tidak bisa membuka halaman edit profil milik orang lain.

Kini tidak ada jalur manapun — baik dari UI, dari POST langsung, maupun dari manipulasi URI — yang dapat digunakan user biasa untuk menaikkan level dirinya sendiri secara ilegal.

---

## TEMUAN 2 — INSECURE DIRECT OBJECT REFERENCE / IDOR (Akses Profil User Lain)

Sebelum perbaikan, URL `administrator/edit_manajemenuser/{username}` dapat diakses oleh siapa saja yang sudah login, termasuk user biasa. Cukup dengan mengganti segmen URI ketiga ke username orang lain, seorang user bisa membuka dan bahkan menyimpan perubahan ke profil user lain — sebuah celah **IDOR** klasik.

Selain itu, field `id` pada formulir edit dikirim sebagai `<input type="hidden">`, sehingga siapapun bisa mengubah nilai tersebut di browser developer tools dan mengarahkan UPDATE ke record milik user lain.

Berikut **2 perbaikan** yang telah diterapkan:

**1. Validasi Kepemilikan Profil di Controller — `Administrator.php` (baris 731–733)**
Setiap kali `edit_manajemenuser` dipanggil, sistem sekarang memeriksa: jika yang login bukan admin, apakah `$id` di URI adalah username miliknya sendiri? Jika tidak, langsung redirect.

```php
if ($this->session->level != 'admin' AND $this->session->username != $id){
    redirect(base_url().'administrator/home');
}
```

Pengecekan ini berlaku untuk request GET (buka halaman) maupun POST (kirim formulir) — tidak ada celah untuk melewatinya.

**2. ID Diambil dari URI, Bukan dari Form — `Model_users.php` (baris 53)**
Di fungsi `users_update()`, parameter `$id` yang digunakan sebagai klausa WHERE pada query UPDATE diambil langsung dari argumen fungsi yang berasal dari URI segment, bukan dari `$this->input->post('id')`. Dengan demikian, meskipun seseorang memanipulasi nilai hidden field `id` di dalam form, sistem tidak akan menggunakannya — yang dipakai tetap ID dari URL.

```php
$this->db->where('username', $id);
$this->db->update('users', $datadb);
```

---

## TEMUAN 3 — KEBIJAKAN PASSWORD LEMAH (Weak Password Policy)

Sebelumnya, tidak ada aturan apapun terkait kekuatan password. User bebas menyimpan password seperti `123`, `admin`, atau bahkan string kosong sekalipun. Ini membuka risiko terhadap serangan brute-force dan credential stuffing.

**1 perbaikan** telah diterapkan:

**Validasi Password Kuat di Server-Side — `Administrator.php` (baris 740–750)**
Setiap kali field password diisi (tidak kosong), sistem menjalankan validasi form dengan aturan berikut:
- Minimal **12 karakter** (via `min_length[12]`)
- Mengandung minimal satu **huruf besar** (A-Z)
- Mengandung minimal satu **huruf kecil** (a-z)
- Mengandung minimal satu **angka** (0-9)
- Mengandung minimal satu **karakter khusus** (selain alfanumerik)

Validasi ini dilakukan sepenuhnya di sisi server menggunakan `$this->form_validation`, sehingga tidak dapat dilewati meskipun validasi sisi client (JavaScript) dinonaktifkan oleh pengguna.

```php
$this->form_validation->set_rules('b', 'Password', array(
    'required',
    'min_length[12]',
    array('password_check', function($str) {
        if (!preg_match('/[A-Z]/', $str) || !preg_match('/[a-z]/', $str)
            || !preg_match('/[0-9]/', $str) || !preg_match('/[^A-Za-z0-9]/', $str)) {
            return FALSE;
        }
        return TRUE;
    })
));
```

Placeholder di field password pada `view_users_edit.php` juga diperbarui untuk memberikan panduan langsung kepada pengguna tentang kriteria yang diperlukan.

---

## TEMUAN 4 — GANTI PASSWORD TANPA VERIFIKASI IDENTITAS

Sebelum perbaikan, siapapun yang berhasil membuka sesi aktif (misalnya melalui hijacking sesi atau komputer yang ditinggalkan tanpa logout) bisa langsung mengganti password tanpa perlu tahu password lama. Tidak ada langkah verifikasi kepemilikan akun sama sekali.

**1 perbaikan** telah diterapkan:

**Wajib Konfirmasi Password Lama — `Administrator.php` (baris 752–754 & 763–764)**
Jika seorang user mengisi field "Ganti Password" untuk akunnya sendiri (`$this->session->username == $id`), maka field "Old Password" menjadi wajib diisi. Setelah form lolos validasi, sistem melakukan pengecekan eksplisit ke database: password lama yang dimasukkan di-hash dengan MD5, lalu dicocokkan dengan record di database lewat fungsi `cek_login()`. Jika tidak cocok, proses update dibatalkan dan pesan error ditampilkan.

```php
if ($this->session->username == $id) {
    $this->form_validation->set_rules('old_password', 'Old Password', 'required');
}
// ...
$cek = $this->model_users->cek_login($id, md5($this->input->post('old_password')));
if ($cek->num_rows() > 0) {
    $this->model_users->users_update($id);
} else {
    $data['error'] = "Old password is incorrect.";
}
```

Aturan ini berlaku untuk semua pemilik akun, termasuk admin yang mengedit akunnya sendiri.

---

## TEMUAN 5 — ADMIN DAPAT MENGGANTI PASSWORD ADMIN LAIN

Sebelumnya, seorang admin bisa membuka halaman edit profil admin lain dan mengganti passwordnya secara langsung. Ini berbahaya karena membuka kemungkinan penyalahgunaan hak akses antar admin (misalnya admin jahat mengunci akses admin lain).

Berikut **2 lapisan perbaikan** yang telah diterapkan:

**1. Pemblokiran di Sisi Controller — `Administrator.php` (baris 779–783)**
Meskipun validasi form lolos, terdapat pengecekan tambahan: jika yang login adalah admin, yang sedang diedit adalah admin lain (bukan dirinya sendiri), dan field password diisi, maka permintaan ditolak dengan pesan error.

```php
if ($this->session->level == 'admin' && $this->session->username != $id
    && $row['level'] == 'admin' && $this->input->post('b') != '') {
    $data['error'] = "You cannot change another admin's password.";
}
```

**2. Nonaktifkan Field di Sisi View — `view_users_edit.php` (baris 31–33)**
Ketika admin membuka profil admin lain, field password ditampilkan sebagai input teks yang dinonaktifkan (`disabled`) dengan nilai `********`, disertai keterangan "You cannot change another admin's password." Tombol Reset Password pun tidak dimunculkan untuk sesama admin — hanya untuk user biasa.

---

## TEMUAN 6 — TIDAK ADA MEKANISME RESET PASSWORD YANG AMAN

Sebelumnya, tidak ada cara bagi admin untuk mereset password user biasa tanpa mengetahui atau menetapkan password baru secara manual — yang berpotensi menyebabkan password yang lemah atau diketahui bersama.

**1 perbaikan** telah diterapkan:

**Fitur Reset Password Otomatis — `Administrator.php` (baris 794–803) & `generate_random_password()` (baris 811–814)**
Admin kini dapat menekan tombol "Reset Password" pada halaman edit user biasa. Sistem akan:
1. Membangkitkan password acak sepanjang **16 karakter** dari kumpulan karakter alfanumerik dan simbol menggunakan fungsi `generate_random_password()`.
2. Meng-hash password tersebut dengan MD5 lalu menyimpannya ke database via `users_update_password()`.
3. Menampilkan password baru tersebut **satu kali saja** melalui flashdata sesi, dengan pesan eksplisit untuk segera menyimpannya.

```php
$new_pass = $this->generate_random_password(16);
$this->model_users->users_update_password($id, md5($new_pass));
$this->session->set_flashdata('new_password', $new_pass);
```

Setelah halaman di-refresh atau ditinggalkan, password tidak akan pernah ditampilkan lagi — memastikan tidak ada jejak sensitif yang tersisa di antarmuka.

---

## TEMUAN 7 — HARDCODED BASIC AUTHENTICATION PADA API

Sebelumnya, berbagai *endpoint* API (di `Tampil_hukum.php`) menggunakan otentikasi *Basic Auth* dengan kredensial (*username* dan *password*) yang ditulis langsung secara permanen (*hardcoded*) di dalam banyak fungsi. Hal ini memicu risiko kebocoran kredensial dan merepotkan ketika kredensial perlu diganti. Pengecekan keamanan yang berulang-ulang di setiap fungsi juga menyebabkan inefisiensi baris kode (melanggar prinsip DRY - *Don't Repeat Yourself*).

Berikut perbaikan yang telah diterapkan:

**1. Mengganti Basic Auth dengan API Key Terpusat — `Tampil_hukum.php`**
Pengecekan keamanan dirombak menjadi skema *API Key* melalui HTTP Header `X-API-KEY` (atau *Bearer Token*). Seluruh kode validasi yang berulang telah dihapus dari fungsi-fungsi API. Pengecekan kini dipusatkan pada sebuah fungsi private baru `_cek_auth()` yang akan dipanggil satu kali pada metode `__construct()`. Pendekatan ini menjamin seluruh *route* / *endpoint* di dalam *controller* tersebut otomatis terlindungi.

**2. Menyimpan Token di Database Secara Dinamis**
Token atau *API Key* yang valid tidak lagi di-*hardcode*, melainkan disinkronkan dan divalidasi ke tabel khusus `api_keys` di database. Jika terjadi kebocoran token pada *mobile app*, admin dapat langsung me-nonaktifkan token lama (via field `is_active`) dan membuat token baru secara *on-the-fly* pada database tanpa harus menyentuh *source code* aplikasi web backend.

---

## Ringkasan Perubahan File

| File | Perubahan |
|---|---|
| `application/controllers/Administrator.php` | Validasi kepemilikan profil (IDOR), pengecekan password lama, validasi password kuat, pencegahan ganti password admin lain, logika reset password |
| `application/models/Model_users.php` | Pembatasan update `level`/`blokir` hanya untuk admin, penambahan fungsi `users_update_password()` |
| `application/views/administrator/mod_users/view_users_edit.php` | Field password lama, tombol reset password, pesan flashdata, nonaktifkan field password antar-admin, sembunyikan kontrol level/blokir untuk user biasa |
| `application/controllers/api/Tampil_hukum.php` | Mengganti *Basic Auth* *hardcoded* menjadi *API Key* terpusat melalui fungsi `_cek_auth()` pada konstruktor |
| `api_keys.sql` | *Script* migrasi untuk membentuk tabel penyimpan *API Key* |
