<?php
include('conn.php');
include('functions.php');
// check if user is logged in
checkLogin();

if(isset($_POST['deleteCourse']))
{
    $error = deleteCourse($_POST['course_id'], $_SESSION['user']['account_id']);

    if($error === TRUE){
        $_SESSION['message'] = 'course has been deleted successfully';
        header('Location: index.php');
        exit(0);
    }else{
        $_SESSION['error'] = $error;
        header('Location: delete.php?id='.$_POST['course_id']);
        exit(0);
    }
}

//  fetch single course info
if(isset($_GET['id'])){
    $courseData = getSingleCourse($_GET['id']);
    if(
        empty($courseData) || 
        !is_array($courseData) || 
        $courseData['account_id'] !== $_SESSION['user']['account_id']
        )
    {
        header('Location: index.php');
        exit(0);
    }
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
	<title>Delete Course</title>
</head>
<body>
	<h1>Zuri Task - 2021/04/23</h1>
	<h2>Delete Course</h2>
	<p style="color: red;">
        <?php
        if(!empty($_SESSION['error']))
        {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        ?>
    </p>
    <p>
        You are about to delete <strong>'<?php echo $courseData['course_name']; ?>'</strong>.<br/>
        Are you sure you want to continue ?</p>
    <p>
        <form method="post" action="delete.php" autocomplete="off">
            <input type="hidden" name="course_name" value="<?php echo $courseData['course_name']; ?>">
            <input type="hidden" name="course_id" value="<?php echo $courseData['course_id'];?>">
            <a href="index.php">No</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
            <button type="submit" name="deleteCourse">Yes</button>
        </form>
    <p>
</body>