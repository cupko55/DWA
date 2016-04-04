<!DOCTYPE html>
<html lang="hr">
<head>
	<meta charset="UTF-8">
	<title>Predstava1</title>
	<link rel="shortcut icon" href="../../img/favicon.png"/>
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,600&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../../css/bootstrap.css"><!--bootstrap-->
	<link rel="stylesheet" href="../../css/stil.css"><!--moj css-->
	<link rel="stylesheet" href="../../css/icons/css/fontello.css"><!--ikone-->
	<?php include("../connect.php");?>
</head>
<body>
	<?php include("navigation.php");?>
	<?php
		$query="SELECT naziv_predstave,slika,redatelj,tekst,kostimi,glumci,		FLOOR(TIME_TO_SEC(trajanje)/60),opis_predstave FROM predstava
				JOIN predstava_prijevod ON predstava.id=predstava_prijevod.id_predstava
				JOIN jezik ON jezik.id=predstava_prijevod.id_jezik
				WHERE jezik.jezik='Cro' AND predstava.id=".$_GET['id']."";
		if($result=mysqli_query($link,$query))
		$row=mysqli_fetch_row($result);		
	echo '<div class="container predstava">
		<ul class="breadcrumb ">
			<li><a href="index.php">Naslovnica</a></li>
			<li><a href="predstave.php">Predstave</a></li>
			<li>'.$row[0].'</li>
		</ul>
		<h2>'.$row[0].'</h2>
		<img src="'.$row[1].'" alt="'.$row[0].'">';
		?>
		<div class="row">
			<article class="col-sm-6">
				<?php
				echo'<p>'.$row[7].'</p>';
				?>
			</article>
			<article class="col-sm-6">
				<?php
				echo'<p><span>Redatelj:</span> '.$row[2].'</p>
				<p><span>Tekst:</span> '.$row[3].'</p>				
				<p><span>Kostimografija:</span> '.$row[4].'</p>
				<p><span>Igraju:</span> '.$row[5].' </p>
				<p><span>Trajanje predstave:</span> '.$row[6].' min</p>';
				?>
			</article>
		</div>
	</div>
	<?php include("../footer.php");?>
</body>
</html>