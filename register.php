
<html>
<head>
   
    <title>Signup page</title>
   <link rel="stylesheet" href="register.css">
</head>
<body>
    <?php 
if(isset($_POST["sub"])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $password_confirmation = $_POST["confirm_password"];
        $dob= $_POST["dob"];
        $gender= $_POST["gender"];
        $phone= $_POST["phone"];
        if($pass==$password_confirmation){
        $localhost="127.0.0.1";
        $username="root";
        $password= "";
        $database_name="id21282935_adventura_db";
        $con=mysqli_connect($localhost,$username,$password,$database_name);
        if(mysqli_connect_errno()){
            echo "".mysqli_connect_error();
        }
        else{
            $sql="insert into register(First_Name,Last_Name,email,phone,Dob,gender,password) values('$firstname','$lastname','$email','$phone','$dob','$gender','$pass');";
            $result=mysqli_query($con,$sql);
            echo "<script>alert('Successfully Registered');</script>";
            header("Location:login.php");
            exit();
        }
    }
    else{
        echo "<script>alert('Password not Matched');</script>";
    }
    }

        ?>
    <div class="container">
        <h2>Signup Page</h2>
        <form method="post">
            <div class="form-group">
                <div style="display: flex; justify-content: space-between;">
                    <div style="width: 48%;">
                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname" required>
                    </div>
                    <div style="width: 48%;">
                        <label for="lastname">Last Name: </label>
                        <input type="text" id="lastname" name="lastname" required>
                </div>
                </div>

            <div class="form-group">
                <label for="email"> Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone"> Phone Number:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="dob"> Date-of-Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="gender"> Gender: </label>
                <select id="gender" name="gender" required>
                    <option value=" " ></option>
                    <option value="male"> Male </option>
                    <option value="female"> Female </option>
                    <option value="other"> Other </option>
                </select>
            </div>
            <div class="form-group">
                <label for="password"> Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group" ><center>
                <button type="submit" name="sub" id="sub">Register</button></center>
            </div>
        </form>
    </div>
</body>
</html>
