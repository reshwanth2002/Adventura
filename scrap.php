<html>
    <head>
        <link rel="stylesheet" href="review.css">
    <link rel="stylesheet" href="bootstrap.css">
   <link rel="stylesheet" href="home.css">
   <link rel="stylesheet" href="footer.css">
   <link rel="stylesheet" href="place.css">
   <!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
                *{
                margin: 0;
                padding: 0;
            }
            .rate {
                float: left;
                height: 46px;
                padding: 0 10px;
            }
            .rate:not(:checked) > input {
                position:absolute;
                top:-9999px;
            }
            .rate:not(:checked) > label {
                float:right;
                width:1em;
                overflow:hidden;
                white-space:nowrap;
                cursor:pointer;
                font-size:30px;
                color:#ccc;
            }
            .rate:not(:checked) > label:before {
                content: '★ ';
            }
            .rate > input:checked ~ label {
                color: #ffc700;    
            }
            .rate:not(:checked) > label:hover,
            .rate:not(:checked) > label:hover ~ label {
                color: #deb217;  
            }
            .rate > input:checked + label:hover,
            .rate > input:checked + label:hover ~ label,
            .rate > input:checked ~ label:hover,
            .rate > input:checked ~ label:hover ~ label,
            .rate > label:hover ~ input:checked ~ label {
                color: #c59b08;
            }
</style>
    </head>
    <body >
        <?php
        session_start();
            $localhost="127.0.0.1";
            $username="root";
            $password= "";
            $database_name="id21282935_adventura_db";
            $x=$_GET["place_id"];
            $con=mysqli_connect($localhost,$username,$password,$database_name);
            if(mysqli_connect_errno()){
                echo "".mysqli_connect_error();
            }
            $y=$_SESSION["user_id"];
            $query="select * from places where place_id='$x';";
            $result=mysqli_query($con,$query);
            if(mysqli_num_rows($result) == 1){
                $row = $result->fetch_assoc();
                $name= $row["place"];
                $location= $row["location"];
                $state= $row["state"];
                $country= $row["country"];
                $address= $row["address"];
                $description= $row["description"];
                $rating= $row["rating"];
            
            $query="select * from images where place_id=$x;";
            $result=mysqli_query($con,$query);
            if(mysqli_num_rows($result) == 1){
                $row = $result->fetch_assoc();
                $img1= $row["img1"];
                $img2= $row["img2"];
                $img3= $row["img3"];
            }
        }
            else{
                header("Location:error.php");
            }


        ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              
              <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" >
              <img src="logo.jpg" alt="Adventura Logo" width="40" height="40">
                    <a class="nav-link active" aria-current="page"><h4>Adventura.com&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h4></a></a>
              </div>
            </div>
        </nav><br></br>
          <div style="margin: 0px 50px 50px;">
          <h3><?php echo"$name";?></h3>
          <p>Asia > <?php echo"$country";?> > <?php echo"$state";?> > <?php echo"$location";?> > <?php echo"$name";?></p>
          
          <h6><?php echo"$rating";?></h6>
          

          <div class="row">
            <div class="column">
              <img src="<?php echo $img1;?>" width="550px" height="412px">
              
            </div>
            <div class="column">
              <img src="<?php echo $img2;?>" width="550px" height="206px">
              <img src="<?php echo $img3;?>" width="550px" height="200px">
              
              </div>
             </div>
           </div>
           
        </div>
        <div  class="row" style="margin: 0px 50px 50px;">
            <div class="column">
            <h5>About</h5>
            <p><?php echo"$description"?></p>
            <br></br>
            
            <br></br>
            <h5>We can help</h5>
            <p>Write your Queries in the<a href="contact.html"> Contact Us</a> box to report your problem, Thank you.</p>
            <br></br>
                </div>
                <div class="column" style="text-align:center">
                    <br>
                    <br>
                    
                    <p><b>Location : </b><a href="<?php echo"$address"?>" target="_blank">
                        <?php echo $state.', '.$country; ?></a></p>
                        <button style="margin-left: 45px;" onclick="addToWishlist('<?php echo $name; ?>')">Add to BucketList</button>
                    <a href="booking.php"><button class="btn2" >Guide?</button></a>
                </div>

        </div>
        
        <script>
            function addToWishlist(name) {
                const wishlist = document.getElementById('wishlistItems');
                const listItem = document.createElement('li');

                // Save wishlist items to localStorage
                const wishlistItems = JSON.parse(localStorage.getItem('wishlistItems')) || [];
                wishlistItems.push(name);
                localStorage.setItem('wishlistItems', JSON.stringify(wishlistItems));
            }
        </script>
        
        

        <div style="margin: 0px 50px 50px;">
            <h5>Nearby Restaurants/Hotels .</h5>
        
            <div class="row">
                <?php
                $query= "select * from nearby where place_id=$x;";
                $result=mysqli_query($con,$query);
                if(mysqli_num_rows($result) == 1){
                    $row = $result->fetch_assoc();
                    $hot1= $row["hotel1"];
                    $hot2= $row["hotel2"];
                    $loc1= $row["name1"];
                    $loc2= $row["name2"];
                echo '<div class="column">';
                    echo'<a href="'.$hot1.'">';
                  echo'<p>'.$loc1.'</p></a>';
                  echo'<a href="'.$hot2.'">';
                  echo'<p>'.$loc2.'</p></a>';
                echo'</div>';
                    $res1=$row["restaurent1"];
                    $res2=$row["restaurent2"];
                    $loc3=$row["name3"];
                    $loc4=$row["name4"];
                echo'<div class="column">';
                   echo' <a href="'.$res1.'">';
                  echo'<p>'.$loc3.'</p></a>';
                  echo' <a href="'.$res2.'">';
                  echo'<p>'.$loc4.'</p></a>';
                echo'</div>';
                }
                ?>
            </div>
            <h5>Customer Reviews.</h5><br><hr>
            <?php 
            $query= "select * from review where place_id=$x;";
            $result=mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0){
                while(($row=$result->fetch_assoc())){
                    $title= $row["review_title"];
                    $text= $row["review_text"];
            echo '<div class="review">';
               echo' <h2>'.$title.'</h2>';
              echo'  <p>'.$text.'</p>';
            echo'</div>';
                }
            }
        ?>
            <br><br>
            <button id="addReviewBtn">Add Review</button>
            <br></br><br>

            <!-- Form to Add Review (Initially Hidden) -->
            <div id="reviewForm" style="display: none; border: 10px  black;">
                <h2>Add Your Review</h2>
                <form method="post">
                    <label for="reviewTitle">Review Title:</label>
                    <input type="text" id="reviewTitle" name="reviewTitle"><br>
        
                    <label for="reviewText">Review Text:</label><br>
                    <textarea id="reviewText" name="reviewText" rows="4" cols="50"></textarea><br>
                    <br></br>
                    


                    <button type="submit" name="addReview" id="addReview" >Submit</button>
                    </form>
                    <?php
                    
                    if(isset($_POST['addReview'])){
                    $title=$_POST['reviewTitle'];
                    $review=$_POST['reviewText'];
                    $sql="INSERT INTO review(place_id,user_id,review_title,review_text) values($x,$y,'$title','$review');";
                    $result=mysqli_query($con,$sql);
                    }
                     ?>
                    <br></br><br>
                
            </div>
        
            <script>
                // JavaScript to toggle the review form's visibility when the button is clicked
                const addReviewBtn = document.getElementById('addReviewBtn');
                const reviewForm = document.getElementById('reviewForm');
        
                addReviewBtn.addEventListener('click', function() {
                    if (reviewForm.style.display === 'none') {
                        reviewForm.style.display = 'block';
                    } else {
                        reviewForm.style.display = 'none';
                    }
                });
            </script>
              </div>
        
           
        

        <script>
            // Get the elements with class="column"
            var elements = document.getElementsByClassName("column");
            var i;
              for (i = 0; i < elements.length; i++) {
                elements[i].style.flex = "50%";
              }
            
            </script>

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
              <li><a href="#" style="color: white;">Privacy Policy</a></li>
              <li><a href="#" style="color: white;">Terms and Conditions</a></li>
              <li><a href="#" style="color: white;">Refund Policy</a></li>
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