<?php
session_start();
extract($_SESSION);
  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=document_name.doc");    
  echo "<html>";
  echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
  echo "<body>";
  echo "<h2>Table of Contents</h2>";
  echo $docx_data;
  echo "</body>";
  echo "</html>";
?>