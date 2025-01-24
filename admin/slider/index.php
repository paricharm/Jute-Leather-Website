<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid py-3">
            <div class="card col-lg-12 col-md-12 col-sm-12 ">
                <div class="card-header">
                    <div class="d-flex justify-content-around">
                        <h2 class="text-center">All Slider</h2>
                        <a href="home.php?Add_Slider" class="btn btn-info"><i class="fa fa-plus"></i> Slider</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-lg-12 col-12">
                        <table class="table" id="example1">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Trend</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $select = mysqli_query($con,"select * from slider order by date_created desc");
                            while($row = mysqli_fetch_assoc($select))
                            {
                                ?>

                                <tr>
                                    <td><?= $row['s_id'] ?></td>
                                    <td><img src="<?= $row['file_name'] ?>" width="60" height="60" alt=""></td>
                                    <td><?= $row['trend'] ?></td>
                                    <td><?= $row['status'] ?></td>
                                    <td>
                                        <a href="home.php?Edit_Slider&edit=<?= $row['s_id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="delete.php?Delete_Slider&delete=<?= $row['s_id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>