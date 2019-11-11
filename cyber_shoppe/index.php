<?php
include("../connection/config.php");
/*$user='root';
$pass='';
$db='shopping';
$conn= new mysqli('localhost', $user, $pass, $db) or die("DANG!!...unable to connect!");*/

session_cache_limiter(FALSE);
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>CYBER SHOPPY :: HOME</title>
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
	<div class="container" align="left">
		<ul>
		<?php if(isset($_SESSION['first_name'])){ 
					?>
			 <li><i class="fa fa-unlock-alt"></i>Signed In as <a href="profile.php"data-toggle="tooltip" data-placement="bottom" title="Click to Edit profile"><font color="#2AFFD4"><?php echo $_SESSION['first_name'];?></font></a></li>
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
			&nbsp;&nbsp;&nbsp;&nbsp;
			
         <!-- header-bot -->
		 <div class="col-md-4 agileits-social top_content" align="center">			
			<?php 
			//session_cache_limiter(FALSE);
			//session_start();
			$log_id= $_SESSION['user_id'];
			//echo $log_id;
			//exit;
			if(isset($_SESSION['first_name'])){ 
					?>
			<table><tr><td><h4><strong>Welcome,&nbsp;<a href="profile.php"data-toggle="tooltip" data-placement="bottom" title="Click to Edit profile"><?php echo $_SESSION['first_name']; ?></a></strong></h4></td></tr>
			<?php }?>
			</table>
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
					<li class="active menu__item menu__item--current"><a class="menu__link" href="index.php">Home <span class="sr-only">(current)</span></a></li>
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
				
					<li class=" menu__item"><a class="menu__link" href="contact.php">Contact</a></li>
					<?php if(isset($_SESSION['first_name'])){  ?>
					<!--<li class=" menu__item"><a class="menu__link" href="update_profile.php">Profile</a></li>-->
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
						//header("location: index.php");
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

<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
			<li data-target="#myCarousel" data-slide-to="4" class=""></li> 
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>The Biggest <span>Sale</span></h3>
						<p>Special for today</p>
						<a class="hvr-outline-out button2" href="index.php">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item2"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Summer <span>Collection</span></h3>
						<p>New Arrivals On Sale</p>
						<a class="hvr-outline-out button2" href="index.php">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item3"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>The Biggest <span>Sale</span></h3>
						<p>Special for today</p>
						<a class="hvr-outline-out button2" href="index.php">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item4"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>The Biggest <span>Sale</span></h3>
						<p>New Arrivals On Sale</p>
						<a class="hvr-outline-out button2" href="index.php">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item5"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>The Biggest <span>Sale</span></h3>
						<p>Special for today</p>
						<a class="hvr-outline-out button2" href="index.php">Shop Now </a>
					</div>
				</div>
			</div> 
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
    </div> 
	<!-- //banner -->
    <div class="banner_bottom_agile_info">
	    <div class="container">
            <div class="banner_bottom_agile_info_inner_w3ls">
    	           <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
						<figure class="effect-roxy">
							<img src="images/bottom1.jpg" alt=" " class="img-responsive" />
							<figcaption>
								<h3><span>F</span>all Ahead</h3>
								<p>New Arrivals</p>
							</figcaption>			
					 </figure>
			  </div>
					 <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
						<figure class="effect-roxy">
							<img src="images/bottom2.jpg" alt=" " class="img-responsive" />
							<figcaption>
								<h3><span>F</span>all Ahead</h3>
								<p>New Arrivals</p>
							</figcaption>			
					   </figure>
					</div>
					<div class="clearfix"></div>
		    </div> 
		 </div> 
    </div>
	<!-- schedule-bottom -->
	<div class="schedule-bottom">
		<div class="col-md-6 agileinfo_schedule_bottom_left">
			<img src="images/mid.jpg" alt=" " class="img-responsive" />
		</div>
				<div class="col-md-6 agileits_schedule_bottom_right">
			<div class="w3ls_schedule_bottom_right_grid">
				<h3>Save up to <span>50%</span> in this week</h3>
				<p>The season sale is back!! Buyers Hurry Up to avail amazing offers!!!...</p>
					<?php
				$fsql = "select * from user_master where is_active='1'";
				$frec = mysqli_query($conn,$fsql);
				$fnum = mysqli_num_rows($frec);
				?>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-user-o" aria-hidden="true"></i>
					<h4>Customers</h4>
					<h5 class="counter"><?php echo $fnum;?></h5>
				</div>
				<?php	
				$fsql1 = "select * from vendor_master where is_active='1'";
				$frec1 = mysqli_query($conn,$fsql1);
				$fnum1 = mysqli_num_rows($frec1);
				?>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-calendar-o" aria-hidden="true"></i>
					<h4>Vendors</h4>
					<h5 class="counter"><?php echo $fnum1;?></h5>
				</div>
				<?php
				$fsql2 = "select * from product where is_active='1'";
				$frec2 = mysqli_query($conn,$fsql2);
				$fnum2 = mysqli_num_rows($frec2);
				?>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-shield" aria-hidden="true"></i>
					<h4>Products</h4>
					<h5 class="counter"><?php echo $fnum2;?></h5>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- //schedule-bottom -->
  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="container">
		<h3 class="wthree_text_info">What's <span>Trending</span></h3>
	
		<div class="col-md-5 bb-grids bb-left-agileits-w3layouts">
			<!--<a href="#">-->
			   <div class="bb-left-agileits-w3layouts-inner grid">
					<figure class="effect-roxy">
							<img src="images/bb1.jpg" alt=" " height="436" border="0" class="img-responsive" />
							<figcaption>
								<h3><span>S</span>ale </h3>
								<p>Upto 55%</p>
					  </figcaption>			
				 </figure>
		    </div>
		  <!--</a>-->
	  </div>
		<div class="col-md-7 bb-grids bb-middle-agileits-w3layouts">
		     <!-- <a href="#">-->
		       <div class="bb-middle-agileits-w3layouts grid">
			           <figure class="effect-roxy">
							<img src="images/bottom3.jpg" alt=" " class="img-responsive" />
							<figcaption>
								<h3><span>S</span>ale </h3>
								<p>Upto 55%</p>
							</figcaption>			
				 </figure>
	          </div>
		 <!-- </a>-->
				<!--<a href="#">-->
		      <div class="bb-middle-agileits-w3layouts forth grid">
						<figure class="effect-roxy">
							<img src="images/bottom4.jpg" alt=" " class="img-responsive">
							<figcaption>
								<h3><span>S</span>ale </h3>
								<p>Upto 65%</p>
							</figcaption>		
				</figure>
				</div>
		  <!--</a>-->
		<div class="clearfix"></div>
	</div>
	</div>
    </div>
<!--/grids-->
      <div class="agile_last_double_sectionw3ls">
            <div class="col-md-6 multi-gd-img multi-gd-text ">
					<a>
					<img src="images/bot_1.jpg" alt=" " border="0">
			  <h4>Flat <span>50%</span> offer</h4>
			  </a>			
		</div>
			 <div class="col-md-6 multi-gd-img multi-gd-text ">
					<a>
					<img src="images/bot_2.jpg" alt=" " border="0">
			   <h4>Flat <span>50%</span> offer</h4>
			  </a>
		</div>
			<div class="clearfix"></div>
</div>							
<!--/grids-->
<!-- /new_arrivals --> 
	<div class="new_arrivals_agile_w3ls_info"> 
		<div class="container">
		    <h3 class="wthree_text_info">New <span>Arrivals</span></h3>		
				<div id="horizontalTab">
				<?php
	           $result3 = mysqli_query($conn, "SELECT * FROM product where is_active=1 and quantity>0");
			   while($row3 = mysqli_fetch_array($result3))
			   {
				?>				
					  <ul><a href="subdetail.php?scid=<?php echo $row1["sub_cat_id"]; ?>"><?php echo "$row1[sub_cat_name]"; ?></a></ul>
					
				
							<div class="col-md-4 product-men">
								<div class="col-lg-16 men-pro-item simpleCart_shelfItem">
									<div class="col-lg-12 men-thumb-item">
										<img width="300px" height="255px" src="images/Prod_image/<?php echo $row3["url"]; ?>" alt="" class="pro-image-front">
										<img width="300px" height="255px" src="images/Prod_image/<?php echo $row3["url"]; ?>" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="product.php?prodid=<?php echo $row3["p_id"]; ?>" class="link-product-add-cart">Quick View</a>												</div>
											</div>
											<span class="product-new-top">New</span>
											
									</div>
									<div class="item-info-product ">
										<h4><?php echo $row3["name"]; ?></h4>
										<div class="info-product-price">
											<span class="item_price"><?php echo $row3["price"]; ?></span> &nbsp;&nbsp;
											<span class="item_price"><font color="red">Rs<?php echo $row3["discount"];?>/- OFF</font></span>
										</div>										
									</div>
								</div>
							</div>
			   <?php
			   }
			   ?>
				  <div class="clearfix"></div>
				</div>
			</div>
		</div>
	<!-- //new_arrivals --> 
	<!-- /we-offer -->
		<div class="sale-w3ls">
			<div class="container">
				<h6>We Offer Flat <span><font color="#A8A8A8">50%</font></span> Discount</h6>
 
				<a class="hvr-outline-out button2" href="index.php">Shop Now </a>
			</div>
		</div>
	<!-- //we-offer -->
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
					  <p>FOR any queries call us at +91 7679064552 or mail us at cshoppy007@gmail.com</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</div>
				  <div class="w3layouts_mail_grid_left2">
					  <h3>MONEY BACK GUARANTEE</h3>
					  <p>Money is returned back to the consumer within 72 hours of return. </p>
				  </div>
				</div>
					<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-gift" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE GIFT COUPONS</h3>
						<p>EXCITING GIFT voucher awaits you on various festivals. </p>
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
			<p>"Style is the only thing you can’t buy. It’s not in a shopping bag, a label, or a price tag. It’s something reflected from our soul to the outside world—an emotion.”—Alber Elbaz
			</p>
			<p>HAPPY SHOPPING!!!...</p>
			
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
								<p>+91 7679064552</p>
								<p>+91 9474468236</p>
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
								<p>NEWTOWN, KOLKATA, WEST BENGAL, INDIA  .
								
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
	</div>
		<p class="copy-right">&copy 2019 CYBER Shoppy. All rights reserved | Design by <a href="">Niladri Goswami & Souvik Basu</a></p></p>
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
<script src="js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links --> 
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
<!-- script for responsive tabs -->						
<script src="js/easy-responsive-tabs.js"></script>
<script>
	INR (document).ready(function () {
	INR ('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var INR tab = INR (this);
	var INR info = INR ('#tabInfo');
	var INR name = INR ('span', INR info);
	INR name.text(INR tab.text());
	INR info.show();
	}
	});
	INR ('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- //script for responsive tabs -->		
<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
	<script>
		INR ('.counter').countUp();
	</script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function(INR ) {
		INR (".scroll").click(function(event){		
			event.preventDefault();
			INR ('html,body').animate({scrollTop:INR (this.hash).offset().top},1000);
		});
	});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		INR (document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			INR ().UItoTop({ easingType: 'easeOutQuart' });
								
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
