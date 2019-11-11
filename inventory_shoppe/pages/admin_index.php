<?php
include("../../connection/config.php");
/*$user='root';
$pass='';
$db='shopping';
$conn= new mysqli('localhost', $user, $pass, $db) or die("DANG!!...unable to connect!");*/
session_start();
$user_check = $_SESSION['admin_email'];
   
   $ses_sql = mysqli_query($conn,"select * from admin_master where admin_email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['admin_name'];
   $log_id=$row['admin_id'];
   //echo $log_id;
   //exit;
   
   if(!isset($_SESSION['admin_email'])){
      header("location:../admin_login.php");
      die();
   }

  //count active user
  $fsql13456 = "select * from user_master where is_active='1'";
				$frec13456 = mysqli_query($conn,$fsql13456);
				$fnum13456 = mysqli_num_rows($frec13456);
				// count vendor active
				
				$fsql007 = "select * from vendor_master where is_active='1'";
				$frec007 = mysqli_query($conn,$fsql007);
				$fnum007 = mysqli_num_rows($frec007);
				
				//vendor req
	$fsql = "select * from vendor_master where is_active='2'";
				$frec = mysqli_query($conn,$fsql);
				$fnum = mysqli_num_rows($frec);
				//echo $fnum;
				//exit;
				
				//maanage pending user count//
				$fsql1 = "select * from user_master where is_active='2'";
				$frec1 = mysqli_query($conn,$fsql1);
				$fnum1 = mysqli_num_rows($frec1);
				
				//maanage vendor count//
				$fsql2 = "select * from vendor_master where is_active='1'";
				$frec2 = mysqli_query($conn,$fsql2);
				$fnum2 = mysqli_num_rows($frec2);
				
				//manage product count//
				$fsql3 = "select * from product where is_active='1'";
				$frec3 = mysqli_query($conn,$fsql3);
				$fnum3 = mysqli_num_rows($frec3);
				
				//total business
				$pq="SELECT * from billing b,product c  where b.p_id=c.p_id";
                $execq=mysqli_query($conn,$pq);
				$fnum12 = mysqli_num_rows($execq);
				if($fnum12 > 0)
	               {  
				   while($row12=mysqli_fetch_array($execq))
			{
			   $ip1=$row12['value'];
			   $total11=$total11+$ip1;	 
			   }
			   }
			   
			   //chart
			   $poo="SELECT * from billing b,product c  where b.p_id=c.p_id and b.billing_date like '_%2019'";
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
			 $cht="update admin_chart set t_sales='$totaloop' where year='2019'";
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

        <title>::::ADMIN DASHBOARD::::</title>
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
	<form id="form1" name="form1" method="post" action="">
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="admin_index.php">ADMIN DASHBOARD</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="../../cyber_shoppe/about.php"><i class="fa fa-home fa-fw"></i> CYBER SHOPPE</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
     
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $login_session; ?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="../admin_update.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="../admin_logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            
                            <li>
                                <a href="admin_index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-institution fa-fw"></i> Management<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="vendor_manage.php">Vendor Management</a>
                                    </li>
                                    <li>
                                        <a href="product_request.php">Product Management</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="user_request.php"><i class="fa fa-table fa-fw"></i> User Request</a>
                            </li>
                            <li>
                                <a href="../admin_update.php"><i class="fa fa-edit fa-fw"></i> Edit</a>
                            </li>
							<li>
                                <a href="../admin_logout.php"><i class="fa fa-power-off fa-fw"></i> Logout</a>
                            </li>   
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Dashboard</h1>
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
                                            <i class="fa fa-industry fa-4x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $fnum; ?></div>
                                            <div>VENDOR REQUESTS </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../pages/vendor_request.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">VIEW REQUESTS</span>
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
                                            <i class="fa fa-male fa-4x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $fnum1; ?></div>
                                            <div>USER REQUEST</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../pages/user_request.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">VIEW REQUESTS</span>
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
                                            <i class="fa fa-truck fa-4x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $fnum2; ?></div>
                                            <div>MANAGE VENDORS </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../pages/vendor_manage.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">MANAGE VENDORS </span>
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
                                            <div class="huge"><?php echo $total11; ?></div>
                                            <div>Total Sales</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="admin_business.php">
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
								
								<?php
							$query123 = "SELECT * FROM admin_chart";
							$result123 = mysqli_query($conn, $query123);
							$chart_data_ch = '';
							while($row_ch = mysqli_fetch_array($result123))
							{
							 $chart_data_ch .= "{ year:'".$row_ch["year"]."', sales:".$row_ch["t_sales"]."}, ";
							}
							$chart_data_ch = substr($chart_data_ch, 0, -2);
						?>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div id="chart"></div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel --><!-- /.panel -->
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-8 -->
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-group fa-fw"></i> Admin Details
                                </div>
                                <!-- /.panel-heading -->
                              <div class="panel-body">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-male fa-fw"></i> Admin Name
                                                <span class="pull-right text-muted small"><em><?php echo  $login_session; ?></em>                                                </span>                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-at fa-fw"></i> Admin e-Mail
                                                <span class="pull-right text-muted small"><em><?php echo $row['admin_email'];?></em>                                                </span>                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-toggle-on fa-fw"></i> Active User
                                                <span class="pull-right text-muted small"><em><?php echo $fnum13456; ?></em>                                                </span>                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-shopping-cart fa-fw"></i> Active Vendor
                                                <span class="pull-right text-muted small"><em><?php echo $fnum007; ?></em>                                                </span>                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-upload fa-fw"></i> Product Count
                                    <span class="pull-right text-muted small"><em><?php echo $fnum3; ?></em>                                                </span>                                        </a></div>
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
		
		 <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>
      </form>
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
