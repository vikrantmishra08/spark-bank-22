<!DOCTYPE html>
<html lang="zxx">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<!-- SITE TITLE -->
		<title>Contact Us</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,700i,800,800i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,600,600i,700,800" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet"/>
		<link href="fonts/font-awesome.min.css" rel="stylesheet"/>
		<link href="fonts/themify-icons.css" rel="stylesheet"/>
		<link rel="icon" href="images/favicon.png"/>
		<link href="css/owl.carousel.min.css" rel="stylesheet"/>
		<link href="css/owl.theme.default.min.css" rel="stylesheet"/>
		<link href="css/lightbox.min.css" rel="stylesheet"/>
		<link href="css/owl.theme.default.min.css" rel="stylesheet"/>
		<link href="css/animate.min.css" rel="stylesheet"/>
		<link href="css/normalize.css" rel="stylesheet"/>
		<link href="css/style.css" rel="stylesheet"/>
		<link href="css/responsive.css" rel="stylesheet"/>
		
	</head>
    
	
	 <body data-spy="scroll" data-offset="80">
         <?php include 'spin.php'; ?>

		<!-- START PRELOADER -->
			<div class="preloader">
				<div class="spinner">
					<div class="double-bounce1"></div>
					<div class="double-bounce2"></div>
				</div>
			</div>
		<!-- END PRELOADER -->

       

		
		<!-- START NAVBAR -->
			<div class="main_header navbar navbar-default menu-top">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-sm-2 col-xs-4">
							<a href="index3.html" class="logo">
								<img src="images/logo.png" alt="logo">
							</a>
						</div>
						
						<div class="col-md-10 col-sm-10 col-xs-8">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
									<span class="fa fa-navicon"></span>
								</button>
							</div>
							
							<nav id="navbar" class="navbar-collapse collapse">
								<ul class="nav navbar-nav navbar-right">
								<li><a href="index.html">Home</a></li>
								    <li><a href="send_money.php">Send Money</a></li>
									<li><a href="all_cust.php">All Customer</a></li>
                                    <li><a href="transactions.php">Transactions</a></li>										
									<li><a href="contact_us.php">Contact</a></li>
									<li><a href="about.php">About</a></li>
								</ul>
							</nav> 
						</div>
					</div>
				</div><!--- END CONTAINER -->
			</div> 
		<!-- END NAVBAR -->	
		
		
		
		
		
        <?php

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
	die("Connection not established: ".mysqli_connect_error());
}else{

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['message'];
    
    $sql = "INSERT INTO `contactus` (`name`, `email`, `message`) VALUES ('$name', '$email', '$msg')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo '<div class="alert alert-success d-flex align-items-center" role="alert">
        <div>   
        <i class="fas fa-check-circle"></i>
          Thank you '.$name.' for contacting us!
        </div>
      </div>';
    }else{
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
        <i class="fas fa-times-circle"></i>
        Oops '.$name.'! Something went wrong!
        </div>
      </div>';
    }
}
}

?>
		
					
		
		<!-- START CONTACT -->
			<section id="contact">
				<div class="contact_map_area">
					<!-- map js -->
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242118.1419970228!2d73.72288033273226!3d18.524564859327935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf2e67461101%3A0x828d43bf9d9ee343!2sPune%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1641450470544!5m2!1sen!2sin" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen></iframe>
					<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.2799147156!2d-74.25987542268453!3d40.69767006361789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1537615143351" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>-->	
					<!-- END MAP -->
				</div>
				<div class="container">
					<div class="contact_area">
						<div class="row">							
							<div class="col-md-7 col-sm-7 col-xs-12">
								<h1>CONTACT US</h1>
								<div class="single_contact">
									<form id="contact-form" method="post" action="contact_us.php" enctype="multipart/form-data">
										<div class="row">
											<div class="form-group col-md-12">
												<div class="contact_form">
													<input type="text" name="name" class="form-control" id="first-name" placeholder="Full Name *" required="required">
												</div>
											</div>
											
											<div class="form-group col-md-12">
												<div class="contact_form">
													<input type="email" name="email" class="form-control" id="email" placeholder="Email *" required="required">
												</div>
											</div>
											
											<div class="form-group col-md-12">
												<div class="contact_form">
													<textarea rows="6" name="message" class="form-control" id="description" placeholder="Your Message *" required="required"></textarea>
												</div>
											</div>
											
											<div class="contact_form_btn text-center">
												<button type="submit" value="Send message" name="submit" id="submitButton" class="btn btn-default main_btn ct_btn" title="Submit Your Message!">Send Message</button>
											</div>
										</div>
									</form>
								</div>
							</div> <!-- END COL -->
							<div class="col-md-5 col-sm-5 col-xs-12">
								<div class="single_contact">
									<h3>Head <span>Office</span></h3>
									<ul class="sing_contact_iteam">
										<li><i class="fa fa-home"></i>Pune</li>
										<li><i class="fa fa-phone"></i> 806-600-6040</li>			
										<li><i class="fa fa-link"></i> www.sfbank.official.com</li>
										<li><i class="fa fa-envelope"></i>sfbank.official@gmail.com</li>
									</ul>
								</div>
							</div> <!-- END COL -->
						</div> <!-- END ROW -->
					</div> <!-- END AREA -->
				</div> <!-- END CONTAINER -->
			</section>
		<!-- END CONTACT -->
		
		
		<!-- START COPYRIGHT -->
			<section class="copyright_area">
				<div class="copyright text-center">
					<div class="copy_text">
					<p><span class="fa fa-globe"></span> Spark Foundation Bank LTD</p>
					</div>
				</div>
			</section>
		<!-- END COPYRIGHT -->
		
		<!-- Latest jQuery -->
			<script src="js/jquery.js"></script>
		<!-- Latest compiled and minified Bootstrap -->
			<script src="js/bootstrap.min.js"></script>
		<!-- Latest compiled and easing -->	
			<script src="js/jquery.easing.1.3.min.js"></script>		
		<!-- Latest Modernizr -->	
			<script src="js/modernizr-2.8.3.min.js"></script>
		<!-- Latest Modernizr -->	
			<script src="js/jquery.stellar.min.js"></script>
		<!-- Isotope min js -->
			<script src="js/isotope.pkgd.min.js"></script>
		<!-- Owl-carousel min js  -->
			<script src="js/owl.carousel.min.js"></script>
		<!-- Lightbox min js  -->
			<script src="js/lightbox.min.js"></script>
		<!-- Jquery inview js -->
			<script src="js/jquery.inview.min.js"></script>
		<!-- scrolltopcontrol js -->
			<script src="js/scrolltopcontrol.js"></script>
		<!-- Particles js -->
			<script src="js/particles.min.js"></script>
			<script src="js/app.js"></script>
		<!-- WOW - Reveal Animations When You Scroll -->
			<script src="js/wow.min.js"></script>
		<!-- Main js -->
			<script src="js/main.js"></script>
	
    </body>
</html>