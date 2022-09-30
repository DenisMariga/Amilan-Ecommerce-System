<!DOCTYPE html>
<html>

<head>
  <title>Amilan Ecommerce</title>
  <!-- custom-theme -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
  <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>

<body class="agileits_w3layouts">
  <a href="http://localhost/School%20project//index.php" class="feedback">Go Back to Home page</a>
  <h1 class="agile_head text-center">Feedback Form</h1>
  <div class="w3layouts_main wrap">
    <h3>Please help us to serve you better by taking a couple of minutes. </h3>
    <form action="feedback.php" method="post" class="agile_form">
      <h2>How satisfied were you with our Service/Products?</h2>
      <ul class="agile_info_select">
        <li><input type="radio" name="view" value="excellent" id="excellent" required>

          <label for="excellent">excellent</label>
          <div class="check w3"></div>
        </li>
        <li><input type="radio" name="view" value="good" id="good">
          <label for="good"> good</label>
          <div class="check w3ls"></div>
        </li>
        <li><input type="radio" name="view" value="neutral" id="neutral">
          <label for="neutral">neutral</label>
          <div class="check wthree"></div>
        </li>
        <li><input type="radio" name="view" value="poor" id="poor">
          <label for="poor">poor</label>
          <div class="check w3_agileits"></div>
        </li>
      </ul>
      <h2>If you have specific feedback, please write to us...</h2>
      <textarea placeholder="Additional comments" class="w3l_summary" name="comments" required=""></textarea>
      <input type="text" placeholder="Your Name " name="name" required="" />
      <input type="email" placeholder="Your Email " name="email" required="" />
      <input type="text" placeholder="Your Number " name="num" required="" /><br>
      <center><input type="submit" value="submit Feedback" class="agileinfo" /></center>
    </form>
    <h1 id="footer" style="color: blue;">You will receive an email from the admin concerning
      your feedback</h1>
  </div>
</body>

</html>