<?php

require_once('../includes/config.php');


//if(!$user->is_logged_in()){ header('Location: login.php'); }


if(isset($_GET['delpost'])){

	$stmt = $db->prepare('DELETE FROM thread WHERE id = :id') ;
	$stmt->execute(array(':id' => $_GET['delpost']));

	header('Location: index.php?action=deleted');
	exit;
} 

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <link rel="stylesheet" href="../style/bootstrap.min.css">
  <script language="JavaScript" type="text/javascript">
  function delpost(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + Thread + "'"))
	  {
	  	window.location.href = 'index.php?delpost=' + id;
	  }
  }
  </script>
</head>
<body>

	<div id="wrapper">

	<?php include('menu.php');?>

	<?php 

	if(isset($_GET['action'])){ 
		echo '<h3>Post '.$_GET['action'].'.</h3>'; 
	} 
	?>

	<table>
	<tr>
		<th>Subject</th>
		<th>Date</th>
		<th>Action</th>
	</tr>
	<?php
		try {

			$stmt = $db->query('SELECT id, subject, created FROM thread ORDER BY id');
			while($row = $stmt->fetch()){
				
				echo '<tr>';
				echo '<td>'.$row['subject'].'</td>';
				echo '<td>'.date('jS M Y', strtotime($row['created'])).'</td>';
				?>

				<td>
					<a href="edit-post.php?id=<?php echo $row['id'];?>">Edit</a> | 
					<a href="javascript:delpost('<?php echo $row['id'];?>','<?php echo $row['subject'];?>')">Delete</a>
				</td>
				
				<?php 
				echo '</tr>';

			}

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
	?>
	</table>

	<p><a href='add-post.php'>Add thread</a></p>

</div>

</body>
</html>
