<?php 
    include("../config.php");

    if(isset($_POST['update'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $new_id = $_POST['new_id'];
            $new_event_name = $_POST['new_event_name'];
            $new_date = $_POST['new_date'];
            $new_join_status = $_POST['new_join_status'];
            $new_event_status = $_POST['new_event_status'];
            $new_comment = $_POST['comment'];

            $update_sql = "UPDATE events SET eve_name = '$new_event_name', eve_date = '$new_date', eve_status = '$new_event_status', join_status = '$new_join_status', comments = '$new_comment' WHERE eve_id= '$new_id'";
            $update_sql_result = mysqli_query($con, $update_sql);
            header("location:all_event.php");     
    
        }
    }


    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $select_event = "SELECT * FROM events WHERE eve_id = '$id'";
        $select_result = mysqli_query($con, $select_event);

        while($row = mysqli_fetch_assoc($select_result)){
            $eve_name = $row['eve_name'];
            $eve_date = $row['eve_date'];
            $eve_status = $row['eve_status'];
            $join_status = $row['join_status'];
            $comment = $row['comments'];
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"  style="font-family:'Bebas Neue', cursive; font-size:150%" href="#">Online Voting System 2023 - Edit Events</a>
    <span class="navbar-text">
        <a href="all_event.php"><button class="btn btn-primary">Back</button></a>
    </span>
</nav>

<div class="container">
    <br><br><br><br>
        <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
            <table border="0">
                <tr>
                    <td style="height:80px; width:80px">
                        <b><p style="font-size: 150%;">Event ID</p></b>  
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
                    <p style="font-size: 100%;"><b>Event Name</b> 
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <input type="text" name="new_event_name" value="<?php echo $eve_name; ?>" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td style="height:80px; width:80px">
                        <b>Event Date</b> 
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <input type="date" name="new_date" value="<?php echo $eve_date; ?>" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td style="height:80px; width:80px">
                        <b>Join Status</b> 
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <input type="number" name="new_join_status" value="<?php echo $join_status; ?>" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td style="height:80px; width:150px">
                        <b>Event Status</b> 
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <input type="number" name="new_event_status" value="<?php echo $eve_status; ?>" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td style="height:80px; width:150px">
                        <b>Comments</b> 
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <input type="text" name="comment" value="<?php echo $comment; ?>" class="form-control">
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