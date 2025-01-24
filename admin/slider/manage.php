<?php
if(isset($_POST['registerBtn']))
{
    $heading = $_POST['heading'];
    $desc = $_POST['desc'];
    $file = $_FILES['img'];
    $dir = "uploads/";
    $file_name = $dir.date("d-m-Y-h-i-s").".png";
    $file_tmp = $_FILES["img"]["tmp_name"];
//     $filename = "FOLDER/".$_FILES["file"]["name"];
// // move file to a folder
    if (move_uploaded_file($file_tmp, $file_name)) { // change target path
        $sql = "insert into slider(heading,description,file_name)values('{$heading}','{$desc}','{$file_name}')";
        $query = mysqli_query($con,$sql);
        echo '<script>
        Swal.fire({
    title: "Congratulations",
    text: "New Slider Added Successfully",
    icon: "success",
    timer:1500
  })
        </script>';
    }
}
if(isset($_GET['edit']))
{
    $edit = $_GET['edit'];
    $fetch = mysqli_query($con,"select * from slider where s_id = {$edit}");
    $row = mysqli_fetch_assoc($fetch);
}
if(isset($_GET['Edit_Slider']))
{
    if(isset($_POST['editBtn']))
    {
        $heading = $_POST['heading'];
        $desc = $_POST['desc'];
        $file = $_FILES['img'];
        $dir = "uploads/";
        $file_name="";
        $file_tmp = $_FILES["img"]["tmp_name"];
        if($_FILES["img"]["name"] == "")
        {
            $file_name.=$row['file_name'];
            $sql = "update slider set heading='{$heading}',description='{$desc}',file_name='{$file_name}' where s_id = {$edit}";
            $query = mysqli_query($con,$sql);
           echo '<script>
        Swal.fire({
    title: "Congratulations",
    text: "Slider Updated Successfully",
    icon: "success",
  })
        </script>';
        }else{
            $file_name.=$dir.date("d-m-Y-h-i-s").".png";
            if (move_uploaded_file($file_tmp, $file_name)) 
            { // change target path
                $sql = "update slider set heading='{$heading}',description='{$desc}',file_name='{$file_name}' where s_id = {$edit}";
                $query = mysqli_query($con,$sql);
               echo '<script>
        Swal.fire({
    title: "Congratulations",
    text: "Slider Updated Successfully",
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
            if(isset($_GET['Add_Slider']))
            {
                ?>
            <div class="card col-lg-12 col-md-12 col-sm-12 ">
                <div class="card-header">
                    <h2 class="text-center">Add Slider Details</h2>
                </div>
                <div class="card-body">
                    <div class="container col-md-8 col-lg-8 col-xl-8">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Heading :
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="heading" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Description :
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="desc" >
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
                                        <input type="submit" name="registerBtn" class="btn btn-success col-12">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            }elseif(isset($_GET['Edit_Slider']))
            {
                ?>
            <div class="card col-lg-12 col-md-12 col-sm-12 ">
                <div class="card-header">
                    <h2 class="text-center">Edit Slider Details</h2>
                </div>
                <div class="card-body">
                    <div class="container col-md-8 col-lg-8 col-xl-8">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Heading :
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="heading" value="<?= $row['heading'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Description :
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="desc" value="<?= $row['description'] ?>">
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
