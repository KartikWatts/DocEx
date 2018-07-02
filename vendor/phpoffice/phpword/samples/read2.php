<?php
session_start();
extract($_POST);
$_SESSION['font_limit']= $font_limit;
include_once 'Sample_Header.php';

extract($_SESSION);
echo "Font Limit:". $font_limit."<br>";
// Read contents
$name = basename(__FILE__, '.php');
$source = $filew;

echo date('H:i:s'), " Reading contents from `{$source}`", EOL;
$phpWord = \PhpOffice\PhpWord\IOFactory::load($source);

// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI) {
    include_once 'Sample_Footer.php';
}

//header("Location: readfile.php");
echo "<script>
window.location = 'readfile.php';
</script>
";
?>