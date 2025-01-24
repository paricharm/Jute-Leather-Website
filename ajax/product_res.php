<?php include '../include/bengali_header.php'; ?>
<main class="main">

  <!-- পেজ শিরোনাম -->
  <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.webp);">
    <div class="container position-relative">
      <h1>আমাদের পণ্যসমূহ:</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index.php"  style="color:white;">হোম</a></li>
          <li class="current">প্রডাক্টস </li>
        </ol>
      </nav>
    </div>
  </div><!-- পেজ শিরোনাম শেষ -->

  <!-- <section class="team-15 team section" id="team">
  <div class="container col-lg-6 col-12 col-md-6">
    <form action="" method="post">
      <div class="row">
        <div class="col-8">
          <div class="input-group">
            <input type="search" name="search" class="form-control py-3" id="search" placeholder="এখানে আপনার পণ্য অনুসন্ধান করুন ....">
            <input type="submit" id="searchBtn" class="btn btn-success py-3" value="অনুসন্ধান">
          </div>
        </div>
        <div class="col-4">
          <select name="category" class="form-control py-3" id="category">
            <option value="0" class="text-center">---- নির্বাচন করুন ----</option>
            <option value="2" class="text-center">জুট</option>
            <option value="1" class="text-center">লেদার</option>
          </select>
        </div>
      </div>
    </form>
  </div>
</section> -->

  <ul class="nav nav-underline justify-content-center mt-3">
    <li class="nav-item">
      <a class="nav-link" href="#" id="all" style="color:#842216">সব</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" id="jute" style="color:#842216">জুট</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" id="leather" style="color:#842216">লেদার</a>
    </li>
  </ul>

  <!-- টিম সেকশন -->
  <section class="team-15 team section" id="product_all">
    <!-- সেকশন শিরোনাম -->
    <div class="container section-title" data-aos="fade-up">
      <h2>আমাদের পণ্যসমূহ</h2>
      <!--- <p>জুট এবং জুট পণ্য:</p> -->
    </div><!-- সেকশন শিরোনাম শেষ -->

    <div class="content">
      <div class="container">
        <div class="row">
          <?php
          $jute = mysqli_query($con, "select * from product order by date_created desc");
          while ($row = mysqli_fetch_assoc($jute)) {
          ?>
            <div class="col-lg-3 col-md-6 mb-4">
              <a href="admin/<?= $row['img'] ?>" data-imagelightbox="demo" data-lightbox="image-1" data-title="<?= $row['pr_desc'] ?>" data-heading="<?= $row['pr_name'] ?>">
                <div class="person" style="border:1px solid rgba(0,0,0,0.2)">
                  <figure>
                    <img src="admin/<?= $row['img'] ?>" alt="ছবি" style="border-radius:0% !important;width:300px !important;height:300px !important">
                  </figure>
                  <div class="person-contents pb-3">
                    <h3 class="text-capitalize"><?= $row['name_beng'] ?></h3>
                    <span class="position text-capitalize"><?= $row['beng_desc'] ?></span>
                  </div>
                </div>
              </a>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </section><!-- টিম সেকশন শেষ -->

  <section class="team-15 team section d-none" id="response">
    <div class="container section-title" data-aos="fade-up">
      <h2>আমাদের পণ্যসমূহ</h2>
    </div>
    <div class="content">
      <div class="container">
        <div class="row" id="res_pro">
        </div>
      </div>
    </div>
  </section>
</main>

<?php include '../include/footer1.php' ?>
<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="assets/js/jquery-3.6.4.min.js"></script>


<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>


<!-- Main JS File -->
<script src="assets/js/main.js"></script>

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
      $(".lang").change(function() {
        var lang_id = $(this).val();
        $.ajax({
          url: "ajax/product_res.php",
          data: {
            lang_id: lang_id
          },
          type: "POST",
          success: function(data) {
            $("#all_page").empty();
            $("#all_page").html(data);
          }
        })
      })
    })
  })
</script>