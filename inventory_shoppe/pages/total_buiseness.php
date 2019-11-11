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

        <title>INVENTORY::TOTAL BUSINESS::</title>
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
                                <a href="total_buiseness.php"><i class="fa fa-fax fa-fw"></i>Total Business</a>
                            </li>
                            <li>
                                <a href="../vendor_update.php"><i class="fa fa-edit fa-fw"></i> Edit Profile</a>
                            </li>
							<li>
                                <a href="../logout.php"><i class="fa fa-power-off fa-fw"></i>Logout</a>
                            </li>
                            
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                                        <!-- /.nav-third-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                           
                               
                                <!-- /.nav-second-level -->
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
		$p="SELECT b.*, c.* from billing b,product c where b.p_id=c.p_id and c.vendor_id='$log_id' and b.is_active='0'";
		$exec=mysqli_query($conn,$p);
	
				$fnum1 = mysqli_num_rows($exec);
		//$row= mysqli_fetch_array($exec);
		
		
	?>
	  <table align="center" border="1">
  <table width="775" height="241" border="0">
  
    <tr>
      <td colspan="2" bgcolor="">
	  &nbsp;
	  <table width="724" border="0" align="center" class="table-bordered">
        <tr bgcolor="#E9E8F9">
		  
          <td align="center"><b>BILLING ID</b></td>
		   <td align="center"><b>USER ID</b></td>
          <td align="center"><b>DATE</b></td>
          <td align="center"><b>PRODUCT NAME</b></td>
          <td align="center"><b>SIZE</b></td>
          <td align="center"><b>QUANTITY</b></td>
		  <td align="center"><b>VALUE</b></td>
         
        </tr>	
	
<?php
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
		  <td width="113">&nbsp;</td>
        </tr>

		
		<tr bgcolor="#FFFFFF">
          <td align="center"><?php echo $row['billing_id']; ?></td>
           <td align="center"><?php echo $row['user_id']; ?></td>
           <td align="center"><?php echo $row['date']; ?></td>
           <td align="center"><?php echo $row['name']; ?></td>
           <td align="center"><?php echo $row['sizes']; ?></td>
		    <td align="center"><?php echo $row['quantity_ordered']; ?></td>
			 <td align="center"><?php echo $row['value']; ?></td>
          
        </tr>
		<?php 
	} 
}
		?>
      </table>
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

