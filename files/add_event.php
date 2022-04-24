<?php
    include("../config.php");
    session_start();

    if(isset($_POST['submit'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $event_id = $_POST['event_id'];
            $event_name = $_POST['event_name'];
            $event_date = $_POST['event_date'];
            $comments = $_POST['comments'];

            $check_sql = "SELECT * FROM events WHERE eve_id = '$event_id'";
            $check_sql_result = mysqli_query($con, $check_sql);
            $check_nor = mysqli_num_rows($check_sql_result);

            if($check_nor > 0){
                $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Political Party Alread Exists...!</div>&nbsp</center>";
            }
            else{
                if(empty($event_id)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Party ID Can't be Empty</div>&nbsp</center>";
                }elseif(empty($event_name)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Party Name Can't be Empty</div>&nbsp</center>";
                }else{
                    $party_insert = "INSERT INTO events(eve_id,eve_name,eve_date,eve_status,join_status,comments) VALUES('$event_id','$event_name','$event_date',0,0,'$comments')";
                    $party_insert_result = mysqli_query($con, $party_insert);
                    header("location:all_event.php");
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
    <title>Add Events</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"  style="font-family:'Bebas Neue', cursive; font-size:150%" href="#">Online Voting System 2023 - Add Events</a>
    <span class="navbar-text">
        <a href="admin.php"><button class="btn btn-primary">Back</button></a>
    </span>
</nav>
<div class="container">
    <br><br><br><br>
    <a href="all_event.php"><button class="btn btn-primary">All Events</button></a>
    <br><br>
    <h1>Add Political Party</h1>
    <br><br>

    <?php 
        if(isset($msg)){
            foreach($msg as $msg){
                echo $msg;
            }
        }
    ?>


    <form action="<?php echo ($_SERVER['PHP_SELF'])?>" method="post">

    <table border="0">
        <tr>
            <td>
                <label for="id">Event ID</label>
            </td>
            <td>
                &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
            </td>
            <td>
                <input type="text" name="event_id" placeholder="Event ID" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                <label for="id">Event Name</label>
            </td>
            <td>
                &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
            </td>
            <td>
                <input type="text" name="event_name" placeholder="Event Name" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                <label for="id">Event Date</label>
            </td>
            <td>
                &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
            </td>
            <td>
                <input type="date" name="event_date" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                <label for="id">Event Comments</label>
            </td>
            <td>
                &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
            </td>
            <td>
                <input type="text" name="comments" placeholder="Add Comment" class="form-control">
            </td>
        </tr>
    </table>
    <br><br>
    <table border="0">
        <tr>
            <td>
                <input type="reset" value="Clear" class="btn btn-secondary btn-lg btn-block">
            </td>
            <td>

            </td>
            <td>
                <input type="submit" value="Submit" name="submit" class="btn btn-success btn-lg btn-block">
            </td>
        </tr>
    </table>



    </form>


    
    <br><br><br><br> 
<br><br><br>
<hr>
<br></br>
    
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
</div>
<div class="footer">
    <div class="card text-center">
    <div class="card-footer text-muted">
        &copy; &nbspDEVELOPED BY : <a href="https://github.com/JehanKandy" target="_blank">JEHANKANDY</a> || 2022 April
    </div>
    </div>
</div>