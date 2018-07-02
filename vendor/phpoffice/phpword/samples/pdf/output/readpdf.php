<?php
//echo "Original File: <br>";
$str= file_get_contents("new_file_names.html");
//echo $str;

$strnew=str_replace("</BODY>
</HTML>", '
<div style="font-size: 15px; text-align:center;"> 
<h1><u> Table of Contents </u></h1>
<div style="font-size: 25px;" id="content_toc"></div>
</div>
<div style="text-align:center">
    <form method="POST" action="docdown.php">
        <textarea rows="4" cols="50" hidden id="input_toc" name="docx">

        </textarea>
        <input type="submit" id="docBtn" value="Get Content List">
    </form>
</div>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>

<script>

    var i;
    var boldarr=[];
    var xtt=[];
    var dv = document.getElementById("content_toc");
    var indv= document.getElementById("input_toc");
    var sn=1;

    Element.prototype.remove = function() {
        this.parentElement.removeChild(this);
    }
    NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
        for(var i = this.length - 1; i >= 0; i--) {
            if(this[i] && this[i].parentElement) {
                this[i].parentElement.removeChild(this[i]);
            }
        }
    }

    for(i=0;i<200;i++){
        boldarr[i]= document.getElementsByTagName("b")[i];
        xtt[i]=boldarr[i].innerHTML;
        console.log(xtt[i]);
        dv.innerHTML += sn+". "+xtt[i]+"<br>";
        indv.innerHTML += sn+". "+xtt[i]+"<br>";
        sn++;
    }
</script>

<script>
jQuery(function(){
   jQuery("#docBtn").click();
});
</script>

</BODY>
</HTML>'
,$str);

//file_put_contents('read2new.html', $strnew);
echo $strnew;

//header("Location:read2new.html");
/*echo "<script>
window.location = 'read2new.html';
</script>
";*/
?>