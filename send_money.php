<!DOCTYPE html>
<html lang="zxx">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<!-- SITE TITLE -->
		<title>Send Money</title>
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
		
		<!-- START HOME -->
			<section id="home" class="gray_bg parallax_banner">
				<div class="welcome-slider-area">
					<div class="single-slide-item">
						<div id="particles-js"></div>
						<div class="single-slide-item-table">
							<div class="single-slide-item-tablecell">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											
										<center>

										<div
											style="width:80%; margin-top:80px; background-color: #fe4f6c; border-radius:30px; box-shadow: 2px 2px 10px gray;">
											<h1 style=" color:white; font-size:26px;">Transfer Money</h1>
										</div>
										<br><br>
										<div class="" style=" backdrop-filter: blur(5px);  border-radius:5px;  ">
											<form action="send_money.php" method="post">
												<table>
													<tr>
														<td><input type="text" class="formin form-control" name="accno1" id=""
																placeholder="Sender's Account Number"
																value="<?php if(isset($_GET['reads'])){echo $_GET['reads'];} ?>"></td>
													<tr>
													<tr>
														<td><input type="number" class="formin form-control" name="amount" id=""
																placeholder="Amount to Transfer"></td>
													</tr>
													<tr>
														<td><input type="text" class="formin form-control" name="accno2" id=""
																placeholder="Reciever's Account Number"></td>
													</tr>
												</table>
												<br><input class="btn mybtn btn-outline-light" type="submit" value="Transfer"><br><br>
												
											</form>
											<p style="color:white;">Want to check your balance? check <a href="check_blc.php" style="color: #fe4f6c;">here</a></p>
										</div>
								


        <?php 

						$conn = mysqli_connect($servername, $username, $password, $database);
						if(!$conn){
							die("Connection not established: ".mysqli_connect_error());
						}else{

						if($_SERVER['REQUEST_METHOD']== 'POST'){

							
							$sender = $_POST['accno1'];
							$amount = $_POST['amount'];
							$reciever = $_POST['accno2'];
						
							
							$checkblcquery = "SELECT blc FROM users where accno='$sender'";
							$checkblc = mysqli_query($conn, $checkblcquery);
							$ava_blc = mysqli_fetch_assoc($checkblc)['blc'];

							if($ava_blc >= $amount){
							$sql1 = "UPDATE users SET blc= blc-$amount WHERE accno='$sender'";
							$sql2 = "UPDATE users SET blc= blc+$amount WHERE accno='$reciever'";
							$result1 = mysqli_query($conn, $sql1);
							$result2 = mysqli_query($conn, $sql2);
							if($result1 && $result2){
								echo '<div class="alert alert-success align-items-center text-center" style="width:50%;" role="alert">
								<div>   
								<h3><i class="fa fa-check-circle"></i>
								Amount Transfered Successfully!</h3></div>
								</div>
							</div>';

							$sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `status`) VALUES ('$sender', '$reciever', '$amount', 'succeed')";
							$sqltransact = mysqli_query($conn, $sqltran);
							}else{
								echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
								<div>
								<i class="fa fa-times-circle"></i>
								Oops! Something went wrong!
								</div>
							</div>';
							$sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `status`) VALUES ('$sender', '$reciever', '$amount', 'failed')";
							$sqltransact = mysqli_query($conn, $sqltran);
							}
						}else{
							echo '<div class="alert alert-danger align-items-center text-center" style="width:50%;" role="alert">
								<div>   
								<h3><i class="fas fa-times-circle"></i>
								Not Sufficient Balance in Account!</h3></div>
								</div>
							</div>
							';
							$sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `status`) VALUES ('$sender', '$reciever', '$amount', 'failed')";
							$sqltransact = mysqli_query($conn, $sqltran);
						}
						}
						}
						?>
							</center>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		<!-- END  HOME DESIGN -->
		
		

        <style>
        .formin {
            border-radius: 20px;
            width: 380px;
            height: 50px;
            padding: 5px 5px 5px 15px;
        }

		.formin:hover{
			width: 430px;;
		}

        .mybtn {
            margin-bottom: 10px;
            box-shadow: 2px 2px 10px black;
            border-radius: 30px;

            font-weight: bold;
            color: green;
        }

        .mybtn:active {
            background-color: black;
            color: #fe4f6c;
        }

        td {
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>

    
		
		
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















