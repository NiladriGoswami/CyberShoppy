<?php
include("../../connection/config.php");
/*$user='root';
$pass='';
$db='shopping';
$conn= new mysqli('localhost', $user, $pass, $db) or die("DANG!!...unable to connect!");*/
session_start();
$user_check = $_SESSION['admin_email'];
//echo $user_check;
//exit;
   
   $ses_sql = mysqli_query($conn,"select * from admin_master where admin_email = '$user_check' ");
   //echo $ses_sql;
   //exit;
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['admin_name'];
   $log_id=$row['admin_id'];
  // echo $log_id;
   //exit;
   
   if(!isset($_SESSION['admin_email'])){
      header("location:admin_login.php");
      die();
   }

if(isset($_GET['I']))
{
	$I = base64_decode($_GET['I']);
	
	$esql = "select * from product where p_id='$I'";
	$erec = mysqli_query($conn,$esql);
	$eres = mysqli_fetch_assoc($erec);
	$eesql="update product set is_active='0' where p_id='$I'";
			//echo $eesql;
			//exit;

		        $eerec = mysqli_query($conn,$eesql);
	
		  echo "<script>
							 alert('PRODUCT STATUS CHANGED!!!!');
							 location.replace('product_request.php?');
							 </script>";
				
}

if(isset($_GET['D']))
{
	$D = base64_decode($_GET['D']);
	$dsql = "delete from product where p_id='$D'";
	$drec = mysqli_query($conn,$dsql);
	/*echo $drec;
	echo exit;*/
	if($drec)
	{
		echo "<script>
					alert('REQUEST Deleted');
					location.replace('product_request.php?')
					</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>::::PRODUCT MANAGEMENT::::</title>
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
                            <li><a href="../admin_logout.php" ><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <h1 class="page-header">&nbsp;</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h3 align="center">::PRODUCT MANAGEMENT::</h3> 
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
									<?php
				$fsql = "select * from product";
				$frec = mysqli_query($conn,$fsql);
				$fnum = mysqli_num_rows($frec);
				if($fnum > 0)
				{
				?>
                                        <table width="108%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                   <th width="61">Sl.No</th>
                                                    <th width="125">Subcategory_Id</th>
                                                    <th width="100">Category_Id</th>
                                                    <th width="60">Name</th>
                                                    <th width="71">Brand</th>
													<th width="74">Quantity</th>
													<th width="52">Price</th>
													<th width="123">Description</th>
													<th width="45">Size</th>
													<th width="78">Discount</th>
													<th width="60">Image</th>
													<th>Action</th>
                                                </tr>
                                            </thead>
											<?php
				$fsql = "select * from product where is_active='1'";
				$frec = mysqli_query($conn,$fsql);
				$fnum = mysqli_num_rows($frec);
				if($fnum > 0)
				{
				?>
                                            <tbody>
											
											  			  <?php
				  $i = 1;
				  while($fres = mysqli_fetch_array($frec))
				  {
				  ?>

    <tr class="odd gradeX">
                                                                                                
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
	  
	  <td width="149"><button type="button" class="btn btn-outline btn-warning"><a href="product_request.php?I=<?php echo base64_encode($fres['p_id']); ?>">Block</a></button> | <button type="button" class="btn btn-outline btn-danger"><a href="product_request.php?D=<?php  echo base64_encode($fres['p_id']); ?>">Delete</a>
        </button></td>
    					</tr>
                                             
                         <?php
				  $i++;
				  }
				  }
				  ?>
                     
                                            </tbody>
                                      </table>
										<?php
				  
				  }
				?>

                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
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
