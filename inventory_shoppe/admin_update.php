<?php
include("../connection/config.php");
/*$user='root';
$pass='';
$db='shopping';
$conn= new mysqli('localhost', $user, $pass, $db) or die("DANG!!...unable to connect!");*/
session_start();
$user_check = $_SESSION['admin_email'];

$ses_sql = mysqli_query($conn, "select * from admin_master where admin_email = '$user_check' ");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
//echo $row;
//exit;
$login_session = $row['admin_name'];
$log_id = $row['admin_id'];
// echo $log_id;
//exit;
if (!isset($_SESSION['admin_email']))
{
    header("location:admin_login.php");
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

        <title>INVENTORY::ADMIN UPDATE ::</title>
		<link rel="icon" title="image/png" href="../cyber_shoppe/images/Prod_image/inventory_logo.png" />
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h2 align="center" class="panel-title"><strong>::::::::::ADMIN UPDATE:::::::::::</strong></h2>
                        </div>
                        <div class="panel-body">
						 <form method="post" action=""  enctype="multipart/form-data">
<?php
//$log_id= $_SESSION['vendor_id'];
//$usr_name=$_SESSION['first_name']; 
					
if(isset($_POST["edit"]))

	
		{
				 
			// $ss= $_GET['I'];
			 $admin_name=$_POST['admin_name'];
			 $admin_email=$_POST['admin_email'];
			 $password=$_POST['password'];
			 
			 
			 	 $eesql="update admin_master set admin_name='$admin_name', password='$password' where admin_id='$log_id'";
			//echo $eesql;
			//exit;

		        $eerec = mysqli_query($conn,$eesql);
	
		  echo "<script>
							 alert('DATA updated!!!!');
							 location.replace('admin_login.php?');
							 </script>";
						
      }
 
   
  
	//$I = $_GET['I'];
	
	$esql = "select * from admin_master where admin_id='$log_id'";
	$erec = mysqli_query($conn,$esql);
	$eres = mysqli_fetch_assoc($erec);
//echo $eres;
//exit;


?>
 <fieldset>
                                    <div class="form-group"><label><strong>ADMIN NAME :</strong></label>
						   <input  class="form-control" name="admin_name" type="text" id="admin_name" value="<?php echo $eres['admin_name']; ?>" />
                                    </div>
									
									  <div class="form-group"><label><strong>EMAIL :</strong></label> <br />
                           <label><?php echo $eres['admin_email']; ?></label>
                                    </div>
									
									 <div class="form-group"><label><strong>NEW PASSWORD :</strong></label>
                          <input class="form-control" name="password" type="password" id="password" value="<?php echo $eres['password']; ?>" />
                                    </div>
																		
									
							  
							  <p align="center">
                                    <input name="edit" type="submit"value="UPDATE" class="btn btn-outline btn-success btn-lg">
                              </p>
							  
							  </form>
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									</fieldset>
									     </div>
						
                    </div>
                </div>
            </div>
        </div>

     <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>