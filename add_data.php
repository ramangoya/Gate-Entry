<?php

include "database.php";
?>

<div class="row my-5">
	<div class="col-md-3">
	</div>
	<div class="col-md-6">
<form method="post" enctype= multipart/form-data>
	<h1 class="bg-primary text-white py-2 px-2">Upload Notes</h1>
	<input type="text" name="name" placeholder="Enter The Notes Name" style="width: 100%;height: 35px;" class="my-1">



	<select style="width: 100%;height: 35px;" class="my-1" name="dept">
		<option>-------------------------</option>
<?php

$sql="SELECT * from department";
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
  
   echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
 }?>
	</select>
	<input type="text" name="contact"  class="my-1" id="myTime" value="" style="width: 100%;height: 35px;" class="my-1">
	
	
	<input type="file" name="photo">
	<input type="submit" name="btn" style="width: 100%;height: 35px;" class="my-1">
</form>		
	</div>
</div>
<?php
if (isset($_POST['btn'])) {

$name = $_POST["name"];
$dept = $_POST["dept"];
$con = $_POST["contact"];
$data = $_FILES["photo"]["name"];
$stempname = $_FILES["photo"]["tmp_name"];
$folder1 = "Student_photo/".$data;
move_uploaded_file($stempname, $folder1);
$sql="INSERT INTO student(name,conumber,department,photo)values('{$name}','{$con}','{$dept}','{$data}')";
mysqli_query($conn, $sql);



					

}

?>

