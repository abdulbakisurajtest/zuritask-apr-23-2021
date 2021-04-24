<?php
include('conn.php');
include('functions.php');

// check if user is logged in
checkLogin();

// fetch course data
$courseData = getCourses($_SESSION['user']['account_id']);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		table{
			border: solid black 1px;
			background-color: #333;
		}
		td, th{
			border: solid black 1px;
			padding: 5px;
			background-color: #eee;
		}
		th{
			background-color: #555;
			color: #ddd;
		}
	</style>
	<title>Home</title>
</head>
<body>
	<h1>Zuri Task - 2021/04/23</h1>
	<p>
		Welcome, 
		<?php
		echo htmlentities($_SESSION['user']['first_name']);
		echo ' '.htmlentities($_SESSION['user']['last_name']);
		echo '<strong>';
		echo ' @'.htmlentities($_SESSION['user']['username']);
		echo '</strong>';
		?>
	</p>
	<p>
		<a href="logout.php">Logout</a> or <a href="resetpassword.php">Reset password</a>
	</p>
	<h2>Course Dashboard</h2>
	<p><a href="add.php">Add new course</a></p>
	<table>
		<thead>
			<th>S/N</th>
			<th>Course Name</th>
			<th colspan="2">Action</th>
		</thead>
		<tbody>
			<?php
			if(is_array($courseData) && count($courseData)>0){
				foreach($courseData as $key => $value){
					echo '<tr>';
					echo '<td>'.($key+1).'</td>';
					echo '<td>'.$value['course_name'].'</td>';
					echo '<td><a = href="edit.php?id='.$value['course_id'].'">Edit</a></td>';
					echo '<td><a = href="delete.php?id='.$value['course_id'].'">Delete</a></td>';
					echo '</tr>';
				}
			}
			else{
				?>
				<tr>
					<td colspan="4">No courses have been created yet !!!</td>
				</tr>
				<?php
			}?>
		</tbody>
	</table>

</body>
</html>