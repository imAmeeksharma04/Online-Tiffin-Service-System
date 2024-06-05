<?php
session_start();
include "includes/header.php";
include "../Functions/myfunctions.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
            if(isset($_GET['id']))
        {
                $id = $_GET['id'];
                $category = getById("categories", $id);

                if (mysqli_num_rows($category) > 0) 
                {
                    $data = mysqli_fetch_array($category);
                
                ?>
            <div class="card">
                <div class="card-header">
                <h4>Edit Category
                <a href="Category.php" class="btn btn-primary float-end">Back</a>
                </h4>
                </div>
                <div class="card-body">
                <form action="code.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="cat_id" value="<?= $data['id'] ?>">
                        <label for="">Name</label>
                        <input type="text" name="name" value="<?= $data['Name'] ?>" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug</label>
                        <input type="text" name="slug" value="<?= $data['slug'] ?>" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea rows="3" name="description" placeholder="Enter description" class="form-control"><?= $data['Description'] ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                        <label for="">Current Image</label>
                        <input type="hidden" name="old_image" value="<?= $data['Image'] ?>">
                        <img src="../Uploads/<?= $data['Image'] ?>" height="50px" width="50px" alt="">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="UpdateCategory_btn">Update</button>
                    </div>
                    </div>
                </form>
                </div>
            </div>
    <?php
        }
        else {
            echo "Category not found";
        }
        }
        else {
            echo "ID missing from url";
        }
    ?>

        </div>
    </div>
</div>

<?php
include "includes/footer.php";
?>