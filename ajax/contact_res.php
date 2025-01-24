<?php include '../include/bengali_header.php' ?>

<main class="main">
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.webp);">
        <div class="container position-relative">
            <h1>কন্টাক্ট </h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.php"  style="color:white;">হোম </a></li>
                    <li class="current">কন্টাক্ট </li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->
    <!-- Contact Section -->
    <section id="contact" class="contact section my-5">
        <div class="container" data-aos="fade">
            <div class="row gy-5 gx-lg-5">
                <div class="col-lg-4">
                    <div class="info">
                        <h3>যোগাযোগ করুন</h3>
                        <p>তথ্যপ্রাপ্তির জন্য দয়া করে যোগাযোগ করুন নিম্নলিখিত ঠিকানায়।</p>
                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>ঠিকানা:</h4>
                                <p>A108 Adam Street, নিউ ইয়র্ক, NY 535022</p>
                            </div>
                        </div><!-- End Info Item -->
                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>ইমেইল:</h4>
                                <p>info@example.com</p>
                            </div>
                        </div><!-- End Info Item -->
                        <div class="info-item d-flex">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h4>ফোন:</h4>
                                <p>+1 5589 55488 55</p>
                            </div>
                        </div><!-- End Info Item -->
                    </div>
                </div>
                <div class="col-lg-8">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="আপনার নাম" required="">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="আপনার ইমেইল" required="">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="বিষয়" required="">
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" placeholder="বার্তা" required=""></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">লোড হচ্ছে</div>
                            <div class="error-message"></div>
                            <div class="sent-message">আপনার বার্তা পাঠানো হয়েছে। ধন্যবাদ!</div>
                        </div>
                        <div class="text-center"><button type="submit">বার্তা পাঠান</button></div>
                    </form>
                </div><!-- End Contact Form -->
            </div>
        </div>
    </section><!-- /Contact Section -->
</main>

<?php include '../include/footer1.php' ?>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>


<!-- Main JS File -->
<script src="assets/js/main.js"></script>