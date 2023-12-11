<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide Booking Portal</title>
    <link rel="stylesheet" href="bootstrap.css">

   <link rel="stylesheet" href="footer.css">
   <link rel="stylesheet" href="home.css">
   <style>
   .x:hover{
        background-color: rgb(99, 179, 99);
    }
    </style>
    <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    // Retrieve form data
    $place = $_POST['place'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $localhost="127.0.0.1";
    $username="root";
    $password= "";
    $database_name="id21282935_adventura_db";
    $con=mysqli_connect($localhost,$username,$password,$database_name);
    if(mysqli_connect_errno()){
        echo "".mysqli_connect_error();
    }
    $sql="select * from places where place='$place';";
    $result=mysqli_query($con,$sql);
    $y=$_SESSION["user_id"];
    if(mysqli_num_rows($result) == 1){
        $row = $result->fetch_assoc();
        $z=$row["place_id"];
        $sql="insert into booking(place_id,user_id,date,time) values($z,$y,'$date','$time'); ";
        $r=mysqli_query($con,$sql);

        echo "<h2>Booking Confirmed</h2>";
        $sql="select * from booking where time='$time';";
        $r=mysqli_query($con,$sql);
        $row = $r->fetch_assoc();
        echo $row["booking_id"];
    }
    else{
        echo "<script>alert('Enter a valid Name');</script>";
    }
    
} else {

    //header("Location: home.php");
    //exit();
}
?>

    <script>
        // Function to validate the form inputs
        function validateForm() {
            var place = document.getElementById('place').value;
            var date = document.getElementById('date').value;
            var time = document.getElementById('time').value;

            if (place === '' || date === '' || time === '') {
                alert('All fields are required');
                return false;
            }

            return true;
        }
    </script>
</head>
<body style="background-image: url('bodyback.jpg')">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">
	<img src="logo.jpg" alt="Adventura Logo" width="40" height="40">
	
	
          <a class="nav-link active" aria-current="page" href="loggedhome.php"><h4>Adventura.com&nbsp&nbsp</h4></a></a>

    </div>
  </div>
</nav>

<br></br>
    <h3 style="margin-left:50px;">Guide Booking Portal</h3>
    <hr>
    <form  method="post" onsubmit="return validateForm()">
        <label for="place" style="margin-left:75px;">Place:</label>
        <input type="text" id="place" name="place" style="margin-left:5px; width:250px;border-radius:7px; padding:3px;" required><br><br>

        <label for="date" style="margin-left:75px;">Date:</label>
        <input type="date" id="date" name="date" style="margin-left:9px; border-radius:7px; padding:5px;" required><br><br>

        <label for="time" style="margin-left:75px;">Time:</label>
        <input type="time" id="time" name="time" style="margin-left:7px; border-radius:7px; padding:3px;" required><br><br><hr><br>

        <input type="submit" class="x" value="Book Guide" style=" margin-left:550px; padding:5px;border-radius:7px;"><br><br><br><br><br><br><hr>
    </form>
</body>
<footer class="footer">
  <div class="container footer__container">
          <div class="footer__1">
              <a href="home.php" class="footer__logo"><h4>Adventura</h4></a>
              <p id="foot">This is the version of our website addressed to speakers of English in India. </p>
          </div>
      
      <div class="footer__2">
          <h4>For Links</h4>
          <li><a href="home.php">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="contact.html">Contact</a></li>
      </div>

      <div class="footer__3">
          <h4>Privacy</h4>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms and Conditions</a></li>
          <li><a href="#">Refund Policy</a></li>
      </div>

      <div class="footer__4">
          <h4>Contact Us</h4>
          <div>
              
              <p id="foot">teamadventura2023@gmail.com</p>
          </div>
      

      <ul class="footer__socials">

          <li>
              <a href="#"><i class="uil uil-facebook"></i></a>
          </li>
          <li>
              <a href="#"><i class="uil uil-instagram"></i></a>
          </li>
          <li>
              <a href="#"><i class="uil uil-twitter"></i></a>
          </li>
          <li>
              <a href="#"><i class="uil uil-linkedin"></i></a>
          </li>
      </ul>
  </div>
  
  </div>
  <div class="footer__copyright">
      <small style="color: white;">Copyright &copy; <span style="color: rgb(99, 179, 99)">Adventura</span></small>
  </div>
</footer>
</html>
