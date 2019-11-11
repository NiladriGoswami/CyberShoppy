<?php
include("../connection/config.php");
/*$user='root';
$pass='';
$db='shopping';
$conn= new mysqli('localhost', $user, $pass, $db) or die("DANG!!...unable to connect!");*/
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


$pr_id= $_SESSION['p_id'];
//timer



			
		

	if(isset($_GET['D']))
	{
	$D = base64_decode($_GET['D']);
	
	//update quantity
	$rex="select * from billing where billing_id='$D'";
	$rex1=mysqli_query($conn,$rex);
	$pot=mysqli_fetch_array($rex1);
	$pot1=$pot['p_id'];
	
		$qo="SELECT b.*, c.* from billing b,product c where c.p_id='$pot1' and b.user_id='$log_id' and b.is_active='1'";
		$hot=mysqli_query($conn,$qo);
		$hot1=mysqli_fetch_array($hot);
		$hott=$hot1['quantity'];
		$hott2=$hot1['quantity_ordered'];
		$hott3=$hott+$hott2;
		
		$hate="update product set quantity='$hott3' where p_id='$pot1'";
		//echo $hate;
		//exit;
		$hate1=mysqli_query($conn,$hate);
		
	//delete item
	$dsql = "delete from billing where billing_id='$D'";
	$drec = mysqli_query($conn,$dsql);
	
	if($drec)
	{
		echo "<script>
							 alert('Your Order for the particular Product is Cancled!!!!');
							 location.replace('cart1.php?');
							 </script>";
		}
}  


$w="select * from billing where is_active='1' AND user_id='$log_id'";
$row="";
$row1 ="";		//for product;
$row2 ="";		//for date;
$row3 ="";
$row4 ="";
 $net_amount="";
 $amount_val="";
 $dis="";
	
	  $net_total="";
	 $enc_quants="";
	 

?>

<!DOCTYPE html>
<html>
<head>

<title>CYBER SHOPPY :: CART</title>
<link rel="icon" title="image/png" href="images/Prod_image/cyber_shoppe logo.png" />
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- experiment -->
 <!-- Bootstrap Core CSS -->
        <link href="css1/bootstrap.min.css" rel="stylesheet">

        
<!--//experiment-->

<!-- //tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<!--experiment css-->
		<!-- MetisMenu CSS -->
        <link href="css1/metisMenu.min.css" rel="stylesheet">

        <!-- Social Buttons CSS -->
        <link href="css1/bootstrap-social.css" rel="stylesheet">


        <!-- Custom CSS -->
        <link href="css1/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css1/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!--//experiment css-->
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
						$sql="select * from t_user where user_email='$u_name' AND password='$password'";
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
		     $reg1="insert into t_user(user_email,password,is_active,first_name,last_name,phone) values('$u_email','$pass',1,'$fname','$lname','$phone')";
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
			<h3>Your Item is Ready FOR <span>PURCHASE </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li>Cart</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>
<!--cart_table-->
<div class="container-fluid">
<div  align="right" class="col-md-2"></div>
<div  align="center" class="col-md-8 product-men">
<div class="men-pro-item simpleCart_shelfItem">
	<h1><u>Cart</u> :</h1>
	</ br>
<form action="" method="post">
  <?php	
		$p="SELECT b.*, c.* from billing b,product c where b.p_id=c.p_id and b.user_id='$log_id' and b.is_active='1'";
		$exec=mysqli_query($conn,$p);
		//echo $exec;
		//exit;
	
				$fnum1 = mysqli_num_rows($exec);
			//	echo $fnum1;
				//exit;
		//$row= mysqli_fetch_array($exec);
		
		
	?>
	  <!--<table align="center" border="0">-->
	  <!--<div  align="right" class="table-responsive">-->
	   <div  align="center" class="table-responsive">
	  <tbody class="col-md-5 table table-bordered">
  <table width="775" height="241" border="0">
  
    <tr>
      <td colspan="2" bgcolor="">
	  &nbsp;
	  <table width="724" border="0" align="center" class="table-bordered">
        <tr bgcolor="#E9E8F9">
		  
          <td align="center"><b>Product Name</b></td>
          <td align="center"><b>Quantity</b></td>
          <td align="center"><b>Price</b></td>
          <td align="center"><b>Discount</b></td>
          <td align="center"><b>Value</b></td>
          <td align="center"><b>Action</b></td>
        </tr>	
	<?php	 
	


			   if(isset($_POST['Buy']))
{
  	 
	$rem_up="update product set quantity='$rem_qty' where p_id='$pr_id' and is_active='1'";
	   $remup = mysqli_query($conn,$rem_up);
	   //echo $remup;
	  // exit;
	$eesql="update billing set is_active='0' where user_id='$log_id' and is_active='1'";
			//echo $eesql;
			//exit;

		        $eerec1 = mysqli_query($conn,$eesql);
			
				echo "<script>
							 alert('Your Orders are purchased!!!!');
							 location.replace('index.php?');
							 </script>";
			
}
//delete
   if(isset($_POST['Cancel']))
{
	while($row=mysqli_fetch_array($exec))
			{
			$pp=$row['p_id'];
	$final_qty=$row['quantity_ordered'] + $row['quantity'];
	
	$eesql123="update product set quantity='$final_qty' where p_id='$pp'";
			//echo $eesql;
			//exit;

		        $eerec123 = mysqli_query($conn,$eesql123);
				 }
							 $rad="delete from billing where user_id='$log_id'";
							// echo $rad;
							 //exit;
				$rad1=mysqli_query($conn,$rad);
				echo "<script>
							 alert('Your Orders are CANCELLED!!!!--------- HAPPY SHOPPING------');
							 location.replace('index.php?');
							 </script>";
			
} 
if($fnum1 > 0)
	   {    
	   		while($row=mysqli_fetch_array($exec))
			{
			   $ip=$row['value'];
			   $total=$total+$ip;	   
		?>
		<tr>
          <td width="192">&nbsp;</td>
          <td width="120">&nbsp;</td>
          <td width="73">&nbsp;</td>
          <td width="119">&nbsp;</td>
          <td width="83">&nbsp;</td>
          <td width="113">&nbsp;</td>
        </tr>

		
		<tr bgcolor="#FFFFFF">
          <td align="center"><?php echo $row['name']; ?></td>
           <td align="center"><?php echo $row['quantity_ordered']; ?></td>
           <td align="center"><?php echo $row['price']; ?></td>
           <td align="center"><?php echo $row['discount']; ?></td>
           <td align="center"><?php echo $row['value']; ?></td>
          <td align="center"><button type="button" class="btn btn-outline btn-danger"><a href="cart1.php?D=<?php  echo base64_encode($row['billing_id']); ?>"><b>X</b></a></button></td>
        </tr>
		<?php 
	} 
}
		?>
      </table>
	  <div></div>
	  <div></div>
	  <hr />
	  <table width="728" align="center">
	  	<tr>
          <td width="192" align="center"><font size="+1"><strong>TOTAL :</strong></font></td>
          <td width="120">&nbsp;</td>
          <td width="73">&nbsp;</td>
          <td width="139">&nbsp;</td>
          <td width="143"><font size="+1" color="#FF6633"><strong>Rs.<?php echo $total;?>/- Only</strong></font></td>
          <td width="33"></td>
        </tr>
		<tr>
          <td width="192">&nbsp;</td>
          <td width="120">&nbsp;</td>
          <td width="73">&nbsp;</td>
          <td width="119">&nbsp;</td>
          <td width="83">&nbsp;</td>
          <td width="113">&nbsp;</td>
        </tr>
	  </table>
        <table width="176" border="0" align="center">
          <tr>
            <td width="76" align="center"><input type="submit" name="Buy" value="Buy" class=" btn btn-outline btn-success btn-lg" /></td>
			
            <td width="90" align="center"><input type="submit" name="Cancel" value="Cancel" class=" btn btn-outline btn-danger btn-lg" /></a></td>
          </tr>
        </table>        <p>&nbsp;</p></td>
    </tr>
  </table>
  </tbody>
  </table>
</div>
</form>
</div>
<div  align="right" class="col-md-2"></div>	
</div>
</div>	
</br>
<!--//cart_table-->		
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
