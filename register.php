<?php
include('conn.php');
include ('functions.php');
$error = "";
if(isset($_POST['register']))
{
	$error = registerUser($_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['password']);
	if($error === TRUE)
	{
		header('Location: login.php?register=Account created successfully, login below to continue');
		exit(0);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
</head>
<body>
	<h1>Zuri Task - 2021/04/23</h1>
	<form method="post" action="register.php" autocomplete="off">
		<h2>Registration Form</h2>
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
				First Name:<br/>
				<input type="text" name="first_name" value="<?= displayValue('first_name'); ?>" required>
			</p>
		</label>
		<label>
			<p>
				Last Name:<br/>
				<input type="text" name="last_name" value="<?= displayValue('last_name'); ?>" required>
			</p>
		</label>
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
			<button type="submit" name="register">Register</button>
		</p>
		<p>
			Already have an account? <a href="login.php">Log in</a>
		</p>
</body>
</html>