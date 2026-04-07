# Dokumentasi Perbaikan Keamanan User Management

Dokumen ini merinci perubahan yang telah dilakukan untuk meningkatkan keamanan pada modul manajemen user dalam aplikasi.

## 1. Kontrol Akses (Access Control)
- **Pembatasan Endpoint:** Endpoint `administrator/edit_manajemenuser/` kini hanya dapat diakses oleh user dengan level `admin` atau oleh pemilik akun itu sendiri.
- **Pencegahan Akses Ilegal:** User dengan level `user` yang mencoba mengakses profil user lain akan secara otomatis dialihkan (redirect) ke halaman dashboard.
- **Keamanan Data:** Update data kini menggunakan ID yang diambil langsung dari URI, bukan dari field hidden di form, untuk mencegah serangan *Insecure Direct Object Reference* (IDOR).

## 2. Kebijakan Password Kuat (Strong Password Policy)
- **Ketentuan Baru:** Saat mengganti password, sistem kini mewajibkan kriteria berikut:
  - Minimal **12 karakter**.
  - Harus mengandung **huruf besar** (A-Z).
  - Harus mengandung **huruf kecil** (a-z).
  - Harus mengandung **angka** (0-9).
  - Harus mengandung **karakter khusus/simbol** (contoh: !@#$%^&*).
- **Validasi Server-Side:** Ketentuan ini diterapkan melalui validasi form di sisi server untuk memastikan keamanan tetap terjaga meskipun validasi client-side dilewati.

## 3. Konfirmasi Password Lama (Old Password Confirmation)
- **Verifikasi Identitas:** Saat user (termasuk admin) ingin mengubah password mereka sendiri, sistem kini mewajibkan input **Password Lama**.
- **Pengecekan Keamanan:** Perubahan password hanya akan diproses jika password lama yang dimasukkan sesuai dengan yang tersimpan di database.

## 4. Batasan Administratif & Manajemen User
- **Admin vs Admin:** Seorang admin kini **tidak dapat** mengganti password admin lainnya secara manual. Field password untuk admin lain akan dinonaktifkan (disabled).
- **Reset Password User:** Untuk user dengan level `user`, admin kini hanya dapat melakukan **Reset Password**.
  - Sistem akan menghasilkan password acak (random) sepanjang 16 karakter.
  - Password baru ini hanya akan ditampilkan **satu kali** melalui pesan sukses (flashdata) setelah reset berhasil.
- **Pencegahan Eskalasi Hak Akses (Privilege Escalation):** Sistem di sisi model (`Model_users`) kini memastikan bahwa field `level` dan status `blokir` hanya dapat diubah jika user yang melakukan request adalah seorang `admin`. User biasa tidak dapat mempromosikan dirinya sendiri menjadi admin melalui manipulasi data form.

## 5. Ringkasan Teknis Perubahan File
- **`application/controllers/Administrator.php`**: Penambahan logika kontrol akses, validasi password kuat, logika reset password, dan pengecekan password lama.
- **`application/models/Model_users.php`**: Refaktorisasi fungsi `users_update` untuk keamanan ID dan pembatasan update level/blokir hanya untuk admin. Penambahan fungsi `users_update_password`.
- **`application/views/administrator/mod_users/view_users_edit.php`**: Penambahan field password lama, tombol reset password, pesan error validasi, dan informasi kebijakan password baru.
