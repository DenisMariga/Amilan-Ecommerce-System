<?php

if (!isset($_SESSION['admin_email'])) {

  echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<div class="row">
  <!-- row 1 begin -->
  <div class="col-lg-12">
    <!-- col-lg-12 begin -->
    <ol class="breadcrumb">
      <!-- breadcrumb begin -->
      <li class="active">
        <!-- active begin -->

        <i class="fa fa-dashboard"></i> Dashboard / View Orders

      </li><!-- active finish -->
    </ol><!-- breadcrumb finish -->
  </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->
<input type="button" value="Report Generation" onclick="myApp.printTable()">
<div class="row">
  <!-- row 2 begin -->
  <div class="col-lg-12">
    <!-- col-lg-12 begin -->
    <div class="panel panel-default">
      <!-- panel panel-default begin -->
      <div class="panel-heading">
        <!-- panel-heading begin -->
        <h3 class="panel-title">
          <!-- panel-title begin -->

          <i class="fa fa-tags"></i> View Orders

        </h3><!-- panel-title finish -->
      </div><!-- panel-heading finish -->

      <div class="panel-body">
        <!-- panel-body begin -->
        <div class="table-responsive">
          <!-- table-responsive begin -->
          <table class="table table-striped table-bordered table-hover">
            <!-- table table-striped table-bordered table-hover begin -->

            <thead>
              <!-- thead begin -->
              <tr>
                <!-- tr begin -->
                <th> No: </th>
                <th> Customer Email: </th>
                <th> Invoice No: </th>
                <th> Product Name: </th>
                <th> Product Qty: </th>
                <th> Product Size: </th>
                <th> Order Date: </th>
                <th> Total Amount: </th>
                <th> Status: </th>
                <th> Delete: </th>
              </tr><!-- tr finish -->
            </thead><!-- thead finish -->

            <tbody>
              <!-- tbody begin -->

              <?php

                $i = 0;

                $get_orders = "select * from pending_orders";

                $run_orders = mysqli_query($con, $get_orders);

                while ($row_order = mysqli_fetch_array($run_orders)) {

                  $order_id = $row_order['order_id'];

                  $c_id = $row_order['customer_id'];

                  $invoice_no = $row_order['invoice_no'];

                  $product_id = $row_order['product_id'];

                  $qty = $row_order['qty'];

                  $size = $row_order['size'];

                  $order_status = $row_order['order_status'];

                  $get_products = "select * from products where product_id='$product_id'";

                  $run_products = mysqli_query($con, $get_products);

                  $row_products = mysqli_fetch_array($run_products);

                  $product_title = $row_products['product_title'];

                  $get_customer = "select * from customers where customer_id='$c_id'";

                  $run_customer = mysqli_query($con, $get_customer);

                  $row_customer = mysqli_fetch_array($run_customer);

                  $customer_email = $row_customer['customer_email'];

                  $get_c_order = "select * from customer_orders where order_id='$order_id'";

                  $run_c_order = mysqli_query($con, $get_c_order);

                  $row_c_order = mysqli_fetch_array($run_c_order);

                  $order_date = $row_c_order['order_date'];

                  $order_amount = $row_c_order['due_amount'];

                  $i++;

                ?>

              <tr>
                <!-- tr begin -->
                <td> <?php echo $i; ?> </td>
                <td> <?php echo $customer_email; ?> </td>
                <td> <?php echo $invoice_no; ?></td>
                <td> <?php echo $product_title; ?> </td>
                <td> <?php echo $qty; ?></td>
                <td> <?php echo $size; ?> </td>
                <td> <?php echo  date("Y-m-d") ?> </td>
                <td> <?php echo $order_amount; ?> </td>
                <td>

                  <?php

                      if ($order_status == 'pending') {

                        echo $order_status = 'pending';
                      } else {
                        echo $order_status = 'Complete';
                      }

                      ?>

                </td>
                <td>

                  <a href="index.php?delete_order=<?php echo $order_id; ?>">

                    <i class="fa fa-trash-o"></i> Delete

                  </a>

                </td>
              </tr><!-- tr finish -->

              <?php } ?>

            </tbody><!-- tbody finish -->

          </table><!-- table table-striped table-bordered table-hover finish -->
        </div><!-- table-responsive finish -->
      </div><!-- panel-body finish -->

    </div><!-- panel panel-default finish -->
  </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<script>
var myApp = new function() {
  this.printTable = function() {
    var tab = document.querySelector(".table-responsive");
    tab.innerHTML;

    var style = '<style>'
    style = style + 'table {background-color:#fff}';
    style = style + 'table {margin-top:20px}';
    style = style + 'th {font-weight: bold}';
    style = style + 'th {font-size: 1.5rem}';
    style = style + 'th:nth-child(10){display: none}';
    style = style + 'td:nth-child(10){display: none}';
    style = style + 'table,th,td {border: solid 1px #000; border-collapse: collapse; padding:20px;';
    style = style + 'h1:{margin-bottom: 30px}';
    style = style + 'table,th,td {color: #fff}';
    style = style + 'table {border: 1px solid crimson;}';
    style = style + '</style>';
    var win = window.open('', '', 'height=700vh,width=700')
    win.document.write(style);
    win.document.write('<body > <h1>Report generation for Orders <br> <style><h1>{}></style>');
    win.document.write(tab.outerHTML)
    win.document.close()
    win.print()
  }
}
</script>

<?php } ?>