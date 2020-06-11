<?php
session_start();
		  require '../includes/config.inc.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>User Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Consultancy Profile Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- js -->
<script src="../web_profile/js/jquery-2.1.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../web_profile/js/sliding.form.js"></script>
<!-- //js -->
<link href="../web_profile/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="../web_profile/css/font-awesome.min.css" />
<link rel="stylesheet" href="../web_profile/css/smoothbox.css" type='text/css' media="all" />
<link href="//fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<script type="application/x-javascript">
	addEventListener("load", function () {
		setTimeout(hideURLbar, 0);
	}, false);

	function hideURLbar() {
		window.scrollTo(0, 1);
	}
</script>
<!--// Meta tag Keywords -->

<link href="../web_home/css_home/slider.css" type="text/css" rel="stylesheet" media="all">

<!-- css files -->
<link rel="stylesheet" href="../web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="../web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
<link rel="stylesheet" href="../web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->

<!-- testimonials css -->
<link rel="stylesheet" href="../web_home/css_home/flexslider.css" type="text/css" media="screen" property="" /><!-- flexslider css -->
<!-- //testimonials css -->

<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<!-- //web-fonts -->


</head>
<body>
	<!-- banner -->
		<div class="banner" id="home">
			<div class="cd-radial-slider-wrapper">

	<!--Header-->
	<header>
		<div class="container agile-banner_nav">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">

				<h1><a class="navbar-brand" href="../home_manager.php">NITK <span class="display"></span></a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="../home_manager.php">Home <span class="sr-only">(current)</span></a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="../allocate_room.php">Allocate Rooms</a>
						</li>


					<li class="nav-item">
						<a class="nav-link" href="../allocate_mess_card.php">Allocate Mess</a>
					</li>
						<li class="dropdown nav-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Rooms
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu agile_short_dropdown">
								<li>
									<a href="../allocated_rooms.php">Allocated Rooms</a>
								</li>
								<li>
									<a href="../empty_rooms.php">Empty Rooms</a>
								</li>
								<li>
									<a href="../vacate_rooms.php">Vacate Rooms</a>
								</li>
							</ul>
						</li>
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Mess
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="../allocated_mess_card.php">Allocated Mess</a>
							</li>
							<li>
								<a href="../vacate_mess.php">Vacate Mess</a>
							</li>
						</ul>
					</li>
						<li class="dropdown nav-item">
								<li>
									<a href="../includes/logout.inc.php" class="nav-link">Logout</a>
								</li>
						
						</li>
					</ul>
				</div>

			</nav>
		</div>
	</header>
	<!--Header-->
<br><br><br><br><br>
	<div class="main">
		<div id="navigation" style="display:none;" class="w3_agile">
      <ul>
				<li class="selected">
					<a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span>Info</span></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-folder" aria-hidden="true"></i><span>Admin</span></a>
				</li>
			</ul>
		</div>
		<div id="wrapper" class="w3ls_wrapper w3layouts_wrapper">
			<div id="steps" style="margin:0 auto;" class="agileits w3_steps">
				<form id="formElem" name="formElem" action="#" method="post" class="w3_form w3l_form_fancy">
					<fieldset class="step agileinfo w3ls_fancy_step">
						<legend>Personal Info</legend>
						<div class="abt-agile">
							<div class="abt-agile-left">
							</div>
							<div class="abt-agile-right">
								<?php
										$Man_id = $_SESSION['hostel_man_id'];
										$query1 = "SELECT * FROM Hostel_Manager_Profile WHERE Hostel_man_id = '$Man_id'";
										$result = mysqli_query($conn,$query1);
										$row = mysqli_fetch_assoc($result);
										$Fname = $row['Fname'];
										$Lname = $row['Lname'];
										$Uname = $row['Username'];
										$Mob = $row['Mob_no'];
										$Hostel_name=$row['Hostel_name'];
										$Mess_name=$row['Mess_name'];
										$Hostel_Occupancy=$row['Hostel_Occupancy'];
										$Mess_Occupancy=$row['Mess_Occupancy'];
								?>

								<h3><?php echo $Fname." ".$Lname; ?></h3>
								<h5>Hostel Manager</h5>
								<ul class="address">
									<li>
										<ul class="address-text">
											<li><b>Username </b></li>
											<li>: <?php echo $Uname; ?></li>
										</ul>
									</li>
									<li>
										<ul class="address-text">
											<li><b>PHONE </b></li>
											<li>: <?php echo $Mob; ?></li>
										</ul>
									</li>
                 					<li>
										<ul class="address-text">
										<li><b>Managing Hostel </b></li>
											<li>: <?php echo $Hostel_name; ?></li>
										</ul>
									</li>
									<li>
										<ul class="address-text">
										<li><b>Managing Mess </b></li>
											<li>: <?php echo $Mess_name; ?></li>
										</ul>	
									</li>
									<li>
										<ul class="address-text">
										<li><b>Hostel Occupancy </b></li>
											<li>: <?php echo $Hostel_Occupancy. '%'; ?></li>
										</ul>	
									</li>
									<li>
										<ul class="address-text">
										<li><b>Mess Occupancy </b></li>
											<li>: <?php echo $Mess_Occupancy. '%'; ?></li>
										</ul>	
									</li>
								</ul>
							</div>
								<div class="clear"></div>
						</div>
				</fieldset>

        <fieldset class="step agileinfo w3ls_fancy_step">
          <legend>Admin Info</legend>
          <div class="abt-agile">
            <div class="abt-agile-left">
            </div>
            <div class="abt-agile-right">
							<?php
									$ad=1;
									$queryA = "SELECT * FROM Hostel_Manager WHERE Isadmin = '$ad'";
									$resultA = mysqli_query($conn,$queryA);
									$rowA = mysqli_fetch_assoc($resultA);
									$adFname = $rowA['Fname'];
									$adLname = $rowA['Lname'];
									$adUname = $rowA['Username'];
									$adMob = $rowA['Mob_no'];
							 ?>
              <h3><?php echo $adFname." ".$adLname; ?></h3>
              <h5>Admin</h5>
              <ul class="address">
                <li>
                  <ul class="address-text">
                    <li><b>Username </b></li>
                    <li>: <?php echo $adUname; ?></li>
                  </ul>
                </li>
                <li>
                  <ul class="address-text">
                    <li><b>PHONE </b></li>
                    <li>: <?php echo $adMob; ?></li>
                  </ul>
                </li>

              </ul>
            </div>
              <div class="clear"></div>
          </div>
      </fieldset>

				</form>
			</div>
		</div>

	</div>
	<script type="text/javascript" src="../web_profile/js/smoothbox.jquery2.js"></script>
	<script type="text/javascript" src="../web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="../web_home/js/bootstrap.js"></script> 
</body>

</html>
