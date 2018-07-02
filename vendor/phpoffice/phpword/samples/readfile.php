<?php
session_start();
extract($_SESSION);
echo '
<input type="text" id="font_limit" value="'.$font_limit.'">';

//echo "Original File: <br>";
$str= file_get_contents("results/read2.html");
//echo $str;

$strnew=str_replace("</body>
</html>", '
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

<script>
var l1=document.getElementById("font_limit").value;
console.log("Ye Limit="+ l1);
</script>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>

<script>
var fontSize=[];
for(i=1;i<=700;i++){
    var el = document.getElementsByClassName("T"+i)[0];
    console.log("Size For T"+i+" :");
    var style = window.getComputedStyle(el, null).getPropertyValue("font-size");
    fontSize[i] = parseFloat(style); 
    // now you have a proper float for the font size (yes, it can be a float, not just an integer)
    console.log(fontSize[i]);
}
</script>

<script>
for(i=0;i<3000;i++){
    //document.getElementsByTagName("p")[i].style.display = "none";
    document.getElementsByTagName("TABLE")[i].style.display = "none";
    }
</script>
<script>

var l1=document.getElementById("font_limit").value;
console.log("Ye Limit="+ l1);

for(i=1;i<700;i++){
    if(typeof(fontSize[i])=="number"){
        if(fontSize[i]>l1){
            console.log("hua");
            document.getElementsByTagName("p")[i].style.visibility = "block";         
            document.getElementsByClassName("T"+i)[0].style.visibility = "block";
        }
        else{
            document.getElementsByClassName("T"+i)[0].style.visibility = "hidden";
        }
    }
    else{
        document.getElementsByClassName("T"+i)[0].style.visibility = "hidden";
        console.log("hua else");
    }
}
</script>

<script>

var dv = document.getElementById("content_toc");
var indv= document.getElementById("input_toc");

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
    var xtt=[];
    var sn=1;
    
var l1=document.getElementById("font_limit").value;
console.log("Ye Limit="+ l1);

for(i=1;i<700;i++){
    
    if(typeof(fontSize[i])=="number"){
        if(fontSize[i]>l1){
            console.log("hua inner vaala kaam");         
            xtt[i]=document.getElementsByClassName("T"+i)[0].innerHTML;
            console.log(xtt[i]);
            dv.innerHTML += sn+". "+xtt[i]+"<br>";
            indv.innerHTML += sn+". "+xtt[i]+"<br>";
            sn++;
        }
        else{
            document.getElementsByClassName("T"+i)[0].remove();
        }
    }
    else{
        document.getElementsByClassName("T"+i)[0].remove();
        console.log("hua else");
    }
}

</script>

<script>
jQuery(function(){
   jQuery("#docBtn").click();
});
</script>

</body>
</html>',$str);

//file_put_contents('read2new.html', $strnew);

echo $strnew;
//header("Location:read2new.html");
/*echo "<script>
window.location = 'read2new.html';
</script>
";*/
?>