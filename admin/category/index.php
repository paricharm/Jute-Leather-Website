<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid py-3">
            <div class="card col-lg-12 col-md-12 col-sm-12 ">
                <div class="card-header">
                    <div class="d-flex justify-content-around">
                        <h2 class="text-center">All Category</h2>
                        <a href="home.php?Add_Category" class="btn btn-info"><i class="fa fa-plus"></i> Category</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-lg-12 col-12">
                        <table class="table table-bordered" id="example1">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>File</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $select = mysqli_query($con,"select * from categories order by date_created desc");
                            $i=1;
                            while($row = mysqli_fetch_assoc($select))
                            {
                                ?>

                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row['cat_name'] ?></td>
                                    <td><img src="<?= $row['img'] ?>" width="60" height="60" alt=""></td>
                                    <td><?= isset($row['status'])&&$row['status']==0?"Active":"Inactive" ?></td>
                                    <td>
                                        <a href="home.php?Edit_Category&edit=<?= $row['cat_id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger deleteCat" type="button" data-delete_cat="<?= $row['cat_id'] ?>"><i class="fa fa-trash"></i></button>
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