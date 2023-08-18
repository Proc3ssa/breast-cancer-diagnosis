<?php
session_start();
if(!isset($_SESSION['doctor'])){
    header("location:index.php");
}
include "../connection.php";
$doctor = $_SESSION['doctor'];

function convert($date):string{

    $new_date = date("d F, Y", strtotime($date));

   return $new_date;
}

$QUERY = mysqli_query($connection, "SELECT name, department from doctors WHERE email = '$doctor'");

$res = mysqli_fetch_assoc($QUERY);
if($res['department'] == 'Prostate Cancer Care'){
    $gendar = "Male";
}
else{
    $gendar = "Female";
}
//patients fetch and search



if(isset($_POST['search'])){
    $patient = $_POST['patient'];
    $primary_select = "SELECT firstname, email, lastname from patient where firstname LIKE '$patient%' or lastname LIKE '$patient%' or email LIKE '%$patient%' and gender = '$gendar'";

    //echo $primary_select;
}
else{
    $primary_select = "SELECT firstname, email, lastname FROM patient where gender = '$gendar'";
}

$primary_query = mysqli_query($connection, $primary_select);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ddashboard.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>doctor dashboard</title>
</head>
<body>
    <div class="sidebar">
            <div class="patient">
                <div class="image">
                    <img src="../images/avatar.png" alt="pateint">
                </div>
                <h3><?php echo $res['name']?></h3>
            </div>

            <div class="menu">
                <a href=""><div class="menu-item current">Patient  <div class="imag"><img src="../images/patient.svg" alt="" ></div> </div></a>

                <a href="diagnosis.php"><div class="menu-item ">Diagnosis  <div class="imag"><img src="../images/stethoscope.svg" alt="" ></div> </div></a>

                <a href="appointments.php"><div class="menu-item ">Appointments  <div class="imag"><img src="../images/calendar.svg" alt="" ></div> </div></a>


                
            </div>

    </div>

    <!-- main -->

    <div class="main">
       <div class="date">
        <b><?php echo convert(date("d-m-Y"))?></b>
       </div>

      
       <div class="below">
        <form action="#" method="POST">
            
            <div class="search">
            <input type="search" name="patient" id="" placeholder="search for patients">
            </div>

            <div class="lense">
            <button type="submit" name="search"><img src="../images/search.svg" alt=""></button>
            </div>
            
        </form>

        <div class="patientss">
            <?php
                while($pf = mysqli_fetch_assoc($primary_query)){
                    echo '
                            <a href="patient.php?patient='.$pf['email'].'">
                    <div class="patient">
                        <div>
                            <img src="../images/patientb.svg" alt="" style="color: aliceblue;">
                        </div>
                        
                        <b>'.$pf['firstname'].' '.$pf['lastname'].'</b>
                    </div></a>
                    ';

                }
            ?>
            

            


           
        </div>
      

       </div>

    </div>
    
</body>
</html>