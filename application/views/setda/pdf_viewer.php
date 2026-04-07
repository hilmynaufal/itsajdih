<!DOCTYPE html>
<html>
<head>
    <title>Baca PDF</title>
    <style>
        body { margin: 0; padding: 20px; background: #f0f0f0; }
        .pdf-container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; }
        .pdf-viewer { width: 100%; height: 800px; border: none; }
    </style>
</head>
<body>
    <div class="pdf-container">
        <embed class="pdf-viewer" src="<?php echo $pdf_url; ?>" type="application/pdf">
        <div style="text-align: center; margin-top: 10px;">
            <a href="<?php echo $pdf_url; ?>" download style="color: #007bff; text-decoration: none;">
                📥 Download PDF
            </a>
        </div>
    </div>
</body>
</html>