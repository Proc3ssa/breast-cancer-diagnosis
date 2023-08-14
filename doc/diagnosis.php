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

$QUERY = mysqli_query($connection, "SELECT * from doctors WHERE email = '$doctor'");

$res = mysqli_fetch_assoc($QUERY);
$department = $res['department'];
//patients fetch and search

$primary_select = "SELECT *FROM diagnosis WHERE department = '$department'";

$primary_query = mysqli_query($connection, $primary_select);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ddiagnosis.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>doctor diagnosis</title>
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
                <a href="dashboard.php"><div class="menu-item ">Patient  <div class="imag"><img src="../images/patientw.svg" alt="" ></div> </div></a>

                <a href=""><div class="menu-item current">Diagnosis  <div class="imag"><img src="../images/stethoscopeg.svg" alt="" ></div> </div></a>

                <a href="appointments.php"><div class="menu-item ">Appointments  <div class="imag"><img src="../images/calendar.svg" alt="" ></div> </div></a>


                
            </div>

    </div>

    <!-- main -->

    <div class="main">
       <div class="date">
        <b><?php convert(date("Y-m-d"))?></b>
       </div>

      
       <div class="below">
       

        <div class="table">
           
           
                    <?php 

                    if($primary_query -> num_rows == 0){
                        echo 'no diagnosis available';
                    }
                    else{

                   echo ' <table>
                   <thead>
                       <tr>
                           <th>#</th> 
                           <th>Patient</th>
                           <th>Date</th>
                           <th>Time</th>
                           <th></th>
                       </tr>
                   </thead>
                   <tbody> ';



                     $number = 0;
                    while($pf = mysqli_fetch_assoc($primary_query)){
                        $diagnosisid = $pf['id'];
                        $email = $pf['Patient'];
                        $nameSelect = "SELECT firstname, lastname FROM patient WHERE email = '$email'";
                        $nameQuery = mysqli_query($connection,$nameSelect);
                        $nameres = mysqli_fetch_assoc($nameQuery);
                        $patient =$nameres["firstname"].' '.$nameres["lastname"];
                        
                       $number ++;
                        echo '
                         <tr>
                        <td>'.$number.'</td>
                        <td>'.$patient.'</td>
                        <td>'.$pf['date'].'</td>
                        <td>'.$pf['time'].'</td>
                        

                        <td><a href="ddiagnosis.php?diagnosisid='.$diagnosisid.'&patient='.$email.'"><button>View</button></a></td>
                    </tr>
                        ';
                    }
                   
                 }
                    ?>

                   

                   
                   

                </tbody>
            </table>
        </div>
      

       </div>

    </div>
    
</body>
</html>