<?php
session_start();
if(empty($_SESSION['message'])){
	session_destroy();
	header("location:index.php");
}
$username = $_SESSION['username'];
$query = "select * from tbl_users where username = '$username'";
$conn = mysqli_connect("localhost","root","rootpass","test");
$db = mysqli_query($conn,$query);
if(isset($_POST['Deleteid'])and!empty($_POST['Deleteid'])){
	$delid = $_POST['Deleteid'];
	$query = "DELETE FROM tbl_users where id = '".$delid."'";
	$res = mysqli_query($conn,$query);
}

?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		function deleteid(id){
			yes = confirm("Are you Sure");
			if(yes){
				var t = frmDash.Deleteid.value = id;
				frmDash.submit();
			}
		}

	</script>
	<style>
	table {
		/*	background-color: #f8bebe;*/
		text-align: center;
		margin-left:260px;
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 60%;
	}

	td, th {
		border: 2px solid #000;
		text-align: center;
		padding: 7px;
	}
	input{ background-color:lightgray; padding:.5em; font-size:14px;color:#000;font-weight:bold;}
	input[pattern]:invalid{color:#ff6c6c;font-weight:bold }
</style>
</head>
<body>

	<div style="text-align: center">
		
		<div><h1>Dashboard</h1></div>
		<a href="login.php" style="text-decoration:none;color:#000;font-weight:bold" id="qw">Logout</a>
	</div>
	<br>
	<table>

		<form method="post" name="frmDash" id="frmDash">
			<tr style="background-color:grey">
				<td>Name</td>
				<td>Username</td>
				<td>Mobile Number</td>
				<td>EMail</td>
				<td>Dob</td>
				<td>Action</td>
			</tr>
			<?php while($dbvalues = mysqli_fetch_assoc($db)){?>
			<tr>
				<td width="10%"><?php echo $dbvalues['name'];?></td>
				<td width="10%"><?php echo $dbvalues['username'];?></td>
				<td width="15%"><?php echo $dbvalues['mobile'];?></td>
				<td width="15%"><?php echo $dbvalues['email'];?></td>
				<td width="20%"><?php echo $dbvalues['dob'];?></td>
				<td width="40%">
					<a  href="<?php echo "edit.php?id='".$dbvalues['id']."'" ?>" >Edit</a> 
				</td>
			</tr>
			<?php }?>
		</form>
	</table>

</body>
</html>
