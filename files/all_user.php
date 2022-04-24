<?php
    include("../config.php");

    $user_sql = "SELECT * FROM user_tbl";
    $user_sql_result = mysqli_query($con, $user_sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"  style="font-family:'Bebas Neue', cursive; font-size:150%" href="#">Online Voting System 2023 - All Users</a>
    <span class="navbar-text">
        <a href="admin.php"><button class="btn btn-primary">Back</button></a>
    </span>
</nav>

<div class="container">
    <br><br><br><br>
    <h1>All Users</h1>

        <br><br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>User ID</th>
                <th>Email</th>
                <th>Full Name</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Mobile Number</th>
                <th>User Type</th>
                <th>User Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
            while($row = mysqli_fetch_assoc($user_sql_result)){
        ?>
        <tr>
            <td>
                <?php echo $row['username']; ?>
            </td>
            <td>
                <?php echo $row['email']; ?>
            </td>
            <td>
                <?php echo $row['full_name']; ?>
            </td>
            <td>
                <?php echo $row['fname']; ?>
            </td>
            <td>
                <?php echo $row['lname']; ?>
            </td>
            <td>
                <?php echo $row['dob']; ?>
            </td>
            <td>
                <?php echo $row['address1']; ?>
            </td>
            <td>
                <?php echo $row['mobile_no']; ?>
            </td>
            <td>
                <?php echo $row['user_type']; ?>
            </td>
            <td>
                <?php
                
                if($row['user_status'] == 1){
                    ?>
                        <font color = "green">Active</font>
                    <?php
                }else{
                    ?>
                        <font color = "red">Deactive</font>
                    <?php
                } 
                ?>
            </td>
            <td>
                <?php
                    
                    if($row['user_type'] == "admin"){
                        ?>
                            <b>Admin</b>
                        <?php
                    }else{
                        ?>
                            <a href="edit_user.php?id=<?php echo $row['username']; ?>"><button class="btn btn-primary">Action</button></a>
                        <?php
                    } 
                    ?>
                </td>
        </tr>
        <?php } ?>

    </table>


<br><br>
    <hr>
    <h2>Contact Information</h2>
    <br><br>
    
    
    <table border="0">
        <tr>
            <td>
                <h5>Head Office</h5>
                <h6>23, ABC Street,<br> ABCD.</h6>
                <p></p><p></p>
                <p>+94 711758851</p>
            </td>
            <td>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            </td>
            <td>
                <h5>WXYZ Office</h5>
                <h6>23, ABC Street,<br> ABCD.</h6>
                <p></p><p></p>
                <p>+94 711758851</p>
            </td>
            <td>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

            </td>
            <td>
                <h5>EFGH Office</h5>
                <h6>23, ABC Street,<br> ABCD.</h6>
                <p></p><p></p>
                <p>+94 711758851</p>
            </td>
            <td>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

            </td>
            <td>
                <h5>KLMN Office</h5>
                <h6>23, ABC Street,<br> ABCD.</h6>
                <p></p><p></p>
                <p>+94 711758851</p>
            </td>
            <td>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

            </td>
            <td>
                <h5>ABCD Office</h5>
                <h6>23, ABC Street,<br> ABCD.</h6>
                <p></p><p></p>
                <p>+94 711758851</p>
            </td>
        </tr>
    </table>

    <br><br><br><br>

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
</body>
</html>