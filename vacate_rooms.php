<?php
session_start();
  require 'includes/config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> VACATE ROOMS</title>

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
	<!--bootsrap -->

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

				<h1><a class="navbar-brand" href="home.php">NITK<span class="display"></span></a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="home_manager.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="allocate_room.php">Allocate Room</a>
						</li>

					<li class="nav-item">
						<a class="nav-link" href="allocate_mess_card.php">Allocate Mess</a>
					</li>
						<li class="dropdown nav-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Rooms
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu agile_short_dropdown">
								<li>
									<a href="allocated_rooms.php">Allocated Rooms</a>
								</li>
								<li>
									<a href="empty_rooms.php">Empty Rooms</a>
								</li>
								<li>
									<a href="vacate_rooms.php">Vacate Rooms</a>
								</li>
							</ul>
						</li>
						
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Mess
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="allocated_mess_card.php">Allocated Mess</a>
							</li>
							<li>
								<a href="vacate_mess.php">Vacate Mess</a>
							</li>
						</ul>
					</li>
						<li class="dropdown nav-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['username']; ?>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu agile_short_dropdown">
								<li>
									<a href="admin/manager_profile.php">My Profile</a>
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

<br><br><br>
<?php
   $hostel_id = $_SESSION['hostel_id'];
   $query1 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
   $result1 = mysqli_query($conn,$query1);
   $row1 = mysqli_fetch_assoc($result1);
   $hostel_name = $row1['Hostel_name'];
?>

<section class="contact py-5">
	<div class="container">
		<h2 class="heading text-capitalize mb-sm-5 mb-4"> Vacate Form </h2>
			<div class="mail_grid_w3l">
				<form action="vacate_rooms.php" method="post">
					<div class="row">
						<div class="col-md-6 contact_left_grid" data-aos="fade-right">
							<div class="contact-fields-w3ls">
								<input type="text" name="roll_no" placeholder="Roll Number" required >
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="hostel" placeholder="Hostel" value="<?php echo $hostel_name;?>" required="" disabled="disabled">
							</div>
							<div class="contact-fields-w3ls">
								<input type="number" name="room_no" placeholder="Room Number" required="">
							</div>
						</div>
						<div class="col-md-6 contact_left_grid" data-aos="fade-left">
							<input type="submit" name="submit" value="Click to Vacate">
						</div>
					</div>

				</form>
			</div>

	</div>
</section>
<?php
if(isset($_POST['submit'])){
     $roll = $_POST['roll_no'];
     if(isset($_POST['hostel']))
     	$hostel = $_POST['hostel'];
     $room_number =(int)$_POST['room_no'];

    $query2 = "SELECT * FROM Room WHERE Hostel_id = '$hostel_id' and Room_No = '$room_number'";
    $result2 = mysqli_query($conn,$query2);
    if(mysqli_num_rows($result2)==0){
        echo "<script type='text/javascript'>alert('Incorrect Details')</script>";
        exit();
    }
    $row2 = mysqli_fetch_assoc($result2);
    if($row2['Allocated']=='0'){
    	echo "<script type='text/javascript'>alert('Room Not Allocated')</script>";
    	exit();
    }
    $room_id = $row2['Room_No'];
    /*echo "<script type='text/javascript'>alert('<?php echo $room_id ?>')</script>";*/
	$query3 = "SELECT * FROM Student WHERE Student_id = '$roll' and Hostel_id = '$hostel_id' and Room_id = '$room_id'";
	$result3 = mysqli_query($conn,$query3);
    if(mysqli_num_rows($result3)==0){
        echo "<script type='text/javascript'>alert('Incorrect Details 2, $room_id')</script>";
        exit();
    }
    $row3 = mysqli_fetch_assoc($result3);
    if($result3){
    	$query4 = "UPDATE Student SET Hostel_id = NULL, Room_id = NULL WHERE Student_id = '$roll'";
    	$result4 = mysqli_query($conn,$query4);
    	if($result4){
			$query5 = "UPDATE Room SET Allocated = '0' WHERE Room_No = '$room_id' and Hostel_id = '$hostel_id'";
			$result5 = mysqli_query($conn,$query5);
    		if($result5){
    			//$query7 = "UPDATE Hostel SET current_no_of_rooms=current_no_of_rooms - 1,No_of_students=No_of_students - 1 WHERE Hostel_id='$hostel_id'";
    			//$result7 = mysqli_query($conn,$query7);
    			//if($result7){
    				$query6 = "DELETE FROM Application WHERE Student_id = '$roll'";
    				$result6 = mysqli_query($conn,$query6);
    				if($result6){
    				    echo "<script type='text/javascript'>alert('Vacated Successfully')</script>";
    				}
    			//}

    		}
    	}
    }
}


?>

<br><br><br>

<!-- footer -->
<footer class="py-5">
	<div class="container py-md-5">
		<div class="footer-logo mb-5 text-center">
			<a class="navbar-brand" href="index.html">NITK<span class="display"></span></a>
		</div>
		<div class="footer-grid">
			<div class="social mb-4 text-center">
				<ul class="d-flex justify-content-center">
					<li class="mx-2"><a href="#"><span class="fab fa-facebook-f"></span></a></li>
					<li class="mx-2"><a href="#"><span class="fab fa-twitter"></span></a></li>
					<li class="mx-2"><a href="#"><span class="fas fa-rss"></span></a></li>
					<li class="mx-2"><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
					<li class="mx-2"><a href="#"><span class="fab fa-google-plus"></span></a></li>
				</ul>
			</div>
			<div class="list-footer">
				<ul class="footer-nav text-center">
					<li>
						<a href="home_manager.php">Home</a>
					</li>
					<li>
						<a href="allocated.php">Allocated Rooms</a>
					</li>
					
					<li>
						<a href="admin/manager_profile.php">Profile</a>
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

	<!-- banner js -->
	<script src="web_home/js/snap.svg-min.js"></script>
	<script src="web_home/js/main.js"></script> <!-- Resource jQuery -->
	<!-- //banner js -->

	<!-- flexSlider --><!-- for testimonials -->
	<script defer src="web_home/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	</script>
	<!-- //flexSlider --><!-- for testimonials -->

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
