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
      header("location:../admin_login.php");
      die();
   }

if(isset($_GET['I']))
{
	$I = base64_decode($_GET['I']);
	
	$esql = "select * from vendor_master where vendor_id='$I'";
	$erec = mysqli_query($conn,$esql);
	$eres = mysqli_fetch_assoc($erec);
	$eesql="update vendor_master set is_active='0' where vendor_id='$I'";
			//echo $eesql;
			//exit;

		        $eerec = mysqli_query($conn,$eesql);
	
		  echo "<script>
							 alert('VENDOR BLOCKED!!!!');
							 location.replace('vendor_manage.php?');
							 </script>";
				
}

if(isset($_GET['D']))
{
	$D = base64_decode($_GET['D']);
	$dsql = "delete from vendor_master where vendor_id='$D'";
	$drec = mysqli_query($conn,$dsql);
	/*echo $drec;
	echo exit;*/
	if($drec)
	{
		echo "<script>
					alert('VENDOR Deleted');
					location.replace('vendor_manage.php?')
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

        <title>::VENDOR MANAGEMENT::</title>
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
                    <a class="navbar-brand" href="../pages/admin_index.php">ADMIN DASHBOARD</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="../../cyber_shoppe/about.php"><i class="fa fa-home fa-fw"></i> Cyber Shoppe</a></li>
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
                            <h1 class="page-header">&nbsp;</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><h3 align="center">::VENDOR MANAGEMENT::</h3></div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                   <th>Sl.No</th>
                                                    <th>Vendor Name</th>
                                                    <th>Vendor E-mail</th>
                                                    <th>Phone Nummber</th>
                                                    <th>Request</th>
                                                </tr>
                                            </thead>
											<?php
				$fsql = "select * from vendor_master where is_active='1'";
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
	  <td><?php echo $fres['vendor_name'];?></td>
	  <td><?php echo $fres['vendor_email'];?></td>
      <td><?php echo $fres['phone'];?></td>

      <td><button type="button" class="btn btn-outline btn-success"><a href="vendor_manage.php?I=<?php  echo base64_encode($fres['vendor_id']); ?>">Block</a></button> | <button type="button" class="btn btn-outline btn-danger"><a href="vendor_manage.php?D=<?php  echo base64_encode($fres['vendor_id']); ?>">Delete</a></button> </td>
                                                </tr>
												
												<?php
				  $i++;
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
