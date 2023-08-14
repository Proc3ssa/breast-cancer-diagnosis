<?php
session_start();
if(!isset($_SESSION['doctor'])){
    header("location:index.php");
}

if(!isset($_GET['patient'])){
    header("location:dashboard.php");
}
$patient = $_GET['patient'];

include "../connection.php";
$doctor = $_SESSION['doctor'];

function convert($date):string{

    $new_date = date("d F, Y", strtotime($date));

   return $new_date;
}

$QUERY = mysqli_query($connection, "SELECT name from doctors WHERE email = '$doctor'");

$res = mysqli_fetch_assoc($QUERY);
//patients fetch and search

$primary_select = "SELECT *FROM patient WHERE email = '$patient'";

$primary_query = mysqli_query($connection, $primary_select);
$pf = mysqli_fetch_assoc($primary_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dpatient.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Patient</title>
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
 <h1><?php echo $pf['firstname'].' '.$pf['lastname']?></h1>
       <div class="data">
       
        <div class="dat blood">
            <h1 style="color: red;">Blood Group</h1>
            <hr>
            <h1 class="bld"><?php echo $pf['bloodgroup'] ?></h1>
        </div>

        <div class="dat genotype">

            <h1 style="color: #21C375;">Genotype</h1>
            <hr>
            <h1 class="gen"><?php echo $pf['genotype'] ?></h1>
        </div>

        <div class="dat bloodpressure">

            <h1 style="color: black;">Blood Pressure</h1>
            <b>Last checked:<?php echo convert(date("d-m-Y")) ?></b>
            <hr>
            <h1 class="bldp">78/120mmh</h1>
        </div>
       </div>

       <!-- x-ray -->
    <h1 style="margin-left: 10px; margin-top:50px;">X-ray</h1>
       <div class="xray">
        
        <div class="xraybox">

        </div>


        <div class="xraydata">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam velit aperiam repudiandae, accusantium aut repellendus, quam error consequuntur expedita culpa sequi similique! Sunt inventore rerum voluptatum harum, nemo temporibus quas.</p>
        </div>
       </div>

       <div class="remarks">
        <h1>Doctor's remarks</h1>
       <textarea name="" id="" cols="30" rows="10" placeholder="write your remarks"></textarea>
       <button>Add Remarks</button>
       </div>
    </div>
    
</body>
</html>