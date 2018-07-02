<?php
session_start();
extract($_SESSION);
$source_pdf=$filew;
$output_folder="Output";

    if (!file_exists($output_folder)) { mkdir($output_folder, 0777, true);}
$a= passthru("pdftohtml $source_pdf $output_folder/new_file_name",$b);
var_dump($a);

echo "<script>
window.location = 'output/readpdf.php';
</script>
";
?>