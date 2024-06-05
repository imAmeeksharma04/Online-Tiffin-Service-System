<?php
session_start();
if (!isset($_SESSION['AdminId'])) {
    header("location:../Index.php");
}
include "../Functions/myfunctions.php";
include "includes/header.php";


if (isset($_GET['t'])) 
{
    $tr_no = $_GET['t'];
    $OrderData = checkTracking($tr_no);

    if (mysqli_num_rows($OrderData) < 0) {
    ?>
        <h4>something went wrong</h4>
    <?php
        die();
    }
} 
else 
{
    ?>
    <h4>something went wrong</h4>
<?php
    die();
}

$data = mysqli_fetch_array($OrderData);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <span class="text-white fs-4">View Order</span>
                    <a href="orders.php" class="btn btn-warning float-end"> <i class="fa fa-reply"></i> Back</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Delivery Details</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Name</label>
                                    <div class="border p-1">
                                        <?= $data['name']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Email</label>
                                    <div class="border p-1">
                                        <?= $data['email']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Phone</label>
                                    <div class="border p-1">
                                        <?= $data['phone']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Tracking no</label>
                                    <div class="border p-1">
                                        <?= $data['tracking_no']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Address</label>
                                    <div class="border p-1">
                                        <?= $data['address']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Pin Code</label>
                                    <div class="border p-1">
                                        <?= $data['pincode']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Order Details</h4>
                            <hr>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tiffin</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    
                                    $order_query = "SELECT o.id AS oid, o.tracking_no, o.user_id, oi.*, t.* FROM orders o, order_items oi, 
                                                tiffins t WHERE oi.order_id=o.id AND t.Id = oi.t_id 
                                                AND o.tracking_no = '$tr_no' ";
                                    $order_query_run = mysqli_query($conn, $order_query);

                                    if (mysqli_num_rows($order_query_run) > 0) {
                                        foreach ($order_query_run as $items) {
                                    ?>
                                            <tr>
                                                <td class="alidn-middle">
                                                    <img src="../Uploads/<?= $items['Image']; ?>" width="100px" height="100px" alt="<?= $items['Image']; ?>">
                                                    <?= $items['Name']; ?>
                                                </td>
                                                <td class="alidn-middle">
                                                    <?= $items['price']; ?>
                                                </td>
                                                <td class="alidn-middle">
                                                    <?= $items['t_qty']; ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <hr>
                            <h5>Total Price: <span class="float-end fw-bold"><?= $data['total_price']; ?></span></h5>
                            <hr>
                            <label class="fw-bold">Payment Mode:</label>
                            <div class="border p-1 mb-3">
                                <?= $data['payment_mode']; ?>
                            </div>
                            <label class="fw-bold">Status:</label>
                            <div class="mb-3">
                                <form action="code.php" method="post">
                                    <input type="hidden" name="tracking_no" value="<?= $data['tracking_no']; ?>">
                                <select name="order_status" id="" class="form-select">
                                    <option value="0" <?= $data['status'] == 0?"selected":"" ?> >Pending</option>
                                    <option value="1" <?= $data['status'] == 1?"selected":"" ?> >Accepted</option>
                                    <option value="2" <?= $data['status'] == 2?"selected":"" ?> >Cancelled</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-2" name="UpdateOrderBtn" >Update Status</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "includes/footer.php";
?>