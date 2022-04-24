<?php 
    include("../config.php");

    session_start();
    $session1 = strval($_SESSION['login']); 

    $select_party = "SELECT * FROM p_party";
    $select_party_result = mysqli_query($con, $select_party);

    if(isset($_POST['vote_party'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $party = $_POST['party'];
            $vote = $_POST['vote'];

            if($party == "select_empty"){
                $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Select a Party</div>&nbsp</center>";
            }elseif(empty($vote)){
                $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Vote</div>&nbsp</center>";              
            }elseif($vote != 1){
                $msg[] = "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Enter 1  for vote</div>&nbsp</center>"; 
            }else{
                $user_update = "UPDATE user_tbl SET vote_status = '1' WHERE username = '$session1'";
                $user_update_result = mysqli_query($con, $user_update); 

                $vote_status_insert = "INSERT INTO vote_tbl(party_name,username,vote_status,date_time) VALUES('$party','$session1','$vote', NOW())";
                $vote_status_insert_result = mysqli_query($con, $vote_status_insert);
                
                $user_check_to_back = "SELECT * FROM user_tbl WHERE username = '$session1'";
                $user_check_to_back_result = mysqli_query($con, $user_check_to_back);
                $user_check_to_back_row = mysqli_fetch_assoc($user_check_to_back_result);

                if($user_check_to_back_row['user_type'] == "admin"){
                    header("location:admin.php");
                }elseif($user_check_to_back_row['user_type'] == "user"){
                    header("location:user.php");
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
    <title>Join Event</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"  style="font-family:'Bebas Neue', cursive; font-size:150%" href="#">Online Voting System 2023 - Vote Here</a>
    <span class="navbar-text">
        <a href="admin.php"><button class="btn btn-primary">Back</button></a>
    </span>
</nav>
<div class="container">
    <br><br><br><br><br>

    <?php 
        if(isset($msg)){
            foreach($msg as $msg){
                echo $msg;
            }
        }
    
    ?>
    <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
        <table border="0">
            <tr>
                <td>
                    <h3>Select Party</h3>
                </td>
                <td>
                    &nbsp&nbsp&nbsp
                </td>
                <td>
                    <h3>Yout Vote</h3>
                </td>
            </tr>
            <tr>
                <td>
                        <select name="party" class="form-control">
                            <option value="select_empty">--SELECT--</option>
                            <?php                           
                                while($row = mysqli_fetch_assoc($select_party_result)){
                            ?>
                                <option value="<?php echo $row['party_name']; ?>"><?php echo $row['party_name']; ?></option>
                            <?php } ?>
                        </select>
                </td>
                <td></td>
                <td>
                    <input type="number" name="vote" placeholder="vote entering number 1" class="form-control">
                    enter 1 to vote
                </td>
            </tr>

        </table>
        <br><br><br>
        <input type="submit" name="vote_party" value="Vote" class="btn btn-primary">
    </form>
<br><br><br><br><br><br>
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