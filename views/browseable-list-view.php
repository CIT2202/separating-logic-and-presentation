<?php
include "header.php";
?>

<h1>A Browseable List</h1>
<?php


//loop over the array of films and display their titles
foreach ($films as $film) {
    echo "<p>";
    echo "<a href='details-new.php?id={$film["id"]}'>";
    echo $film['title'];
    echo "</a>";
    echo "</p>";
}

include "footer.php";
?>
