<?php
include('conn.php');
include('functions.php');

// check if user is logged in
checkLogin();

$error = "";
if(isset($_POST['addCourse'])){
    $error = addCourse($_POST['course_name'], $_SESSION['user']['account_id']);
    
    if($error === TRUE){
        $_SESSION['message'] = 'Course added successfully';
        header('Location: add.php');
        exit(0);
    }else{
        $_SESSION['error'] = $error;
        header('Location: add.php');
        exit(0);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Course</title>
</head>
<body>
	<h1>Zuri Task - 2021/04/23</h1>
	<form method="post" action="add.php" autocomplete="off">
		<h2>Add New Course</h2>
        <p><a href="index.php"><<< Go back</a></p>
        <p style="color: red;">
            <?php
            if(!empty($_SESSION['error']))
            {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
        </p>
        <p style="color: green;">
            <?php
            if(!empty($_SESSION['message']))
            {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
        </p>
        <label>
            <p>
                Course Name:<br/>
                <input type="text" name="course_name" value="<?= displayValue('course_name'); ?>" required>
            </p>
		<p>
			<button type="submit" name="addCourse">Add</button>
		</p>
        </label>
    </form>
</body>