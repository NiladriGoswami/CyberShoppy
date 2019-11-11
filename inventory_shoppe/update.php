<?php
include("../connection/config.php");
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

        <title>INVENTORY::UPDATE PRODUCT::</title>
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
                            <h2 align="center" class="panel-title">::::::::::UPDATE PRODUCT:::::::::::</h2>
                        </div>
                        <div class="panel-body">
						 <form method="post" action=""  enctype="multipart/form-data">
<?php

					 if(isset($_FILES['image']))
					 {
							  $errors= array();
							  $file_name = $_FILES['image']['name'];
							  $file_size =$_FILES['image']['size'];
							  $file_tmp =$_FILES['image']['tmp_name'];
							  $file_type=$_FILES['image']['type'];
							  $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
    						  $extensions= array("jpeg","jpg","png");
      
									  if(in_array($file_ext,$extensions)=== false)
									  {
										 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
									  }
            
										  if(empty($errors)==true)
										  {
											 move_uploaded_file($file_tmp,"../cyber_shoppe/images/Prod_image/".$file_name);
											 echo  $errors;
											// echo $nilu;
										
														
													}
													else{
         print_r($errors);
		  echo "<script>
							 alert('DATA INSERTION FAILED!!');
							 location.replace('pages/product_management.php?');
							 </script>";
		
      }

if(isset($_POST["edit"]))

	
		{
				 $v_id=$_SESSION['vendor_id'];
			 $ss= base64_decode($_GET['I']);
			 $sub_cat=$_POST['sub_cat_id'];
			 $cat_id=$_POST['cat_id'];
			 $name=$_POST['name'];
			 $brand=$_POST['brand'];
			 $quantity=$_POST['quantity'];
			 $price=$_POST['price'];
			 $description=$_POST['description'];
			 $sizes=$_POST['size'];
			 $discount=$_POST['discount'];
			 
			 	 $eesql="update product set sub_cat_id='$sub_cat', cat_id='$cat_id', name='$name', brand='$brand', quantity='$quantity', price='$price',  description='$description', sizes='$sizes', discount='$discount', url='$file_name' where p_id='$ss'";
			//echo $eesql;
			//exit;

		        $eerec = mysqli_query($conn,$eesql);
	
		  echo "<script>
							 alert('DATA updated!!!!');
							 location.replace('pages/product_management.php?');
							 </script>";
						
      }
   
			 
					 //----------IMAGE------------//
					/* $kal=array('','$nilu','$sub_cat','$category','$p_name','$sou','$price','$desc','$sizes','$discount','$file_name',1);
		
		echo $kal;*/
					
													}
	

if(isset($_GET['I']))
{
	$I = base64_decode($_GET['I']);
	
	$esql = "select * from product where p_id='$I'";
	$erec = mysqli_query($conn,$esql);
	$eres = mysqli_fetch_assoc($erec);
}
?>
 <fieldset>
                                    <div class="form-group"><label><strong>SUBCATEGORY :</strong></label>
						   <input  class="form-control" name="sub_cat_id" type="text" id="sub_cat_id" value="<?php echo $eres['sub_cat_id']; ?>" />
                                    </div>
									
									  <div class="form-group"><label><strong>CATEGORY :</strong></label>
                           <input   class="form-control"  name="cat_id" type="text" id="cat_id" value="<?php echo $eres['cat_id']; ?>" />
                                    </div>
									
									 <div class="form-group"><label><strong>NAME :</strong></label>
                          <input class="form-control" name="name" type="text" id="name" value="<?php echo $eres['name']; ?>" />
                                    </div>
									
									 <div class="form-group"><label><strong>BRAND :</strong></label>
                        <input class="form-control" name="brand" type="text" id="brand" value="<?php echo $eres['brand'] ; ?>" />
                                    </div>
									
									 <div class="form-group"><label><strong>QUANTITY :</strong></label>
                        <input  class="form-control" name="quantity" type="text" id="quantity" value="<?php echo $eres['quantity']; ?>"/>
                                    </div>
									
									 <div class="form-group"><label><strong>PRICE :</strong></label>
                       <input class="form-control" name="price" type="text" id="price" value="<?php echo $eres['price']; ?>"/>
                                    </div>
									
									 <div class="form-group"><label><strong>DESCRIPTION :</strong></label>
               <textarea name="description" class="form-control" cols="18"><?php echo $eres['description']; ?></textarea>
                                    </div>
									
									<div class="form-group">
									  <label>
                                            <strong>SIZES   ::</strong>&nbsp&nbsp&nbsp&nbsp
                                   
</label>
              <SELECT NAME="size" id="size" required>
    <OPTION VALUE=""><?php echo $eres['sizes']; ?></OPTION>
    <OPTION VALUE="S">S</OPTION>
	<OPTION VALUE="M">M</OPTION>
	<OPTION VALUE="L">L</OPTION>
    </SELECT>
                                    </div>
									
									 <div class="form-group">
                       <input class="form-control" name="discount" type="text" id="discount" value="<?php echo $eres['discount']; ?>"/>
                                    </div>
									
									 <div class="form-group">
							  
							  <strong>IMAGE  ::</strong>  <input type="file" name="image"><?php echo $eres['url']; ?></input>
                              </div>
							  
							  <p align="center">
                                    <input name="edit" type="submit"value="UPDATE" class="btn btn-outline btn-primary btn-lg">
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