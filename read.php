<?php
include_once 'C:\xampp\htdocs\PHPWord\vendor\phpoffice\phpword\samples\Sample_Header.php';

// Read contents
$name = basename(__FILE__, '.php');
$source = "shree ram.docx";

echo date('H:i:s'), " Reading contents from `{$source}`", EOL;
$phpWord = \PhpOffice\PhpWord\IOFactory::load($source);

// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI) {
    include_once 'C:\xampp\htdocs\PHPWord\vendor\phpoffice\phpword\samples\Sample_Footer.php';
}
