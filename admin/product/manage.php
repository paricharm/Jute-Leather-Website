<?php
if(isset($_POST['registerBtn']))
{
    $pr_name = $_POST['pr_name'];
    $cat_name = $_POST['cat_name'];
    $desc = $_POST['desc'];
    $bn_name = $_POST['bn_name'];
    $bn_desc = $_POST['bn_desc'];
    $trend = $_POST['trend'];
    $file = $_FILES['img'];
    $dir = "uploads/";
    $file_name = $dir.md5($_FILES["img"]["name"]).".png";
    $file_tmp = $_FILES["img"]["tmp_name"];

    if (move_uploaded_file($file_tmp, $file_name)) { // change target path
        $sql = "insert into product(pr_name,pr_desc,cat_id,img,trending,name_beng,beng_desc)values('{$pr_name}','{$desc}','{$cat_name}','{$file_name}','{$trend}','{$bn_name}','{$bn_desc}')";
        $query = mysqli_query($con,$sql);
        echo '<script>
        Swal.fire({
    title: "Congratulations",
    text: "New Product Added Successfully",
    icon: "success",
    timer:1500
  })
        </script>';
    }
}
if(isset($_GET['edit']))
{
    $edit = $_GET['edit'];
    $fetch = mysqli_query($con,"select * from Product where pr_id = {$edit}");
    $row = mysqli_fetch_assoc($fetch);
}
if(isset($_GET['Edit_Product']))
{
    if(isset($_POST['editBtn']))
    {
        $pr_name = $_POST['pr_name'];
        $cat_name = $_POST['cat_name'];
        $desc = $_POST['desc'];
        $trend = $_POST['trend'];
        $file = $_FILES['img']['name'];
        $bn_name = $_POST['bn_name'];
        $bn_desc = $_POST['bn_desc'];
        $dir = "uploads/";
        $file_name='';
        // $file_name = $dir.$_FILES["img"]["name"].".png";
        $file_tmp = $_FILES["img"]["tmp_name"];
        if($_FILES['img']['name'] == "")
        {
           $file_name.=$row['img'];
           $sql = "update product set pr_name='{$pr_name}',trending='{$trend}',cat_id='{$cat_name}',pr_desc='{$desc}',img='{$file_name}',name_beng='{$bn_name}',beng_desc='{$bn_desc}' where pr_id = {$edit}";
            $query = mysqli_query($con,$sql);
            echo '<script>
        Swal.fire({
    title: "Congratulations",
    text: "Updated Successfully",
    icon: "success",
  })
        </script>';
        }else{
            $file_name.=$dir.$_FILES["img"]["name"].".png";
            if (move_uploaded_file($file_tmp, $file_name)) { // change target path
                $sql = "update product set pr_name='{$pr_name}',trending='{$trend}',cat_id='{$cat_name}',pr_desc='{$desc}',img='{$file_name}' where pr_id = {$edit}";
                $query = mysqli_query($con,$sql);
                echo '<script>
        Swal.fire({
    title: "Congratulations",
    text: "Updated Successfully",
    icon: "success",
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
            if(isset($_GET['Add_Product']))
            {
                ?>
            <div class="card col-lg-12 col-md-12 col-12 ">
                <div class="card-header">
                    <h2 class="text-center">Add Product Details</h2>
                </div>
                <div class="card-body">
                    <div class="container col-md-8 col-lg-8 col-xl-8">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                        Product Name :
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="pr_name" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                       Bengali Name :
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="bn_name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                        Category Name :
                                    </div>
                                    <div class="col-9">
                                        <select name="cat_name" class="form-control" id="">
                                            <option value=""></option>
                                            <?php
                                            $all_cat = mysqli_query($con,"select * from categories order by date_created desc");
                                            while($row = mysqli_fetch_assoc($all_cat))
                                            {
                                                ?>
                                            <option value="<?=$row['cat_id']?>"><?=$row['cat_name']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                        Trending :
                                    </div>
                                    <div class="col-9">
                                        <select name="trend" class="form-control" id="">
                                            <option value="0">Yes</option>
                                            <option value="1" selected>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                        Description :
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="desc" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                        Bengali Description :
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="bn_desc" >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                        File :
                                    </div>
                                    <div class="col-9">
                                        <input type="file" class="form-control" name="img">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                    </div>
                                    <div class="col-9">
                                        <input type="submit" name="registerBtn" class="btn btn-success col-12">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            }elseif(isset($_GET['Edit_Product']))
            {
                ?>
            <div class="card col-lg-12 col-md-12 col-12 ">
                <div class="card-header">
                    <h2 class="text-center">Edit Product Details</h2>
                </div>
                <div class="card-body">
                    <div class="container col-md-8 col-lg-8 col-xl-8">
                    <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                        Product Name :
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="pr_name" value="<?= $row['pr_name']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                       Bengali Name :
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="bn_name" value="<?= $row['name_beng']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                        Category Name :
                                    </div>
                                    <div class="col-9">
                                        <select name="cat_name" class="form-control" id="">
                                            <option value=""></option>
                                            <?php
                                            $all_cat = mysqli_query($con,"select * from categories order by date_created desc");
                                            while($rows = mysqli_fetch_assoc($all_cat))
                                            {
                                                ?>
                                            <option value="<?=$rows['cat_id']?>" <?= isset($row['cat_id'])&&$row['cat_id']==$rows['cat_id'] ?"selected":"" ?>><?=$rows['cat_name']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                        Trending :
                                    </div>
                                    <div class="col-9">
                                        <select name="trend" class="form-control" id="">
                                            <option value="0" <?= isset($row['trend'])&&$row['trend']==0?"selected":"" ?>>Yes</option>
                                            <option value="1" <?= isset($row['trend'])&&$row['trend']==1?"selected":"" ?>>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                        Description :
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="desc" value="<?= $row['pr_desc'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                       Bengali Description :
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="bn_desc" value="<?= $row['beng_desc'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                        File :
                                    </div>
                                    <div class="col-9">
                                        <div class="row">   
                                            <div class="col-12">
                                                <input type="file" class="form-control" name="img">
                                            </div>
                                            <div class="col-2"><img src="<?= $row['img'] ?>" height="50" width="50" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-3">
                                    </div>
                                    <div class="col-9">
                                        <input type="submit" name="editBtn" class="btn btn-success col-12">
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
