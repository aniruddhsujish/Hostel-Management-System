<?php
session_start();
  require 'includes/config.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> Allocate mess</title>

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
	<header>
		<div class="container agile-banner_nav">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">

				<h1><a class="navbar-brand" href="home_manager.php">NITK<span class="display"></span></a></h1>
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
</div>
<!-- //banner -->
<br><br><br>

<section class="contact py-5">
	<div class="container">
			<div class="mail_grid_w3l">
				<form action="allocate_mess_card.php" method="post">
					<div class="row">
					        <div class="col-md-9">
							<input type="text" placeholder="Search by Roll Number" name="search_box">
							</div>
							<div class="col-md-3">
							<input type="submit" value="Search" name="searchmesscard"></input>
							</div>
					</div>
				</form>
			</div>
	</div>
</section>

<?php
   if (isset($_POST['searchmesscard'])) {
   	   $search_box = $_POST['search_box'];
   	   $mess_id = $_SESSION['Mess_id'];
   	   $query_search = "SELECT * FROM Application_mess WHERE Student_id like '$search_box%' and Mess_id = '$mess_id' and Application_status = '1'";
   	   $result_search = mysqli_query($conn,$query_search);

   	   //select the mess name from mess table
       $query6 = "SELECT * FROM Mess WHERE Mess_id = '$mess_id'";
       $result6 = mysqli_query($conn,$query6);
       $row6 = mysqli_fetch_assoc($result6);
       $mess_name = $row6['Mess_name'];
   	   ?>
   	   <div class="container">
   	   <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Roll No</th>
        <th>Mess</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>
    <?php
   	   if(mysqli_num_rows($result_search)==0){
   	   	  echo '<tr><td colspan="4">No Rows Returned</td></tr>';
   	   }
   	   else{
   	   	  while($row_search = mysqli_fetch_assoc($result_search)){
      		//get the name of the student to display
            $student_id = $row_search['Student_id'];

            $query7 = "SELECT * FROM Student WHERE Student_id = '$student_id'";
            $result7 = mysqli_query($conn,$query7);
            $row7 = mysqli_fetch_assoc($result7);
            $student_name = $row7['Fname']." ".$row7['Lname'];

      		echo "<tr><td>{$student_name}</td><td>{$row_search['Student_id']}</td><td>{$mess_name}</td><td>{$row_search['Message']}</td></tr>\n";

   	   	  }
   	   }
   ?>
   </tbody>
  </table>
</div>
<?php
}
  ?>


<div class="container">
<h2 class="heading text-capitalize mb-sm-5 mb-4"> Applications Received </h2>
<?php
   $mess_id = $_SESSION['Mess_id'];
   $query1 = "SELECT * FROM Application_mess where Mess_id = '$mess_id' and Application_status = '1'";
   $result1 = mysqli_query($conn,$query1);

   //select the mess name from mess table
   $query6 = "SELECT * FROM Mess WHERE Mess_id = '$mess_id'";
   $result6 = mysqli_query($conn,$query6);
   $row6 = mysqli_fetch_assoc($result6);
   $mess_name = $row6['Mess_name'];
?>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Roll No</th>
        <th>Mess</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>
    <?php
      if(mysqli_num_rows($result1)==0){
         echo '<tr><td colspan="4">Empty</td></tr>';
      }
      else{
      	while($row1 = mysqli_fetch_assoc($result1)){
      		//get the name of the student to display
            $student_id = $row1['Student_id'];
            $query7 = "SELECT * FROM Student WHERE Student_id = '$student_id'";
            $result7 = mysqli_query($conn,$query7);
            $row7 = mysqli_fetch_assoc($result7);
            $student_name = $row7['Fname']." ".$row7['Lname'];

      		echo "<tr><td>{$student_name}</td><td>{$row1['Student_id']}</td><td>{$mess_name}</td><td>{$row1['Message']}</td></tr>\n";
      	}
      }
    ?>
    </tbody>
  </table>
</div>
<section class="contact py-5">
	<div class="container">
			<div class="mail_grid_w3l">
				<form action="allocate_mess_card.php" method="post">
					<div class="row">
							<input type="submit" value="Allocate" name="submitallo">
					</div>
				</form>
			</div>
	</div>
</section>
<?php
if(isset($_POST['submitallo'])){
   $result1 = mysqli_query($conn,$query1);

   while($row1 = mysqli_fetch_assoc($result1)){
         //find the minimum mess number
     $query2 = "SELECT * FROM Mess_Allocation where Mess_card_No = (SELECT MIN(Mess_card_No) FROM Mess_Allocation where Allocated = '0' and Mess_id = '$mess_id')";
     $result2 = mysqli_query($conn,$query2);
     if(!$result2){
     	   echo "<script type='text/javascript'>alert('Mess not available')</script>";
     	   exit();
     }
     $row2 = mysqli_fetch_assoc($result2);
     $mess_card_no = $row2['Mess_card_No'];

     $student_id = $row1['Student_id'];
     $query3 = "UPDATE Application_mess SET Application_status = '0',Mess_card_No = '$mess_card_no' WHERE Student_id = '$student_id'";
     $result3 = mysqli_query($conn,$query3);
     if($result3){
     	$mess_card_id = $row2['Mess_card_id'];
     	$query4 = "UPDATE Student SET Mess_id = '$mess_id',Mess_card_id = '$mess_card_id' WHERE Student_id = '$student_id'";
     	$result4 = mysqli_query($conn,$query4);
     	if($result4){
     		$query5 = "UPDATE Mess_Allocation SET Allocated = '1' where Mess_card_No = '$mess_card_no' and Mess_id='$mess_id'";
     		$result5 = mysqli_query($conn,$query5);
			//trigger attached here
			/*
     		if($result5){
     			$query6 = "UPDATE Mess SET Vacancy=Vacancy - 1 where Mess_id='$mess_id'";
     			$result6 = mysqli_query($conn,$query6);
			 } */
			echo "<script type='text/javascript'>alert('Mess Allocated Successfully')</script>";
     	}
     	else{
     		echo "<script type='text/javascript'>alert('Failed to allocate mess')</script>";
     	}
     }
     else{
     	
     		$query8 = "DELETE from Application_mess where Application_status=1 and Mess_id='$mess_id'";
     		$result8 = mysqli_query($conn,$query8);
     		if($result8)
     		echo "<script type='text/javascript'>alert('Mess is full please apply for another mess')</script>";
     	
     }

   }

}
?>
<br>
<br>
<br>

<!-- footer -->
<footer class="py-5">
	<div class="container py-md-5">
		<div class="footer-logo mb-5 text-center">
			<a class="navbar-brand"  href="http://www.nitk.ac.in/" target="_blank" >NITK<span class="display"> SURATHKAL</span></a>
		</div>
		<div class="footer-grid">

			<div class="list-footer">
				<ul class="footer-nav text-center">
					<li>
						<a href="home_manager.php">Home</a>
					</li>
					<li>
						<a href="allocate_room.php">Allocate</a>
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
