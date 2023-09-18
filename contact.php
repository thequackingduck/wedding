<?php
include 'db_connect.php';
$msg="";
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
	$firstname=mysqli_real_escape_string($con,$_POST['firstname']);
    $lastname=mysqli_real_escape_string($con,$_POST['lastname']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$subject=mysqli_real_escape_string($con,$_POST['subject']);
	$message=mysqli_real_escape_string($con,$_POST['message']);
	
	mysqli_query($con,"INSERT INTO contact(firstname, lastname, email, subject, message) VALUES('$firstname', '$lastname', '$email','$subject','$message')");
	$msg="Thanks message";
	
	$html="<table>
                <tr>
                    <td>Name: </td> <td>$firstname $lastname</td>
                </tr>
                <tr>
                    <td>Email: </td><td>$email</td>
                    </tr>
               
                <tr>
                    <td>Message: </td><td>$message</td>
                </tr>
            </table>";
	
	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="justinlomodcorpuz0626@gmail.com";
	$mail->Password="hvllzbamtntsdhjh";
	$mail->SetFrom($email);
	$mail->addAddress("justinlomodcorpuz0626@gmail.com");
	$mail->IsHTML(true);
	$mail->Subject=$subject;
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		header('location:contact.php');
	}else{
		
	}
	echo $msg;
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Abrar & Aljosa</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />

	<!-- Favicons -->
	<link href="/images/diamond.png" rel="icon">

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet'
		type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>

	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<style>
	@font-face {
  font-family: 'OraSepira';
  src: url("fonts/Ora_Sepira/Ora_Sepira_Regular.woff") format('woff');
  font-weight: normal;
  font-style: normal;
}
label, input, h3, li, .form-control, a{
	color: white;
}
</style>

<body>

	<div class="fh5co-loader"></div>

	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="container">
				<div class="row nav">
					<div class="col-xs-5">
						<div id="fh5co-logo">
							<a href="index.html"><img src="images/diamond.png" class="logo">
							</a>
						</div>
					</div>
					<div class="col-xs-7 text-right menu-1">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="reservation.php">Reservation</a></li>
							<li class="active"><a href="contact.php">Contact Us</a></li>
						</ul>
					</div>
				</div>

			</div>
		</nav>

		<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/header1.jpg);">
			<div class="overlay"></div>
			<div class="fh5co-container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="display-t">
							<div class="display-tc animate-box" data-animate-effect="fadeIn">
								<h1 style="font-family: 'OraSepira';">Contact Us</h1>
								<h2>We're here to help! Use the contact information below to connect with us and let us know how we can assist you in making our wedding day even more special.</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div class="fh5co-section" role="banner" style="background-image:url(images/timeline.png);  background-size: cover; background-repeat: no-repeat;">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-push-6 animate-box">
						<h3 style="color: #fff">Get In Touch</h3>
						<form method="POST" id="form-contact">
							<div class="row form-group">
								<div class="col-md-6">
									<label for="fname">First Name</label>
									<input type="text" id="fname" name="firstname" class="form-control" placeholder="Enter firstname">
								</div>
								<div class="col-md-6">
									<label for="lname">Last Name</label>
									<input type="text" id="lname" name="lastname" class="form-control" placeholder="Enter lastname">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="email">Email</label>
									<input type="text" id="email" name="email" class="form-control" placeholder="Enter email address">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="subject">Subject</label>
									<input type="text" id="subject" name="subject" class="form-control" placeholder="Enter subject of this message">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="message">Message</label>
									<textarea name="message" id="message" name="message" cols="30" rows="10" class="form-control" placeholder="Write us something"></textarea>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" value="Send Message" id="submit" name="send" class="btn btn-primary">
								<span style="color:red;"><?php echo $msg; ?></span>
							</div>
						</form>
					</div>
					<div class="col-md-5 col-md-pull-5 animate-box">

						<div class="fh5co-contact-info">
							<h3>Contact Information</h3>
							<ul>
								<li class="phone"><a href="tel:+639150429454">(+63) 915 042 9454</a></li>
								<li class="phone"><a href="tel:+639171257246">(+63) 917 125 7246</a></li>
								<li class="phone"><a href="tel:+639762662794">(+63) 976 266 2794</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</div>


	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Google Map -->
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>

	<!-- Main -->
	<script src="js/main.js"></script>
	<script src="https://smtpjs.com/v3/smtp.js"></script>

	<!-- <script>
	  jQuery('#form-contact').on('submit',function(e){
		jQuery('#msg').html('');
		jQuery('#submit').html('Please wait');
		jQuery('#submit').attr('disabled',true);
		jQuery.ajax({
			url:'submit.php',
			type:'post',
			data:jQuery('#form-contact').serialize(),
			success:function(result){
				jQuery('#msg').html(result);
				jQuery('#submit').html('Submit');
				jQuery('#submit').attr('disabled',false);
				jQuery('#form-contact')[0].reset();
			}
		});
		e.preventDefault();
	  });
	  </script> -->

	<!-- <script>
		function Send(){
			Email.send({
				Host: "smtp.elasticemail.com",
				Username: "justinlomodcorpuz0626@gmail.com",
				Password: "43CC56AC73EC41954E230A990CEFA96B8FCB",
				To: 'justinlomodcorpuz0626@gmail.com',
				From: "justlomodcorpze06262@gmail.com",
				Subject: "This is the subject",
				Body: "And this is the body"
			}).then(
				message => alert(message)
			);
		}



	</script> -->
	<!-- <script>
		function sendEmail() {
			Email.send({
				Host: "smtp.elasticemail.com",
				Username: "justinlomodcorpuz0626@gmail.com",
				Password: "43CC56AC73EC41954E230A990CEFA96B8FCB",
				To: 'justinlomodcorpuz0626@gmail.com',
				From: "justlomodcorpze06262@gmail.com",
				Subject: "This is the subject",
				Body: "And this is the body"
			}).then(
				message => alert(message)
			);
		}
	</script> -->

</body>

</html>