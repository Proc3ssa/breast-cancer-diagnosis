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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
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
                <a href=""><div class="menu-item">Diagnoses</div></a>
                <a href=""><div class="menu-item">Appointments</div></a>
            </div>

    </div>

    <!-- main -->

    <div class="main">
       <div class="date">
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
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque temporibus eum distinctio numquam. Ullam, aut dolorum accusantium saepe, ab eum praesentium necessitatibus architecto sit, suscipit nihil harum recusandae modi maxime.
        Quia veritatis iure odit ipsa? Sapiente animi natus earum aut molestiae dolorem et nulla laboriosam ea accusantium, autem cum ipsa. Rerum ea quia porro et nulla, perspiciatis dolor molestias nisi?
        Iusto repellat eius recusandae doloribus ea vel, placeat necessitatibus nostrum quas, aut aliquid, sunt dicta quod distinctio quibusdam molestiae ratione fuga nam? Tempora ut incidunt qui impedit et itaque ratione.
        Ducimus dolorem maxime minima voluptatem, nihil mollitia et. Sed ad nulla laudantium, maxime natus recusandae totam. Odio repellendus natus exercitationem, pariatur maxime voluptatibus? Laboriosam debitis mollitia cupiditate officiis rem alias?
        Modi expedita consequatur dolores optio consequuntur, ratione facere magnam labore provident, recusandae, perferendis sunt deserunt! Eligendi alias perspiciatis aut nesciunt dolores at distinctio sequi officiis, incidunt magnam, eius, vel suscipit!
       .
       </p>
       </div>
    </div>
    
</body>
</html>