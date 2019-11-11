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
   
   if(!isset($_SESSION['vendor_email'])){
    header("location:../login.php");
      die();
   }
//insert product count//
				$fsql4 = "select * from product where is_active='1' and vendor_id='$log_id' ";
				$frec4 = mysqli_query($conn,$fsql4);
				$fnum4 = mysqli_num_rows($frec4);
//manage product count//
				$fsql5 = "select * from product where is_active='1' and vendor_id='$log_id'";
				$frec5 = mysqli_query($conn,$fsql5);
				$fnum5 = mysqli_num_rows($frec5);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>INVENTORY::SCARCED PRODUCTS::</title>
		<link rel="icon" title="image/png" href="../../cyber_shoppe/images/Prod_image/inventory_logo.png" />
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

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
                    <a class="navbar-brand" href="index.php">VENDOR DASHBOARD</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                </button>

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
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Products<span class="fa arrow"></span></a>
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
                                <a href="../logout.php"><i class="fa fa-power-off fa-fw"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">&nbsp;</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 align="center">:: SCARCED PRODUCTS::</h3>
                        </div>
                        <div class="panel-body">
                          <div class="table-responsive">
						  <?php
				$fsql = "select * from product where vendor_id='$log_id' and quantity<10";
				//echo $fsql;
				//exit;
				$frec = mysqli_query($conn,$fsql);
				$fnum = mysqli_num_rows($frec);
				if($fnum > 0)
				{
				?>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <thead>
                                <tr class="panel-heading">
      <td width="60">Sl.No</td>
	  <td width="121">Subcategory_Id</td>
	  <td width="99">Category_Id</td>
      <td width="84">Name</td>
      <td width="70">Brand</td>
      <td width="75">Quantity</td>
      <td width="54">Price</td>
	  <td>Description</td>
      <td width="40">Size</td>
	  <td width="69">Discount</td>
	  <td width="57">Image</td>
      <td>Action</td>
    </tr>
					  <?php
				  $i = 1;
				  while($fres = mysqli_fetch_array($frec))
				  {
				  ?>

    <tr bgcolor="#FFFFFF">
      <td><?php echo $i;?></td>
	  <td><?php echo $fres['sub_cat_id'];?></td>
	  <td><?php echo $fres['cat_id'];?></td>
      <td><?php echo $fres['name'];?></td>
      <td><?php echo $fres['brand'];?></td>
      <td><?php echo $fres['quantity'];?></td>
      <td><?php echo $fres['price'];?></td>
	  <td><?php echo $fres['description'];?></td>
      <td><?php echo $fres['sizes'];?></td>
	  <td><?php echo $fres['discount'];?></td>
	  <td><?php echo $fres['url'];?></td>
	  
      
      <td><button type="button" class="btn btn-outline btn-success"><a href="../update.php?I=<?php echo base64_encode($fres['p_id']);?>">Add Products</a></td>
      </tr>
	<?php
				  $i++;
				  }
				  ?>
</thead>
  </table>
  <?php
  }
  ?>
 
                          </div>
                          <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                      </div>
                      <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-6">
                          <!-- /.panel -->
</div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                          <!-- /.panel -->
</div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-6">
                          <!-- /.panel -->
</div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                          <!-- /.panel -->
</div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-6">
                          <!-- /.panel -->
</div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                          <!-- /.panel -->
</div>
                        <!-- /.col-lg-6 -->
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

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

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

