<!DOCTYPE HTML>
<html>
<head>
<title>
<?php
	if(isset($pageTitle)){
		echo $pageTitle;
	}else{
		echo "Simple CRUD Examples";
	}
?>
</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>
<body>
<nav>
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="create.php">Add new film</a></li>
		<li><a href="about.php">About</a></li>
	</ul>
</nav>	
