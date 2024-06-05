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
                        Tiffins
                    </h4>
                </div>
                <div class="card-body" id="Tiffin_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tiffins = getAll("tiffins");
                            if (mysqli_num_rows($tiffins) > 0) 
                            {
                                foreach ($tiffins as $item) 
                                {
                                    ?>
                                    <tr>
                                <td><?= $item['Id'] ?></td>
                                <td><?= $item['Name'] ?></td>
                                <td>
                                    <img src="../Uploads/<?= $item['Image']; ?>" width="50px" height="50px" alt="<?= $item['Name'] ?>">
                                </td>
                                <td><?= $item['Price'] ?></td>
                                <td><?= $item['Description'] ?></td>
                                <td>
                                    <a href="EditTiffin.php?id=<?= $item['Id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                    
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item['Id'] ?>">Delete</button>
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