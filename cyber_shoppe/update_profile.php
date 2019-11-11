<div class="container-fluid">
<!--<div class="row">-->
<!--<div class="col-md-4 col-md-offset-4">-->
<div class="panel panel-default">
                        <div class="panel-heading">
                            <b><h3 align="center">:::UPDATE PROFILE:::</h3></b>
                        </div>
                         <div class="panel-body">
						 <form method="post" action=""  enctype="multipart/form-data">
<?php
//$log_id= $_SESSION['vendor_id'];
//$usr_name=$_SESSION['first_name']; 
					
if(isset($_POST["edit1"]))

	
		{
				 
			// $ss= $_GET['I'];
			 $first_name=addslashes($_POST['first_name']);
			 $user_email=addslashes($_POST['user_email']);
			 $password=addslashes($_POST['password']);
			 $phone=($_POST['phone']);
			 
			 	 $eesql="update user_master set first_name='$first_name', password='$password', phone='$phone' where user_id='$log_id'";
			//echo $eesql;
			//exit;

		        $eerec = mysqli_query($conn,$eesql);
	
		  echo "<script>
							 
							 location.replace('profile.php?');
							 </script>";
						
      }
 
   
  
	//$I = $_GET['I'];
	
	$esql = "select * from user_master where user_id='$log_id'";
	$erec = mysqli_query($conn,$esql);
	$eres = mysqli_fetch_assoc($erec);
//echo $eres;
//exit;


?>
 <fieldset>
                                    <div class="form-group" align="left"><label><strong>USER NAME :</strong></label>
						   <input  class="form-control" name="first_name" type="text" id="first_name" value="<?php echo $eres['first_name']; ?>" />
                                    </div>
									
									  <div class="form-group" align="left"><label><strong>EMAIL :</strong></label> <br />
                           <label><?php echo $eres['user_email']; ?></label>
                                    </div>
									
									 <div class="form-group" align="left"><label><strong>NEW PASSWORD :</strong></label>
                          <input class="form-control" name="password" type="password" id="password" value="<?php echo $eres['password']; ?>" />
                                    </div>
									
									 <div class="form-group" align="left"><label><strong>PHONE NUMBER :</strong></label>
                        <input class="form-control" name="phone" type="text" id="phone"  pattern="[6789][0-9]{9}"  value="<?php echo $eres['phone'] ; ?>" />
                                    </div>
									
									
							  
							  <p align="center">
                                    <input name="edit1" type="submit"value="UPDATE" class="btn btn-outline btn-success btn-lg">
                              </p>
							  
							  </form>
									</fieldset>
									     </div>
						
                    </div>
				</div>
			<!--</div>-->
		<!--</div>-->