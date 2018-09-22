<?php
session_start();
if(isset($_POST['submit'])){
	$username = trim(mysql_real_escape_string($_POST['username']));
	$password = trim(mysql_real_escape_string($_POST['password']));
	$query = "SELECT * FROM tbl_users where username = '".$username."' and password = '".$password."' ";
	$conn = mysqli_connect("localhost","root","rootpass","test");
	$res = mysqli_num_rows(mysqli_query($conn,$query));
	if(!empty($res)) {
		$_SESSION['message'] = $username;
		header("location:tables.php");
		die;
	}else{
		$msg  ='Invalid Login Credentials';
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<style>
	table {background-color: #0002; /*background-color:#0077b0 ;*/ text-align: center; margin-left:320px; font-family: arial, sans-serif; border-collapse: collapse; width: 50%; }
	td, th {border: 2px solid #000; text-align: center; padding: 7px; }
	input{ background-color:lightgray; padding:.5em; font-size:14px;color:#000;font-weight:bold;}
	input[pattern]:invalid{color:#ff6c6c;font-weight:bold }
	.error{color:red; font-weight:bold;font-size:14px; }
	.msg{color:red;font-size: 21px;font-weight:bold;text-align:center;}
</style>

<script src="./js/jquery-1.11.3.min.js" type="text/javascript"></script>

</head>
<body>
	<div style="text-align: center">
		<h1>Login</h1>
		<span class="msg" ><?php echo (!empty($msg)?$msg:" ") ?></span> 
	</div>
	<br>
	<form method="post" name="frmLogin"  id="frmLogin">
		<table>
			<tr>
				<td>User Name</td>
				<td><input type="text" size="42" name="username" required  minlength="5" maxlength="5" pattern="[a-zA-Z0-9 ]{5}"  placeholder="Enter Username">
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" size="42" name="password" required  placeholder="Enter Password" minlength="8" maxlength="8"  pattern="[a-zA-Z0-9*@#]{8}"></td>
			</tr>

			<tr>
				<td colspan="2"><input type="submit" name="submit" ></td></span>
			</tr>
		</form>
	</table>
	<a href="index.php" style="text-decoration:none;color:#000;" id="qw"><span style="text-align:center;padding: 10px"><h3>Click here to Register ?</h3></span></a>

	<!-- <script src="./js/jquery-1.11.3.min.js" type="text/javascript"></script> -->
	<!-- <script src="./js/jquery-ui.min.js" type="text/javascript"></script> -->
	<script src="./js/jquery.validate.min.js" type="text/javascript"> </script>
	<!-- <script src="./js/validate.js" type="text/javascript"> </script> -->
	<script>
		$(function(){
			$('#frmLogin').validate({
				rules:{
					username:{required:true},
					password:{required:true}
				},
				messages:{
					username:{required:"Enter Username"},
					password:{required:"Enter Password"}
				}
			})
		});
	</script>

</body>
</html>
