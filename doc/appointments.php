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

$QUERY = mysqli_query($connection, "SELECT name from doctors WHERE email = '$doctor'");

$res = mysqli_fetch_assoc($QUERY);

//appointments

$name =  $res['name'];
$apSelect = "SELECT *FROM appointments where doctor = '$doctor'";
$apQuery = mysqli_query($connection,$apSelect );

//echo $apSelect;



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dappointments.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    
    <title>Doctor | appointments</title>
</head>
<body>
    <div class="sidebar">
            <div class="patient">
                <div class="image">
                    <img src="../images/avatar.png" alt="pateint">
                </div>
                <h3><?php echo $res['name'] ?></h3>
            </div>

            <div class="menu">
                <a href="dashboard.php"><div class="menu-item ">Patient  <div class="imag"><img src="../images/patient.svg" alt="" ></div> </div></a>

                <a href="diagnosis.php"><div class="menu-item ">Diagnosis  <div class="imag"><img src="../images/stethoscope.svg" alt="" ></div> </div></a>

                <a href=""><div class="menu-item current ">Appointments  <div class="imag"><img src="../images/calendarg.svg" alt="" ></div> </div></a>


                
            </div>

    </div>

    <!-- main -->

    <div class="main">
       <div class="date">
        <b><?php echo convert(date("Y-m-d")) ?></b>
       </div>

      
       <div class="below">
       

        <div class="patientss">
            
        <?php
        if($apQuery -> num_rows == 0){
            echo "You have no appointments";
        }
        else{
        while($apRes = mysqli_fetch_assoc($apQuery)){
            $email = $apRes['doctor'];
            $pat = $apRes['patient'];
            $patientQuery = mysqli_query($connection, "SELECT * FROM patient WHERE email = '$pat'");

            $patient = mysqli_fetch_assoc($patientQuery);

            if($apRes['data'] > date("Y-m-d")){
                $status = "Upcoming";
                $color = 'rgb(8, 154, 8)';
            }
            elseif($apRes['data'] == date("Y-m-d")){
                $status = "Today";
                $color = "RED";
            }
            else{
                $status = "Past";
                $color = "RED";
            }

            echo '
            <div class="patient">
                <div class="top">
                    <div class="text">
                        <b style="color:'.$color.';">'.$status.'</b>
                        <h2>'.$patient['firstname'].' '.$patient['lastname'].'</h2>

                    </div>
                    <div class="calendar">
                        <img src="../images/calendarb.svg" alt="">
                    </div>
                   
                </div>
                
                <div class="details">
                    <b>Date: '.$apRes['data'].'</b><br>
                    <b>Time: '.$apRes['time'].'am</b>

                    <div class="button">
                        <button onclick="cancel('.$apRes['appointmentid'].')">Cancel</button>
                    </div>

                    <div class="button">
                        <a href="reschedule.php?date='.$apRes['data'].'&time='.$apRes['time'].'&id='.$apRes['appointmentid'].'"><button style="background-color:rgb(4, 85, 4);">Reschedule</button></a>
                    </div>
                </div>
            </div>
                ';
        }
    }
            ?>


        </div>
      

       </div>

    </div>
    
</body>
<script>
    function cancel(id){
  if(confirm("Are you sure you want to cancel this appointment?")){
    window.location.href = "deleteappointment.php?appointmentid="+id;
  }
}





       
    
        
       
    
</script>
</html>