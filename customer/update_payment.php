<?php
include("includes/db.php");
if (isset($_POST['confirm_payment'])) {

  $update_id = $_GET['update_id'];

  $invoice_no = $_POST['invoice_no']; // auto generated

  $due_amount = $_POST['amount']; //auto generated

  $payment_mode = $_POST['payment_mode'];

  $ref_no = $_POST['ref_no'];

  $payment_date = $_POST['date']; //auto generated

  $complete = "Complete";

  $insert_payments = "insert into payments (invoice_no,amount,payment_mode,ref_no,payment_date) values ('$invoice_no',
  '$due_amount','$payment_mode','$ref_no','$payment_date')";

  $run_payment = mysqli_query($con, $insert_payments);

  $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";

  $run_customer_order = mysqli_query($con, $update_customer_order);

  $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";

  $run_pending_order = mysqli_query($con, $update_pending_order);

  if ($run_pending_order) {

    echo "<script>alert('Thank You for purchasing, your orders will be completed within 24 hours work')</script>";

    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
  }
}

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con, $get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$get_orders = "select * from customer_orders where customer_id='$customer_id'";

$run_orders = mysqli_query($con, $get_orders);

$i = 0;

while ($row_orders = mysqli_fetch_array($run_orders)) {

  $order_id = $row_orders['order_id'];

  $due_amount = $row_orders['due_amount'];

  $invoice_no = $row_orders['invoice_no'];

  $qty = $row_orders['qty'];

  $size = $row_orders['size'];

  $order_date = substr($row_orders['order_date'], 0, 11);

  $order_status = $row_orders['order_status'];


  $i++;

  if ($order_status == 'pending') {

    $order_status = 'Unpaid';
  } else {

    $order_status = 'Paid';
  }
?>
<?php } ?>