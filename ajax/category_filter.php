<?php
$id = $_POST['cat'];
include '../include/config.php';

if ($id == 0) {
  $query = mysqli_query($con, "select * from product");
} else {
  $query = mysqli_query($con, "select * from product where cat_id=$id");
}

$data = '';
if (mysqli_num_rows($query) > 0) {
  while ($row = mysqli_fetch_assoc($query)) {
    $data .= '';
?>
    <!-- End Section Title -->

    <div class="col-lg-3 col-md-6 mb-4">
      <a href="admin/<?= $row['img'] ?>" data-lightbox="image-1" data-title="<?= $row['pr_desc'] ?>" data-heading="<?= $row['pr_name'] ?>">
        <div class="person" style="border:1px solid rgba(0,0,0,0.2)">
          <figure>
            <img src="admin/<?= $row['img'] ?>" alt="Image" style="border-radius:0% !important;width:300px !important;height:300px !important">
          </figure>
          <div class="person-contents pb-3">
            <h3 class="text-capitalize"><?= $row['pr_name'] ?></h3>
            <span class="position text-capitalize"><?= $row['pr_desc'] ?></span>
          </div>
        </div>
      </a>
    </div>


<?php
  }
}
echo $data;
?>