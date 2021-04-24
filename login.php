<?php
include('conn.php');
include ('functions.php');
$error = "";
$reg_message = "";
if(isset($_POST['login']))
{
	$error = loginUser($_POST['username'], $_POST['password']);
	if($error === TRUE)
	{
		header('Location: index.php');
		exit(0);
	}
}
if(isset($_GET['register']))
{
	$reg_message = $_GET['register'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	<h1>Zuri Task - 2021/04/23</h1>
	<form method="post" action="login.php" autocomplete="off">
		<h2>Login Form</h2>
		<p style="color: green;">
			<?php
			if(!empty($reg_message))
			{
				echo $reg_message;
			}
			?>
		</p>
		<p style="color: red;">
			<?php
			if(!empty($error))
			{
				echo $error;
			}
			?>
		</p>
		<label>
			<p>
				Username:<br/>
				<input type="text" name="username" value="<?= displayValue('username'); ?>" required>
			</p>
		</label>
		<label>
			<p>
				Password:<br/>
				<input type="password" name="password" required>
			</p>
		</label>
		<p>
			<button type="submit" name="login">Login</button>
		</p>
		<p>
			Don't have an account? <a href="register.php">Register</a>
		</p>
</body>
</html>