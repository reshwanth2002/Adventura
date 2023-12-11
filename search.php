<html>
    <head>
        <style>
             a:link {
                color: rgb(5, 121, 5);
                background-color: transparent;
                text-decoration: none;
                }
                </style>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="footer.css">
        <link rel="stylesheet" href="home.css">
    </head>
    <body style="background-image: url('bodyback.jpg')">
    <?php 
    session_start();
    if(isset($_POST['submit'])){
        $_SESSION["search"]=$_POST['search'];
    }
    $search=$_SESSION["search"];
    $localhost="127.0.0.1";
    $username="root";
    $password= "";
    $database_name="id21282935_adventura_db";
    $con=mysqli_connect($localhost,$username,$password,$database_name);
    if(mysqli_connect_errno()){
        echo "".mysqli_connect_error();
    }
    else{
      $sql= "select * from places where place REGEXP '^$search';";
      $result=mysqli_query($con,$sql);
      
    }
    ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">
            <img src="logo.jpg" alt="Adventura Logo" width="40" height="40">
            
            
                <a class="nav-link active" aria-current="page" href="home.php"><h4>Adventura.com&nbsp&nbsp</h4></a></a>
                
            
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                <li class="nav-item">

                <a class="nav-link active" aria-current="page" href="login.php" >Login</a>
                
                </li>
                
            
                <li class="nav-item">
                <a class="nav-link" href="#" >Guide</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Plan</a>
                </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.html" target="_blank">ContactUs</a>
                </li>
            <li class="nav-item">
                <a class="nav-link" href="about.html" >About Us</a>
                </li>
                
            </ul>
            <form class="d-flex" method="post" role="search">
                <input class="form-control me-2" type="search" name="search" id="search" placeholder="Search Location" aria-label="search">
                <button class="btn btn-outline-success" name="submit" id="submit" type="submit">GO</button>
            </form>
            </div>
        </div>
        </nav>
        <br>
        <?php
if (mysqli_num_rows($result) > 0) {
    echo '<div class="container">';
    while ($row = $result->fetch_assoc()) {
        $name = $row["place"];
        $location = $row["location"];
        $desc = $row["description"];
        $shortDesc = strtok($desc, "\n");
        $rating = $row["rating"];
        $image= $row["image"];

        echo '<a href="scrap.php?place_id='.$row["place_id"].'"><div class="row mb-3">';
        echo ' <div class="col-md-4">';
        echo '<img src="'.$image.'" style="border-radius:8px; " class="img-fluid" alt="...">';
        echo '</div>';
        echo '<div class="col-md-8">';
        echo '<div class="card" style="background-color: rgb(215, 234, 206);">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $name . '</h5>';
        echo '<p class="card-text">' . $shortDesc . '</p>';
        echo '<p class="card-text"><small class="text-body-secondary">' . $rating . '</small></p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div></a>';
    }
    echo '</div>';
} else {
    echo '<center><h1>NO Matches Found</h1></center>';
}
?>
<br>
<br><br><br><br><br><br><br><br>

        <!-- <center>
        <div class="card mb-3" style="max-width: 1024px; height:258px">
            <div class="row g-0" >
              <div class="col-md-4" >
                <img src="viz1.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body" style=" background-color: rgb(215, 234, 206); height : 258px">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longerThis is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longerThis is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-body-secondary">★★★★½(4,500 5-Star reviews)</small></p>
                </div>
              </div>
            </div>
          </div>
          
          <br>
          
          </center>
          -->
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