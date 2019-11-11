<?php
include("../../connection/config.php");
/*$user='root';
$pass='';
$db='shopping';
$conn= new mysqli('localhost', $user, $pass, $db) or die("DANG!!...unable to connect!");*/
session_start();
$user_check = $_SESSION['vendor_email'];

$ses_sql = mysqli_query($conn, "select * from vendor_master where vendor_email = '$user_check' ");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['vendor_name'];
$log_id = $row['vendor_id'];
// echo $log_id;
//exit;
if (!isset($_SESSION['vendor_email']))
{
    header("location:../login.php");
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

        <title>INVENTORY::INSERT PRODUCT::</title>
		<link rel="icon" title="image/png" href="../../cyber_shoppe/images/Prod_image/inventory_logo.png" />
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
                            <h2 align="center" class="panel-title">::::::::::INSERT PRODUCT:::::::::::</h2>
                        </div>
                        <div class="panel-body">
                            <form method="post" action=""  enctype="multipart/form-data">
										<?php
										
//$sou=$_SESSION['vendor_name'];
$nilu= $log_id;
										
				if(isset($_POST['insert']))
				{
					$p_name=$_POST['p_name'];
					$brand=$_POST['brand'];
					$desc=$_POST['desc'];
					$price=$_POST['price'];
					$discount=$_POST['discount'];
					$quantity=$_POST['quantity'];
					$sizes=$_POST['sizes'];
					$category=$_POST['category'];
					$sub_cat=$_POST['sub_cat'];
					 //----------IMAGE------------//
					/* $kal=array('','$nilu','$sub_cat','$category','$p_name','$sou','$price','$desc','$sizes','$discount','$file_name',1);
		
		echo $kal;*/
					
					 if(isset($_FILES['image']))
					 {
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
            
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../../cyber_shoppe/images/Prod_image/".$file_name);
		 echo  $errors;
		// echo $nilu;
		$sql= "INSERT INTO product(p_id,vendor_id,sub_cat_id,cat_id,name,brand,quantity,price,description,sizes,discount,url,is_active) values('','$nilu','$sub_cat','$category','$p_name','$brand','$quantity','$price','$desc','$sizes','$discount','$file_name',1);";
		//echo $sql;
		//exit;
		
		$rec= mysqli_query($conn,$sql);
	
		  echo "<script>
							 alert('DATA INSERTED!!!!');
							 location.replace('index.php?');
							 </script>";
						
      }else{
         print_r($errors);
		  echo "<script>
							 alert('DATA INSERTION FAILED!!');
							 location.replace('insert_product.php?');
							 </script>";
		
      }
   }
					
                }
				
				?>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="PRODUCT NAME" name="p_name" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="desc" class="form-control" id="desc" placeholder="PRODUCT DESCRIPTION"></textarea>
                                    </div>
									 <div class="form-group">
                                        <input class="form-control" placeholder="PRODUCT PRICE" name="price" type="text" autofocus>
                                    </div>
									<div class="form-group">
                                        <input class="form-control" placeholder="PRODUCT BRAND" name="brand" type="text" autofocus>
                                    </div>
									<div class="form-group">
                                        <input class="form-control" placeholder="PRODUCT DISCOUNT" name="discount" type="text" autofocus>
                                    </div>
									 <div class="form-group">
                                        <input class="form-control" placeholder="PRODUCT QUANTITY" name="quantity" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            SIZES   ::&nbsp&nbsp&nbsp&nbsp
                                            <input name="sizes" type="radio" value="S">
</label>
                                    S  &nbsp&nbsp&nbsp&nbsp                                  
                                    <input name="sizes" type="radio" value="M">
                                    M &nbsp&nbsp&nbsp&nbsp
                                    <input name="sizes" type="radio" value="L">
                                    L</div>
									
									<div class="form-group">
                                        <label>
                                            CATEGORY  :: &nbsp&nbsp
                                            <input name="category" type="radio" value="1">
</label>
                                    MEN   &nbsp&nbsp                                 
                                    <input name="category" type="radio" value="2">
                                    WOMEN
                                    
                                    </div>
							  <div class="form-group">
                                        <label>
                                            SUB CATEGORY  ::
                                            <select name="sub_cat">
                                              <option>---SELECT---</option>
                                              <option value="1">MEN's CLOTHING</option>
                                              <option value="2">MEN's FOOTWEAR</option>
                                              <option value="3">MEN's WATCHES</option>
                                              <option value="4">WOMEN's CLOTHING</option>
                                              <option value="5">WOMEN's FOOTWEAR</option>
                                              <option value="6">WOMEN's WATCHES</option>
                                              <option value="7">MEN's BAG</option>
                                              <option value="8">WOMEN's BAG</option>
                                            </select>
                                        </label>
							  </div>
							  <div class="form-group">
							  
							  IMAGE  ::   <input type="file" name="image" />
                              </div>
							  
									
									
                                    <!-- Change this to a button or input when using this as a form -->
								<p align="center">
                                    <input type="submit" name="insert" value="INSERT PRODUCT" class="btn btn-outline btn-primary btn-lg">
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
