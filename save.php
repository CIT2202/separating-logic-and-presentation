<?php
include("connect.php");

//This is a simple example we would normally do some form validation here

//basic form processing
$title=$_POST['title'];
$year=$_POST['year'];
$duration=$_POST['duration'];
$certId=$_POST['certificate'];


//SQL INSERT for adding a new row
//Use a prepared statement to bind the values from the form
$query="INSERT INTO films (id, title, year, duration, certificate_id) VALUES (NULL, :title, :year, :duration, :certId)";
$stmt=$conn->prepare($query);
$stmt->bindValue(':title', $title);
$stmt->bindValue(':year', $year);
$stmt->bindValue(':duration', $duration);
$stmt->bindValue(':certId', $certId);
$stmt->execute();
$conn=NULL;

include "views/save-view.php";
?>
