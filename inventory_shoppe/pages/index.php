<?php
include("../../connection/config.php");
/*$user='root';
$pass='';
$db='shopping';
$conn= new mysqli('localhost', $user, $pass, $db) or die("DANG!!...unable to connect!");*/

session_start();
$user_check = $_SESSION['vendor_email'];
   
   $ses_sql = mysqli_query($conn,"select * from vendor_master where vendor_email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['vendor_name'];
   $log_id=$row['vendor_id'];
   $pphh=$row['phone'];
    $em=$row['vendor_email'];
   
   if(!isset($_SESSION['vendor_email'])){
      header("location:../login.php");
      die();
   }
//insert product count//
				$fsql4 = "select * from product where is_active='1' and vendor_id='$log_id' ";
				$frec4 = mysqli_query($conn,$fsql4);
				$fnum4 = mysqli_num_rows($frec4);
				while($kiddo=mysqli_fetch_array($frec4))
				    {
					   $ipl=$kiddo['quantity'];
					  $bmw=$bmw+$ipl;
					}
					//echo $bmw;
					//exit;
//manage product count//
				$fsql5 = "select * from product where is_active='1' and vendor_id='$log_id'";
				$frec5 = mysqli_query($conn,$fsql5);
				$fnum5 = mysqli_num_rows($frec5);
//scarced product
$fsql7 = "select * from product where vendor_id='$log_id' and quantity<10";
				//echo $fsql;
				//exit;
				$frec7 = mysqli_query($conn,$fsql7);
				$fnum7 = mysqli_num_rows($frec7);
//total business
$p="SELECT b.*, c.* from billing b,product c where b.p_id=c.p_id and c.vendor_id='$log_id' and b.is_active='0'";
		$exec=mysqli_query($conn,$p);
	
				$fnum1 = mysqli_num_rows($exec);
				if($fnum1 > 0)
	   {    
	   		while($row=mysqli_fetch_array($exec))
			{
			   $ip=$row['value'];
			   $total=$total+$ip;
			   $vk=$row['quantity_ordered'];
			   $ms=$ms+$vk;
			   }
			   }
			   //chart
			   $poo="SELECT * from billing b,product c  where b.p_id=c.p_id and c.vendor_id='$log_id' and b.billing_date like '_%2019'";
		$execoop=mysqli_query($conn,$poo);
	
				$fnum1oop = mysqli_num_rows($execoop);
				if($fnum1oop > 0)
	   {    
	   		while($rowoop=mysqli_fetch_array($execoop))
			{
			   $ipoop=$rowoop['value'];
			   $totaloop=$totaloop+$ipoop;
			   }
			   }
			  // echo $totaloop;
			  // exit;
			 $cht="update vendor_chart_master set sales='$totaloop' where year='2019' and v_id='$log_id'";
              $cht1=mysqli_query($conn,$cht);	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>INVENTORY::VENDOR DASHBOARD::</title>
		<link rel="icon" title="image/png" href="../../cyber_shoppe/images/Prod_image/inventory_logo.png" />
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../pages/index.php">VENDOR DASHBOARD</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="../../cyber_shoppe/about.php"><i class="fa fa-home fa-fw"></i>Cyber Shoppe</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">
                       <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $login_session;?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="../vendor_update.php"><i class="fa fa-cogs fa-fw"></i>Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="../logout.php" ><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                 <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                          
                            <li>
                                <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Products <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="insert_product.php">Add New Products</a>
                                    </li>
                                    <li>
                                        <a href="product_management.php">Products</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="total_buiseness.php"><i class="fa fa-fax fa-fw"></i> Total Business</a>
                            </li>
                            <li>
                                <a href="../vendor_update.php"><i class="fa fa-edit fa-fw"></i> Edit Profile</a>
                            </li>
							<li>
                                <a href="../logout.php"><i class="fa fa-power-off fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Welcome <?php echo $login_session;?></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-opencart fa-4x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $fnum4; ?></div>
                                            <div>PRODUCTS</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../pages/insert_product.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">ADD NEW PRODUCTS</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-cog fa-4x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $fnum5; ?></div>
                                            <div>MANAGE PRODUCTS</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../pages/product_management.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">MANAGE PRODUCTS</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart fa-4x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $fnum7;?></div>
                                            <div>SCANTY PRODUCTS</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="low_product.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">ADD TO STOCK</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-rupee fa-4x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $total; ?></div>
                                            <div>Total Business</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="total_buiseness.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Sales over the years
                                    <div class="pull-right">
                                       
                                    </div>
                                </div>
                                <!-- /.panel-heading -->
								
								
								<?php
							$query123 = "SELECT * FROM vendor_chart_master where v_id='$log_id'";
							$result123 = mysqli_query($conn, $query123);
							$chart_data_ch = '';
							while($row_ch = mysqli_fetch_array($result123))
							{
							 $chart_data_ch .= "{ year:'".$row_ch["year"]."', sales:".$row_ch["sales"]."}, ";
							}
							$chart_data_ch = substr($chart_data_ch, 0, -2);
						?>
								
								
                                <div class="panel-body">
                                <div id="chart"></div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                            <!-- /.panel -->
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-8 -->
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-group fa-fw"></i> Vendor Details
                                </div>
                                <!-- /.panel-heading -->
                              <div class="panel-body">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-comment fa-fw"></i> Vendor ID
                                                <span class="pull-right text-muted small"> <?php echo $log_id; ?>                                                 </span>                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-industry fa-fw"></i>&nbsp;Vendor Name
                                                <span class="pull-right text-muted small"><em><?php echo $login_session; ?></em>                                                </span>                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-phone fa-fw"></i> Phone Number
                                                <span class="pull-right text-muted small"><em><?php echo $pphh; ?></em>                                                </span>                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-at fa-fw"></i> E-Mail
                                                <span class="pull-right text-muted small"><em><?php echo $em; ?></em>                                                </span>                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-gift fa-fw"></i> Quantity In Stock
                                                <span class="pull-right text-muted small"><em><?php echo $bmw; ?></em>                                                </span>                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-shopping-cart fa-fw"></i> Quantity Sold
                                    <span class="pull-right text-muted small"><em><?php echo $ms; ?></em>                                                </span>                                        </a></div>
                                  <!-- /.list-group -->
                              </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel --><!-- /.panel -->
                            <!-- /.panel .chat-panel -->
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../js/raphael.min.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
<script>
Morris.Area({
 element : 'chart',
 data:[<?php echo $chart_data_ch; ?>],
 xkey:'year',
 ykeys:['sales'],
 labels:['sales'],
 hideHover:'auto',
 stacked:true
});
</script>