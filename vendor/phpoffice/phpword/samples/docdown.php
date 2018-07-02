<?php

session_start();
extract($_POST);

$docx=str_replace("<br>", "\n",$docx);

$docxd= str_replace("\n","<br>",$docx);
$_SESSION['docx_data']=$docxd;
file_put_contents('finaloutput.txt', $docx);

header("Location:docx.php");
?>