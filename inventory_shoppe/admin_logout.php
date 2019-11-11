<?php
session_start();

session_destroy();

echo "<script>
				
				location.replace('admin_login.php');
				</script>";
?>