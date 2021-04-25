<?php
include('conn.php');
include('functions.php');

// check if user is logged in
checkLogin();

if(isset($_POST['editCourse']))
{
    $error = updateCourse($_POST['course_id'], $_POST['course_name'], $_SESSION['user']['account_id']);

    if($error === TRUE){
        $_SESSION['message'] = 'course has been updated successfully';
        header('Location: index.php');
        exit(0);
    }else{
        $_SESSION['error'] = $error;
        header('Location: edit.php?id='.$_POST['course_id']);
        exit(0);
    }
}

//  fetch single course info
if(isset($_GET['id'])){
    $courseData = getSingleCourse($_GET['id']);
}else{
    header('Location: index.php');
    exit(0);
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
	<form method="post" action="edit.php" autocomplete="off">
		<h2>Update Course</h2>
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
        <label>
            <p>
                Course Name:<br/>
                <input type="text" name="course_name" value="<?php echo $courseData['course_name']; ?>" required>
            </p>
            <input type="hidden" name="course_id" value="<?php echo $courseData['course_id'];?>">
		<p>
			<button type="submit" name="editCourse">Update</button>
		</p>
        </label>
    </form>
</body>