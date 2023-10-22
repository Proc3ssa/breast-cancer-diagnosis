<?php
session_start();
if(!isset($_SESSION['technician'])){
    header("location:index.php");
}

if(!isset($_GET['patient'])){
    header("location:dashboard.php");
}
$patient = $_GET['patient'];

include "../connection.php";
include "../notification.php";
$technician = $_SESSION['technician'];

function convert($date):string{

    $new_date = date("d F, Y", strtotime($date));

   return $new_date;
}

$QUERY = mysqli_query($connection, "SELECT name from technicians WHERE email = '$technician'");

$res = mysqli_fetch_assoc($QUERY);
//patients fetch and search

$primary_select = "SELECT *FROM patient WHERE email = '$patient'";

$primary_query = mysqli_query($connection, $primary_select);
$pf = mysqli_fetch_assoc($primary_query);

if(isset($_POST['upload'])){
 $scanType = $_POST['scantype'];
 $date = $_POST['date'];
 $time = $_POST['time'];
 $results = $_POST['results'];
 $id = date('msi');

 $scanimage = $_FILES['scanimage'];
        
 //echo $date;
        $fileName = $scanimage['name'];
        $fileSize = $scanimage['size'];
        $fileType = $scanimage['type'];
        $fileTempName = $scanimage['tmp_name'];
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $filDestination = "../images/scans/$patient$scanType$date.$extension";
  
        if(move_uploaded_file($fileTempName,$filDestination)){

            $INSERT = "INSERT into myhealth values($id, '$date', '$time','$patient', '$filDestination','$scanType', '$results', '')";
            //echo $INSERT;
            if(mysqli_query($connection, $INSERT)){
                $date = date("Y-m-d");
                $message = "Your $scanType result is ready";
                notification($id, 'scan', $patient, $message, $date);

                 echo '<script>alert("New data added")</script>';
            }
            else{
                echo '<script>alert("unable to add new data, try again after some time")</script>';
            }

           
        }
        else{
            echo '<script>alert("unable to add new data, try again after some time")</script>';
        }
 
 

}

//
//fetch from myhealth

$healthQuery = mysqli_query($connection,"SELECT *FROM myhealth WHERE patient = '$patient'");

//


?>

<!DOCTYPE html>
<html lang="en">
<head>
<script>
    
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
    }

</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tpatient.css">
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

            


            
        </div>

</div>

    <!-- main -->

    <div class="main">
       <div class="date">
        <b><?php echo convert(date("d-m-Y"))?></b>
       </div>
 <h1><?php echo $pf['firstname'].' '.$pf['lastname']?></h1>
<form action="#" method="POST" enctype="multipart/form-data">
        <div class="adddata">
      <fieldset>
        <legend><b>Upload Health Data</b></legend>
  
        <div>
        <label for="select"><b>Health Type</b></label>
            
            <select id="select" required name="scantype">
                <option value="" required>--select--</option>
                <option value="BloodPressure" required>Blood Pressure</option>
                <option value="X-ray" required>X-ray</option>
                <option value="M.R.I." required>M.R.I.</option>
                <option value="C.Tscan" required>C.T scan</option>
                
            </select>
            <br><br>

            <label for="scan"><b>Scan image</b></label>
            <input type="file" name="scanimage" id="scan" required><br><br>

            <label for="date"><b>Date<span style="visibility:hidden">---------</span></b></label>
            <input type="date" name="date"  required> <br><br>

            <label for="time"><b>Time<span style="visibility:hidden">---------</span></b></label>
            <input type="time" name="time" required>

        
            <textarea placeholder="Enter results" name="results" required></textarea>
            <button type="submit" name="upload">Upload</button>
        </div>


      </fieldset>

        </div>

</form>
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
       <?php  
         while($hres = mysqli_fetch_assoc($healthQuery)){
   echo '
            <h1 style="margin-left: 10px; margin-top:50px;">'.$hres['scantype'].'</h1>
       <div class="xray">
        
        <div class="xraybox">
             <img src="'.$hres['scan'].'">
        </div>


        <div class="xraydata">
            <p>
            <p><b>Date:</b>'.$hres['date'].'</p>
            <p><b>Date:</b>'.$hres['times'].'</p>
            <p>'.$hres['result'].'</p>
            
            </p>
        </div>
       </div>
       ';

         }
       ?>
    

      
    </div>
    
</body>
</html>