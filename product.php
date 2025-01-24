<?php
include 'include/config.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title> Product - Classical Jute and Leather Products Exporter </title>
  <meta name="description" content="">
  <meta name="keywords" content="">



  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Marcellus:wght@400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="services-page" id="all_page">


  <?php include 'include/head.php' ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.webp);">
      <div class="container position-relative">
        <h1>Our Products:</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php"  style="color:white;">Home</a></li>
            <li class="current">Product</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->
    <!-- <section class="team-15 team section" id="team">
      <div class="container col-lg-6 col-12 col-md-6">
        <form action="" method="post">
          <div class="row">
            <div class="col-8">
              <div class="input-group">
                <input type="search" name="search" class="form-control py-3" id="search" placeholder="Search your product here ....">
                <input type="submit" id="searchBtn" class="btn btn-success py-3" value="SEARCH">
              </div>
            </div>
            <div class="col-4">
              <select name="category" class="form-control py-3" id="category">
                <option value="0" class="text-center">---- SELECT ----</option>
                <option value="2" class="text-center">Jute</option>
                <option value="1" class="text-center">Leather</option>
              </select>
            </div>
          </div>
        </form>
      </div>
    </section> -->

    <ul class="nav nav-underline justify-content-center mt-3">
      <li class="nav-item">
        <a class="nav-link" href="#" id="all" style="color:#842216">All</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="jute" style="color:#842216">Jute</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="leather" style="color:#842216">Leather</a>
      </li>
    </ul>

    <!-- Team Section -->
    <section id="about-3" class="about-3 section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h1 style=" color:#842216">Our Latest Product</h1>
      </div>
      <div class="content">
        <div class="container">
          <div class="row">
            <?php
            $select_all = mysqli_query($con, "select * from product where trending=0 limit 4");
            while ($row = mysqli_fetch_assoc($select_all)) {
            ?>
              <div class="col-lg-3 col-md-6 mb-4">
                <div class="person" style="border:1px solid rgba(0,0,0,0.2);">
                  <figure>
                    <img src="admin/<?= $row['img'] ?>" alt="Image" style="border-radius:0% !important;width:300px !important;height:300px !important ; box-shadow: none !important;">
                    <!-- <div class="social">
                      <a href="#"><span class="bi bi-facebook"></span></a>
                      <a href="#"><span class="bi bi-twitter-x"></span></a>
                      <a href="#"><span class="bi bi-linkedin"></span></a>
                    </div> -->
                  </figure>
                  <div class="person-contents">
                    <h3 class="text-capitalize text-center"><?= $row['pr_name'] ?></h3>
                    <p class="position text-capitalize text-center"><?= $row['pr_desc'] ?></p>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>

          </div>
        </div>

      </div>

    </section><!-- /Team Section -->

    
    <section class="team-15 team section d-none" id="response">
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Jute Products</h2>
      </div>
      <div class="content">
        <div class="container">
          <div class="row" id="res_pro">
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include 'include/footer1.php' ?>
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader" style="display: flex;align-items: center;justify-content: center;">
    <img src="assets/img/logo.png" style="width: 50px;height: 50px;" alt="" srcset="">
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/js/jquery-3.6.4.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
  <script>
    $(document).ready(function() {

      $("#all").click(function() {
        categoryChange(0);
      });

      $("#jute").click(function() {
        categoryChange(2);
      });

      $("#leather").click(function() {
        categoryChange(1);
      });

      function categoryChange(id) {

        $("#response").removeClass("d-none");
        $("#res_pro").empty();

        $.ajax({
          url: "ajax/category_filter.php",
          data: {
            cat: id
          },
          type: "POST",
          success: function(data) {
            $("#product_all").fadeOut();
            $("#res_pro").html(data);
          }
        })
      }



      $("#category").change(function() {
        var cat = $(this).val();


        $("#response").removeClass("d-none");
        $("#res_pro").empty();
        $.ajax({
          url: "ajax/category_filter.php",
          data: {
            cat: cat
          },
          type: "POST",
          success: function(data) {
            $("#product_all").fadeOut();
            $("#res_pro").html(data);
          }
        })
      })

      // search code 
      $("#searchBtn").click(function(e) {
        e.preventDefault();
        $("#response").removeClass("d-none");
        $("#res_pro").empty();
        var search = $("#search").val();
        $.ajax({
          url: "ajax/search_res.php",
          data: {
            search: search
          },
          type: "POST",
          success: function(data) {
            $("#product_all").fadeOut();
            $("#res_pro").html(data);
          }
        })
      })

      $(document).ready(function() {

        if (localStorage.getItem('language') == 1) {
          $.ajax({
            url: "ajax/product_res.php",
            type: "POST",
            success: function(data) {
              $("#all_page").empty();
              $("#all_page").html(data);
            }
          })
          $.ajax({
          url:"language.php",
          type:"GET",
          data:{language:1},
          success:function(data){
          }
        })
        }

      })

    })
  </script>

  <script>
    $('a[data-imagelightbox="demo"]').click(function() {
      $(this).option({
        'resizeDuration': 200,
        'fadeDuration': 200,
        'imageFadeDuration': 200
      });
    })
    new Imagelightbox(document.querySelectorAll('a[data-imagelightbox="demo"]'), {
      // png|jpg|jpeg|gif
      animationSpeed: 250,
      activity: true, // activity indicator
      arrows: true, // navigation arrows
      button: true, // close button
      caption: false,
      enableKeyboard: true,
      history: false,
      fullscreen: true,
      gutter: 10, // percentage of client height
      offsetY: 0, // percentage of gutter
      navigation: false,
      overlay: true,
      preloadNext: true,
      quitOnEnd: true,
      quitOnImgClick: false,
      quitOnDocClick: true,
      resizeDuration: 200,
      fadeDuration: 200,
      imageFadeDuration: 200
    })
  </script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>