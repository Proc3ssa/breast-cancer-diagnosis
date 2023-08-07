<?php
session_start();

if(!isset($_SESSION['patient'])){
    header('location:signin.php');
}
else{
    $patient = $_SESSION['patient'];
    //appointment
    include '../connection.php';
    $apSELECT = "SELECT *FROM appointments where patient = '$patient'";
    $apQUERY = mysqli_query($connection, $apSELECT);
   

    //user
    $SELECT = "SELECT *FROM patient where email = '$patient'";
    $QUERY = mysqli_query($connection, $SELECT);
    $res = mysqli_fetch_assoc($QUERY);

    function convert($date):string{

        $new_date = date("d F, Y", strtotime($date));
    
       return $new_date;
    }
}

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/appointments.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Patient | Appointments</title>

    <script>
        function sure(id){
            var choice = confirm("are you sure you want to delete "+id+"?");

            // alert(choice);
            if(choice == true){
                window.location.href = "deleteappointment.php?appointmentid="+id;
            }

        }

    </script>
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
                <a href="dashboard.php"><div class="menu-item ">My Health</div></a>
                <a href="diagnosis.php"><div class="menu-item">Diagnoses</div></a>
                <a href=""><div class="menu-item current">Appointments</div></a>
            </div>

    </div>

    <!-- main -->

    <div class="main">
       <div class="date">
        <b><?php echo convert(date('d-m-Y'))?></b>
       </div>

      
       <div class="below">
        <a href="../index.php#appointments"><button>New appointment</button></a>

        <div class="table">

        <?php  if($apQUERY -> num_rows == 0){
                        echo 'You have no appointments';
                    } 
                    else{
                        echo '
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Doctor</th>
                         <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                            ';
                   
                    
                        $number = 0;
                    while( $apres = mysqli_fetch_assoc($apQUERY)){
                        $number++;
                        echo '
                    
                    <tr>
                        <td>'.$number.'</td>
                        <td>'.$apres['data'].'</td>
                        <td>'.$apres['time'].'</td>
                        <td>'.$apres['doctor'].'</td>
                       
                      

                        
                       
                        <td> <a onclick=sure("'.$apres['appointmentid'].'")> <img src="../images/delete.svg" alt="del"></a> </td>
                        
                        

                    </tr>
                    ';
                }
             } ?>

                   
                   
                   

                </tbody>
            </table>
        </div>
       </div>

    </div>
    
</body>
</html>