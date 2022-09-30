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

        <i class="fa fa-dashboard"></i> Dashboard / View Payments

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

          <i class="fa fa-tags"></i> View Payments
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
                <th> Invoice No: </th>
                <th> Amount Paid: </th>
                <th> Method: </th>
                <th> Transaction No: </th>
                <th> Payment Date: </th>
                <th id="no-delete"> Delete Payment: </th>
              </tr><!-- tr finish -->
            </thead><!-- thead finish -->

            <tbody>
              <!-- tbody begin -->


              <?php

                $i = 0;

                $get_payments = "select * from payments";

                $run_payments = mysqli_query($con, $get_payments);

                while ($row_payments = mysqli_fetch_array($run_payments)) {

                  $payment_id = $row_payments['payment_id'];

                  $invoice_no = $row_payments['invoice_no'];

                  $amount = $row_payments['amount'];

                  $payment_mode = $row_payments['payment_mode'];

                  $ref_no = $row_payments['ref_no'];
                                    
                  $payment_date = $row_payments['payment_date'];

                  $i++;

                ?>

              <tr>
                <!-- tr begin -->
                <td> <?php echo $i; ?> </td>
                <td> <?php echo $invoice_no; ?> </td>
                <td> <?php echo $amount; ?></td>
                <td> <?php echo $payment_mode; ?> </td>
                <td> <?php echo $ref_no; ?></td>
                <td> <?php echo  date("Y-m-d") ?> </td>
                <td id="no-delete">

                  <a href="index.php?delete_payment=<?php echo $payment_id; ?>">

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
    style = style + 'th {font-size: 2rem}';
    style = style + 'th:nth-child(7){display: none}';
    style = style + 'td:nth-child(7){display: none}';
    style = style + 'table,th,td {border: solid 1px #000; border-collapse: collapse; padding:20px;';
    style = style + 'h1:{margin-bottom: 30px}';
    style = style + 'table,th,td {color: #fff}';
    style = style + 'table {border: 1px solid crimson;}';
    style = style + '</style>';
    var win = window.open('', '', 'height=700vh,width=700')
    win.document.write(style);
    win.document.write('<body > <h1>Report generation for Payments <br> <style><h1>{}></style>');
    win.document.write(tab.outerHTML)
    win.document.close()
    win.print()
  }
}
</script>
<?php } ?>
