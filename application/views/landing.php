<?php
  $setting = $this->db->get('settings')->row_array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?> Institut Teknologi dan Bisnis Diniyyah Lampung</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <meta property="og:title" content="<?= $title ?> Institut Teknologi dan Bisnis Diniyyah Lampung">
    <meta property="og:url" content="<?= base_url() ?>" />
    <meta name="description" content="<?= $title ?>">
    <meta name="author" content="muhamad brilliant">
    <meta property="og:image" content="<?= base_url();  ?>assets/upload/images/fav/<?= $setting['favicon']; ?>" />
    <link rel="shortcut icon" href="<?= base_url();  ?>assets/upload/images/fav/<?= $setting['favicon']; ?>"
		type="image/x-icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('assets/landing/') ?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/landing/') ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/landing/') ?>lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assets/landing/') ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('assets/landing/') ?>css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-success" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0"><img src="<?= base_url();  ?>assets/upload/images/fav/<?= $setting['favicon']; ?>" alt="Logo"> SPMB<span class="fs-5"> Instidla</span></h1>
                    
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.html" class="nav-item nav-link ">Home</a>
                        <a href="#about" class="nav-item nav-link">Tentang kami</a>
                        <a href="#prodi" class="nav-item nav-link">Program Studi</a>
                        
                        
                    </div>
                    <butaton type="button" class="btn text-info ms-3" data-bs-toggle="modal" data-bs-target="#daftarModal"><i class="fas fa-stream"></i> Langkah Pendaftaran</butaton>
                    <a href="<?= base_url('register') ?>" class="btn btn-success text-light rounded-pill py-2 px-4 ms-3">Daftar Sekarang</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-success  hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated zoomIn">Sistem Penerimaan <br> Mahasiswa Baru</h1>
                            <p class="text-white pb-3 animated zoomIn">Institut Teknologi da Bisnis Diniyyah Lampung</p>
                            <a href="<?= base_url('register') ?>" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft"> Daftar Sekarang</a>
                            
                        </div>
                        <div class="col-lg-6 text-center text-lg-start d-none d-md-block">
                            <img class="img-fluid" src="<?= base_url('assets/landing/') ?>hero.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Full Screen Search Start -->
        <div class="modal fade" id="daftarModal" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content" style="background: rgba(0, 0, 2, 0.969);">
                    <div class="modal-header border-0">
                        <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center">
                       <img class="img-fluid wow zoomIn h-100" src="<?= base_url('assets/landing/step.png') ?>" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Screen Search End -->


        <!-- About Start -->
        <div id="about" class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="section-title position-relative mb-4 pb-2">
                            <h6 class="position-relative text-primary ps-4">Tentang Kami</h6>
                            <h2 class="mt-2">Institut Teknologi dan Bisnis Diniyyah Lampung</h2>
                        </div>
                        <p class="mb-4">Institut Teknologi dan Bisnis Diniyyah Lampung , merupakan kampus pertama di Kabupaten Pesawaran Lampung, dan memiliki 3 Program studi unggulan diantaranya :</p>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Rekayasa Perangkat Lunak</h6>
                                <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Kewirausahaan</h6>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Manajemen Ritel</h6>
                                
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                      
                        <iframe class="img-fluid wow zoomIn h-100" width="600" height="400" src="https://www.youtube.com/embed/7gPjpaguJL8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Newsletter Start -->
        <div class="container-xxl bg-success newsletter my-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container px-lg-5">
                <div class="row align-items-center" style="height: 250px;">
                    <div class="col-12 col-md-6">
                        <h3 class="text-white">Mari Bergabung Bersama Kami</h3>
                        <small class="text-white ">Kampusnya Milenial</small><br>
                        <a href="<?= base_url('register') ?>" class="btn btn-light py-sm-3 px-sm-5 rounded-pill mt-3 me-3 animated slideInLeft"> Daftar Sekarang</a>
                        
                    </div>
                    <div class="col-md-6 text-center mb-n5 d-none d-md-block">
                        <img class="img-fluid mt-5" style="height: 250px;" src="<?= base_url('assets/landing/') ?>img/newsletter.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->


        <!-- Service Start -->
        <div class="container-xxl py-5" id="prodi">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">Program Studi</h6>
                    <h2 class="mt-2">Program Studi Unggulan</h2>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow zoomIn bg-success" data-wow-delay="0.1s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="fa fa-home fa-2x"></i>
                            </div>
                            <h5 class="mb-3">Rekayasa Perangkat Lunak</h5>
                            
                            <a class="btn px-3 mt-auto mx-auto" href="<?= base_url('register') ?>">Daftar Sekarang</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn bg-success" data-wow-delay="0.3s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="fa fa-home fa-2x"></i>
                            </div>
                            <h5 class="mb-3">Kewirausahaan</h5>
                            
                            <a class="btn px-3 mt-auto mx-auto" href="<?= base_url('register') ?>">Daftar Sekarang</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn bg-success" data-wow-delay="0.6s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="fa fa-home fa-2x"></i>
                            </div>
                            <h5 class="mb-3">Manajemen Ritel</h5>
                            
                            <a class="btn px-3 mt-auto mx-auto" href="<?= base_url('register') ?>">Daftar Sekarang</a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- Service End -->


       


     
        

        <!-- Footer Start -->
        <div class="container-fluid bg-success text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5 justify-content-center text-center">
                    <div class="col-md-12 col-lg-4">
                        <h5 class="text-white mb-4">Hubungi Kami</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>Jl. Raya Negeri Sakti No.16, Negeri Sakti, Kec. Gedong Tataan, Kabupaten Pesawaran, Lampung 35366</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+628127900072</p>
                        <p><i class="fa fa-envelope me-3"></i>spmb@instidla.ac.id</p>
                        
                    </div>
                   
                  
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row ">
                        <div class="col-md-12 text-center text-center  mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="<?= base_url() ?>"><?= $title ?> Institut Teknologi dan Bisnis Diniyyah Lampung</a>, All Right Reserved. 
							
							
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-success btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/landing/') ?>lib/wow/wow.min.js"></script>
    <script src="<?= base_url('assets/landing/') ?>lib/easing/easing.min.js"></script>
    <script src="<?= base_url('assets/landing/') ?>lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url('assets/landing/') ?>lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/landing/') ?>lib/isotope/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('assets/landing/') ?>lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('assets/landing/') ?>js/main.js"></script>
</body>

</html>