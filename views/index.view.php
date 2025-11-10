<?php
$pageTitle = "List the films";
require "header.php";
?>

<h1>A Browseable List</h1>
<?php


//loop over the array of films and display their titles
foreach ($films as $film) {
    echo "<p>";
    echo "<a href='show.php?id={$film["id"]}'>";
    echo $film['title'];
    echo "</a>";
    echo "</p>";
}

require "footer.php";
?>