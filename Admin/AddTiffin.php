<?php
session_start();
if (!isset($_SESSION['AdminId'])) {
    header("location:../Index.php");
}
include "../Functions/myfunctions.php";
include "includes/header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h4>Add Tiffin</h4>
            </div>
            <div class="card-body">
                <form action="code.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-12">
                        <label class="mb-0">Select category</label>
                        <select name="category_id" class="form-select mb-2" >
                        <option selected>Select category</option>
                            <?php 
                                $category = getAll("categories");
                                if (mysqli_num_rows($category) > 0) {
                                    foreach ($category as $cat) {
                                        ?>
                                            <option value=<?= $cat['id']; ?>><?= $cat['Name']; ?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No category available";
                                }
                                
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="mb-0">Name</label>
                        <input type="text" required placeholder="Enter tiffin name" name="name" class="form-control mb-2">
                    </div>
                    <div class="col-md-4">
                        <label class="mb-0">Slug</label>
                        <input type="text" required placeholder="Enter slug" name="slug" class="form-control mb-2">
                    </div>
                    <div class="col-md-4">
                        <label class="mb-0">Price</label>
                        <input type="text" required placeholder="Enter price" name="price" class="form-control mb-2">
                    </div>
                    <div class="col-md-12">
                        <label class="mb-0">Description</label>
                        <textarea rows="3" name="description" required placeholder="Enter description" class="form-control mb-2"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="mb-0">Upload Image</label>
                        <input type="file" required name="image" class="form-control mb-2">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="AddTiffin_btn">Add tiffin</button>
                    </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

<?php
include "includes/footer.php";
?>