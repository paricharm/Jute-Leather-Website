<?php
include 'include/config.php';
if(isset($_POST['type']) && $_POST['type'] == "Delete_Product")
{
    $delete = $_POST['delete'];
    $sql = mysqli_query($con,"delete from product where pr_id='{$delete}'");
}
if(isset($_POST['type']) && $_POST['type'] == "Delete_Category")
{
    $delete = $_POST['delete'];
    $sql = mysqli_query($con,"delete from categories where cat_id='{$delete}'");
}
// if(isset($_GET['Delete_Slider']))
// {
//     $delete = $_GET['delete'];
//     $sql = mysqli_query($con,"delete from slider where id='{$delete}'");
//     header("location:http://localhost/jute/admin/home.php?Slider");
// }
?>