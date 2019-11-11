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

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>::::TOTAL BUSINESS::</title>
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
                    <span class="icon-bar"></span>                </button>

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
                            <h1 class="page-header">&nbsp;</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 align="center">:: TOTAL BUSINESS::</h3>
                        </div>
                        <div class="panel-body">
                          <div class="table-responsive">
						<form action="" method="post">
  <?php	
//$p="SELECT b.*, c.* from billing b,product c where b.p_id=c.p_id and b.is_active='0'";
//$p="select * from vendor_master vm,product pm,billing bm where vm.vendor_id=pm.vendor_id and pm.p_id=bm.p_id";
//$p="select SUM(value),vm.vendor_name from vendor_master vm,product pm,billing bm group by vm.vendor_name having vm.vendor_id=pm.vendor_id and pm.p_id=bm.p_id";
$pq="SELECT * from billing b,product c  where b.p_id=c.p_id";
//echo $pq;
//exit;
		$execq=mysqli_query($conn,$pq);
	
				$fnum12 = mysqli_num_rows($execq);
		//$row= mysqli_fetch_array($exec);
		
		
	?>
	 <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
    <tr>
    
		  
          <td align="center"><b>BILLING ID</b></td>
		   <td align="center"><b>USER ID</b></td>
          <td align="center"><b>DATE</b></td>
          <td align="center"><b>BRAND</b></td>
		  <td align="center"><b>VALUE</b></td>
         
        </tr>	
		</thead>

<?php
if($fnum12 > 0)
	   {  
	   ?>
	   	<tbody> 
		<?php 
	   		while($row12=mysqli_fetch_array($execq))
			{
			   $ip1=$row12['value'];
			   $total11=$total11+$ip1;	   
		?>
		   <tr class="odd gradeX">

         
          <td align="center"><?php echo $row12['billing_id']; ?></td>
           <td align="center"><?php echo $row12['user_id']; ?></td>
           <td align="center"><?php echo $row12['billing_date']; ?></td>
           <td align="center"><?php echo $row12['brand']; ?></td>
			 <td align="center"><?php echo $row12['value']; ?></td>
          
        </tr>
		<?php 
	}
	?>
	</tbody>
	</table>
	<?php 
}
		?>
    
	 
	  <table width="728" align="center">
	  	<tr>
          <td width="192" align="center"><font size="+1"><strong>TOTAL :</strong></font></td>
          <td width="120">&nbsp;</td>
          <td width="73">&nbsp;</td>
          <td width="139">&nbsp;</td>
          <td width="143"><font size="+1" color="#FF6633"><strong>Rs.<?php echo $total11;?>/- Only</strong></font></td>
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
           
          </tr>
        </table>        <p>&nbsp;</p></td>
    </tr>
  </table>
  </table>
</form>
 
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

