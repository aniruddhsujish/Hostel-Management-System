<?php
session_start();
  require 'includes/config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> Payment Form</title>

	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //web-fonts -->

</head>

<body>

<!-- banner -->
<div class="inner-page-banner" id="home">
	<!--Header-->
	<header>
		<div class="container agile-banner_nav">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">

				<h1><a class="navbar-brand" href="home.php">NITK <span class="display"></span></a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="services.php">Blocks</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="payment_form.php">Payment</a>
						</li>

						<li class="nav-ite">
							<a class="nav-link" href="services_mess.php">Mess</a>
						</li>
						
						<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['roll']; ?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="profile.php">My Profile</a>
							</li>
							<li>
								<a href="includes/logout.inc.php">Logout</a>
							</li>
						</ul>
					</li>
					</ul>
				</div>

			</nav>
		</div>
	</header>
	<!--Header-->
</div>
<!-- //banner -->

<br><br><br>
<?php
   $student_id = $_SESSION['roll'];
   $query1 = "SELECT * FROM Student WHERE Student_id = '$student_id'";
   $result1 = mysqli_query($conn,$query1);
   $row1 = mysqli_fetch_assoc($result1);
   $roll = $row1['Student_id'];
?>


<section class="contact py-5">
	<div class="container">
		<h2 class="heading text-capitalize mb-sm-5 mb-4"> Payment Form </h2>
			<div class="mail_grid_w3l">
				<form action="payment_form.php" method="POST">
					<div class="row">
						<div class="col-md-6 contact_left_grid" data-aos="fade-right">
						<!-- 	<div class="contact-fields-w3ls">
								<input type="text" name="Name" placeholder="Name" value="<?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>" required="" disabled="disabled">
							</div> -->
							<div class="contact-fields-w3ls">
								<input type="text" name="roll_no" placeholder="Roll Number" value="<?php echo $_SESSION['roll']; ?>" required="" disabled="disabled">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="Amount" placeholder="Amount" value="75000" required="" disabled="disabled">
							</div>
							<div class="contact-fields-w3ls">
								<input type="password" name="pwd" placeholder="Password" required="">
							</div>
						</div>
						<div class="col-md-6 contact_left_grid" data-aos="fade-left">
							<input type="submit" name="submitfees" value="Pay">
						</div>
					</div>

				</form>
			</div>

	</div>
</section>

<!--footer-->
<footer class="py-5">
	<div class="container py-md-5">
		<div class="footer-logo mb-5 text-center">
			<a class="navbar-brand" href="http://nitk.ac.in" target="_blank">NITK <span class="display"> Surathkal</span></a>
		</div>
		<div class="footer-grid">

			<div class="list-footer">
				<ul class="footer-nav text-center">
					<li>
						<a href="home.php">Home</a>
					</li>

					<li>
						<a href="services.php">Hostels</a>
					</li>
					<li>
						<a href="profile.php">Profile</a>
					</li>
				</ul>
			</div>

		</div>
	</div>
</footer>
<!-- footer -->

<!-- js-scripts -->

	<!-- js -->
	<script type="text/javascript" src="web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="web_home/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
	<!-- //js -->

	<!-- stats -->
	<script src="web_home/js/jquery.waypoints.min.js"></script>
	<script src="web_home/js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->

	<!-- start-smoth-scrolling -->
	<script src="web_home/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="web_home/js/move-top.js"></script>
	<script type="text/javascript" src="web_home/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->

<!-- //js-scripts -->

</body>
</html>


<?php

   if(isset($_POST['submitfees'])){
     $roll = $_SESSION['roll'];
     $password = $_POST['pwd'];

     /*echo "<script type='text/javascript'>alert('<?php echo $roll ?>')</script>";*/
     $query_imp = "SELECT * FROM Payment WHERE Student_id = '$roll'";
     $result_imp = mysqli_query($conn,$query_imp);
     $row_imp = mysqli_fetch_assoc($result_imp);
     $status = $row_imp['Status'];
     /*echo "<script type='text/javascript'>alert('<?php echo $room_id ?>')</script>";*/
     if(($status)==0){

		     $query = "SELECT * FROM Student WHERE Student_id = '$roll'";
		     $result = mysqli_query($conn,$query);
		     if($row = mysqli_fetch_assoc($result)){
		     	$pwdCheck = password_verify($password, $row['Pwd']);

		        if($pwdCheck == false){
		            echo "<script type='text/javascript'>alert('Incorrect Password!!')</script>";
		        }
		      	else if($pwdCheck == true) {

		            $query3 = "INSERT INTO Payment VALUES ('$roll',1,75000)";
		            $result3 = mysqli_query($conn,$query3);

		            if($result3){
		            	 echo "<script type='text/javascript'>alert('Fees Paid Successfully')</script>";
		            }
		      	}
		     }
     }
     else{
          echo "<script type='text/javascript'>alert('You have already paid the fees')</script>";
      }


}
?>
