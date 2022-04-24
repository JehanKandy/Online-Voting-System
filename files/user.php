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
        $vote_status = $row['vote_status'];      
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        tr{
            border-collapse: collapse;
            width: 50%;
        }
        .party-image{
            width: 200px;
            height: 150px;
            border: none;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"  style="font-family:'Bebas Neue', cursive; font-size:150%" href="#">Online Voting System 2023 - User Panel</a>
    <span class="navbar-text">
        <a href="../login/logout.php"><button class="btn btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg>&nbsp Logout</button></a>
    </span>
</nav>

<div class="container">
    <br><br><br>
    <img src="../images/user.png" alt="user" style="border-radius: 10%; width:20%;">
    <br><br><br>
        <table border="0"  style="width:100%">
            <tr>
                <td>
                    <table border="0" style="width: 500px;">
                        <tr>
                            <td>
                                <b>Name</b>
                            </td>
                            <td>
                                &nbsp&nbsp:&nbsp&nbsp
                            </td>
                            <td>
                                <b><?php echo $fname.'&nbsp&nbsp'.$lname; ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>NIC/PPN</b>
                            </td>
                            <td>
                                &nbsp&nbsp:&nbsp&nbsp
                            </td>
                            <td>
                                <b><?php echo $user1; ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Email</b>
                            </td>
                            <td>
                                &nbsp&nbsp:&nbsp&nbsp
                            </td>
                            <td>
                                <b><?php echo $email; ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Full Name</b>
                            </td>
                            <td>
                                &nbsp&nbsp:&nbsp&nbsp
                            </td>
                            <td>
                                <b><?php echo $full_name; ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Date of Birth</b>
                            </td>
                            <td>
                                &nbsp&nbsp:&nbsp&nbsp
                            </td>
                            <td>
                                <b><?php echo $dob; ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Address</b>
                            </td>
                            <td>
                                &nbsp&nbsp:&nbsp&nbsp
                            </td>
                            <td>
                                <b><?php echo $address1; ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Mobile Number</b>
                            </td>
                            <td>
                                &nbsp&nbsp:&nbsp&nbsp
                            </td>
                            <td>
                                <b><?php echo $mobile_no; ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>User Type</b>
                            </td>
                            <td>
                                &nbsp&nbsp:&nbsp&nbsp
                            </td>
                            <td>
                                <b><?php echo $user_type; ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <a href="edit_acc.php"><button class="btn btn-primary">Edit</button></a>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    
                </td>
                <td>
                    <table border="0">
                        <tr>
                            <td>
                                <h2>Upcoming Events</h2>
                            </td>                            
                        </tr>
                        <tr  >
                            <td>
                                <table class="table"  style="width:700px">
                                    <?php
                                        $event_sql = "SELECT * FROM events";
                                        $event_result = mysqli_query($con, $event_sql);


                                    ?>
                                     <thead class="thead-dark">
                                        <tr>
                                            <th style="width:35%">
                                                <p>Event Name</p> 
                                            </th>

                                            <th style="width:25%">
                                                <p>Date</p>
                                            </th>

                                            <th style="width:25%">
                                                <p>Join Status</p>
                                            </th>

                                            <th style="width:15%">
                                                <p>Join Event</p>
                                            </th>
                                        </tr>
                                     </thead>
                                     <tr >
                                         <?php 
                                            while($event_row = mysqli_fetch_assoc($event_result)){
                                        
                                        ?>
                                         <td>
                                            <?php echo $event_row['eve_name']; ?>
                                         </td>

                                         <td>
                                            <?php echo $event_row['eve_date']; ?>
                                         </td>

                                         <td>
                                            <?php
                                                if($event_row['join_status'] == 1){
                                                    echo "<font color ='green'>Join Activated</font>";
                                                }else{
                                                    echo "<font color ='red'>Join Deactivated</font>"; 
                                                }
                                            
                                            ?>
                                         </td>

                                         <td>
                                         <?php
                                        

                                        
                                        if($event_row['eve_status'] && $event_row['join_status'] == 1){
                                            if($vote_status == 1){
                                                ?>
                                                    <font color="red">voted</font>
                                                <?php

                                            }else{
                                                ?>
                                                    <a href="join_event.php?id=<?php echo $event_row['eve_id']; ?>"><button class="btn btn-primary" >Join</button></a>
                                                <?php
                                            }                                             
                                         }

                                        else{
                                             ?>
                                             <button class="btn btn-primary disabled" >Join</button>
                                             <?php
                                         }                                            
                                         ?>
                                            
                                         </td>
                                     </tr>
                                     <?php } ?>
                                </table>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    <br><br><br>
    <hr>
    <br>
    <h2>Current Situation of Election</h2>
    <br><br>
    <?php 
        $party_select = "SELECT * FROM p_party";
        $party_select_result = mysqli_query($con, $party_select);

        

        while($party_row = mysqli_fetch_assoc($party_select_result)){
            $pname = $party_row['party_name'];
    ?>


    <table border="0">
        <tr>
            <td>
                <img src="../images/banner.jpg" alt="party img" class="party-image">
            </td>
            <td>
                &nbsp&nbsp&nbsp
            </td>
            <td>
                <p>Party Name : <b><?php echo $pname; ?></b></p> 
                <p>Party Score : <b>
                    <?php 
                        $select_party_score = "SELECT party_name FROM vote_tbl WHERE party_name = '$pname'";
                        $select_party_score_result = mysqli_query($con, $select_party_score);
                        $select_party_score_nor = mysqli_num_rows($select_party_score_result);

                        echo $select_party_score_nor;

                    ?>
                </b> </p>   
            </td>
        </tr>
        
    </table>
    <br><br>
    <?php } ?>


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