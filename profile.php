<?php session_start();
$localhost="127.0.0.1";
$username="root";
$password= "";
$database_name="id21282935_adventura_db";
$con=mysqli_connect($localhost,$username,$password,$database_name);
if(mysqli_connect_errno()){
    echo "".mysqli_connect_error();
}
$id=$_SESSION["user_id"];
$query="select * from register where user_id='$id';";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result) == 1){
    $row = $result->fetch_assoc();
    $first= $row["First_Name"];
    $last= $row["Last_Name"];
    $mail= $row["email"];
    $address=$row["address"];
    $ph= $row["phone"];
    $gender=$row["gender"];
    $dob=$row["Dob"];
    $img= $row["image"];
}
?>
<link rel="stylesheet" href="bootstrap.css">
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="loggedhome.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?php echo $img; ?>" alt="avatar"
               style="width: 100px;"><br>
            <h5 class="my-3"><?php echo $_SESSION["First_Name"]; ?></h5>
            <p class="text-muted mb-4"></p>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary" style="background-color: rgb(120, 179, 99)">Edit Profile</button>
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0">@adventura/reshwanthmunakala</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                <p class="mb-0">@instagram/reshwanth</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                <p class="mb-0">@facebook/Reshwanth</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                <p class="mb-0">@twitter/reshwanth</p>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $first." " .$last; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $mail;?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $ph; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date of Birth</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $dob; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $gender; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $address; ?></p>
              </div>
            </div>
          </div>
        </div>
        
</section>