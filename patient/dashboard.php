<?php
session_start();

if(!isset($_SESSION['patient'])){
    header('location:signin.php');
}
else{
    $patient = $_SESSION['patient'];
    include '../connection.php';
    $SELECT = "SELECT *FROM patient where email = '$patient'";
    $QUERY = mysqli_query($connection, $SELECT);
    $res = mysqli_fetch_assoc($QUERY);

    function convert($date):string{

        $new_date = date("d F, Y", strtotime($date));
    
       return $new_date;
    }

    $hSELECT = "SELECT *FROM myhealth where patient = '$patient'";
    $hQUERY = mysqli_query($connection, $hSELECT);

    $notification = mysqli_query($connection, "SELECT *FROM notification WHERE user= '$patient'");
     
    $count = $notification -> num_rows;

   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Dashboard</title>
</head>
<body>
    <div class="sidebar">
            <div class="patient">
                <div class="image">
                    <img src="../images/avatar.png" alt="pateint">
                </div>
                <h3><?php echo $res['firstname'] ?></h3>
            </div>

            <div class="menu">
                <a href="#"><div class="menu-item current">My Health</div></a>
                <a href="diagnosis.php"><div class="menu-item">Diagnoses</div></a>
                <a href="appointments.php"><div class="menu-item">Appointments</div></a>
                <a href="goelocation.php"><div class="menu-item">Find hospitals</div></a>
            </div>

    </div>

    <!-- main -->

    <div class="main">
       <div class="date" >
        <div class="notification"><img src="../images/notification.svg"><div class="div" <?php if($count == 0){echo 'style="display:none"';}?>><?php echo $count ?> 
          
            <div class="dropdown-content">
            <?php
                while($nres = mysqli_fetch_assoc($notification)){
                    echo '
             <a>'.$nres['message'].'<a><hr><br>
            
            ';
            }
       ?>
            </div>
    
        
        </div>
        </div>
        <b><?php echo convert(date('d-m-Y'))?></b>
       </div>

       <div class="data">
        <div class="dat blood">
            <h1 style="color: red;">Blood Group</h1>
            <hr>
            <h1 class="bld"><?php echo $res['bloodgroup'] ?></h1>
        </div>

        <div class="dat genotype">

            <h1 style="color: #21C375;">Genotype</h1>
            <hr>
            <h1 class="gen"><?php echo $res['genotype'] ?></h1>
        </div>

        <div class="dat bloodpressure">

            <h1 style="color: black;">Blood Pressure</h1>
            <b>Last checked</b>
            <hr>
            <h1 class="bldp">78/120mmh</h1>
        </div>
       </div>

       <!-- x-ray -->

      <?php 
      while( $hres = mysqli_fetch_assoc($hQUERY)){
        echo '
      
    <h1 style="margin-left: 10px; margin-top:50px;">'.$hres["scantype"].'</h1>
       <div class="xray">
        
        <div class="xraybox">
            <img src="'.$hres["scan"].'" alt="xray">
        </div>


        <div class="xraydata">
        <p><b>Date:</b>'.$hres["date"].'</p>
        <p><b>Time:</b>'.$hres["times"].'</p>
            <p>'.$hres["result"].'</p>
        </div>
       </div>

       <div class="remarks">
        <h1>Doctors remarks</h1>
        <p>'.$hres["doctorsremarks"].'
       </p>
       <hr>
       </div>
    
    ';
    }
      
      ?></div>
</body>
</html>