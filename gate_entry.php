<?php
session_start();
include 'database.php';
$n= $_SESSION["id"];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="icon" href="loho.png" type="image/icon type">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">
	.form{
		width: 100%;
		position: absolute;
		left: 25%;
		width: 50%;
		box-shadow: 2px 3px 3px 3px gray;
		padding: 20px;
	}
	input{
		width: 100%;
		height: 35px;
	}
textarea{
	width: 100%;
	height: 70px;
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
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
    <form class="form-inline my-2 my-lg-0">
        <div id="digital-clock" name="current_time"></div>
    </form>
  </div>
</nav>

<div>
	<?php


	$sql="SELECT * from student where id='{$n}'";
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
	?>	
<div class="col-3" ></div>
</div>
<div class="row">
	<div>
<form class="form" method="post">
	<h2 class="bg-primary text-white px-2 py-2">Student Details</h2>
	<label>Name</label>
	<input type="text" name="name" value='<?php  echo strtoupper( $row["name"]);?>' readonly>
	<label>Number</label>
	<input type="text" name="num" value="<?php  echo $row['conumber'];?>" readonly>

	<label>Department</label>
  <?php
  $did=$row["department"];

$sql="SELECT name from  department where id='{$did}'";
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {

  ?>
	<input type="text" name="dprt" value="<?php  echo strtoupper( $row['name']);?>" readonly>
  <?php
}
?>
	<label>Reason</label><br>
	<textarea name="reason"></textarea><br>
	<input type="hidden" name="time" id="currentime" value="<?php echo $currentDateTime;?>">
	<input type="submit" class="btn bg-primary my-3" name="btn">
	
</form>
</div> 		
</div>
</div>
<?php }

$dept=array('ZOOLOGY DEPTT.', 'BOTANY DEPTT.', 'BIOTECH.', 'CHEMISTRY DEPTT.', 'MATHS DEPTT.', 'PHYSICS DEPTT.', 'HOME SC. DEPTT.', 'EDUCATION DEPTT.', 'MANAGEMENT', 'COMPUTER');

if(isset($_POST["btn"]))
{
  $n=$_POST['name'];
  $num=$_POST['num'];
  $d=$_POST['dprt'];
  $r=$_POST['reason'];
  $t=$_POST['current_time'];

  
if (in_array($d, $dept))
{
$csvFilePath = $d.".csv";
$newData = [
    [$n, $num, $d,$r,$t]];

// CSV file path
// Open the CSV file in append mode
$csvFile = fopen($csvFilePath, 'a');
foreach ($newData as $data) {
    fputcsv($csvFile, $data);
}

// Close the CSV file
fclose($csvFile);

}
else{
  echo "File Already Created";
}
$csvFilePath = "Student.csv";
$newData = [
    [$n, $num, $d,$r,$t]];

// CSV file path
// Open the CSV file in append mode
$csvFile = fopen($csvFilePath, 'a');

// Loop through the new data and insert it into the CSV file
foreach ($newData as $data) {
    fputcsv($csvFile, $data);
}

// Close the CSV file
fclose($csvFile);

$sql="INSERT INTO inqury_data(name,dprt,contact,reason) values('{$n}','{$num}','{$d}','{$r}')";
$result=mysqli_query($conn,$sql);
header("Location: index.php");
}






?>
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

</body>
</html>


