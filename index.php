<?php

if(isset($_POST['submit'])){
	$name = trim(mysql_real_escape_string($_POST['rname']));
	$moblie = trim(mysql_real_escape_string($_POST['mobile']));
	$email = trim(mysql_real_escape_string($_POST['email']));
	$dob= trim(mysql_real_escape_string($_POST['dob']));
	$username = trim(mysql_real_escape_string($_POST['username']));
	$password = trim(mysql_real_escape_string($_POST['password']));
	$query = "INSERT into tbl_users(name,mobile,email,dob,username,password)VALUES('$name','$moblie','$email', '$dob', '$username','$password')";
	$conn = mysqli_connect("localhost","root","rootpass","test");
	$res = mysqli_query($conn,$query);
	if(isset($res)) {
		$msg = "Registered Successfully....You login to continue";
		// header("location:dashboard.php");
		// session_start();
		// $_SESSION['message'] = "Registered Successfully";
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<style>
	table {
		/*background-color:grey;*/
		background-color:#0077b0 ;
		text-align: center;
		margin-left:200px;
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 70%;
	}

	td, th {
		border: 2px solid #000;
		text-align: center;
		padding: 7px;
	}
	input{ background-color:lightgray; padding:.5em; font-size:14px;color:#000;font-weight:bold;}
	input[pattern]:invalid{color:#ff6c6c;font-weight:bold;font-size:16px; }
	input[pattern]:valid{color:#000;font-weight:bold;font-size:16px; }
	.error{color:darkred;font-weight:bold;}
	.msg{color:green;font-weight:bold;text-align: center;font-size: 25px}
</style>


</head>
<body oncopy="return false" oncut="return false" onpaste="return false">
	<div style="text-align: center">
		<h1>REGISTER</h1>
	</div>
	<div class="msg"><?php echo (!empty($msg)?$msg:" "); ?> </div>
</div>
<br>
<form name="frmReg" id="frmReg" method="post">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="rname" id="rname" size="42" minlength="3" maxlength="10" placeholder="Enter Name" pattern="[a-zA-Z ]{3,10}"></td>
			<br>
			<label class="error"></label>
		</tr>
		<tr>
			<td>Mobile No</td>
			<td><input type="text" size="42" name="mobile" id="mobile"    placeholder="Enter Mobile Number" minlength="10" maxlength="10" pattern="[6,7,8,9]{1}[0-9]{9}">
				
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" size="42" name="email"  required placeholder="Enter EMail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ></td>
		</tr>
		<tr>
			<td>Date of Birth</td>
			<td><input type="date"  name="dob" required class="dateValidity" id="dob" placeholder="Enter DOB"  min="2000-01-01" max="2018-12-12"  id="dob"></td>
			<!-- min="2017-12-12" max="2018-12-12"  -->
		</tr>
		<tr>
			<td>User Name</td>
			<td><input type="text" size="42" name="username"  required minlength="5" maxlength="5" pattern="[a-zA-Z0-9 ]{5}"  placeholder="Enter Username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="text" size="42" name="password"  required placeholder="Enter Password" minlength="8" maxlength="8"  pattern="[a-zA-Z0-9*@#]{8}"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" ></td></span>
		</tr>
	</table>
</form>
<a href="login.php" style="text-decoration:none;color:#000;" id="qw"><span style="text-align:center;padding: 10px"><h3>Want to Login ?</h3></span></a>
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/jquery.validate.min.js"> </script>
<!-- <script src="js/functions.js" type="text/javascript"></script> -->
<script src="js/validate.js"> </script>

<script>
	$(function() {
// console.log("up");
$("#frmReg").validate({
// ignore:[],
rules:{
	rname:{required:true},
	mobile:{required:true,minlength:10,maxlength:10,numbersOnly:true,startsWith:[6,7,8,9]},
	email:{required:true,email1:true},
	dob:{required:true},
	username:{required:true},
	password:{required:true}
},
messages:{
	rname:{required:"Enter the Admin-ID",minlength:"Enter Valid Admin ID",maxlength:"Enter Valid Admin ID",letteronly:"Letters Only Allowed"},
	mobile:{required:"Enter Mobile Number",numbersOnly:"Enter Valid Mobile Number",minlength:"Enter Valid Mobile Number",maxlength:"Enter Valid Mobile Number"},
	email:{email:"Enter valid Email",required:"Enter Email"},
	dob:{required:"Enter Dob"}
},
// submitHandler:function(){
// 	console.log('foo');
// }
}); 
// console.log("down");
});
</script>

</body>
</html>
