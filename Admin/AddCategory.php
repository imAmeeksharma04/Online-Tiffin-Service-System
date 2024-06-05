<?php
session_start();
if (!isset($_SESSION['AdminId'])) {
    header("location:../Index.php");
}
include "includes/header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h4>Add Category</h4>
            </div>
            <div class="card-body">
                <form action="code.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea rows="3" name="description" placeholder="Enter description" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="AddCategory_btn">Save</button>
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