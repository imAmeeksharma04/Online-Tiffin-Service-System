<?php
session_start();
if (!isset($_SESSION['AdminId'])) {
    header("location:../Index.php");
}
include "includes/header.php";
include "../Functions/myfunctions.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Categories
                    </h4>
                </div>
                <div class="card-body" id="Category_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $category = getAll("categories");
                            if (mysqli_num_rows($category) > 0) 
                            {
                                foreach ($category as $item) 
                                {
                                    ?>
                                    <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['Name'] ?></td>
                                <td>
                                    <img src="../Uploads/<?= $item['Image']; ?>" width="50px" height="50px" alt="<?= $item['Name'] ?>">
                                </td>
                                <td><?= $item['Description'] ?></td>
                                <td>
                                    <a href="EditCat.php?id=<?= $item['id'] ?>" class="btn btn-primary">Edit</a>
                                    <!-- <form action="code.php" method="post">
                                        <input type="hidden" name="Cat_id" value="<?= $item['id']; ?>">
                                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                    </form> -->
                                    <button type="button" class="btn btn-sm btn-danger delete_cat_btn" value="<?= $item['id'] ?>">Delete</button>
                                </td>
                            </tr>
                                    <?php
                                }
                            }
                            else {
                                echo "No Records Found";
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "includes/footer.php";
?>