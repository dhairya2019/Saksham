<?php
include('admin/dbcon.php');
include('session.php');
if (isset($_POST['delete_user'])){
$id=$_POST['selector'];
$class_id = $_POST['teacher_class_id'];
 $get_id=$_POST['get_id']; 
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"select * from files  where file_id = '$id[$i]' ")or die(mysqli_error());
	while($row = mysqli_fetch_array($result)){
	
	$fname = $row['fname'];
	$floc = $row['floc'];
	$fdesc = $row['fdesc'];
	$uploaded_by = $row['uploaded_by'];
	
	
	$date_start = $_POST['date_start'];
	$date_end = $_POST['date_end'];
	$title = $_POST['title'];
	
	$query = mysqli_query($conn,"insert into event (date_end,date_start,event_title,teacher_class_id) values('$date_end','$date_start','$title','$get_id')")or die(mysqli_error());
	?>
	<script>
	window.location = "class_calendar.php<?php echo '?id='.$get_id; ?>";
	</script>
	
	
	mysqli_query($conn,"insert into files (floc,fdatein,fdesc,class_id,fname,uploaded_by) value('$floc',NOW(),'$fdesc','$class_id','$fname','$uploaded_by')")or die(mysqli_error());
	
	
	}
}
?>
<script>
window.location = 'downloadable.php<?php echo '?id='.$get_id; ?>';
</script>
<?php
}

if (isset($_POST['copy'])){
$id=$_POST['selector'];

$N = count($id);

?>
<script>
window.location = 'teacher_backack.php';
</script>
<?php
}
?>
<?php

if (isset($_POST['share'])){
$id=$_POST['selector'];
$teacher_id = $_POST['teacher_id1'];
echo $teacher_id ; 
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"select * from files  where file_id = '$id[$i]' ")or die(mysqli_error());
	
}
?>
<script>
 window.location = 'teacher_share.php';
</script>
<?php
}
?>
