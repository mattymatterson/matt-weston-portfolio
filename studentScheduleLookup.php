<?php 
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.html");
} else {
  // set example variables
  $filename = "PowerShellForm.7z";
  $filepath = "/";

  // http headers for zip downloads
  
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    // read the file from disk
    readfile($file);
  @readfile($filepath.$filename);
}
?>
