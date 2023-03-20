<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="layout/styles/fontawesome-free/css/fontawesome-all.min.css">

<!--js script here-->
<script>
    function servDoc() {
  var serv = new XMLHttpRequest();
  serv.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById('meg').innerHTML = this.responseText;
    }
  };
  serv.open("GET", "services.html", true);
  serv.send();
}
</script>
<!--js_ends here-->

</head>
<body>
<!--Header/Navigation menu-->
<?php
include 'nav.html';
?>

<!###################################################################################################>
<!###################################################################################################>
<!--Main Contetnt1-->
<div class="container-fluid" style="background-image: url(img/albari.jpg); background-size: cover; background-repeat: no-repeat;">
	<div class="row" id="meg" style="color: whitesmoke;">
		<div class="col-md-6">

			<!--media_Query styling here-->
			<style>
				@media screen and (max-width: 680px)
				{
					.desci {
						width: 20.3em;
					}
					h4 {
						margin-left: -9.5em;
					}
					p {
						margin-left: -18.4em;
					}
				}
			</style>
			<!--Media_Query styling ends here-->
			<div class="desci" style="color: whitesmoke; margin: auto;">
				<div class="merg" id="desc" style="margin-left: 20em; ">
					<h4 style="margin-top: 3em; margin-bottom: 0.9em;">
						<strong>
							Your Online Accounting<br /> <span>Department</span>
						</strong>
					</h4>
					<p>
						We provide online Bookkeeping, Accounting Services, and expert financial advice for small businesses - giving you more time to grow !
					</p>
				</div>
			</div>
		</div>

		<div class="col-md-6" style="">
			<!--form_here-->
			<div class="gt_intouch" style="margin-top: 2em; margin-left: ; font-weight: bold; opacity: 0.9; margin-bottom: 2em; width: 20em; background-color: #000000; color: whitesmoke;" align="center">
				<h6 style="margin-top: 2em; margin-bottom: 2em;">
					<strong>Get In touch and one of <br /> our team of experts will contact you for your free<br /> consultation</strong>
				</h6>
<!--Form logic start here --->
<?php 
include 'inc/dbconnect.php';

			// Send email to new user
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            require 'phpmailer/src/PHPMailer.php';
            require 'phpmailer/src/Exception.php';
            require 'phpmailer/src/SMTP.php';


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //initializing variables 
       $first_name = $_POST['first_name'];
       $last_name = $_POST['last_name'];
       $email = $_POST['email'];
       $phone = $_POST['phone'];

       if (empty($first_name) && empty($last_name) && empty($email) && empty($phone)) {
       	// code...
       		?>
       			<div class="error">
       				<h5>Please fill this fields</h5>
       			</div>
       		<?php
       }else{
       		$first_name = stripslashes($_POST['first_name']);
       		$last_name =  stripslashes($_POST['last_name']);
       		$email = stripslashes($_POST['email']);
       		$phone =  stripslashes($_POST['phone']);

       $sql = "INSERT INTO `customer_data` (`first_name`, `last_name`, `email`, `phone`) 
       			VALUES ('$first_name', '$last_name', '$email', '$phone')";
       		$result = @mysqli_query($dbconn, $sql);
       		if ($result) {
       		

            $mail = new PHPMailer;

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'henrybryan53@gmail.com';           // SMTP username
            $mail->Password = 'ciuhdfmthfzjdsay';              	  // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom('henrybryan53@gmail.com', 'HenryBryan');
            $mail->addAddress($email);                            // Add recipient

            $mail->Subject = 'Welcome to Our Website';
            $mail->Body    = 'Dear ' . $first_name . ',<br><br>Thank you for registering on our website.<br><br>Best regards,<br>HenryBryan';
            $mail->AltBody = 'Dear ' . $first_name . ',\n\nThank you for registering on our website.\n\n 
            				 <p class="link">Click here to <a href="login.php">Contact Us</a></p>Best regards,\nHenry HenryBryan';

            if(!$mail->send()) {
                echo "<div class='form'>
                      <h3>You are registered successfully, but there was an error sending the confirmation email.</h3><br/>
                      <p class='link'>Click here to <a href='login.php'>Contact Us</a></p>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h5>You are registered successfully. A confirmation email with your Login detais has been sent to your email address.</h5><br/>
                      <p class='link'>Click here to <a href='login.php'>Login</a></p>
                      </div>";
            }
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
         }
 	 
 	 }
 
 }

?>
<!--- Form logic ends here --->
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"> <!--- dont forget to use java script validation --->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group" style="margin-bottom:0.3em; margin-left: 1em;" align="left">
								<label class="label" for="first_name" style="margin-right: 2em;">First Name <span style="color: red;">*</span></label>
								<input type="text" class="form-group" name="first_name" id="firstname" style="width: 8em; margin-right: 2px;">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" style="margin-bottom:0.3em; margin-right: 1em;">
								<label class="label" for="last_name" style="margin-right: 2.4em;">Last Name <span style="color: red;">*</span></label>
								<input type="last_name" class="form-group" name="last_name" id="lastname" style="width: 8em; margin-left: 2px;"><br />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" style="margin-bottom:0.3em; margin-left: 1em;">
								<label class="label" for="Email" style="margin-right: 4.7em;">Email <span style="color: red;">*</span></label>
								<input type="text" class="form-group" name="email" id="email" style="width: 17em; margin-left: 2px;">
							</div>
						</div><br />
						<div class="col-md-6">
							<div class="form-group" style="margin-bottom:0.3em; margin-left: 1em;">
								<label class="label" for="Phone" style="margin-right: 0.3em;">Phone Number <span style="color: red;">*</span></label>
								<input type="tel" class="form-group" name="phone" id="phone" minlength="9" maxlength="15" style="width: 17em; margin-left: 2px;">
							</div>
						</div>
						<div class="free_con" style="margin-bottom: 2em; margin-top: 1em; margin-left: 1em;">
							<input type='submit' class="btn btn-light" style="background: skyblue; cursor: pointer; border: none; font-weight: bold; padding: 6px 28px; margin: 4px 2px; color: white; float: left;" value="Free Conslutation"></button>
						</div>
					</div>					
				</form>
			</div>
		</div>
	</div>
</div>


<!--js form validationstart-->
<script type="text/javascript">
function val(){
	//declaring variables
	var firstname = document.getElementById('firstname');
	var lastname = document.getElementById('lastname');
	var email = document.getElementById('email');
	var phone = document.getElementById('phone');

	//checking variables
if (notempty(firstname, "please fill in this field")) {
	if (notempty(lastname, "Please fill in the field")){
		if (isAlphabet(firstname, "Please use only letters")) {
			if (isAlphabet(lastname, "please use only letters")) {
				if (emailVal(email, "please use a valid email")) {
					if (isNumeric(phone, "please use a valid phone number")) {
					}else{
						window.location = "services.html";
						return true;
					}
				}
			}
		}
	}
		return false;
}

function notempty(details, respMesg){
	if(details.value.length == 0){
		alert(respMesg);
		details.focus();
		return false;
	}
	return true;
}


function isAlphabet(details, respMesg){
	var alphaExp = /^[a-zA-Z]+$/;
	if (details.value.match(alphaExp)) {
			return true;
	}else{
			alert(respMesg);
			details.focus();
			return false;
	}
}


function emailVal(details, respMesg){
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		if(details.value.match(emailExp)){
			return true;
		}else{
			alert(respMesg);
			details.focus();
			return false;
		}
}

function isNumeric(details, respMesg){
	var numericExpression = /^[0-9]+$/;
	if(details.value.match(numericExpression)){
		return true;
	}else{
		alert(respMesg);
		details.focus();
		return false;
	}
}

</script> <!--######### This was where my error was the script was missing a 't'a the end of the spelling may be yours might be different #########-->
<!--js form validation-ends-->


<!--Main Contetnt2-->
<div class="container-fluid">
	<div class="row" style="background-color: #99ccff;">
		<div class="col-md-12" align="center">
			<div class="ent_guide">
				<h6 style="margin-top: 3%; margin-bottom: 1.5%;">
				<span style="color: whitesmoke; font-weight: bold;">Entrepreneur's Guide -</span> <span style="color: whitesmoke;">six questions about your bsiness that your accountant should answer.</span>
				</h6>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP SELF']);?>" method="POST" style="margin-bottom: 3%;">
					<input type="text" name="email" placeholder="email address" style="padding: 8px 32px; border: none;">
					<input type="button"  style="background-color: #206040; font-weight: bold; padding: 8px 32px; color: whitesmoke; cursor: pointer; border: none; margin: 4px 2px;" value="GET ME FREE COURSES">
				</form>
			</div>
		</div>
	</div>
</div>

<!--Main Contetnt3-->
<div class="container-fluid">
	<div class="row">
		<div class="...">
			
		</div>
	</div>
</div>


<!###################################################################################################><!###################################################################################################>
<!--Footer-->
<?php
include 'footer.html';
?>

<script src="jQuery/jquery.min.js"></script>
<script src="jQuery/jquery-3.5.1.min.js"></script>
<script src="jQuery/jquery-3.0.0.min.js"></script>
<script src="jQuery/bootstrap.bundle.min.js"></script>
<script src="jQuery/popper.min.js"></script>
<script src="jQuery/bootstrap.js"></script>
<script src="jQuery/bootstrap.min.js"></script>
</body>
</html>





