<?php

if (!isset($_SESSION['admin_email'])) {

  echo "<script>window.open('login.php','_self')</script>";
} else {

?>



<ul class="list-group">
  <li class="list-group-item active text-center">
    <h1>FeedBack from customers</h1>
  </li>
</ul>

<div class="container">
  <!-- <h2>Basic Table</h2> -->
  <p>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Customer Name</th>
        <th>Customer Email</th>
        <th>Customer Number</th>
        <th>Customer Satisfaction</th>
        <th>Customer suggestions</th>
      </tr>
    </thead>
    <?php

        $i = 0;

        $get_p = "select * from poll";

        $run_p = mysqli_query($con, $get_p);

        while ($row_p = mysqli_fetch_array($run_p)) {

          // $c_id = $row_p['customer_id'];

          $p_name = $row_p['name'];

          $p_email = $row_p['email'];

          $p_phone = $row_p['phone'];

          $p_feedback = $row_p['feedback'];

          $p_suggestion = $row_p['suggestions'];

          $i++;

        ?>


    <tbody>
      <tr>
        <!-- tr begin -->
        <td> <?php echo $i; ?> </td>
        <td> <?php echo $p_name; ?> </td>
        <td> <?php echo $p_email; ?> </td>
        <td> <?php echo $p_phone; ?> </td>
        <td> <?php echo $p_feedback; ?></td>
        <td> <?php echo $p_suggestion; ?> </td>
        <td>
      </tr>
    </tbody>
    <?php } ?>


  </table>
</div>
<?php } ?>