<?php

    session_start();
    if(isset($_POST['sub'])){
    
        $targetfile = basename( $_FILES['file']['name']) ;

        $ok=1;

        $file_type= strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));

        /*if ($file_type=="txt") {

            $_SESSION['type']="txt";
            if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfile))

            {

            echo "The file ". basename( $_FILES['file']['name']). " is uploaded";

            $_SESSION["file"]= basename( $_FILES['file']['name']);
            
            header("Location: extract.php");

            }
        }
        */
        if($file_type=="docx"){
            $_SESSION['type']="docx";
            if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfile))
            {
                $docxObj = new DocxConversion($targetfile);
                $text= $docxObj->convertToText();
                $_SESSION['text']=$text;
                echo "The file ". $targetfile. " is uploaded";
                $_SESSION['filew']=$targetfile; 

                //header("Location: read2.php");

?>


                <form action="read2.php" method="post">
                    <label for="text">Select Font-Size Upper Limit to Extract Header</label>
                    <br>
                    <select required name="font_limit" style=" width:100%; height:50px; font-weight:bold; font-size:25px; ">
                        <option value="14">14</option>
                        <option value="15" selected>15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>
                    <br>
                    <input type="submit" value="Extract Headers">
                </form>

<?php
                /*echo "<script>
                window.location = 'read2.php';
                </script>
                ";*/
            }
        }
        
        if($file_type=="pdf"){
            $_SESSION['type']="pdf";
            if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfile))
            {
                echo "The file ". $targetfile. " is uploaded";
                $_SESSION['filew']=$targetfile; 

                //header("Location: read2.php");

                echo "<script>
                window.location = 'pdf/pdftohtml.php';
                </script>
                ";
            }
        }
        else {

        echo "You may only upload 'DOCX' or 'PDF' files<br>";

        }
    }


    class DocxConversion{
        private $filename;
    
        public function __construct($filePath) {
            $this->filename = $filePath;
        }
    
        private function read_doc() {
            $fileHandle = fopen($this->filename, "r");
            $line = @fread($fileHandle, filesize($this->filename));   
            $lines = explode(chr(0x0D),$line);
            $outtext = "";
            foreach($lines as $thisline)
              {
                $pos = strpos($thisline, chr(0x00));
                if (($pos !== FALSE)||(strlen($thisline)==0))
                  {
                  } else {
                    $outtext .= $thisline." ";
                  }
              }
             $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext);
            return $outtext;
        }
    
        private function read_docx(){
    
            $striped_content = '';
            $content = '';
    
            $zip = zip_open($this->filename);
    
            if (!$zip || is_numeric($zip)) return false;
    
            while ($zip_entry = zip_read($zip)) {
    
                if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
    
                if (zip_entry_name($zip_entry) != "word/document.xml") continue;
    
                $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
                //print_r($content);
                //echo "<br>";
                
                zip_entry_close($zip_entry);
            }// end while
    
            zip_close($zip);
    
            $content = str_replace('</w:r></w:p></w:tc><w:tc>', "n", $content);
            $content = str_replace('</w:r></w:p>', "\r\n", $content);
            $striped_content = strip_tags($content);
    
            return $striped_content;
        }
        
        public function convertToText() {
    
            if(isset($this->filename) && !file_exists($this->filename)) {
                return "File Not exists";
            }
    
            $fileArray = pathinfo($this->filename);
            $file_ext  = $fileArray['extension'];
            if($file_ext == "doc" || $file_ext == "docx" || $file_ext == "xlsx" || $file_ext == "pptx")
            {
                if($file_ext == "doc") {
                    return $this->read_doc();
                } elseif($file_ext == "docx") {
                    return $this->read_docx();
                } elseif($file_ext == "xlsx") {
                    return $this->xlsx_to_text();
                }elseif($file_ext == "pptx") {
                    return $this->pptx_to_text();
                }
            } else {
                return "Invalid File Type";
            }
        }
    
    }

?>