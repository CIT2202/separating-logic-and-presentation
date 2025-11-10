<?php
require "connect.php";
//select all the films
$query = "SELECT id, title FROM films";
$resultset = $conn->query($query);
$films = $resultset->fetchAll();
$conn = NULL;
require "views/index.view.php";
