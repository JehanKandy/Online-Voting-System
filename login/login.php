<?php 
    include("../config.php");
    session_start();

    if(isset($_POST['login'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = $_POST['username'];
            $pass1 = md5($_POST['pass1']);

            $select_sql = "SELECT username,pass1,user_type,user_status FROM user_tbl WHERE username = '$user' && pass1 = '$pass1'";
            $select_result = mysqli_query($con, $select_sql);
            $select_nor = mysqli_num_rows($select_result);

            $row = mysqli_fetch_assoc($select_result);
            

            if($select_nor > 0){
                if($row['user_status'] == 0){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>User Deactive, Contact Admin..!</div>&nbsp</center>";
                }
                elseif(empty($user)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>NIC/PPN Can not be empty</div>&nbsp</center>";
                }
                elseif(empty($pass1)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Password Can not be empty</div>&nbsp</center>";
                }
                else{
                    
                    if($row['user_type'] == "admin"){
                        setcookie('loginDemo',$user,time()+60*60);
                        $_SESSION['login'] = $user;
                        header("location:../files/admin.php");
                    }
                    elseif($row['user_type'] == "user"){
                        setcookie('loginDemo',$user,time()+60*60);
                        $_SESSION['login'] = $user;
                        header("location:../files/user.php");
                    }
                }
               
            }
            else{
                $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>No recodes found...!</div>&nbsp</center>";
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
            height: 68vh;
            background-color: white;
            background-size: cover;
            background-position: center;
        }
    </style>

</head>
<body>
<div class="banner">
    <br><br><br>
    <h1>President Election - 2023 LOGIN</h1>
</div>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"  style="font-family:'Bebas Neue', cursive; font-size:150%" href="#">Online Voting System 2023 - President Election</a>
    <span class="navbar-text">
        <a href="../index.php"><button class="btn btn-primary">Back</button></a>
    </span>
</nav>




<div class="container">
    <br><br><br>
    <div class="card" style="width: 50rem;">
        <div class="card-header">
            <h3>Login to Vote</h3>
        </div>
        <br>
        <div class="card-body">
            <?php
                if(isset($msg)){
                    foreach($msg as $msg){
                        echo $msg;
                    }
                }
            ?>
            <form action="<?php echo($_SERVER["PHP_SELF"])?>" method="post">
                <div class="form-group input-group-lg">
                    <label for="id">NIC/PPN (National Identity Card/Passport Number) : </label>
                    <input type="text" name="username" placeholder="NIC/PPM" class="form-control">
                </div>
                <div class="form-group input-group-lg">
                    <label for="password">Password</label>
                    <input type="password" name="pass1" placeholder="Password" class="form-control">                    
                </div>
                <br>
                <div class="form-group input-group-lg">
                    <input type="submit" value="Login" class="btn btn-primary btn-lg btn-block" name="login">
                </div>            
            </form>
            <center><p>Didn't Enter Civilian's Information into the System ? <a href="reg.php" style="text-decoration: none;">Add Information</a></p></center>
        </div>
    </div>


</div>


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