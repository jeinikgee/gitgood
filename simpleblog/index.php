<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/bootstrap.min.css">   
</head>
<body style="background: url(bodBG.jpeg);">

	<div id="wrapper">

		<h1>Sketch Blog  ( ͡° ͜ʖ ͡°)</h1>
		<hr />

		<?php
			try {

				$stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
				while($row = $stmt->fetch()){
					
					echo '<div>';
						echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
						echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
						echo '<p>'.$row['postDesc'].'</p>';				
						echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';				
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>


	</div>
	<div id="wrapper">
		<h1>The Fun of Sketching</h1>
		<p>we all love sketch, we all do. Even the early cave men loves sketching. yes we really do. Even you who is wasting his or her precious time reading this useless article loves the sketch. In ancient history, the ancient Egyptians loves to draws on their walls cause they love drawing on their walls. But why is sketching so good? is it because it expand our imagination by visualizing our deepest though into a piece of doodles or artworks? or because it gives the sense of aesthetic satisfaction in our deepest mind? well does questions are some of the answers actually, lol. Anyways, sketching is good, because it's good. wow I applaude you for having the patience to read this useless article cause I'm just typing what comes to my mind, so congrats!! You have awakened to the realization that you are bored!! or your life is just a piece of uselessness.</p>

		<h2>
	</div>

</body>
</html>