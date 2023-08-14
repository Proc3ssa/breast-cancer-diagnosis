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

    // Symptoms of Breast Cancer
$breastCancerSymptoms = array(
    "Lump in the breast or underarm",
    "Change in the size, shape, or appearance of the breast",
    "Nipple discharge (other than breast milk)",
    "Swelling or redness in the breast",
    "Skin dimpling or puckering",
    "Nipple inversion (turning inward)",
    "Breast pain or tenderness",
    "Unexplained weight loss",
    "Fatigue",
    "Persistent cough or hoarseness",
    "Bone pain",
    "New onset of nipple pain or itching",
    "Changes in the texture of the breast skin",
    "Enlarged lymph nodes in the armpit",
    "Breast or nipple pain",
    "Nipple retraction or indentation",
    "Unexplained breast asymmetry",
    "Peeling, scaling, or flaking of the nipple or breast skin",

     

      
);

// Symptoms of Prostate Cancer
$prostateCancerSymptoms = array(
    //prostate cancer
    "Frequent urination, especially at night",
    "Difficulty starting or stopping urination",
    "Weak or interrupted urine flow",
    "Blood in the urine or semen",
    "Pain or discomfort in the pelvic area",
    "Painful ejaculation",
    "Erectile dysfunction",
    "Unexplained weight loss",
    "Fatigue",
    "Weakness or numbness in the legs or feet",
    "Bone pain",
    "New onset of urinary incontinence",
    "Feeling the need to urinate urgently",
    "Difficulty having an erection",
    "Pain or stiffness in the lower back, hips, or upper thighs",
    "Blood in the stool",
    "Swelling in the legs",
    "Loss of appetite",
    "Nausea or vomiting",
    "Jaundice (yellowing of the skin and eyes)",
    "Frequent urination",
    "Difficulty starting or stopping urination",
    "Weak urine flow",
    "Feeling of incomplete bladder emptying",
    
    // Prostatitis
    "Frequent urination",
    "Urgency to urinate",
    "Pelvic pain",
    "Discomfort during urination",
    
    // Urinary Tract Infections (UTIs)
    "Frequent urination",
    "Pain or burning during urination",
    "Urgency to urinate",
    
    // Bladder Cancer
    "Blood in the urine",
    "Frequent urination",
    "Urgency to urinate",
);


if(isset($_POST['submit'])){

    $symptoms = array();
    $symptom2 = $_POST['othersymptoms'];
    $department = $_POST['department'];
    for($i = 1; $i<=18; $i++){
        if(isset($_POST['symptom'.$i])){
            array_push($symptoms,$_POST['symptom'.$i]);
        }
    }
    

    $symps = join(', ', $symptoms);

   $allsymps = $symps.'and'.$symptom2;

   //chatgpt api key
   $apiKey = "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";

   $date = date("Y-m-d");
   $time = date("h:ia");
   $aiResults = "";
   $remarks = "";
   $id = "diag".date("yimshd");

   $INSERT = "INSERT into diagnosis values ('$id','$date','$time','$patient','$department','$allsymps','$aiResults','$remarks') ";

   $Dquery = mysqli_query($connection, $INSERT);

}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/diagnosis.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <script src="../js/custom.js">
        

    </script>
    <title>Diagnosis</title>
</head>
<body>
    <div class="sidebar">
            <div class="patient">
                <div class="image">
                    <img src="../images/avatar.png" alt="pateint">
                </div>
                <h3><?php echo $res['firstname']?></h3>
            </div>

            <div class="menu">
                <a href="dashboard.php"><div class="menu-item ">My Health</div></a>
                <a href=""><div class="menu-item current">Diagnoses</div></a>
                <a href="appointments.php"><div class="menu-item ">Appointments</div></a>
            </div>

    </div>

    <!-- main -->

    <div class="main">
       <div class="date">
        <b><?php echo convert(date("d-m-Y")) ?></b>
       </div>

       <?php
            if($res['gender'] == "Male"){
                $type = "Prostate Cancer Care";
            }
            else{
                $type = "Breast Cancer Care";
            }        ?>
      
       <div class="below">
       <h1><?php echo $res['firstname']." ".$res['lastname'] ?></h1>
       <b>New Diagnosis-</b><b style="color: red;"><?php echo $type ?></b>

       <fieldset>
        <legend><b>Symptoms</b></legend>
    <form action="#" method="POST">
        <?php
            if($res['gender'] == "Male"){
                $num = 0;
                foreach($prostateCancerSymptoms as $symp){
                    $num++;
                    echo '
                    <input type="checkbox" value="'.$symp.'" name="symptom'.$num.'" id="checkbox'.$num.'"><label for="checkbox'.$num.'"><b>'.$symp.'</b></label> <br>
                    ';
                }

            }

            else{
                $num = 0;
                foreach($breastCancerSymptoms as $symp){
                    $num++;
                    echo '
                    <input type="checkbox" value="'.$symp.'" name="symptom'.$num.'" id="checkbox'.$num.'"><label for="checkbox'.$num.'"><b>'.$symp.'</b></label> <br>
                    ';
                }
            }
        ?>
            


       </fieldset>

       <textarea name="othersymptoms" id="" cols="30" rows="10" value="other"  placeholder="write other symptoms"></textarea>

       <input type="hidden" name="department" value="<?php echo $type ?>">

       <a href="diagnosis.php#airesults"><div id="button" type="" onClick = "diagnose()" name="diagnose"><p>Diagnose</p></div></a>

       <fieldset id="airesults" style="border-color: red; display:block">
        <legend>A.I results</legend>
        <textarea name="airesults" id="airesults" cols="30" rows="10" value="other"  placeholder="ai">
        </textarea>
       </fieldset>

       <button type="submit" name="submit">Submit</button>

        </form>

       </div>

    </div>
    
</body>
</html>