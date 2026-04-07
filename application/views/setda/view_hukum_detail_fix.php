<? var_dump($data)or die(); ?>
<section id="service-details" class="service-details section">

      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <div class="service-box">
            <div class="table-responsive">
							<table class="table" width="100">
								<tbody>
									<tr>
										<th width="30%" scope="row">Jenis Peraturan</th>
										<td><?= $detail->jenis_nama; ?></a></td>
									</tr>
									<tr>
										<th width="30%" scope="row">Jenis Peraturan (Singkatan)</th>
										<td><a href="#">SE BUPATI</a></td>
									</tr>
									<tr>
										<th scope="row">Judul Peraturan</th>
										<td><?= $detail->nama; ?></td>
									</tr>
									<tr>
										<th scope="row">Nomor Peraturan</th>
										<td><a href="https://jdih.pemalangkab.go.id/index.php/produk_hukum?nomor=000414">000414</a></td>
									</tr>
									<tr>
										<th scope="row">Tahun Peraturan</th>
										<td><a href="https://jdih.pemalangkab.go.id/index.php/produk_hukum?nomor=2024"><?= $detail->tahun; ?></a></td>
									</tr>
									<tr>
										<th scope="row">Tempat Penetapan</th>
										<td>Jawa Barat,Kabupaten Bandung</td>
									</tr>
									<tr>
										<th scope="row">Tanggal Penetapan</th>
										<td><?= tgl_indoo($detail->tanggal_ditetapkan); ?></td>
									</tr>
									<tr>
										<th scope="row">Tanggal Pengundangan</th>
										<td><?= tgl_indoo($detail->tanggal_ditetapkan); ?></td>
									</tr>
									<!-- <tr>
										<th scope="row">Penandatanganan</th>
										<td></td>
									</tr> -->
									<!-- <tr>
										<th scope="row">Pemrakarsa</th>
										<td>
											<a href="https://pemalangkab.go.id/" target="_blank">Sekretariat Daerah</a>										</td>
									</tr> -->
									<!-- <tr>
										<th scope="row">Urusan Pemerintahan</th>
										<td><a href="https://jdih.pemalangkab.go.id/index.php/produk_hukum?bidang=pemerintah-umum">Pemerintah Umum</a></td>
									</tr> -->
									<!-- <tr>
										<th scope="row">Bidang Hukum</th>
										<td>Hukum Administrasi Negara</td>
									</tr> -->
									<tr>
										<th scope="row">Bahasa</th>
										<td>Indonesia</td>
									</tr>
									<tr>
										<th scope="row">Sumber</th>
										<td>Arsip JDIH DPRD KAB BANDUG</td>
									</tr>
									<tr>
										<th scope="row">Lokasi</th>
										<td>Arsip JDIH  DPRD KAB BANDUG</td>
									</tr>
									<!-- <tr>
										<th scope="row">Nomor Induk Buku</th>
										<td>-</td>
									</tr> -->
									<tr>
										<th scope="row">Status</th>
										<td><a href="">

										<?php
                                if ( $detail->visible == 1) {
                                    echo "Masih Berlaku";
                                } else {
                                    echo "Tidak Berlaku";
                                }
						?>
										</a></td>
									</tr>
									<tr>
										<td colspan="2">Halaman Ini Diakses sebanyak <b>282</b> Kali dan di Unduh Sebanyak <b>54</b> Kali</td>
									</tr>
								</tbody>
							</table>
						</div>
              <!-- <h4>Kategori Produk</h4> -->
              <!-- <div class="services-list">
                <a href="#" class="active"><i class="bi bi-arrow-right-circle"></i><span>Web Design</span></a>
                <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Web Design</span></a>
                <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Product Management</span></a>
                <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Graphic Design</span></a>
                <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Marketing</span></a>
              </div> -->
            </div><!-- End Services List -->

            <div class="service-box">
              <h4>Download Produk</h4>
              <div class="download-catalog">
                <!-- <a href="#"><i class="bi bi-filetype-pdf"></i><span>Download</span></a> -->

                <!-- <a href="#"><i class="bi bi-file-earmark-word"></i><span>Catalog DOC</span></a> -->
              </div>
            </div><!-- End Services List -->

            <div class="help-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-headset help-icon"></i>
              <h4>Survey SKM?</h4>
              <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span></span></p>
              <!-- <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="mailto:contact@example.com">contact@example.com</a></p> -->
            </div>

          </div>

          <div class="col-lg-8 ps-lg-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/services.jpg" alt="" class="img-fluid services-img">
            <h3></h3>
          
			<?php 
			
			$file_download=$detail->file_path;

						 $siteaddressAPI = base_url().$file_download."";

					

			// 					$pisah=explode("/", $siteaddressAPI);

			// 				 	$pisah[]=array();

			// 				 $file=$pisah[6];

			// 			//	  var_dump($file) or die();

			// 	header("content-type: application/pdf");
			
			// readfile('./asset/file_hukum/'.$file);
			?> 
            <!-- <iframe src="<?PHP '';//echo $siteaddressAPI ?>" width="100%" height="600px"></iframe> -->
			<div class="top-bar">
                        <button class="btn" id="prev-page">
                            <i class="fas fa-arrow-circle-left"></i> Prev Page
                        </button>
                        <button class="btn" id="next-page">
                            Next Page <i class="fas fa-arrow-circle-right"></i>
                        </button>
                        <span class="page-info">
                            Page <span id="page-num"></span> of <span id="page-count"></span>
                        </span>
                        <input type="text" id="input-page-num" placeholder="Enter the page number">
                        <button class="btn" id="go-to-page">Go To Page</button>

        <!-- <input type="file" id="file-input" hidden="hidden"> -->
        <!-- <button class="btn" id="upload-pdf"> -->
            <!-- Upload PDF <i class="fas fa-arrow-circle-up"></i>  -->
        <!-- </button> -->
            </div>

    <canvas id="pdf-render">

	</canvas>
	<script>
	const url = '<?PHP echo $siteaddressAPI ?>';

// const url = 'https://mozilla.github.io/pdf.js/web/compressed.tracemonkey-pldi-09.pdf';
// initial params 
let pdf;
let canvas;
let isPageRendering;
let pageRenderingQueue = null;
let canvasContext;
let totalPages;
let currentPageNum = 1;

// events 
window.addEventListener('load', ()=>{
    isPageRendering = false;
    pageRenderingQueue = null;
    canvas = document.getElementById('pdf-render');
    canvasContext = canvas.getContext("2d");

    // add events 
    initEvents();
    // render first page 
    initPDFRenderer();
})

let upload = document.getElementById('upload-pdf');
let fileInputBtn = document.getElementById('file-input');

upload.addEventListener('click', ()=>{
    fileInputBtn.click();
})

fileInputBtn.addEventListener('change', ()=>{
    // fileInputBtn.click();
    const fileInput = document.getElementById('file-input');
    const file = fileInput.files[0];

    if(file){
        const fileReader = new FileReader();
        fileReader.onload = function (event){
            const arrayBuffer = event.target.result;

            // render the uploaded pdf file 
            renderPDF(arrayBuffer);
        }
        fileReader.readAsArrayBuffer(file);
    }else{
        console.log("No file selected");
    }

})

function renderPDF(arrayBuffer) {
    pdfjsLib.getDocument({data: arrayBuffer}).promise
        .then(pdfData => {
            totalPages = pdfData.numPages;
            let pagesCounter = document.getElementById('page-count');
            pagesCounter.textContent = totalPages;
            // assigning read pdfContent to global variable
            pdf = pdfData;
            renderPage(currentPageNum);
        })
        .catch(error=>{
            // display error 
            const div = document.createElement('div');
            div.className = 'error';
            div.appendChild(document.createTextNode(error.message));
            document.querySelector('body').insertBefore(div, canvas);
            // remove the top bar 
            document.querySelector('.top-bar').style.display = 'none';
        })
}

function initEvents() {
    let prevPageBtn = document.getElementById('prev-page');
    let nextPageBtn = document.getElementById('next-page');
    let goToPage = document.getElementById('go-to-page');
    let inputPageNum = document.getElementById('input-page-num');
    prevPageBtn.addEventListener('click', renderPreviousPage);
    nextPageBtn.addEventListener('click', renderNextPage);
    goToPage.addEventListener('click', goToPageNum);
    
    inputPageNum.addEventListener('keypress', function(event){
        if(event.key === 'Enter'){
            goToPageNum();
        } 
    })
}
// let option = {url};
// init when window is loaded 
function initPDFRenderer() {
    pdfjsLib.getDocument(url).promise
        .then(pdfData => {
            totalPages = pdfData.numPages;
            let pagesCounter = document.getElementById('page-count');
            pagesCounter.textContent = totalPages;
            // assigning read pdfContent to global variable
            pdf = pdfData;
            renderPage(currentPageNum);
        })
        .catch(error=>{
            // display error 
            const div = document.createElement('div');
            div.className = 'error';
            div.appendChild(document.createTextNode(error.message));
            document.querySelector('body').insertBefore(div, canvas);
            // remove the top bar 
            document.querySelector('.top-bar').style.display = 'none';
        })
}

function renderPage(pageNumToRender){
    isPageRendering = true;
    document.getElementById('page-num').textContent = pageNumToRender;
    pdf.getPage(pageNumToRender)
        .then(page => {
            const viewport = page.getViewport({scale:1});
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            let renderContext = {canvasContext, viewport};
            page.render(renderContext).promise
                .then(()=>{
                    isPageRendering = false;
                    if(pageRenderingQueue !== null){
                        renderPage(pageNumToRender);
                        pageRenderingQueue = null;
                    }
                })
        })
}

function renderPageQueue(pageNum){
    if(pageRenderingQueue != null){
        pageRenderingQueue = pageNum;
    }else{
        renderPage(pageNum);
    }
}

function renderNextPage(){
    if(currentPageNum >= totalPages){
        alert("This is the last Page");
        return;
    }
    currentPageNum++;
    renderPageQueue(currentPageNum);
}
function renderPreviousPage(){
    if(currentPageNum <= 1){
        alert("This is the first Page");
        return;
    }
    currentPageNum--;
    renderPageQueue(currentPageNum);
}

function goToPageNum(){
    let numberInput = document.getElementById('input-page-num');
    let pageNumber = parseInt(numberInput.value);
    if(pageNumber){
        if(pageNumber <= totalPages && pageNumber >= 1){
            currentPageNum = pageNumber;
            numberInput.value = "";
            renderPageQueue(pageNumber);
            return;
        }
    }else{
        alert("Enter a valid page number");
    }
}
	</script>
          </div>

        </div>

      </div>
	  <link rel="stylesheet" href="css/style.css">
	  <link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/pdf/style.css rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="https://play-lh.googleusercontent.com/kIwlXqs28otssKK_9AKwdkB6gouex_U2WmtLshTACnwIJuvOqVvJEzewpzuYBXwXQQ=w240-h480-rw">
	<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/pdf.js"></script>    



</section>