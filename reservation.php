<?php
include 'db_connect.php';

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $reserve = isset($_POST['reserve']) ? implode(", ", $_POST['reserve']) : "";
    $guest = $_POST['guest'];
    $events = isset($_POST['events']) ? implode(", ", $_POST['events']) : "";
    $song = $_POST['song'];

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO reservation (firstname, lastname, email, reserve, guest, events, song)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Create a prepared statement
    $stmt = mysqli_prepare($con, $sql);

    // Bind parameters to the placeholders
    mysqli_stmt_bind_param($stmt, "sssssss", $firstname, $lastname, $email, $reserve, $guest, $events, $song);

    // Execute the prepared statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
		echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Form Submitted",
                    text: "Your form has been submitted successfully!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "reservation.php"; // Redirect to a confirmation page or other URL
                    }
                });
            </script>';
        header('location:index.html');
    } else {
        die(mysqli_error($con));
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>



<!DOCTYPE html>
 <html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Abrar & Aljosa</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />

	<!-- Favicons -->
	<link href="/images/diamond.png" rel="icon">
	

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	</head>
    <style>
	@font-face {
  font-family: 'OraSepira';
  src: url("fonts/Ora_Sepira/Ora_Sepira_Regular.woff") format('woff');
  font-weight: normal;
  font-style: normal;
}
/* Flight */
.card-flight {
  width: 100%;
  border-radius: 0.5rem;
  background-color: #fff;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  border: 1px solid transparent;
}

.card-flight a {
  text-decoration: none
}

.content-flight {
  padding: 1.1rem;
}

.image-flight {
  object-fit: cover;
  width: 100%;
  height: 400px;
  background-color: rgb(239, 205, 255);
}

.title-flight {
  color: #111827;
  font-size: 2.5rem;
  line-height: 1.75rem;
  font-weight: 600;
}

.desc {
  margin-top: 0.5rem;
  color: #6B7280;
  font-size: 2rem;
  line-height: 1.25rem;
}

.action {
  display: inline-flex;
  margin-top: 1rem;
  color: #ffffff;
  font-size: 1.5rem;
  line-height: 1.25rem;
  font-weight: 500;
  align-items: center;
  gap: 0.25rem;
  background-color: #2563EB;
  padding: 15px 8px;
  border-radius: 4px;
}

.action span {
  transition: .3s ease;
}

.action:hover span {
  transform: translateX(4px);
}

.row-flight{
    display: flex; 
	justify-content: space-evenly;
	align-items: center;
}
@media only screen and (max-width: 768px) {
    .row-flight, .program{
    display: block; 
}
    .card-flight{
        margin-bottom: 10%;
    }
    
}
@media screen and (max-width: 480px){
    #fh5co-header .display-tc h1, 
    #fh5co-counter .display-tc h1, 
    .fh5co-cover .display-tc h1{
        font-size: 35px;
}
}
		*{
			color: #fff;
		}
        ::placeholder {
            opacity: 0.5;
                    }
		.radio input[type="radio"]:checked + label {
        	color: #F14E95;
    				}
		.checkbox input[type="checkbox"]:checked + label {
        	color: #F14E95;
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
							<li class="active"><a href="reservation.php">Reservation</a></li>
							<li><a href="contact.php">Contact Us</a></li>
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
							<h1 style="font-family: 'OraSepira';">Make a Reservation</h1>
							<h2>Make sure you're on the guest list for our wedding day! Reserve your seat and share in the joy of our love story.</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>


	<div id="fh5co-started" class="fh5co-bg" role="banner" style="background-image:url(images/rvsp.png); background-size: cover; box-shadow: inset -10px -10px 20px #000, inset 10px 10px 20px #000;">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2 style="font-family: 'OraSepira'; color: antiquewhite;">Reservation</h2>
					<p style="color: #fff;">Please take a moment to fill out our RSVP form and let us know that you'll be joining us on our special day. Your presence would mean the world to us! Thank you for being part of our celebration!</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-10 col-md-offset-2">
					<form class="form" method="POST">
						<div class="col-md-5 col-sm-5">
							<div class="form-group">
								<h2 style="font-size: 100%; color: #fff;">First Name</h2>
								<input type="name" class="form-control" id="fname" name="firstname" placeholder="John" required>
							</div>
						</div>

						<div class="col-md-5 col-sm-5">
							<div class="form-group">
								<h2 style="font-size: 100%; color: #fff;">Last Name</h2>
								<input type="name" class="form-control" id="lname" name="lastname" placeholder="Smith" required>
							</div>
						</div>

						<div class="col-md-10 col-sm-10">
							<div class="form-group">
							<h2 style="font-size: 100%; color: #fff;">Email</h2>
								<input type="email" class="form-control" id="email" name="email" placeholder="johnsmith@email.com" required>
							</div>
						</div>

						<div class="col-md-8 col-sm-8">
							<div class="form-group">
							<h2 style="font-size: 100%; color: #fff;">Can you make it?</h2>
								<div class="radio">
									<label>
										<input type="radio" name="reserve[]" value="Yes, I would like to attend!" required>
										Yes - Wouldn’t miss it for the world. I’m ready to eat, drink and celebrate with you both!
									</label>	
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="reserve[]" value="No, I can't make it. I'm sorry." required>
										No - I’ll celebrate from afar and forever regret this decision.
									</label>
								</div>
							</div>
						</div>

						<div class="col-md-10 col-sm-10">
							<div class="form-group">
							<h2 for="guest" style="font-size: 100%; color: #fff;">If your invitation includes a guest, please let us know who they are:</h2>
								<textarea name="guest" id="message" cols="30" rows="2" class="form-control" placeholder="John Smith, Sarah Smith, John Doe"></textarea>
							</div>
						</div>

						<div class="col-md-8 col-sm-8">
							<div class="form-group" aria-required="true">
								<h2 style="font-size: 100%; color: #fff;">Will you be joining us at other events?</h2>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="events[]" value="Welcome Dinner">
										Welcome Dinner - From 2PM of May 1
									</label>
								</div>
								<div class="checkbox" aria-required="true">
									<label>
										<input type="checkbox" name="events[]" value="Wedding Day">
										Wedding Day - From 2PM of May 2
									</label>
								</div>
								<p style="font-style: italic;">*We'll share more details closer to the date.</p>
							</div>
						</div>

						<div class="col-md-10 col-sm-10">
							<div class="form-group">
							<h2 for="guest" style="font-size: 100%; color: #fff;">What song will get you on the dance floor?</h2>
								<input type="text" class="form-control" id="song" name="song" placeholder="We'll be sure to tell the DJ!">
							</div>
						</div>
						
						
						<div class="col-md-10 col-sm-10 text-center fh5co-heading">
							<button type="submit" name="submit" class="btn btn-default btn-block rvsp">Submit</button>
						</div>
						
						
					</form>
				</div>
			</div>
		</div>
	</div>

	
	</div>

	<div id="fh5co-started" role="banner" style="padding: 3rem 0; background-image: url('images/10.png'); background-size: cover; background-repeat: no-repeat;">
		<div>
			<div>
				<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-sm-12 col-md-offset-2 text-center fh5co-heading">
					<h2 style="font-family: 'OraSepira'; color: antiquewhite;">Flights & Accommodation</h2>
					<p style="color: #fff;">To make sure you are onboard for our wedding day, we highly recommend to book your travel at least <strong>ONE (1) MONTH</strong> in advance.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-sm-12 col-md-offset-4 text-center fh5co-heading">
					<a href="details.html" ><button type="submit" class="btn btn-default btn-block rvsp">Book Now!</button></a>
				</div>
			</div>	
		</div>
			</div>

			<div>
				
			</div>

		</div>
		
	</div>

	<div id="fh5co-started" role="banner" style="padding: 3rem 0;">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-sm-12 col-md-offset-2 text-center fh5co-heading">
					<h2 style="font-family: 'OraSepira'; color: #9EC183;">Contact Us</h2>
					<p style="color: black;">Feel free to reach out by clicking the button below and let us know how we can assist you.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-sm-12 col-md-offset-4 text-center fh5co-heading">
					<a href="contact.php" ><button type="submit" class="btn btn-default btn-block rvsp">Contact Now</button></a>
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

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

