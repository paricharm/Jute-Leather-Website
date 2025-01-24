<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid py-3">
            <div class="card col-lg-12 col-md-12 col-sm-12 ">
                <div class="card-header">
                    <div class="d-flex justify-content-around">
                        <h2 class="text-center">All Product</h2>
                        <a href="home.php?Add_Product" class="btn btn-info"><i class="fa fa-plus"></i> Product</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-lg-12 col-12">
                        <table class="table table-bordered" id="example1">
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Trending</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $select = mysqli_query($con,"SELECT *,product.img as pro_img,categories.* FROM `product` INNER JOIN categories ON categories.cat_id=product.cat_id ORDER BY product.date_created desc");
                            $i=1;
                            while($row = mysqli_fetch_assoc($select))
                            {
                                ?>

                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row['pr_name'] ?></td>
                                    <td><?= $row['cat_name'] ?></td>
                                    <td><?= $row['pr_desc'] ?></td>
                                    <td><img src="<?= $row['pro_img'] ?>" width="60" height="60" alt=""></td>
                                    <td><?= isset($row['status'])&&$row['status']==0?"Active":"Inactive" ?></td>
                                    <td><?= isset($row['trending'])&&$row['trending']==0?"Yes":"No" ?></td>
                                    <td>
                                        <a href="home.php?Edit_Product&edit=<?= $row['pr_id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <!-- <a href="delete.php?Delete_Product&delete=" ></a> -->
                                         <button class="btn btn-danger deleteBtn" type="button" data-delete_id="<?= $row['pr_id'] ?>"><i class="fa fa-trash"></i></button>
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