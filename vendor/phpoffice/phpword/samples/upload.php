<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>File Extract</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


    <div class="bg-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact100">
			<div class="wrap-contact100">
				<div class="contact100-pic js-tilt" data-tilt>
					<img src="images/doc.png" alt="IMG">
				</div>

				<form class="contact100-form validate-form" action="upload2.php" method="post" enctype="multipart/form-data">
					<span class="contact100-form-title">
						Upload your File
					</span>

                    <div>
						<input class="input100" style="padding:5px;" type="file" name="file">
					</div>
					
					<div class="container-contact100-form-btn">
						<button class="contact100-form-btn" name="sub">
							Upload
						</button>
					</div>
					
					<div style="margin-top:20px; text-align:center;">
						<a href="#" onclick="myFunction()">
							<h5>
								How It Works?
							</h5>
						</a>
					</div>
					<div id="myDIV" style="margin-top:20px; display:none; background:rgba(200,200,200,0.9); border-radius: 5px; padding:15px;">
						<b>DOCX FIle</b>
						<p>All the Font size above 15 will be extracted as Header</p>  
						<b>PDF FIle</b>
						<p>All the Text which is bold will be extracted as Header</p>  
					
					</div>
				</form>
			</div>
		</div>
	</div>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<script>
	function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>

</body>
</html>

