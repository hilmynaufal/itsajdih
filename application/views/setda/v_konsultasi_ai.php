<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi AI - JDIH Setwan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body { background-color: #f4f7f6; }
        .chat-container { max-width: 800px; margin: 50px auto; }
        .card { border-radius: 15px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .card-header { background-color: #007bff; color: white; border-radius: 15px 15px 0 0 !important; }
        .ai-response { background-color: #e9ecef; border-left: 5px solid #007bff; padding: 15px; border-radius: 5px; }
        .loading { display: none; }

        /* Styling khusus untuk Dokumen Referensi */
#accordionDokumen .card {
    background-color: #ffffff; /* Putih untuk isi */
    border: 1px solid #dee2e6;
    margin-bottom: 10px;
}

#accordionDokumen .card-header {
    background-color: #f8f9fa !important; /* Abu-abu sangat muda */
    border-bottom: 1px solid #dee2e6;
}

#accordionDokumen .btn-link {
    color: #333333 !important; /* Teks hitam */
    font-weight: 600;
    text-decoration: none;
    text-align: left;
}

#accordionDokumen .btn-link:hover {
    color: #007bff !important; /* Warna biru saat hover agar interaktif */
}

#accordionDokumen .card-body {
    background-color: #ffffff;
    color: #212529; /* Teks body hitam */
}

/* Memperbaiki tampilan judul dokumen */
.doc-title {
    color: #000000;
    margin-bottom: 15px;
}
    </style>
</head>
<body>

<div class="container chat-container">
    <div class="card">
        <div class="card-header text-center">
            <h4><i class="fas fa-robot"></i> Asisten AI JDIH Setwan</h4>
            <p class="mb-0">Tanyakan tentang peraturan dan produk hukum</p>
        </div>
        <div class="card-body">
            
            <form id="formAi" action="<?= base_url('konsultasi/tanya') ?>" method="POST">
                <div class="form-group">
                    <label for="pertanyaan">Apa yang ingin Anda ketahui?</label>
                    <textarea class="form-control" name="pertanyaan" id="pertanyaan" rows="3" placeholder="Contoh: Apa aturan mengenai pajak daerah?" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block" id="btnProses">
                    <i class="fas fa-paper-plane"></i> Tanya Asisten AI
                </button>
            </form>

            <hr>

            <div class="text-center loading my-4">
                <div class="spinner-border text-primary" role="status"></div>
                <p class="mt-2">Sedang mencari referensi hukum di database...</p>
            </div>

            <?php if(isset($jawaban)): ?>
                <!-- Modal Jawaban -->
                <div class="modal fade" id="modalJawaban" tabindex="-1" role="dialog" aria-labelledby="modalJawabanLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-success text-white">
                                <h5 class="modal-title" id="modalJawabanLabel"><i class="fas fa-robot"></i> Jawaban Asisten AI</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="ai-response mb-3">
                                    <?= nl2br($jawaban) ?>
                                </div>
                                <div class="text-muted small mb-3">
                                    *Jawaban dihasilkan secara otomatis oleh AI berdasarkan database JDIH Setwan.
                                </div>

                                <?php if(!empty($data_hukum)): ?>
                              <div class="mt-4">
    <h6 class="text-dark"><i class="fas fa-file-pdf"></i> Dokumen Referensi:</h6>
    <div class="accordion" id="accordionDokumen">
        <?php foreach($data_hukum as $key => $row): ?>
            <?php if(!empty($row->path_peraturan)): ?>
                <div class="card">
                    <div class="card-header" id="heading<?= $key ?>">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block" type="button" data-toggle="collapse" data-target="#collapse<?= $key ?>" aria-expanded="false">
                                <i class="fas fa-chevron-right mr-2 small"></i> <?= $row->nama ?>
                            </button>
                        </h2>
                    </div>

                    <div id="collapse<?= $key ?>" class="collapse" data-parent="#accordionDokumen">
                        <div class="card-body border-top">
                            <embed src="<?= base_url($row->path_peraturan) ?>" type="application/pdf" width="100%" height="600px" />
                            <div class="mt-3 text-right">
                                <a href="<?= base_url($row->path_peraturan) ?>" target="_blank" class="btn btn-outline-dark btn-sm">
                                    <i class="fas fa-external-link-alt"></i> Buka Fullscreen
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
                                <?php endif; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#formAi').on('submit', function() {
            // Tampilkan loading dan sembunyikan hasil lama
            $('.loading').show();
            $('#btnProses').attr('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Memproses...');
        });

        <?php if(isset($jawaban)): ?>
            $('#modalJawaban').modal('show');
        <?php endif; ?>
    });
</script>

</body>
</html> 