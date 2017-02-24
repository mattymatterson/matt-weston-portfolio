<?php 
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.html");
} else {
  // set example variables
  $filename = "PowerShellForm.7z";
  $filepath = "/";

  // http headers for zip downloads
    
    header('Content-disposition: attachment; filename=' . $filename);
    header('Content-type: application/zip');
    readfile($filename);
}
?>
