<?php
if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $file = $_FILES['img'];
    $dir = "uploads/";
    $file_name = $dir.md5($_FILES["img"]["name"]).".png";
    $file_tmp = $_FILES["img"]["tmp_name"];
//     $filename = "FOLDER/".$_FILES["file"]["name"];
// // move file to a folder
    if (move_uploaded_file($file_tmp, $file_name)) { // change target path
        $sql = "insert into categories(cat_name,img)values('{$name}','{$file_name}')";
        $query = mysqli_query($con,$sql);
        echo '<script>
        Swal.fire({
    title: "Congratulations",
    text: "New Category Added Successfully",
    icon: "success",
    timer:1500
  })
        </script>';
    }
}
if(isset($_GET['edit']))
{
    $edit = $_GET['edit'];
    $fetch = mysqli_query($con,"select * from categories where cat_id = {$edit}");
    $row = mysqli_fetch_assoc($fetch);
}
if(isset($_GET['Edit_Category']))
{
    if(isset($_POST['edit']))
    {
        $name = $_POST['name'];
        $file = $_FILES['img'];
        $file_name="";
        $dir = "uploads/";
        $file_tmp = $_FILES["img"]["tmp_name"];
    //     $filename = "FOLDER/".$_FILES["file"]["name"];
    // // move file to a folder
    if($_FILES["img"]["name"]=="")
    {
        $file_name.=$row['img'];
        $sql = "update categories set cat_name='{$name}',img='{$file_name}' where cat_id = {$edit}";
            $query = mysqli_query($con,$sql);
            echo '<script>
        Swal.fire({
    title: "Congratulations",
    text: "Updated Successfully",
    icon: "success",
    timer:1500
  })
        </script>';
    }else{
        $file_name.=$dir.md5($_FILES["img"]["name"]).".png";
        if (move_uploaded_file($file_tmp, $file_name)) { // change target path
            $sql = "update categories set cat_name='{$name}',img='{$file_name}' where cat_id = {$edit}";
            $query = mysqli_query($con,$sql);
            echo '<script>
        Swal.fire({
    title: "Congratulations",
    text: "Updated Successfully",
    icon: "success",
    timer:1500
  })
        </script>';
        }
    }
    }
    
}
?>



<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid py-3">
            <?php
            if(isset($_GET['Add_Category']))
            {
                ?>
            <div class="card col-lg-12 col-md-12 col-sm-12 ">
                <div class="card-header">
                    <h2 class="text-center">Add Category Details</h2>
                </div>
                <div class="card-body">
                    <div class="container col-md-8 col-lg-8 col-xl-8">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Name :
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                        File :
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="img">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="submit" name="register" class="btn btn-success col-12">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            }elseif(isset($_GET['Edit_Category']))
            {
                ?>
            <div class="card col-lg-12 col-md-12 col-sm-12 ">
                <div class="card-header">
                    <h2 class="text-center">Edit Category Details</h2>
                </div>
                <div class="card-body">
                    <div class="container col-md-8 col-lg-8 col-xl-8">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Name :
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" value="<?= $row['cat_name'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                        File :
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="img" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="submit" name="edit" class="btn btn-success col-12">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                <?php
            }
            ?>
        </div>
    </section>
</div>
