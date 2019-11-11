<?php
$user='root';
$pass='';
$db='shopping';
$conn= new mysqli('localhost', $user, $pass, $db) or die("DANG!!...unable to connect!");
session_start();
$user_check = $_SESSION['admin_email'];
   
   $ses_sql = mysqli_query($conn,"select * from admin_master where admin_email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['admin_name'];
   $log_id=$row['admin_id'];
   //echo $log_id;
   //exit;
   
   if(!isset($_SESSION['admin_email'])){
      header("location:admin_login.php");
      die();
   }

	$fsql = "select * from vendor_master where is_active='2'";
				$frec = mysqli_query($conn,$fsql);
				$fnum = mysqli_num_rows($frec);
				//echo $fnum;
				//exit;
				
				//maanage pending user count//
				$fsql1 = "select * from user_master where is_active='2'";
				$frec1 = mysqli_query($conn,$fsql1);
				$fnum1 = mysqli_num_rows($frec1);
				
				//maanage vendor count//
				$fsql2 = "select * from vendor_master where is_active='1'";
				$frec2 = mysqli_query($conn,$fsql2);
				$fnum2 = mysqli_num_rows($frec2);
				
				//manage product count//
				$fsql3 = "select * from product where is_active='1'";
				$frec3 = mysqli_query($conn,$fsql3);
				$fnum3 = mysqli_num_rows($frec3);
				
				//total business
				$pq="SELECT * from billing b,product c  where b.p_id=c.p_id";
                $execq=mysqli_query($conn,$pq);
				$fnum12 = mysqli_num_rows($execq);
				if($fnum12 > 0)
	               {  
				   while($row12=mysqli_fetch_array($execq))
			{
			   $ip1=$row12['value'];
			   $total11=$total11+$ip1;	 
			   }
			   }
			   
			   //chart
			   $poo="SELECT * from billing b,product c  where b.p_id=c.p_id and b.billing_date like '_%2019'";
		$execoop=mysqli_query($conn,$poo);
	
				$fnum1oop = mysqli_num_rows($execoop);
				if($fnum1oop > 0)
	   {    
	   		while($rowoop=mysqli_fetch_array($execoop))
			{
			   $ipoop=$rowoop['value'];
			   $totaloop=$totaloop+$ipoop;
			   }
			   }
			  // echo $totaloop;
			  // exit;
			 $cht="update admin_chart set t_sales='$totaloop' where year='2019'";
              $cht1=mysqli_query($conn,$cht);	
			   
			   
								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
<title>Untitled Document</title>
 <link rel="stylesheet" href="modules23/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="modules23/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="modules23/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">

  <link rel="stylesheet" href="css23/demo.css">
  <link rel="stylesheet" href="css23/style.css">
</head>

<body>
<div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Line Chart</h4>
                  </div>
				  <?php
							$query123 = "SELECT * FROM admin_chart";
							$result123 = mysqli_query($conn, $query123);
							$chart_data_ch = '';
							while($row_ch = mysqli_fetch_array($result123))
							{
							 $chart_data_ch .= "{ year:'".$row_ch["year"]."', sales:".$row_ch["t_sales"]."}, ";
							}
							$chart_data_ch = substr($chart_data_ch, 0, -2);
						?>
                  <div class="card-body">
                    <canvas id="myChart"></canvas>
                  </div>
                </div>
              </div>
</body>
</html>
 <script>
   Morris.Area({
 element : 'chart',
 data:[<?php echo $chart_data_ch; ?>],
 xkey:'year',
 ykeys:['sales'],
 labels:['sales'],
 hideHover:'auto',
  borderWidth: 2,
       
 stacked:true
});
       
      options: {
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              stepSize: 150
            }
          }],
          xAxes: [{
            ticks: {
              display: false
            },
            gridLines: {
              display: false
            }
          }]
        },
      }
    })
  </script>
  <script src="js23/scripts.js"></script>
  <script src="js23/custom.js"></script>
  <script src="js23/demo.js"></script>
