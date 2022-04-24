<?php

    include("../config.php");

    if(isset($_POST['register'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $full_name = $_POST['full_name'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $dob = $_POST['dob'];
            $address = $_POST['address'];
            $mobile_no = $_POST['mobile_no'];
            $pass1 = md5($_POST['pass1']);
            $cpass = md5($_POST['cpass']);

            $check_sql = "SELECT * FROM user_tbl WHERE nic_no = '$username' && email = '$email'";
            $check_result = mysqli_query($con, $check_sql);
            $check_nor = mysqli_num_rows($check_result);

            if($check_nor > 0){
                $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>User Already Exists...!</div>&nbsp</center>";
            }else{
                if(empty($username)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>NIC or PPN Can't be Empty</div>&nbsp</center>";
                }
                elseif(empty($email)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Email Can't be Empty</div>&nbsp</center>";
                }
                elseif(empty($full_name)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Full Name Can't be Empty</div>&nbsp</center>";
                }
                elseif(empty($fname)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>First Name Can't be Empty</div>&nbsp</center>";
                }
                elseif(empty($lname)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Last Name Can't be Empty</div>&nbsp</center>";
                }
                elseif(empty($address)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Address Can't be Empty</div>&nbsp</center>";
                }
                elseif(empty($mobile_no)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Mobile Number Can't be Empty</div>&nbsp</center>";
                }
                elseif(empty($pass1)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Password Can't be Empty</div>&nbsp</center>";
                }
                elseif(empty($cpass)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Confirm Password Can't be Empty</div>&nbsp</center>";
                }
                elseif($pass1 != $cpass){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Password and Confirm Password Does not Match</div>&nbsp</center>";
                }
                else{
                    $insert_sql = "INSERT INTO user_tbl(username, email, full_name, fname, lname, dob, address1, mobile_no, pass1, user_type, user_status, vote_status)VALUES('$username','$email','$full_name','$fname','$lname','$dob','$address','$mobile_no','$pass1','user','1','0')";
                    
                    $insert_result = mysqli_query($con, $insert_sql);

                    if(!$insert_result){
                        $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Error While uploading data to System</div>&nbsp</center>";
                    }
                    else{
                        header("location:login.php");
                    }
                }                
            }
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .banner {
            width: 100%;
            height: 20vh;
            background-image: linear-gradient(rgba(27, 27, 27, 0.85), rgba(56, 56, 56, 0.85)), url(../images/login_banner.jpg);
            background-size: cover;
            background-position: center;
        }
        .banner h1 {
            text-align: center;
            color: white;
            font-family: 'Bebas Neue', cursive;
            font-size: 350%;
        }
        .container {
            width: 100%;
            background-color: white;
            background-size: cover;
            background-position: center;
        }
    </style>

</head>
<body>
<div class="banner">
    <br><br><br>
    <h1>Civilians Information Collection 2023</h1>
</div>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"  style="font-family:'Bebas Neue', cursive; font-size:150%" href="#">Civilians Information Collection 2023</a>
    <span class="navbar-text">
        <a href="../index.php"><button class="btn btn-primary">Back</button></a>
    </span>
</nav>

<div class="container">
    <br><br><br>
    <div class="card" style="width: 50rem;">
        <div class="card-header">
            <h3>Registrar With System</h3>
        </div>
            <?php 
                if(isset($msg)){
                    foreach($msg as $msg){
                        echo $msg;
                    }
                }
            ?>
        <br>
        <div class="card-body">
            <form action="<?php echo($_SERVER["PHP_SELF"])?>" method="post">
                <div class="form-group input-group-lg">
                    <label for="id">NIC/PPN (National Identity Card/Passport Number) : </label>
                    <input type="text" name="username" placeholder="NIC/PPM" class="form-control">
                </div>
                <div class="form-group input-group-lg">
                    <label for="id">Email : </label>
                    <input type="email" name="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group input-group-lg">
                    <label for="id">Add Full Name : </label>
                    <input type="text" name="full_name" placeholder="Full Name" class="form-control">
                </div>
                <div class="form-group input-group-lg">
                    <label for="id">First Name : </label>
                    <input type="text" name="fname" placeholder="First Name" class="form-control">
                </div>
                <div class="form-group input-group-lg">
                    <label for="id">Last Name : </label>
                    <input type="text" name="lname" placeholder="Last Name" class="form-control">
                </div>
                <div class="form-group input-group-lg">
                    <label for="id">Date of Birth : </label>
                    <input type="date" name="dob"  class="form-control">
                </div>
                <div class="form-group input-group-lg">
                    <label for="id">Address : </label>
                    <input type="text" name="address" placeholder="Address" class="form-control">
                </div>
                <div class="form-group input-group-lg">
                    <label for="id">Mobile Number : </label>
                    <input type="text" name="mobile_no" placeholder="Mobile Number" class="form-control">
                </div>
                <div class="form-group input-group-lg">
                    <label for="password">Password : </label>
                    <input type="password" name="pass1" placeholder="Password" class="form-control">                    
                </div>
                <div class="form-group input-group-lg">
                    <label for="password">Confirm Password : </label>
                    <input type="password" name="cpass" placeholder="Confirm Password" class="form-control">                    
                </div>
                <br>
                <div class="form-group input-group-lg">
                    <input type="reset" value="Clear" class="btn btn-secondary btn-lg btn-block">
                    <input type="submit" value="Register" class="btn btn-primary btn-lg btn-block" name="register">
                </div>            
            </form>
            <center><p>Already added information ? <a href="login.php" style="text-decoration: none;">Login</a></p></center>
        </div>
    </div>


</div>
<br><br><br>

<div class="footer">
    <div class="card text-center">
    <div class="card-footer text-muted">
        &copy; &nbspDEVELOPED BY : <a href="https://github.com/JehanKandy" target="_blank">JEHANKANDY</a> || 2022 April
    </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>