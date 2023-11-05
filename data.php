<?php
require 'vendor/autoload.php'; // Include the autoload file from PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create a new PhpSpreadsheet object
$spreadsheet = new Spreadsheet();

// Add a worksheet
$sheet = $spreadsheet->getActiveSheet();

// Define the image path
$imagePath = 'images/6544be989cefb.png'; // Replace 'path_to_your_image' with the path to your image

// Add the image to the worksheet
$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Image');
$drawing->setDescription('Image Description');
$drawing->setPath($imagePath);
$drawing->setCoordinates('A1'); // Position of the image in the worksheet
$drawing->setOffsetX(5); // Horizontal offset in pixels
$drawing->setOffsetY(5); // Vertical offset in pixels
$drawing->setWorksheet($sheet);

// Save the Excel file
$writer = new Xlsx($spreadsheet);
$excelFileName = 'image_in_excel.xlsx'; // Name for the Excel file
$writer->save($excelFileName);

echo "Image added to Excel file: $excelFileName";
?>
