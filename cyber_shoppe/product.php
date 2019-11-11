<?php
include("../connection/config.php");
/*$user='root';
$pass='';
$db='shopping';
$conn= new mysqli('localhost', $user, $pass, $db) or die("DANG!!...unable to connect!");*/
session_cache_limiter(FALSE);
session_start();
$user_check = $_SESSION['user_email'];
   
   $ses_sql = mysqli_query($conn,"select * from user_master where user_email = '$user_check' ");
   
   $row23 = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row23['first_name'];
   $log_id=$row23['user_id'];
   //echo $log_id;
  //echo $login_session;
   //exit;
   
   if(!isset($_SESSION['user_email'])){
      header("location:index.php");
      die();
   }
$row3 ="";
$row4 ="";
$row5 ="";
$row9 ="";


if((isset($_GET["prodid"]))){
	$enc_property_id = $_GET["prodid"];
	if($enc_property_id==""){
		header(sprintf("Location: %s", "index.php"));
	}else{
		$pid = $enc_property_id;

		$result3 = mysqli_query($conn,"SELECT * FROM product where p_id=$pid");
		
	}
}else{
	header(sprintf("Location: %s", "index.php"));
}
if($result3!=""){
	$row3 = mysqli_fetch_array($result3);

	$result4 = mysqli_query($conn, "SELECT cat_name from category_master where cat_id=$row3[cat_id]");
	$row4 = mysqli_fetch_array($result4);

	$result5 = mysqli_query($conn, "SELECT sub_cat_name from subcategory_master where sub_cat_id=$row3[sub_cat_id]");
	$row5 = mysqli_fetch_array($result5);
	
	
	/*
	$result73 = mysql_query("SELECT location_name from t_location where location_id=$row3[location_id]");
	$row73 = mysql_fetch_array($result73);
	
	$result74 = mysql_query("SELECT city_name from t_city where city_id=$row3[city_id]");
    $row74 = mysql_fetch_array($result74);*/
}
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>CYBER SHOPPY :: SINGLE</title>
<link rel="icon" title="image/png" href="images/Prod_image/cyber_shoppe logo.png" />
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- header -->
<div class="header" id="home">
	<div class="container">
		<ul>
		    <li><i class="fa fa-unlock-alt" ></i>Signed In as <a href="profile.php"data-toggle="tooltip" data-placement="bottom" title="Click to Edit profile"><font color="#2AFFD4"><?php echo $login_session; ?></font></a></li>		
			<li><i class="fa fa-calendar" ></i><?php echo date("d/m/Y");?></li>
			<li><i class="fa fa-hourglass-half" ></i><?php echo date("h:i a"); ?></li>
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
			$usr_name=$_SESSION['first_name']; 
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
					<li class="active menu__item menu"><a class="menu__link" href="index.php">Home <span class="sr-only">(current)</span></a></li>
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
					  <li><a href="subdetail.php?scid=<?php echo "$row1[sub_cat_id]"; ?>"><?php echo "$row1[sub_cat_name]"; ?></a></li>
					
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
					<li class="active menu__item"><a class="menu__link" href="contact.php">Contact</a></li>
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
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
									<form action="#" method="post"><?php
				if(isset($_POST['Submit']))
				{
					$u_name=$_POST['Name'];
					$password=$_POST['pwd'];
					if($_POST['Submit'])
					{
						$sql="select * from user_master where user_email='$u_name' AND password='$password'";
						//echo $sql;
						//exit;
						$rec=mysqli_query($conn,$sql);
						//echo $rec;
						//exit;
                        $res=mysqli_fetch_assoc($rec);
             			 if($u_name==$res['user_email'] && $password==$res['password'])
						 {
							 echo "<script>
							 alert('login successful');
							 location.replace('index.php?');
							 </script>";
						 }
						 else
						 {
							  echo "<script>
							 alert('login failed');
							 location.replace('about.php?');
							 </script>";
						 }
						 
						
					}
				}
				?>
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
							<input type="submit" value="Sign In">
						</form>
						  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
														<div class="clearfix"></div>
														<p><a href="#" data-toggle="modal" data-target="#myModal2" > Don't have an account?</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/log_pic.jpg" alt=" "/>
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
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
									<form action="#" method="post"><?php
						if(isset($_POST['Submit1']))
     {   //$u_id=$_POST['uid'];
        $u_email=$_POST['Email'];
	    $fname=$_POST['fname'];
		 $lname=$_POST['lname'];
		$phone=$_POST['pno'];
		$pass=$_POST['password'];
		$cpass=$_POST['c_pwd'];
	if($_POST['Submit1'] && $pass=$cpass)
	      {
		     $reg1="insert into user_master(user_email,password,is_active,first_name,last_name,phone) values('$u_email','$pass',1,'$fname','$lname','$phone')";
			//echo $sql;
			 //exit;
			 $rec1=mysqli_query($conn,$reg1);
			  // echo $rec;
			    //exit;
			   if($rec1)
			   {
			       echo "<script>
				   alert('data inserted');
				   location.replace('index.php?');
				   </script>";
			   
			   }
			   else 
			   {
			   echo "<script>
				   alert('data not inserted');
				   location.replace('REGISTER1.php?');
				   </script>";
			   }
		  
		  }
	   }
?>
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
								<input type="password" name="password" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="Confirm Password" required=""> 
								<label>Confirm Password</label>
								<span></span>
							</div> 
							<input type="submit" value="Sign Up">
						</form>
						  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
														<div class="clearfix"></div>
														<p><a href="#">By clicking register, I agree to your terms</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/log_pic.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal2 -->
<!--/single_page-->
       <!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Your Item is Waiting for <span>Shopping Bag </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li>Product Overview</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					
					<ul class="slides">
						<li data-thumb="images/Prod_image/<?php echo "$row3[url]";?>">
							<div class="thumb-image"> <img src="images/Prod_image/<?php echo "$row3[url]";?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb="images/Prod_image/<?php echo "$row3[url]";?>">
							<div class="thumb-image"> <img src="images/Prod_image/<?php echo "$row3[url]";?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>	
						<li data-thumb="images/Prod_image/<?php echo "$row3[url]";?>">
							<div class="thumb-image"> <img src="images/Prod_image/<?php echo "$row3[url]";?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
					<h3><?php echo "$row3[name]";?>&nbsp;&nbsp; : &nbsp;&nbsp;<?php echo "$row3[brand]";?></h3>
					<h4><?php echo "$row4[cat_name]";?> / <?php echo "$row5[sub_cat_name]";?></h4>
					<p><span class="item_price">INR <?php echo "$row3[price]";?></span>&nbsp;&nbsp; <span><font color="#CC0000">INR <?php echo "$row3[discount]";?> /- OFF</font></span></p>
					
					<div class="description">
						<h5>Check Size Availibility</h5>
						<h3><?php echo "$row3[sizes]";?>
					</div>
				
<form action="" method="post">

<?php
$row3 ="";
$row4 ="";
$row5 ="";

if((isset($_GET["prodid"]))){
	$enc_property_id = $_GET["prodid"];
	if($enc_property_id==""){
		header(sprintf("Location: %s", "index.php"));
	}else{
		$pid = $enc_property_id;

		$result3 = mysqli_query($conn,"SELECT * FROM product where p_id=$pid");
		
	}
}else{
	header(sprintf("Location: %s", "index.php"));
}
if($result3!=""){
	$row3 = mysqli_fetch_array($result3);

	$result4 = mysqli_query($conn, "SELECT cat_name from category_master where cat_id=$row3[cat_id]");
	$row4 = mysqli_fetch_array($result4);

   
	$result5 = mysqli_query($conn, "SELECT sub_cat_name from subcategory_master where sub_cat_id=$row3[sub_cat_id]");
	$row5 = mysqli_fetch_array($result5);
	
	////echo $sb;
	//exit;
	//$souvik="SELECT * from product where p_id=$enc_property_id"
	$result11 = mysqli_query($conn,"SELECT * from product where p_id='".$enc_property_id."'");
	
	
	$row9 =mysqli_fetch_assoc($result11);
	
	
	
	
	
	
}
?>
															
						
							<h5>Quantity :</h5>
							<p><?php echo $row9['quantity'];?> items AVAILABLE</p>
							<select name="quants" class="frm-field required sect">
								<option value="1">1</option>
								<option value="2">2</option> 
								<option value="3">3</option>					
								<option value="4">4</option>								
							</select>
							<?php
							$chk= $row9['quantity'];
							if(isset($_POST['submit1']))
							{
								$quantity=$_POST['quants'];
								$prid=$enc_property_id;
								$dt= date("d/m/Y");
							$amount_val=$row9['price'];	
	                      $dis= $row9['discount'];
	                        $net_amount=$amount_val-$dis;
	                        $net_total=$net_amount*$quantity;
							$up_qty=$chk-$quantity;
							if($chk >= $quantity)
							{
							$soy="insert into billing (billing_id,billing_date,user_id,p_id,quantity_ordered,value,is_active) values('', '$dt','$log_id;','$prid','$quantity','$net_total','1')";
							//echo $soy;
							//exit;
							$ins_cart=mysqli_query($conn,$soy);
							$rem_up="update product set quantity='$up_qty' where p_id='$prid' and is_active='1'";
	   $remup = mysqli_query($conn,$rem_up);
							
							
							 echo "<script>
				   alert('ITEM ADDED TO CART');
				   location.replace('cart1.php?');
				   </script>";
							
							}
							 else 
			   {
			   echo "<script>
				   alert('ITEMS UNAVAILABLE IN STOCK');
				   location.replace('index.php?');
				   </script>";
			   }
							
							
							
							}
							?>
							<div>
						<div>
						
							<div>
						
					
																<fieldset>
																
	
																<input type="hidden" name="prid" value="<?php echo "$row3[p_id]";?>">
																<input type="hidden" name="item_name" value="<?php echo "$row3[name]";?>">
																<input type="hidden" name="amount" value="<?php echo "$row3[price]";?>">
																<input type="hidden" name="discount_amount" value="<?php echo "$row3[discount]";?>">							
																		
						
																	
																<input type="submit" name="submit1"  value="Add to Cart" class="button">	
																</fieldset>
																</div>
															</form>
														</div>
																			
					</div>
					
					
		      </div>
	 			<div class="clearfix"> </div>
				<!-- /new_arrivals --> 
	<div class="responsive_tabs_agileits"> 
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Description</li>
							
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">

							<div class="single_page_agile_its_w3ls">
							  <h3><font color="#86E3C5"><?php echo "$row3[name]";?></font></h3>
							  &nbsp;&nbsp;&nbsp;&nbsp;
							   <h4><font color="#CF773D"><strong>BRAND: &nbsp;&nbsp;</font><?php echo "$row3[brand]";?> </strong></h4>
							   <p class="w3ls_para"><?php echo "$row3[description]";?></p>
							</div>
						</div>
						<!--//tab_one-->
						
						   <!--div class="tab3">

							<div class="single_page_agile_its_w3ls">
							  <h6>Big Wing Sneakers (Navy)</h6>
							   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
							   <p class="w3ls_para">Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
							</div>
						</div-->
					</div>
				</div>	
			</div>
	<!-- //new_arrivals --> 
	  	<!--/slider_owl-->
	
			
	        </div>
 </div>
<!--//single_page-->
<?php include("footer.php"); ?>

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
	<!-- single -->
<script src="js/imagezoom.js"></script>
<!-- single -->
<!-- script for responsive tabs -->						
<script src="js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- FlexSlider -->
<script src="js/jquery.flexslider.js"></script>
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
<!-- //script for responsive tabs -->		
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
