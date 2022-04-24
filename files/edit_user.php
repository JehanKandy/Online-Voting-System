<?php 
    include("../config.php");
    if(isset($_POST['update'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['new_id'];
            $new_status = $_POST['new_status'];

            $user_update = "UPDATE user_tbl SET user_status = '$new_status' WHERE username = '$id'";
            $user_update_result = mysqli_query($con, $user_update);
            header("location:all_user.php");
        }
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $user_select = "SELECT * FROM user_tbl WHERE username = '$id'";
        $user_select_result = mysqli_query($con, $user_select);

        while($row = mysqli_fetch_assoc($user_select_result)){
            $email = $row['email'];
            $full_name = $row['full_name'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $dob = $row['dob'];
            $address = $row['address1'];
            $mobile_no = $row['mobile_no'];
            $user_type = $row['user_type'];
            $user_status = $row['user_status'];
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adit User</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"  style="font-family:'Bebas Neue', cursive; font-size:150%" href="#">Online Voting System 2023 - Edit User</a>
    <span class="navbar-text">
        <a href="all_user.php"><button class="btn btn-primary">Back</button></a>
    </span>
</nav>

<div class="container">
    <br><br><br><br>
        <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
            <table border="0">
                <tr>
                    <td style="height:80px; width:80px">
                        <b><p style="font-size: 150%;">User ID</p></b>  
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <p style="font-size: 150%;"><b><?php echo $id; ?></b></p>
                        <input type="hidden" name="new_id" value="<?php echo $id; ?>">
                    </td>
                </tr>
                <tr>
                    <td style="height:80px; width:80px">
                    <p style="font-size: 100%;"><b>Email</b> 
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $email; ?>
                    </td>
                </tr>
                <tr>
                    <td style="height:80px; width:80px">
                        <b>Full Name</b> 
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
                    </td>
                    <td>
                    <?php echo $full_name; ?>
                    </td>
                </tr>
                <tr>
                    <td style="height:80px; width:80px">
                        <b>First Name</b> 
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
                    </td>
                    <td>
                    <?php echo $fname; ?>
                    </td>
                </tr>
                <tr>
                    <td style="height:80px; width:150px">
                        <b>Last Name</b> 
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
                    </td>
                    <td>
                    <?php echo $lname; ?>
                    </td>
                </tr>
                <tr>
                    <td style="height:80px; width:150px">
                        <b>Date of Birth</b> 
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
                    </td>
                    <td>
                    <?php echo $dob; ?>
                    </td>
                </tr>
                <tr>
                    <td style="height:80px; width:150px">
                        <b>Address</b> 
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
                    </td>
                    <td>
                    <?php echo $address; ?>
                    </td>
                </tr>
                <tr>
                    <td style="height:80px; width:150px">
                        <b>Mobile Number</b> 
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
                    </td>
                    <td>
                    <?php echo $mobile_no; ?>
                    </td>
                </tr>
                <tr>
                    <td style="height:80px; width:150px">
                        <b>User Type</b> 
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
                    </td>
                    <td>
                    <?php echo $user_type; ?>
                    </td>
                </tr>
                <tr>
                    <td style="height:80px; width:150px">
                        <b>User Status</b> 
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
                    </td>
                    <td>
                    <input type="number" name="new_status" value="<?php echo $user_status;?>" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" value="Update" name="update" class="btn btn-primary">
                    </td>
                </tr>
            </table>
    
        </form>
    <br><br><br><br>    
</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</body>
</html>