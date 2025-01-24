<?php
include 'include/config.php';
$lang_id = $_GET['language'];
$update = mysqli_query($con,"update lang set lang_val='{$lang_id}' where id=1")
?>