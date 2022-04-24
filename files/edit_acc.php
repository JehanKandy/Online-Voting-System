<?php
    include("../config.php");

    session_start();
    $session1 = strval($_SESSION['login']);    
    

    $select_sql = "SELECT * FROM user_tbl WHERE username = '$session1'";
    $select_result = mysqli_query($con, $select_sql);

    while($row = mysqli_fetch_assoc($select_result)){
        $user1 = $row['username'];
        $email = $row['email'];
        $full_name = $row['full_name'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $dob = $row['dob'];
        $address1 = $row['address1'];
        $mobile_no = $row['mobile_no'];
        $pass1 = $row['pass1'];
        $user_type = $row['user_type'];
        $user_status = $row['user_status'];      
    }

    if(isset($_POST['update'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $new_user1 = $_POST['new_user1'];
            $new_email = $_POST['new_email'];
            $new_full_name = $_POST['new_full_name'];
            $new_fname = $_POST['new_fname'];
            $new_lname = $_POST['new_lname'];
            $new_address = $_POST['new_address'];
            $new_mobile_no = $_POST['new_mobile_no'];


            $update_sql = "UPDATE user_tbl SET email = '$new_email', full_name = '$new_full_name', fname = '$new_fname', lname = '$new_lname', address1 = '$new_address', mobile_no = '$new_mobile_no' WHERE username = '$session1'";
            $update_result = mysqli_query($con, $update_sql);


            if($user_type == "admin"){
                header("location:admin.php");
            }
            elseif($user_type == "user"){
                header("location:user.php");
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
    <title>Edit Infromation</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"  style="font-family:'Bebas Neue', cursive; font-size:150%" href="#">Online Voting System 2023 - <?php echo $session1; ?> - Edit Information</a>
    <span class="navbar-text">
        <?php
            if($user_type == "user"){
                ?> 
                    <a href="user.php"><button class="btn btn-primary"> &nbsp back</button></a>
                <?php
            }
            elseif($user_type == "admin"){
                ?> 
                    <a href="admin.php"><button class="btn btn-primary"> &nbsp back</button></a>
                <?php
            }
        ?>
        
    </span>
</nav>

<div class="container">
    <br><br><br><br><br><br>
        <img src="../images/user.png" alt="user" style="border-radius: 50%; width:20%;">
        
        <br><br><br><br>
        <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post">
        <table border="0">
            <tr>
                <td>
                    <label for="id"><b>NIC/PPN</b></label>
                </td>
                <td>
                    &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp
                </td>
                <td>
                    <b><?php echo $user1; ?></b>
                    <input type="hidden" name="new_user1" value=" <?php $user1; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email"><b>Email</b></label>
                </td>
                <td>
                    &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp
                </td>
                <td>
                    <b><input type="email" name="new_email" value="<?php echo $email; ?>" class="form-control"></b>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fullname"><b>Full Name</b></label>
                </td>
                <td>
                    &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp
                </td>
                <td>
                    <b><input type="text" name="new_full_name" value="<?php echo $full_name; ?>" class="form-control"></b>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fname"><b>First Name</b></label>
                </td>
                <td>
                    &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp
                </td>
                <td>
                    <b><input type="text" name="new_fname" value="<?php echo $fname; ?>" class="form-control"></b>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="laname"><b>Last Name</b></label>
                </td>
                <td>
                    &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp
                </td>
                <td>
                    <b><input type="text" name="new_lname" value="<?php echo $lname; ?>" class="form-control"></b>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="dob"><b>Date of Birth</b></label>
                </td>
                <td>
                    &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp
                </td>
                <td>
                    <b><?php echo $dob; ?></b>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="address"><b>Address</b></label>
                </td>
                <td>
                    &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp
                </td>
                <td>
                    <b><input type="text" name="new_address" value="<?php echo $address1; ?>" class="form-control"></b>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="mobile"><b>Mobile Number</b></label>
                </td>
                <td>
                    &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp
                </td>
                <td>
                    <b><input type="text" name="new_mobile_no" value="<?php echo $mobile_no; ?>" class="form-control"></b>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" value="Update" name="update" class="btn btn-success">
                </td>
            </tr>
        </table>
        </form>
    <br><br><br><br><br><br>   
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