<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../css/responsive.css" rel="stylesheet" />
    <title>Make an appointment</title>
</head>
<body>
<section class="book_section layout_padding" id="appointments">
    <div class="container">
      <div class="row">
        <div class="col">
          <form action="#" method="post">
            <h4>
              BOOK <span>APPOINTMENT</span>
            </h4>
            <div class="form-row ">
             
              <div class="form-group col-lg-4">
                <label for="inputDoctorName">Doctor's Name</label>
                <select name="doctor" class="form-control wide" id="inputDoctorName" required>
                  <option value="">--select--- </option>
                  <?php
                  include_once '../connection.php';
                    $DocSelect = "SELECT name, email FROM doctors";
                    $DocQuery = mysqli_query($connection, $DocSelect);

                  while($docRes = mysqli_fetch_assoc($DocQuery)){
                    echo '
                  <option value="'.$docRes['email'].'" required>'.$docRes['name'].'</option>
                 
                  ';}
                  ?>
                </select>
              </div>
              <div class="form-group col-lg-4">
                <label for="inputDepartmentName">Department's Name</label>
                <select name="department" class="form-control wide" id="inputDepartmentName" required>
                <option value="">--select--- </option>
                  <option value="Breast Cancer " required>Breast Cancer </option>
                  <option value="Prostate Cancer " required>Prostate Cancer </option>
                </select>
              </div>
            </div>
            <div class="form-row ">
              <div class="form-group col-lg-4">
                <label for="inputPhone">Phone Number</label>
                <input type="number" class="form-control" id="inputPhone" placeholder="XXXXXXXXXX" name="tel" required>
              </div>
              <div class="form-group col-lg-4">
                <label for="inputSymptoms">Reason</label>
                <input type="text" class="form-control" id="inputSymptoms" placeholder="just type one" name="symptoms" required>
              </div>

              <div class="form-group col-lg-4">
                <label for="inputSymptoms">Choose Time</label>
                <input type="time" class="form-control" id="inputSymptoms" placeholder="just type one" name="time" required>
              </div>

              <div class="form-group col-lg-4">
                <label for="inputDate">Choose Date </label>
                <div class="input-group date" id="inputDate" data-date-format="dd-mm-yyyy" name="date">
                  
                  <input type="date" class="form-control" name="date" required>
                  <span class="input-group-addon date_icon">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="btn-box">
              <button type="submit" class="btn" name="appt">Submit Now</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
<?php
include '../connection.php';
include '../notification.php';

if(isset($_POST['appt'])){
  $aptid = date("dmYsi");
  $email = $_POST['patient'];
  $doctor = $_POST['doctor'];
  $department = $_POST['department'];
  $tel = $_POST['tel'];
  $symptoms = $_POST['symptoms'];
  $date = $_POST['date'];
  $time = $_POST['time'];

  $INSERT = "INSERT INTO appointments values('$aptid','$doctor','$department','$tel','$symptoms','$date','$email','$time')";

  if(mysqli_query($connection, $INSERT)){

     notification($doctor, "You have an appointment", $date);

      echo '
      <script>alert("appointment made")</script>
      ';

      header("refresh:1;url=patient/appointments.php");
  }
  else{
     echo '
      <script>alert("something went wrong try again")</script>
      ';
  }
}
?>