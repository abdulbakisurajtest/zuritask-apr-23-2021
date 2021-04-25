<?php
include('conn.php');
include('functions.php');
// check if user is logged in
checkLogin();
$error = "";
$message = "";
if(isset($_POST['reset_password']))
{
	$error = resetPassword($_SESSION['user']['account_id'], $_SESSION['user']['username'], $_POST['old_password'], $_POST['new_password']);
	if($error === 'success')
	{
		$message = 'Password has been changed successfully';
		unset($error);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reset Password</title>
</head>
<body>
	<h1>Zuri Task - 2021/04/08</h1>
	<form method="post" action="resetpassword.php">
		<h2>Reset Password</h2>
		<!-- Display error messages -->
		<p style="color: red;">
			<?php
			if(!empty($error))
			{
				echo $error;
			}
			?>
		</p>

		<!-- Display success messages -->
		<p style="color: green;">
			<?php
			if(!empty($message))
			{
				echo $message;
			}
			?>
		</p>
		<label>
			<p>
				Old password:<br/>
				<input type="password" name="old_password" required>
			</p>
		</label>
		<label>
			<p>
				New password:<br/>
				<input type="password" name="new_password" required>
			</p>
		</label>
		<p>
			<a href="index.php">Cancel</a>
			&nbsp;&nbsp;
			<button type="submit" name="reset_password">Change</button>
		</p>
	</form>
</body>
</html>