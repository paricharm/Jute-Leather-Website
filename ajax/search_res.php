<?php
include '../include/config.php';
$search = $_POST['search'];
$query = mysqli_query($con,"select * from product where pr_name LIKE '%$search%' or pr_desc LIKE '%$search%'");
$data="";
while($row = mysqli_fetch_assoc($query))
        {
            $data.='';
            ?>
          <!-- End Section Title -->
          
                  <div class="col-lg-3 col-md-6 mb-4">
                  <a href="admin/<?= $row['img'] ?>" data-lightbox="image-1" data-title="<?= $row['pr_desc'] ?>" data-heading="<?= $row['pr_name'] ?>">
                    <div class="person">
                      <figure>
                        <img src="admin/<?=$row['img']?>" alt="Image" style="border-radius:0% !important;width:300px !important;height:300px !important">
                        <div class="social">
                          <a href="#"><span class="bi bi-facebook"></span></a>
                          <a href="#"><span class="bi bi-twitter-x"></span></a>
                          <a href="#"><span class="bi bi-linkedin"></span></a>
                        </div>
                      </figure>
                      <div class="person-contents">
                        <h3 class="text-capitalize"><?= $row['pr_name'] ?></h3>
                        <span class="position text-capitalize"><?= $row['pr_desc'] ?></span>
                      </div>
                    </div>
                  </a>
                  </div>
              
    
            <?php
        }
echo $data;
?>