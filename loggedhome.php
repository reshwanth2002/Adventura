<html>
<head>
  <style>
    #submit{
      background-color: transparent;
    }
    #submit:hover{
      background-color: #F98128;
    }
    </style>
<?php 
                    session_start();
                      
                      if(isset($_POST['submit'])){
                      $_SESSION["search"]=$_POST['text'];
                      header('Location:search.php');
                      }
                      $localhost="127.0.0.1";
                      $username="root";
                      $password= "";
                      $database_name="id21282935_adventura_db";
                      $con=mysqli_connect($localhost,$username,$password,$database_name);
                      if(mysqli_connect_errno()){
                          echo "".mysqli_connect_error();
                      }
                      $sql= "select * from places ;";
                      $result=mysqli_query($con,$sql);
             ?>
	 <link rel="stylesheet" href="bootstrap.css">

   <link rel="stylesheet" href="footer.css">
   <link rel="stylesheet" href="home.css">

</head>
<body style="background-image: url('bodyback.jpg')">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">
	<img src="logo.jpg" alt="Adventura Logo" width="40" height="40">
	
	
          <a class="nav-link active" aria-current="page" href="loggedhome.php"><h4>Adventura.com&nbsp&nbsp</h4></a></a>
        
	
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">


        <li class="nav-item">

          <a class="nav-link active" aria-current="page" href="profile.php" >Profile</a>
          
        </li>
        
    
        <li class="nav-item">
          <a class="nav-link" href="booking.php" >Guide</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="plan.php">Plan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="wishlist.php">BucketList</a>
        </li>

	<li class="nav-item">
          <a class="nav-link" href="contact.html" target="_blank">ContactUs</a>
        </li>
	<li class="nav-item">
          <a class="nav-link" href="about.html" >About Us</a>
        </li>
        
      </ul>
      <form class="d-flex" role="search" method="POST">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">

            <a class="nav-link active" aria-current="page"  href="home.php" >Logout&nbsp&nbsp</a>
            </li></ul>
        <input class="form-control me-2" type="search" name="text" id="text" placeholder="Search Location" aria-label="search">
        <button class="btn btn-outline-success" name="submit" id="submit" type="submit">GO</button>
      </form>
    </div>
  </div>
</nav>



<br></br>
<br></br>
<h1><center>
Your Trip Starts Here</h1>


<br></br>
<br></br>
</center>

<br></br>
<br></br>
<br></br>
<form method="post">

  <input type="submit" style="float: right; padding: 5px; border-radius: 6px; text-indent: 10px; padding-right: 20px; margin-right:100px; margin-top:10px;" name="submit" id="submit" value="View All >" />

</form>
<div class="t">
<h3>Top Charts On <span style="color: rgb(99, 179, 99)">Adventura</span></h3>
<p>Best places,activities and tickets</p>
</div>
<?php
$var=1;
echo'<div class="card-group" >';
while(($row=$result->fetch_assoc()) && $var<=3){
  $name = $row["place"];
  $location = $row["location"];
  $desc = $row["description"];
  $rating = $row["rating"];
  $image= $row["image"];

  $shortDesc = strtok($desc, "\n");
  echo'<a href="scrap.php?place_id='.$row["place_id"].'"><div class="card" style=" background-color: rgb(215, 234, 206); ">';
  echo'<img src="'.$image.'" class="card-img-top" alt="..."></a>';
  echo'<div class="card-body">';
    echo'<h5 class="card-title">'.$name.'</h5>';
    echo'<p class="card-text">'.$shortDesc.'</p>';
  echo'</div>';
echo'<div class="card-footer" style=" background-color:rgb(251, 210, 169)">';
    echo'<small class="text-body-secondary">'.$rating.'</small>';                
 echo'</div>';
echo'</div>';
    $var++;
}
echo'</div>'; 
?>

<br></br>
<div class="t">
  <h3>Top destinations for your next holiday. </h3>
  <p>Here are the suggestions by fellow users</p>
  </div>

<?php 
$var=1;
echo '<div class="card-group" >';
while(($row=$result->fetch_assoc())&& $var<=3){
  $name = $row["place"];
  $location = $row["location"];
  $image=$row["image"];
  echo'<a href="scrap.php?place_id='.$row["place_id"].'">';
  echo'<div class="card" style=" background-color: rgb(251, 210, 169)">';
  echo'<img src="'.$image.'" class="card-img-top" alt="..."></a>';
  echo'<div class="card-body">';
  echo'<h5 class="card-title">'.$name.', '.$location.'</h5>';
  echo'</div>';
  echo'</div>';
  $var++;
}
echo '</div>';
?>


  
<br></br>
</body><footer class="footer">
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