<?php
session_start();
if(!isset($_SESSION['doctor'])){
    header("location:index.php");
}
include "../connection.php";
$doctor = $_SESSION['doctor'];
$patient = $_GET['patient'];
$diagnosisid = $_GET['diagnosisid'];

function convert($date):string{

    $new_date = date("d F, Y", strtotime($date));

   return $new_date;
}

$QUERY = mysqli_query($connection, "SELECT name from doctors WHERE email = '$doctor'");

$res = mysqli_fetch_assoc($QUERY);

//appointments

$name =  $res['name'];

$apSelect = "SELECT *FROM diagnosis where id = '$diagnosisid'";
$apQuery = mysqli_query($connection,$apSelect );
$dres = mysqli_fetch_assoc($apQuery);

//echo $apSelect;

$patientSelect = "SELECT firstname, lastname FROM patient where email = '$patient'";
$patientQuery = mysqli_query($connection,$patientSelect );
$patientres = mysqli_fetch_assoc($patientQuery);


if(isset($_POST['addremarks'])){
    $remarks = $_POST['remarks'];

    $UPDATE = "UPDATE diagnosis SET remarks = '$remarks' where id = '$diagnosisid'";

    if(mysqli_query($connection, $UPDATE)){
        echo '
        <script>alert("Remarks added")</script>
        ';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ddiagnosis2.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Diagnosis</title>
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

            <a href="diagnosis.php"><div class="menu-item current">Diagnosis  <div class="imag"><img src="../images/stethoscopeg.svg" alt="" ></div> </div></a>

            <a href="appointments.php"><div class="menu-item ">Appointments  <div class="imag"><img src="../images/calendar.svg" alt="" ></div> </div></a>


            
        </div>

</div>

    <!-- main -->

    <div class="main">
       <div class="date">
        <b><?php echo convert(date("Y-m-d")) ?></b>
       </div>

      
       <div class="below">
       <h1><span style="color:#21C375">Diagnose-</span><?php echo $patientres['firstname'].' '.$patientres['lastname']?></h1>
       
        <div class="mother">
       <fieldset  style="width:600px">
        <legend><b>Symptoms</b></legend>

        <?php
        $symptoms = $dres['symptoms'];
        $ai_results = $dres['ai_suggestion'];

        $symps = explode(",",$symptoms);

       
       echo '<div class="symptoms">';
          $number = 0;  
       foreach($symps as $sympom){
  $number++;
        echo'
        <label for="checkbox1"><b>'.$number.')'.$sympom.'</b></label> <br>

        ';
       }

               
              
            ?>
            

            


       </fieldset>

       <fieldset  style="border-color: red; display:block">
        <legend><b>A.I suggestions</b></legend>

            <div class="symptoms">
              <p><?php echo $ai_results ?></p>
            </div>

       </fieldset>
       </div>


        
       <form action = "#" method="POST">
        <h2>Remarks</h2>
       <input type="text" required name="remarks"   placeholder="write Remarks" value="<?php echo $dres['remarks'] ?>">

       <button type="submit" name="addremarks">Add Remarks</button>

      </form>

       </div>

    </div>
    
</body>
</html>