<?php 
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.html");
} else {
  // set example variables
  $filename = "PowerShellForm.7z";
  $filepath = "/";

  // http headers for zip downloads
  

header("Content-disposition: attachment; filename=" . "PowerShellForm.7z");
header("Content-type: application/pdf");
readfile($filePath);
    
}
?>
