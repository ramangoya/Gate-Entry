<?php
// Data to be inserted
// $newData = [
//     ['John Doe', 'john@example.com', 'New York'],
//     ['Jane Smith', 'jane@example.com', 'Los Angeles'],
//     ['Alex Johnson', 'alex@example.com', 'Chicago']
// ];

// // CSV file path
// $csvFilePath = 'data.csv';

// // Open the CSV file in append mode
// $csvFile = fopen($csvFilePath, 'a');

// // Loop through the new data and insert it into the CSV file
// foreach ($newData as $data) {
//     fputcsv($csvFile, $data);
// }

// // Close the CSV file
// fclose($csvFile);

// echo "Data inserted into the CSV file successfully.";
?>


<?php


// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer\PHPMailer\src\Exception.php';
// require 'PHPMailer\PHPMailer\src\PHPMailer.php';
// require 'PHPMailer\PHPMailer\src\SMTP.php';

// $mail = new PHPMailer(true);

// try {
//     $mail->isSMTP();
//     $mail->Host = 'smtp.gmail.com';
//     $mail->SMTPAuth = true;
//     $mail->Username = 'ramangoyal87021@gmail.com';
//     $mail->Password = 'lwscczvcprtjdaqe';
//     $mail->SMTPSecure = 'tls';
//     $mail->Port = 587;

//     $mail->setFrom('ramangoyal870@gmail.com', 'Raman');
//     $mail->addAddress('goyall87021@gmail.com', 'Suraj');
//     $mail->Subject = 'CSV File Attachment';
//     $mail->Body = 'Please find the attached CSV file.';
//     $mail->addAttachment('Student.csv');

//     $mail->send();
//     echo 'Email sent successfully with PHPMailer.';
// } catch (Exception $e) {
//     echo 'Failed to send email. Error: ' . $mail->ErrorInfo;
// }
?>

<?php
// // The Python script you want to execute
// $pythonScript = "print('Hello from Python executed via PHP')";

// // Write the Python script to a file
// $pythonFile = "example.py";
// file_put_contents($pythonFile, $pythonScript);

// // Execute the Python script from PHP
// $output = shell_exec('python ' . $pythonFile);

// // Display the output
// echo "Output from Python script: <br>";
// echo "<pre>$output</pre>";

// // Delete the Python file
// unlink($pythonFile); // Clean up and remove the Python file after execution
?>
<script type="text/javascript">
var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

var urlencoded = new URLSearchParams();
urlencoded.append("token","YourToken");
urlencoded.append("to","16315555555");
urlencoded.append("body","WhatsApp API on alvochat.com works good");
urlencoded.append("priority","");
urlencoded.append("preview_url","");
urlencoded.append("message_id","");


var requestOptions = {
  method: 'POST',
  headers: myHeaders,
  body: urlencoded,
  redirect: 'follow'
};

fetch("https://api.alvochat.com/instance1199/messages/chat", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
  </script>