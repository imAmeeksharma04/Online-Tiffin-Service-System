<?php

session_start();
include('../Connection.php');
include('../Functions/myfunctions.php');

if (isset($_POST['AddCategory_btn'])) 
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    
    $image = $_FILES['image']['name'];

    $path = "../Uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $Cat_query = "INSERT INTO `categories` (name,slug,description,image)
                    VALUES ('$name','$slug','$description','$filename')";
    

    $Cat_query_run = mysqli_query($conn,$Cat_query);

    if ($Cat_query) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        redirect("AddCategory.php", "Category added successfully");
    }
    else {
        redirect("AddCategory.php", "Something went wrong");
    }
}
else if (isset($_POST['UpdateCategory_btn'])) 
{
    $Cat_id = $_POST['cat_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        $update_filename = $new_image;
    }
    else {
        $update_filename = $old_image;
    }
    $path = "../Uploads";
    $update_query = "UPDATE `categories` SET Name='$name', slug='$slug', Description='$description', 
    Image='$update_filename' WHERE id=$Cat_id ";

    $result = mysqli_query($conn,$update_query);

    if ($result) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$new_image);
            if (file_exists("../Uploads/".$old_image)) 
            {
                unlink("../Uploads/".$old_image);
            }
        }
        redirect("EditCat.php?id=$Cat_id", "Category updated Successfully");
    }
    else 
    {
        redirect("EditCat.php?id=$Cat_id", "Something went wrong");
    }
}
else if (isset($_POST['delete_cat_btn'])) 
{
    $catId = mysqli_real_escape_string($conn, $_POST['Cat_id']);
    $Cat_query = "SELECT * FROM `categories` WHERE id=$catId";
    $Query_run = mysqli_query($conn, $Cat_query);
    $Cat_data = mysqli_fetch_array($Query_run);
    $img = $Cat_data['Image'];

    $delete = "DELETE FROM `categories` WHERE id='$catId' ";
    $result = mysqli_query($conn, $delete);

    if ($result) 
    {
        if (file_exists("../Uploads/".$img)) 
            {
                unlink("../Uploads/".$img);
            }
        // redirect("Category.php", "Category deleted successfully");
        echo 200;
    }
    else 
    {
        // redirect("Category.php", "Something went wrong");
        echo 500;
    }
}
else if (isset($_POST['AddTiffin_btn'])) 
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    
    $image = $_FILES['image']['name'];

    $path = "../Uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    if($name != "" && $slug != "" && $description != "")
    {
        $product_query ="INSERT INTO `tiffins` (Category_Id,Name,Slug,Description,Image,Price)
        VALUES ($category_id, '$name', '$slug', '$description', '$filename', $price)" ;
    
        $product_query_run = mysqli_query($conn, $product_query);
    
        if ($product_query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
    
            redirect("AddTiffin.php", "Tiffin added successfully");
        }
        else
        {
            redirect("AddTiffin.php", "Something went wrong");
        }

    }
    else
        {
            redirect("AddTiffin.php", "All fields are mandatory");
        }

}
else if(isset($_POST['UpdateTiffin_btn']))
{
    $tiffin_id =$_POST['$tiffin_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $path = "../Uploads";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        $update_filename = $new_image;
    }
    else {
        $update_filename = $old_image;
    }

    $update_tiffin_query = "UPDATE `tiffins` SET NAME='$name', Slug='$slug', Description='$description', Image='$update_filename',
    Price='$price' WHERE Id='$tiffin_id' ";

    $update_tiffin_query_run = mysqli_query($conn, $update_tiffin_query);

    if ($update_tiffin_query) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$new_image);
            if (file_exists("../Uploads/".$old_image)) 
            {
                unlink("../Uploads/".$old_image);
            }
        }
        redirect("EditTiffin.php?id=$tiffin_id", "Tiffin updated Successfully");
    }
    else 
    {
        redirect("EditTiffin.php?id=$tiffin_id", "Something went wrong");
    }
}
else if(isset($_POST['delete_product_btn']))
{
    $tiffin_id = mysqli_real_escape_string($conn, $_POST['tiffin_id']);
    $tiffin_query = "SELECT * FROM `tiffins` WHERE Id=$tiffin_id";
    $Query_run = mysqli_query($conn, $tiffin_query);
    $tiffin_data = mysqli_fetch_array($Query_run);
    $img = $tiffin_data['Image'];

    $delete = "DELETE FROM `tiffins` WHERE Id='$tiffin_id' ";
    $result = mysqli_query($conn, $delete);

    if ($result) 
    {
        if (file_exists("../Uploads/".$img)) 
            {
                unlink("../Uploads/".$img);
            }
        // redirect("Tiffin.php", "tiffin deleted successfully");
        echo 200;
    }
    else 
    {
        // redirect("Category.php", "Something went wrong");
        echo 500;
    }
}
else if(isset($_POST['UpdateOrderBtn']))
{
    $track_no = $_POST['tracking_no'];
    $order_status = $_POST['order_status'];

    $update_order_query = "UPDATE `orders` SET status = $order_status WHERE tracking_no = '$track_no' ";
    $update_order_query_run = mysqli_query($conn, $update_order_query);

    redirect("vieworder.php?t=$track_no", "Order status updated successfully");
}
else {
    header("location: panel.php");
}

?>