<?php 
    include("../config.php");

    $event_sql = "SELECT * FROM events";
    $event_sql_result = mysqli_query($con, $event_sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Events</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"  style="font-family:'Bebas Neue', cursive; font-size:150%" href="#">Online Voting System 2023 - All Events</a>
    <span class="navbar-text">
        <a href="admin.php"><button class="btn btn-primary">Back</button></a>
    </span>
</nav>

<div class="container">
<br><br>
<h1>All Events</h1>
<br><br>

<a href="add_event.php">
<button class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg> &nbsp Add Event</button></a>
<br><br>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Event ID</th>
            <th>Event Name</th>
            <th>Event Date</th>
            <th>Join Status</th>
            <th>Event Status</th>
            <th>Action</th>
            <th>Comments</th>
        </tr>
    </thead>
    <?php 
        while($row = mysqli_fetch_assoc($event_sql_result)){          
    ?>

    <tr>
        <td>
            <?php echo $row['eve_id']; ?>
        </td>
        <td>
            <?php echo $row['eve_name']; ?>
        </td>
        <td>
            <?php echo $row['eve_date']; ?>
        </td>
        <td>
            <?php 

                if($row['join_status']){
                    ?>
                        <font color = "green">Join</font>
                    <?php
                }else{
                    ?>                    
                        <font color = "red">Waiting</font>
                    <?php 
                }


            ?>
        </td>
        <td>
            <?php
                if($row['eve_status']){
                    ?>
                        <font color = "green">Event Active</font>
                    <?php
                }
                else{
                    ?>
                        <font color = "red">Event Deactive</font>
                    <?php
                }
            
            ?>
        </td>
        <td>
            <a href="event_edit.php?id=<?php echo $row['eve_id'];?>"><button class="btn btn-primary">Action</button></a>
        </td>
        <td>
            <?php echo $row['comments']; ?>
        </td>
    </tr>

    <?php } ?>
</table>



<br><br><br><br>
<hr>
<br><br>
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
    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
</body>
</html>