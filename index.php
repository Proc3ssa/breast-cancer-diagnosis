<?php
include 'connection.php';
include 'notification.php';

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

//contact

if(isset($_POST['contact'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $message = $_POST['message'];

  $INSERT = "INSERT INTO contacts values('$name','$email','$tel','$message')";
   if(mysqli_query($connection, $INSERT)){
      echo '
      <script>alert("Message sent")</script>
      ';
  }
  else{
     echo '
      <script>alert("something went wrong try again")</script>
      ';
  }
}

//doctors
$DocSelect = "SELECT name, email FROM doctors";
$DocQuery = mysqli_query($connection, $DocSelect);

?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Cancer diagnosis</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- nice select -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
  <!-- datepicker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script>

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBarColors);
google.charts.setOnLoadCallback(breastcancer);

function drawBarColors() {
      var data = google.visualization.arrayToDataTable([
        ['Continent', 'Females', 'Males'],
        ['Asia', 4482515, 5021195],
        ['Africa', 633456, 475753],
        ['North America', 1184860, 1372002],
        ['Latin America and the caribbean', 750007, 720267],
        ['Europe', 2058826, 2339617]
      ]);

      var options = {
        title: 'World Cancer Statistics, 2023',
        chartArea: {width: '50%'},
        colors: ['#b0120a', '#ffab91'],
        hAxis: {
          title: 'Total Population',
          minValue: 0
        },
        vAxis: {
          title: 'Continent'
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }

    // 

    function breastcancer() {
      var data = google.visualization.arrayToDataTable([
        ['Continent', 'cases', ''],
        ['2015', 2389,0 ],
        ['2016', 2545, 0],
        ['2017', 2688, 0],
        ['2018', 2784, 0],
        ['2019', 2902, 0]
      ]);

      var options = {
        title: 'Breast Cancer Diagnosis statistics in Ghana, 2015-2019',
        chartArea: {width: '50%'},
        colors: ['rgb(230, 0, 255)', '#ffab91'],
        hAxis: {
          title: 'Total cases',
          minValue: 0
        },
        vAxis: {
          title: 'Years'
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('cancer'));
      chart.draw(data, options);
    }

  </script>

</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container">
          <div class="contact_nav">
            <a href="">
              
              
            </a>
            <a href="">
              
              
            </a>
            <a href="">
              
              
            </a>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
              <img src="images/logo.png" alt="">
            </a>


            

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="d-flex mr-auto flex-column flex-lg-row align-items-center">
                <ul class="navbar-nav  ">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#about"> About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#treatment">Treatment</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#doctor">Doctors</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#testimonial">Testimonial</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                  </li>
                </ul>
              </div>
              <div class="quote_btn-container">
                <a href="signin.html">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span>
                    Login
                  </span>
                </a>
                <a href="./patient/signup.php">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span>
                    Sign Up
                  </span>
                </a>
                <form class="form-inline">
                  <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                    
                  </button>
                </form>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div class="dot_design">
        <img src="images/dots.png" alt="">
      </div>
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <div class="play_btn">
                      <button>
                        <i class="fa fa-play" aria-hidden="true"></i>
                      </button>
                    </div>
                    <h1>
                       Cancer diagnosis <br>
                      <span>
                        system
                      </span>
                    </h1>
                    <p>
                     Diagnose patients with breast  cancer and prostate cancer with the help of Artificial Intelligene. 
                    </p>
                    <a href="index.php#contact">
                      Contact Us
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <div class="play_btn">
                      <button>
                        <i class="fa fa-play" aria-hidden="true"></i>
                      </button>
                    </div>
                    <h1>
                    Breast Cancer  <br>
                      <span>
                        Diagnosis
                      </span>
                    </h1>
                    <p>
                    With the help of our modern day diagnosis sytem and artifial intelligence, we are able diagnose breast cancer and recommend the best tratment options. 
                    </p>
                    <a href="index.php#contact">
                      Contact Us
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/BRCA_breast_cancer-1024x683.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <div class="play_btn">
                      <button>
                        <i class="fa fa-play" aria-hidden="true"></i>
                      </button>
                    </div>
                    <h1>
                      Prostate Cancer <br>
                      <span>
                        Diagnosis
                      </span>
                    </h1>
                    <p>
                    With the help of our modern day diagnosis sytem and artifial intelligence, we are able diagnose prostate cancer and recommend the best tratment options. 
                    </p>
                    <a href="index.php#contact">
                      Contact Us
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/prostate.png" alt="protate image">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
            <img src="images/prev.png" alt="">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
            <img src="images/next.png" alt="">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>
   
    <!-- //statistics -->
  <div class="statistics">

                <h1>STATISTICS OF CANCER IN GHANA</h1>

      <div class="data">

        <div class="overall">
              <article>
                <h1>Cancer</h1><br>
                <p><b>WHAT IS CANCER? </b> Cancer is a large group of diseases that can start in almost any organ or tissue of the body when abnormal cells grow uncontrollably, go beyond their usual boundaries to invade adjoining parts of the body and/or spread to other organs. The latter process is called metastasizing and is a major cause of death from cancer. A neoplasm and malignant tumour are other common names for cancer.</p>

                <p>
                Cancer is the second leading cause of death globally, accounting for an estimated 9.6 million deaths, or one in six deaths, in 2018. Lung, prostate, colorectal, stomach and liver cancer are the most common types of cancer in men, while breast, colorectal, lung, cervical and thyroid cancer are the most common among women.
                </p>
                <em>source:<a href="https://www.who.int/health-topics/cancer#tab=tab_1">World Health Organization</a></em>

               

              </article>
              
              <div id="chart_div" class="graph">
         
              <p><em>source:<a href="https://www.who.int/health-topics/cancer#tab=tab_1">World Health Organization</a></em></p>
              </div>

        </div>

        <!-- breast cancer -->

        <div class="overall">
              <article>
                <h1>Breast Cancer</h1>
                <p>
                <b>Breast cancer</b> is a disease in which cells in the breast grow out of control. There are different kinds of breast cancer. The kind of breast cancer depends on which cells in the breast turn into cancer.
                </p>

  </p>Most breast cancers begin in the ducts or lobules. Breast cancer can spread outside the breast through blood vessels and lymph vessels. When breast cancer spreads to other parts of the body, it is said to have metastasized.
                </p>

                <p>Deaths caused by breast cancer have been on the rise. In 2019, Ghana registered over 2,900 total deaths due to breast cancer, increasing from the previous year. The number of breast cancer deaths peaked in 2019 as it kept an upward trend since 2000. That year, the number of breast cancer deaths reached 1,336</p>

                <p><em>source:<a href="https://www.statista.com/statistics/1288411/number-of-deaths-from-breast-cancer-in-ghana/">Statista 2023</a></em></p>

              </article>
              
              <div id="cancer" class="graph">

              </div>

        </div>

        <!-- prostate cancer  -->

        <div class="overall">
              <article>
                <h1>Prostate Cancer</h1>

              </article>
              
              <div class="graph">

              </div>

        </div>

      </div>        
     

  </div>

  <!-- book section -->

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
                <label for="inputPatientName">Email </label>
                <input type="email" class="form-control" id="inputPatientName" placeholder="" name="patient" required>
              </div>
              <div class="form-group col-lg-4">
                <label for="inputDoctorName">Doctor's Name</label>
                <select name="doctor" class="form-control wide" id="inputDoctorName" required>
                  <option value="">--select--- </option>
                  <?php

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


  <!-- end book section -->


  <!-- about section -->

  <section class="about_section" id="about">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/about-img.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About <span>Treatments</span>
              </h2>
            </div>
            <p>
             We have Highly qualified nurses and Doctors who takes good care of our patients, and with the help of Artificial Intelligence we are able to diagnose and recommend treatments for our patients withing minuites. 
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->


  <!-- treatment section -->

  <section class="treatment_section layout_padding" id="treatment">
    <div class="side_img">
      <img src="images/treatment-side-img.jpg" alt="">
    </div>
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Hospital <span>Treatment</span>
        </h2>
      </div>
      <div class="row">
       
        
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/t3.png" alt="">
            </div>
            <div class="detail-box">
              <h4>
                Breast Cancer
              </h4>
              <p>
               With the help of our modern day diagnosis sytem and artifial intelligence, we are able diagnose breast cancer and recommend the best tratment options. 
              </p>
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/t4.png" alt="">
            </div>
            <div class="detail-box">
              <h4>
                Prostate Cancer
              </h4>
              <p>
               With the help of our modern day diagnosis sytem and artifial intelligence, we are able diagnose prostate cancer and recommend the best tratment options. 
              </p>
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end treatment section -->

  <!-- team section -->

  <section class="team_section layout_padding" id="doctor">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our <span>Doctors</span>
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel team_carousel">
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="images/team1.jpg" alt="" />
              </div>
              <div class="detail-box">
                <h5>
                  Dr. Agnes Mensah
                </h5>
                <h6>
                  MBBS
                </h6>
                <div class="social_box">
                  <a href="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="images/team2.jpg" alt="" />
              </div>
              <div class="detail-box">
                <h5>
                  Dr. Firdaus Yakub
                </h5>
                <h6>
                  MBBS
                </h6>
                <div class="social_box">
                  <a href="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="images/team3.jpg" alt="" />
              </div>
              <div class="detail-box">
                <h5>
                  Dr. Faisal Dene
                </h5>
                <h6>
                  MBBS
                </h6>
                <div class="social_box">
                  <a href="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end team section -->


  <!-- client section -->
  <section class="client_section layout_padding" id="testimonial">
    <div class="container">
      <div class="heading_container">
        <h2>
          <span>Testimonial</span>
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Sarah
                  </h5>
                  <h6>
                    Breast Cancer Patient
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
              Hi, I'm Sarah, a breast cancer patient. This journey hasn't been easy, but with the support of my amazing healthcare team, family, and friends, I've found strength I never knew I had. Each day brings me closer to healing, and I want others facing this battle to know that they are not alone. Hold onto hope, embrace love, and remember, together, we can overcome anything. Stay strong! - Sarah.
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    John
                  </h5>
                  <h6>
                    Prostate Cancer Patient
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
              I'm John, a prostate cancer patient. The diagnosis was tough, but my healthcare team has been incredible. With their expertise and support from loved ones, I've discovered a strength I didn't know I had. To all facing prostate cancer, know you're not alone. Embrace the journey, stay positive, and believe in your ability to overcome. We're in this together! - John.
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                  Michael
                  </h5>
                  <h6>
                  Prostate Cancer Patient
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
              Greetings, I'm Michael, a prostate cancer patient. When I received the diagnosis, I felt anxious and uncertain, but my medical team's care has been exceptional. With their expertise and the unwavering support of my loved ones, I've found the courage to confront this challenge. To all those battling prostate cancer, remember your strength. Embrace the love around you, cherish each day, and stay positive. Together, we can conquer this! - Michael.
              </p>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

  <!-- contact section -->
  <section class="contact_section layout_padding-bottom" id="contact">
    <div class="container" id="contact">
      <div class="heading_container">
        <h2>
          Get In Touch
        </h2>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="form_container">
            <form action="#" method="post">
              <div>
                <input type="text" placeholder="Full Name"  name="name" required />
              </div>
              <div>
                <input type="email" placeholder="Email" name="email" required/>
              </div>
              <div>
                <input type="text" placeholder="Phone Number" name="tel" required />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" name="message" maxlength="500" required/>
              </div>
              <div class="btn_box">
                <button type="submit" name="contact">
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-5">
          <div class="img-box">
            <img src="images/contact-img.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="info_top">
        <div class="info_logo">
          <a href="">
            <img src="images/logo.png" alt="">
          </a>
        </div>
        <div class="info_form">
          <form action="#" method="post">
            <input type="email" placeholder="Your email">
            <button>
              Subscribe
            </button>
          </form>
        </div>
      </div>
      <div class="info_bottom layout_padding2">
        <div class="row info_main_row">
          <div class="col-md-6 col-lg-3">
            <h5>
              Address
            </h5>
            <div class="info_contact">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
            <div class="social_box">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_links">
              <h5>
                Useful link
              </h5>
              <div class="info_links_menu">
                <a class="active" href="index.html">
                  Home
                </a>
                <a href="about.html">
                  About
                </a>
                <a href="treatment.html">
                  Treatment
                </a>
                <a href="doctor.html">
                  Doctors
                </a>
                <a href="testimonial.html">
                  Testimonial
                </a>
                <a href="contact.html">
                  Contact us
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_post">
              <h5>
                LATEST POSTS
              </h5>
              <div class="post_box">
                <div class="img-box">
                  <img src="images/post1.jpg" alt="">
                </div>
                <p>
                  Normal
                  distribution
                </p>
              </div>
              <div class="post_box">
                <div class="img-box">
                  <img src="images/post2.jpg" alt="">
                </div>
                <p>
                  Normal
                  distribution
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_post">
              <h5>
                News
              </h5>
              <div class="post_box">
                <div class="img-box">
                  <img src="images/post3.jpg" alt="">
                </div>
                <p>
                  Normal
                  distribution
                </p>
              </div>
              <div class="post_box">
                <div class="img-box">
                  <img src="images/post4.png" alt="">
                </div>
                <p>
                  Normal
                  distribution
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end info_section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>


</body>

</html>