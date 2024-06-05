<?Php
include ('Connection.php');

function getAllActive($table)
{
global $conn;

    $query = "SELECT * FROM $table ";
    return $result = mysqli_query($conn,$query);
}

function getIDActive($table, $id)
{
global $conn;

    $query = "SELECT * FROM $table WHERE id = $id ";
    return $result = mysqli_query($conn,$query);
}

function getSlugActive($table, $slug)
{
global $conn;

    $query = "SELECT * FROM $table WHERE slug = '$slug' LIMIT 1";
    return $result = mysqli_query($conn,$query);
}
function getSlugActive2($table, $slug)
{
global $conn;

    $query = "SELECT * FROM $table WHERE Slug = '$slug' LIMIT 1";
    return $result = mysqli_query($conn,$query);
}


function redirect($url, $message)
{
    $_SESSION['message'] =$message;
    header("location: ".$url);
    exit();
}

function getTiffByCategory($category_id) 
{
    global $conn;
    
    $query = "SELECT * FROM tiffins WHERE Category_Id = '$category_id'";
    return $result = mysqli_query($conn,$query);
}

function getCartItems()
{
    global $conn;
    $EMail = $_SESSION['email'];
                $findResult = mysqli_query($conn,"SELECT * FROM `registrations` WHERE Email = '$EMail'");
                if($result = mysqli_fetch_array($findResult)) {
                    $user_id = $result['sno'];
                }
    $query_cart = "SELECT c.Cart_id as cid, c.T_id, c.T_qty, t.Id as tid, t.Name, t.Image, t.Price 
                FROM carts c, tiffins t WHERE c.T_id = t.Id AND c.User_id = $user_id ORDER BY c.Cart_id DESC";
    return $query_run = mysqli_query($conn, $query_cart);
}

function getOrders()
{
    global $conn;
    $EMail = $_SESSION['email'];
                $findResult = mysqli_query($conn,"SELECT * FROM `registrations` WHERE Email = '$EMail'");
                if($result = mysqli_fetch_array($findResult)) {
                    $user_id = $result['sno'];
                }
                $query = " SELECT * FROM `orders` WHERE user_id = $user_id ORDER BY id DESC ";
                return $query_run = mysqli_query($conn, $query);
}

function checkTracking($trackingNo)
{
    global $conn;
    $EMail = $_SESSION['email'];
                $findResult = mysqli_query($conn,"SELECT * FROM `registrations` WHERE Email = '$EMail'");
                if($result = mysqli_fetch_array($findResult)) {
                    $user_id = $result['sno'];
                }

                $query = "SELECT * FROM `orders` WHERE tracking_no = '$trackingNo' AND user_id = $user_id ";
                return mysqli_query($conn, $query);
}
?>