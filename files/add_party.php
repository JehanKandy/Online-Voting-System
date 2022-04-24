<?php
    include("../config.php");
    session_start();

    if(isset($_POST['submit'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $party_id = $_POST['party_id'];
            $party_name = $_POST['party_name'];
            $party_address = $_POST['party_address'];
            $party_sdate = $_POST['party_sdate'];            
            $elec_year = $_POST['elec_year'];

            $check_sql = "SELECT * FROM p_party WHERE party_id = '$party_id' || party_name = '$party_name'";
            $check_sql_result = mysqli_query($con, $check_sql);
            $check_nor = mysqli_num_rows($check_sql_result);

            if($check_nor > 0){
                $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Political Party Alread Exists...!</div>&nbsp</center>";
            }
            else{
                if(empty($party_id)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Party ID Can't be Empty</div>&nbsp</center>";
                }elseif(empty($party_name)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Party Name Can't be Empty</div>&nbsp</center>";
                }elseif(empty($party_address)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Party Address Can't be Empty</div>&nbsp</center>";
                }elseif(empty($elec_year)){
                    $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Election Year Can't be Empty</div>&nbsp</center>";
                }else{
                    $party_insert = "INSERT INTO p_party(party_id,party_name,party_address,party_start,party_score,party_status) VALUES('$party_id','$party_name','$party_address','$party_sdate',0,'0')";
                    $party_insert_result = mysqli_query($con, $party_insert);

                    $party_history_insert = "INSERT INTO party_history(party_id, party_name, p_year, p_score) VALUES('$party_id','$party_name','$elec_year',0)";
                    $party_history_insert_result = mysqli_query($con, $party_history_insert);

                    header("location:all_party.php");
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
    <title>Add Political Parties</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"  style="font-family:'Bebas Neue', cursive; font-size:150%" href="#">Online Voting System 2023 - Add Party</a>
    <span class="navbar-text">
        <a href="admin.php"><button class="btn btn-primary">Back</button></a>
    </span>
</nav>
<div class="container">
    <br><br><br><br>
    <a href="all_party.php"><button class="btn btn-primary">All Parties</button></a>
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
                <label for="id">Party ID</label>
            </td>
            <td>
                &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
            </td>
            <td>
                <input type="text" name="party_id" placeholder="Party ID" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                <label for="id">Party Name</label>
            </td>
            <td>
                &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
            </td>
            <td>
                <input type="text" name="party_name" placeholder="Party Name" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                <label for="id">Party Address</label>
            </td>
            <td>
                &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
            </td>
            <td>
                <input type="text" name="party_address" placeholder="Party Address" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                <label for="id">Party Start Date</label>
            </td>
            <td>
                &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
            </td>
            <td>
                <input type="date" name="party_sdate" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                <label for="id">Election Year</label>
            </td>
            <td>
                &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp
            </td>
            <td>
                <input type="text" name="elec_year" placeholder="Election Year" class="form-control">
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>