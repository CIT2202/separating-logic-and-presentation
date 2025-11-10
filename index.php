<?php
include "connect.php";

//select all the films
$query = "SELECT * FROM films";
$resultset = $conn->query($query);
$films = $resultset->fetchAll();
$conn = NULL;
include "views/index.view.php";
