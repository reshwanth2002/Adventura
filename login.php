<?php
session_start();
?>
<html>
<head>
    
    <title>Signin Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body >
    <?php
    
    if(isset($_POST["sub"]) && $_POST["username"]){
        $user = $_POST["username"];
        $pass = $_POST["password"];
        $localhost="127.0.0.1";
        $username="root";
        $password= "";
        $database_name="id21282935_adventura_db";
        $con=mysqli_connect($localhost,$username,$password,$database_name);
        if(mysqli_connect_errno()){
            echo "".mysqli_connect_error();
        }
        $query="select * from register where email='$user' and password='$pass';";
        $result=mysqli_query($con,$query);
        if(mysqli_num_rows($result) == 1){
            $row = $result->fetch_assoc();
            $_SESSION["user_id"]=$row["user_id"];
            $_SESSION["First_Name"]=$row["First_Name"];
            header("Location:loggedhome.php");
            exit();
        }
        else{
            echo '<script type="text/JavaScript">  
            alert("Username not found Register Now!"); 
            </script>' ;
        }
    }
    
        
    ?>
    <div class="container" id="myform">
        
            <h1>Login</h1>
            <form method="post" class="form-container">
                <div class="input-container">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-container">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                    <h5 id="no">  </h5>
                </div>
                <button type="submit" name="sub" id="sub">Signin</button>
                <center><p style="font-size: 12px;">Don't have account <a href="register.php">Register</a></p></center>
            </form>
        
    </div>
</body>
</html>

