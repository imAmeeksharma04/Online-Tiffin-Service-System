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
            <?php
            if (isset($_GET['id'])) {
                # code...

                $id = $_GET['id'];
                $tiffin = getById("tiffins", $id);

                if (mysqli_num_rows($tiffin) > 0) 
                {
                    $data = mysqli_fetch_array($tiffin);
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Tiffin
                                <a href="Tiffin.php" class="btn btn-primary float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-0">Select category</label>
                                        <select name="category_id" class="form-select mb-2">
                                            <option selected>Select category</option>
                                            <?php
                                            $category = getAll("categories");
                                            if (mysqli_num_rows($category) > 0) {
                                                foreach ($category as $cat) {
                                            ?>
                                                    <option value="<?= $cat['id']; ?>" <?= $data['Category_Id'] == $cat['id']?'selected':''; ?> ><?= $cat['Name']; ?></option>
                                            <?php
                                                }
                                            } else {
                                                echo "No category available";
                                            }
    
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="$tiffin_id" value="<?= $data['Id'] ?>">
                                    <div class="col-md-4">
                                        <label class="mb-0">Name</label>
                                        <input type="text" required value="<?= $data['Name'] ?>" placeholder="Enter tiffin name" name="name" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mb-0">Slug</label>
                                        <input type="text" required value="<?= $data['Slug'] ?>" placeholder="Enter slug" name="slug" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mb-0">Price</label>
                                        <input type="text" required value="<?= $data['Price'] ?>" placeholder="Enter price" name="price" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Description</label>
                                        <textarea rows="3" name="description" required placeholder="Enter description" class="form-control mb-2"><?= $data['Description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Upload Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['Image'] ?>">
                                        <input type="file"  name="image"  class="form-control mb-2">
                                        <label class="mb-0">Current Image</label>
                                        <img src="../Uploads/<?= $data['Image'] ?>" alt="FoodImg" height="100px" width="100px">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="UpdateTiffin_btn">Update tiffin</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        <?php
                }
                else {
                    echo "Tiffin not found for given ID";
                }


            } else {
                echo "Id missing from url";
            }
    ?>
    </div>
</div>

<?php
include "includes/footer.php";
?>