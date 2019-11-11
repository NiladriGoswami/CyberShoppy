<?php
include("../connection/config.php");
/*$user='root';
$pass='';
$db='shopping';
$conn= new mysqli('localhost', $user, $pass, $db) or die("DANG!!...unable to connect!");*/

session_cache_limiter(FALSE);
session_start();

//$uemail=$_SESSION['user_email'];
//$upass=$_SESSION['password'];
?>
<!DOCTYPE html>
<html>
<head>
<title>CYBER SHOPPY :: CONTACT</title>
<link rel="icon" title="image/png" href="images/Prod_image/cyber_shoppe logo.png" />
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<style type="text/css">
<!--
.style1 {color: #00FFCC}
-->
</style>
</head>
<body>
<!-- header -->
<div class="header" id="home">
	<div class="container">
		<ul>
		   <?php if(isset($_SESSION['first_name'])){ 
					?>
			 <li><i class="fa fa-unlock-alt" ></i>Signed In as <a href="profile.php"data-toggle="tooltip" data-placement="bottom" title="Click to Edit profile"><font color="#2AFFD4"><?php echo $_SESSION['first_name']; ?></font></a>  </li>
			 <?php }
			 else{?>
		    <li> <a  href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Sign In </a></li>
			<?php }?>
			<?php if(isset($_SESSION['first_name'])){ 
					?>
			 <li><i class="fa fa-calendar" ></i><?php echo date("d/m/Y");?></li>
			 <?php }
			 else{?>
		    <li> <a href="#"  data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sign Up </a></li>
			<?php }?>
			<?php if(isset($_SESSION['first_name'])){ 
					?>
			 <li><i class="fa fa-hourglass-half" ></i><?php echo date("h:i a"); ?></li>
			 <?php }
			 else{?>
		    <li><i class="fa fa-phone" aria-hidden="true"></i>Call : +91 9474468236 </li>
			<?php }?>
			<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:cshoppy007@gmail.com">cshoppy007@gmail.com</a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<div class="col-md-4 header-middle">
				<div class="clearfix"></div>
		</div>
		<!-- header-bot -->
			<div class="col-md-4 logo_agile">
				<h1><a href="index.php"><span>C</span>yber Shoppy <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i></a></h1>
			</div>
			
			<?php 
			//session_cache_limiter(FALSE);
			//session_start(); 
			$log_id= $_SESSION['user_id'];
			//echo $log_id;
			//exit;
			if(isset($_SESSION['first_name'])){ 
					?>
			<table><tr>
			  <td>&nbsp;</td>
			</tr>
			<?php }?>
			</table>
         <!-- header-bot -->
		 <div class="col-md-4 agileits-social top_content">
						



		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class=" menu__item"><a class="menu__link" href="index.php">Home <span class="sr-only">(current)</span></a></li>
					<li class=" menu__item"><a class="menu__link" href="about.php">About</a></li>
					<li class="dropdown menu__item">
					
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Men's wear <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="#"><img src="images/top2.jpg" alt=" "/></a>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
						<?php
	           $result1 = mysqli_query($conn, "SELECT * FROM subcategory_master where cat_id=1 and is_active=1");
			   while($row1 = mysqli_fetch_array($result1))
			   {
				?>				
					  <li><a href="subdetail.php?scid=<?php echo $row1["sub_cat_id"]; ?>"><?php echo "$row1[sub_cat_name]"; ?></a></li>
					
				<?php
			   }
				?>
											
										</ul>
									
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Women's wear <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
								<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="#"><img src="images/top1.jpg" alt=" "/></a>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
			   <?php
	           $result2 = mysqli_query($conn, "SELECT * FROM subcategory_master where cat_id=2 and is_active=1");
			   while($row2 = mysqli_fetch_array($result2))
			   {
				?>				
					  <li><a href="subdetail.php?scid=<?php echo $row2["sub_cat_id"]; ?>"><?php echo "$row2[sub_cat_name]"; ?></a></li>
					
				<?php
			   }
				?>
							</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
				
					<li class="active menu__item menu__item--current"><a class="menu__link" href="contact.php">Contact</a></li>
					<?php if(isset($_SESSION['first_name'])){  ?>
					<!--<li class=" menu__item"><a class="menu__link" href="logout.php">Logout</a></li>-->
					<li class="dropdown menu__item">
					   <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">My Profile <b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li><a href="profile.php"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
									<li><a href="logout.php"><i class="fa fa-power-off fa-fw"></i> Logout</a></li>
								</ul>
					</li>
					<?php } ?>				 
					 </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
						<?php if(isset($_SESSION['first_name'])){ 
					?> 
					<a href="cart1.php" data-toggle="tooltip" data-placement="right" title="Click to View cart">
						<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button></a>
						<?php }
			 else{?>
						<a href="cart1.php" data-toggle="tooltip" data-placement="right" title="Sign in to View cart">
					  <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button></a>
  					<?php } ?>
					  
  
						</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
<!-- Modal1 -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
			<!--SIGN up -->
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
						
									<form action="" method="post">
									<?php									
				if(isset($_POST['Submit']))
				{
					$u_name=addslashes($_POST['Name']);
					$password=addslashes($_POST['pwd']);
					if($_POST['Submit'])
					{
						$sql="select * from user_master where user_email='$u_name' AND password='$password' and is_active=1";
						$rec=mysqli_query($conn,$sql);
                        $res=mysqli_fetch_assoc($rec);
             			 if($u_name==$res['user_email'] && $password==$res['password'])
						 {
						 	
						$_SESSION['user_id']= $res['user_id'];
						$_SESSION['user_email']= $res['user_email'];
						$_SESSION['first_name']= $res['first_name'];
						$_SESSION['last_name']= $res['last_name'];
						echo "<script>
							 
							 location.replace('index.php?');
							 </script>";
						 }
						 else
						 {
							  echo "<script>
							 
							 location.replace('about.php?');
							 </script>";
						 }
						 
						
					}
				}
				?>
									
							<div class="styled-input agile-styled-input-top">
								<input type="email" name="Name" required="">
								<label>User Email</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="password" name="pwd" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<input type="submit" name="Submit" id="Submit" value="LOGIN"  />
						</form>
						<!-- Sign in ends-->
						  
						  <br /><br /><br />
														<div class="clearfix"></div>
														<p><a href="#" data-toggle="modal" data-target="#myModal2" > Don't have an account?</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/virat1.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal1 -->
<!-- Modal2 -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<!-- REGISTER-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
					
						 <form action="" method="post">	<?php
						if(isset($_POST['Submit1']))
     {   //$u_id=$_POST['uid'];
        $u_email=addslashes($_POST['Email']);
	    $fname=addslashes($_POST['fname']);
		 $lname=addslashes($_POST['lname']);
		$phone=addslashes($_POST['pno']);
		$pass=addslashes($_POST['password']);
		$cpass=addslashes($_POST['c_pwd']);
	if($_POST['Submit1'] && $pass==$cpass)
	      {
		     $reg1="insert into user_master(user_email,password,is_active,first_name,last_name,phone) values('$u_email','$pass',2,'$fname','$lname','$phone')";
			//echo $sql;
			 //exit;
			 $rec1=mysqli_query($conn,$reg1);
			  // echo $rec;
			    //exit;
			   if($rec1)
			   {
			       echo "<script>
				   alert('Successfully registered!!!..');
				   location.replace('index.php?');
				   </script>";
			   
			   }
		  }
			   else 
			   {
			   echo "<script>
				   alert('Registration unsuccessful!..Try again!!..');
				   location.replace('index.php?');
				   </script>";
			   }
		  
		  
	   }
?>
						 <!---<div class="styled-input agile-styled-input-top">
								<input type="text" name="uid" required="">
								<label>User id</label>
								<span></span>
							</div>--->
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="fname" required="">
								<label>First Name</label>
								<span></span>
							</div>
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="lname" required="">
								<label>Last Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="Email" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="text" name="pno" pattern="[6789][0-9]{9}" required=""> 
								<label>Phone Number</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="password" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="c_pwd" required=""> 
								<label>Confirm Password</label>
								<span></span>
							</div> 
							<input name="Submit1" type="submit"  value="REGISTER" />
						</form>
						 <br /> <br />
														<div class="clearfix"></div>
														<p><a href="#">By clicking register, I agree to your terms</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/anushka.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal2 -->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>C<span>ontact Us </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li>Contact</li>
						  </ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>
   <!--/contact-->
    <div class="banner_bottom_agile_info">
	    <div class="container">
		  <div class="contact-grid-agile-w3s">
				<div class="col-md-4 contact-grid-agile-w3">
						<div class="contact-grid-agile-w31">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<h4>Address</h4>
							<p>Salt Lake, Sector V<span>West Bengal, INDIA</span></p>
						</div>
					</div>
					<div class="col-md-4 contact-grid-agile-w3">
						<div class="contact-grid-agile-w32">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<h4>Call Us</h4>
							<p>+91 7679064552<span>+91 9474468236</span></p>
						</div>
					</div>
					<div class="col-md-4 contact-grid-agile-w3">
						<div class="contact-grid-agile-w33">
							<i class="fa fa-envelope-o" aria-hidden="true"></i>
							<h4>Email</h4>
							<p><a href="mailto:cshoppy007@gmail.com">cshoppy007@gmail.com</a><span><a href="mailto:cshoppy@gmail.com">cshoppy@gmail.com</a></span></p>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
	   </div>
	 </div>
	   <div class="contact-w3-agile1 map" data-aos="flip-right">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14736.291546277484!2d88.4252282138039!3d22.576377126357947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0275b020703c0d%3A0xece6f8e0fc2e1613!2sSector+V%2C+Salt+Lake+City%2C+Kolkata%2C+West+Bengal!5e0!3m2!1sen!2sin!4v1537777721806" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	   </div>
   <div class="banner_bottom_agile_info">
	<div class="container">
	   <div class="agile-contact-grids">
				<div class="agile-contact-left">
					<div class="col-md-6 address-grid">
						<h4>For More <span>Information</span></h4>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Telephone </p>
									<span>+91 7679064552</span><br />
									<span>+91 9474468236</span>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
							  <div class="contact-right">
									<p>Mail </p><a href="mailto:cshoppy007@gmail.com">cshoppy007@gmail.com</a></div>
								<div class="clearfix"> </div>
							</div>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Location</p>
									<span>NEW TOWN,KOLKATA,WEST BENGAL,INDIA.</span>
								</div>
								<div class="clearfix"> </div>
							</div>	
					</div>
					<!--<div class="col-md-6 contact-form">
						<h4 class="white-w3ls">Contact <span>Form</span></h4>
						<form action="#" method="post">
						<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required=""> 
								<label>Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="Email" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="text" name="Subject" required="">
								<label>Subject</label>
								<span></span>
							</div>
							<div class="styled-input">
								<textarea name="Message" required=""></textarea>
								<label>Message</label>
								<span></span>
							</div>	 
							<input type="submit" name="submit" value="SEND">
							<h5 align="center"></h5>
						</form>
					</div>-->
				</div>
				<div class="clearfix"> </div>
			</div>
       </div>
	</div>
 <!--//contact-->
<!--/grids-->
<div class="coupons">
		<div class="coupons-grids text-center">
			<div class="w3layouts_mail_grid">
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE SHIPPING</h3>
						<p>FREE SHIPPING for purchase ABOVE INR 599 </p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-headphones" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>24/7 SUPPORT</h3>
						<p>FOR any queries call us at +91 7679064552 or mail us at cshoppe007@gmail.com</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>MONEY BACK GUARANTEE</h3>
						<p>Money is returned back to the consumer within 72 hours of return.</p>
					</div>
				</div>
					<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-gift" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE GIFT COUPONS</h3>
						<p>EXCITING GIFT voucher awaits you on various festivals.</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
</div>
<!--grids-->
<!-- footer -->
<div class="footer">
	<div class="footer_agile_inner_info_w3l">
		<div class="col-md-3 footer-left">
			<h2><a href="index.php"><span>C</span> yber Shoppy </a></h2>
			<p>"Style is the only thing you can’t buy. It’s not in a shopping bag, a label, or a price tag. It’s something reflected from our soul to the outside world—an emotion.”—Alber Elbaz </p>
			<p>HAPPY SHOPPING!!!!...</p>
			
	  </div>
		<div class="col-md-9 footer-right">
			<div class="sign-grds">
				<div class="col-md-4 sign-gd">
					<h4>Our <span>Information</span> </h4>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="contact.php">Contact</a></li>
						<li><a href="module.php">Modules</a></li>
					</ul>
				</div>
				
				<div class="col-md-5 sign-gd-two">
					<h4>Store <span>Information</span></h4>
					<div class="w3-address">
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Phone Number</h6>
								<p>+91 7679064552 </p>
								<p>+91 9474468236 </p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Email Address</h6>
								<p>Email :<a href="mailto:cshoppy007@gmail.com"> cshoppy007@gmail.com </a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Location</h6>
								<p>NEW TOWN, KOLKATA, WEST BENGAL, INDIA.  
								
								</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-3 sign-gd flickr-post">
					<h4>Flickr <span>Posts</span></h4>
					<ul>
         <li><a href="https://www.facebook.com/souvik.basu.566?epa=SEARCH_BOX"><img src="images/Prod_image/Dev_pics/D2.jpg" alt=" " class="img-responsive" /></a></li>
		<li><a href="https://www.facebook.com/angeloniladri"><img src="images/Prod_image/Dev_pics/D7.jpg" alt=" " class="img-responsive" /></a></li>
		<li><a href="https://www.facebook.com/souvik.basu.566?epa=SEARCH_BOX"><img src="images/Prod_image/Dev_pics/D4.jpg" alt=" " class="img-responsive" /></a></li>
		<li><a href="https://www.facebook.com/angeloniladri"><img src="images/Prod_image/Dev_pics/Dev8.jpg" alt=" " class="img-responsive" /></a></li>
		<li><a href="https://www.facebook.com/souvik.basu.566?epa=SEARCH_BOX"><img src="images/Prod_image/Dev_pics/D6.jpg" alt=" " class="img-responsive" /></a></li>
		<li><a href="https://www.facebook.com/angeloniladri"><img src="images/Prod_image/Dev_pics/D7.jpg" alt=" " class="img-responsive" /></a></li>
		<li><a href="https://www.facebook.com/souvik.basu.566?epa=SEARCH_BOX"><img src="images/Prod_image/Dev_pics/D6.jpg" alt=" " class="img-responsive" /></a></li>
		<li><a href="https://www.facebook.com/souvik.basu.566?epa=SEARCH_BOX"><img src="images/Prod_image/Dev_pics/D2.jpg" alt=" " class="img-responsive" /></a></li>
		<li><a href="https://www.facebook.com/angeloniladri"><img src="images/Prod_image/Dev_pics/Dev8.jpg" alt=" " class="img-responsive" /></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
			
		<div class="clearfix"></div>
	</div>
		<p class="copy-right">&copy 2019 CYBER Shoppy. All rights reserved | Design by <a href="">Niladri Goswami & Souvik Basu</a></p>
	</div>
</div>
<!-- //footer -->

<!-- login -->
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom">
										<h3>Sign up for free</h3>
										<form>
											<div class="sign-up">
												<h4>Email :</h4>
												<input type="text" value="Type here" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-up">
												<h4>Password :</h4>
												<input type="password" value="Password" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<h4>Re-type Password :</h4>
												<input type="password" value="Password" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<input type="submit" value="REGISTER NOW" >
											</div>
											
										</form>
									</div>
									<div class="login-right">
										<h3>Sign in with your account</h3>
										<form>
											<div class="sign-in">
												<h4>Email :</h4>
												<input type="text" value="Type here" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-in">
												<h4>Password :</h4>
												<input type="password" value="Password" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Password';}" required="">
												<a href="#">Forgot password?</a>
											</div>
											<div class="single-bottom">
												<input type="checkbox"  id="brand" value="">
												<label for="brand"><span></span>Remember Me.</label>
											</div>
											<div class="sign-in">
												<input type="submit" value="SIGNIN" >
											</div>
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- //login -->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->	
	<!-- cart-js -->
	<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>

	<!-- //cart-js --> 

<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
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

<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- top panel tooltip script -->
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
</body>
</html>
