<?php
include("../connection/config.php");
/*$user='root';
$pass='';
$db='shopping';
$conn= new mysqli('localhost', $user, $pass, $db) or die("DANG!!...unable to connect!");*/
session_start();
$user_check = $_SESSION['vendor_email'];

$ses_sql = mysqli_query($conn, "select * from vendor_master where vendor_email = '$user_check' ");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
//echo $row;
//exit;
$login_session = $row['vendor_name'];
$log_id = $row['vendor_id'];
// echo $log_id;
//exit;
if (!isset($_SESSION['vendor_email']))
{
    header("location:login.php");
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

        <title>INVENTORY::UPDATE PROFILE::</title>
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
                            <h2 align="center" class="panel-title">::::::::::UPDATE VENDOR:::::::::::</h2>
                        </div>
                        <div class="panel-body">
						 <form method="post" action=""  enctype="multipart/form-data">
<?php
//$log_id= $_SESSION['vendor_id'];
//$usr_name=$_SESSION['first_name']; 
					
if(isset($_POST["edit"]))

	
		{
				 
			// $ss= $_GET['I'];
			 $vendor_name=$_POST['vendor_name'];
			 $vendor_email=$_POST['vendor_email'];
			 $password=$_POST['password'];
			 $phone=$_POST['phone'];
			 
			 	 $eesql="update vendor_master set vendor_name='$vendor_name', password='$password', phone='$phone' where vendor_id='$log_id'";
			//echo $eesql;
			//exit;

		        $eerec = mysqli_query($conn,$eesql);
	
		  echo "<script>
							 alert('DATA updated!!!!');
							 location.replace('login.php?');
							 </script>";
						
      }
 
   
  
	//$I = $_GET['I'];
	
	$esql = "select * from vendor_master where vendor_id='$log_id'";
	$erec = mysqli_query($conn,$esql);
	$eres = mysqli_fetch_assoc($erec);
//echo $eres;
//exit;


?>
 <fieldset>
                                    <div class="form-group"><label><strong>VENDOR NAME :</strong></label>
						   <input  class="form-control" name="vendor_name" type="text" id="vendor_name" value="<?php echo $eres['vendor_name']; ?>" />
                                    </div>
									
									  <div class="form-group"><label><strong>EMAIL :</strong></label> <br />
                           <label><?php echo $eres['vendor_email']; ?></label>
                                    </div>
									
									 <div class="form-group"><label><strong>NEW PASSWORD :</strong></label>
                          <input class="form-control" name="password" type="password" id="password" value="<?php echo $eres['password']; ?>" />
                                    </div>
									
									 <div class="form-group"><label><strong>PHONE NUMBER :</strong></label>
                        <input class="form-control" name="phone" type="text" id="phone"  pattern="[6789][0-9]{9}"  value="<?php echo $eres['phone'] ; ?>" />
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