<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="icon" href="loho.png" type="image/icon type">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style type="text/css">
    .image{
      width: 20%;
      float: left;
      margin: 10px;
      
    }
   
    .data{
      width: 50%;
      float: left;
      padding: 20px;
    }
    .row{
      padding: 10px;

    }
    .container{
      padding: 20px;
    }
  </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">KCMT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
   <div id="digital-clock"></div>
  </div>
</nav>

  
<div class="row">
     <div class="col-md"></div>
    <div class="col-md">
      <form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Student Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
    
  </div>
 
  <button type="submit" class="btn btn-primary" name="btn">Submit</button>
  <input type="submit" class="btn btn-warning" name="send_mail" value="Send Mail">
</form>
    </div>
    <div class="col-md"></div>
</div>



<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include 'database.php';
if(isset($_POST["btn"]))
{
  $n=$_POST['name'];
$sql="SELECT * from student where name='{$n}'";
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
  
  $_SESSION['name']=$row["name"];
  $_SESSION["id"]=$row["id"];
  $_SESSION["department"]=$row["department"];
  $_SESSION["conumber"]=$row["conumber"];
  ?>



<div class="row">

 
<div class="container">
  
  <a href="gate_entry.php">
<div class="image">
      <img src="demo.jpeg" width="100%">
</div>
  
<div class="data">
    <?php  echo $row["name"];?><br>
    <?php  echo $row["conumber"];?><br>
    <?php  echo $row["department"];?><br> 
    </div>
    
  </div>
</a>

</div>  
  </div>
<?php
  }
  }

if (isset($_POST['send_mail'])) {

require 'PHPMailer\PHPMailer\src\Exception.php';
require 'PHPMailer\PHPMailer\src\PHPMailer.php';
require 'PHPMailer\PHPMailer\src\SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ramangoyal87021@gmail.com';
    $mail->Password = 'lwscczvcprtjdaqe';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('ramangoyal870@gmail.com', 'Raman');
    $mail->addAddress('goyall87021@gmail.com', 'Suraj');
    $mail->Subject = 'CSV File Attachment';
    $mail->Body = 'Please find the attached CSV file.';
    $mail->addAttachment('Student.csv');

    $mail->send();
    echo '<div class="bg-success py-2 text-white">Email sent successfully.</div>';
} catch (Exception $e) {
    echo '<div class="bg-danger py-2 text-white">Failed to send email. Error: ' . $mail->ErrorInfo.'</div>';
}


try{

  unlink("Student.csv");
}
catch(Exception $ex)
{
  echo "File Not Present";
}
}
?>


</body>
</html>

<script>
        function updateClock() {
            let currentTime = new Date();
            let hours = currentTime.getHours();
            let minutes = currentTime.getMinutes();
            let seconds = currentTime.getSeconds();

            // Add leading zeros to numbers if they are less than 10
            hours = (hours < 10) ? '0' + hours : hours;
            minutes = (minutes < 10) ? '0' + minutes : minutes;
            seconds = (seconds < 10) ? '0' + seconds : seconds;

            let timeString = hours + ':' + minutes + ':' + seconds;
            document.getElementById('digital-clock').innerText = timeString;
        }

        // Call the function to update the clock every second
        setInterval(updateClock, 1000);

        // Initial call to display the time immediately
        updateClock();
    </script>