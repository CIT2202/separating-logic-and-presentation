# Separating logic and presentation

- Open your existing codespace (DON'T CREATE A NEW ONE) [https://github.com/codespaces](https://github.com/codespaces).
- In the terminal enter

```
git clone https://github.com/CIT2202/basic-CRUD-in-PHP/
```

This will copy the contents of the **Basic CRUD in PHP** repository into your codespace.

- From the _basic-CRUD-in-PHP_ folder, open _index.php_. Change the connection settings to match your database and enviornment. This is the line you need to change:

```
    $conn = new PDO('mysql:host=localhost;dbname=MyDatabase', 'MyUsername', 'MyPassword');
```

You will need to change it to:

```
    $conn = new PDO('mysql:host=db;dbname=webdev', 'student', 'secret');
```

- In a browser navigate to the _basic-CRUD-in-PHP_ folder. You should see the _index.php_ page displayed. It should be showing the list of films from the database.
- Have a good look through the code in _index.php_. Make sure you understand what each line of code is doing.

## Getting the other operations to work

- If you click on one of the links in _index.php_, this takes you to _show.php_, and you'll get an error. Open up _show.php_ and edit the connection settings just like you did in _index.php_. The _show.php_ page should then work.
- Continue by changing the connection settings in the other files to get the whole application to work. Make sure you look carefully through the code so you understand how the application has been built.
- Open _connect.php_. Change the connection settings to match your database and environment. This is the line you need to change

```
    $conn = new PDO('mysql:host=localhost;dbname=MyDatabase', 'MyUsername', 'MyPassword');
```

You will need to change it to:

```
    $conn = new PDO('mysql:host=db;dbname=webdev', 'student', 'secret');
```

## Using `require` to load the connection code

In the _basic-CRUD-in-PHP_ folder create a new file, name it _connect.php_. Enter the following code into _connect.php_

```php
<?php
//Connect to the database
try{
    $conn = new PDO('mysql:host=db;dbname=webdev', 'student', 'secret');
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}
```

In _index.php_, delete the `try...catch` statement and change the code at the top of the file to `require` this connection block. 

```php
<?php
require "connect.php";

//An SQL statement for selecting all the rows in the films table
$query = "SELECT id, title, year, duration FROM films";

// Execute this SQL query
$resultset = $conn->query($query);

//The rest of you code follows below...
```

## Separating Logic from Presentation

In the _basic-CRUD-in-PHP_ folder create a new folder, name it _views_. Inside this folder create a file, name it _index.view.php_.

Copy the following code into _index.view.php_. 

```html
<!DOCTYPE HTML>
<head>
    <title>List the films</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="create.php">Add new film</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
    </nav>
    <h1>Here's a list of films</h1>
    <?php
    // The results from the database are returned as an array
    // Use a foreach loop to iterate over the array and display the each film
    foreach ($films as $film) {
        echo "<p>";
        // Construct a link to the show.php page e.g. <a href="show.php?id=2">Winter's Bone</a>
        echo "<a href='show.php?id={$film["id"]}'>";
        // Display the film's title
        echo $film["title"];
        echo "</a>";
        echo "</p>";
    }
    ?>
</body>
</html>
```
In _index.php_ delete all the the HTML code and replace it with a `require` statement that will load _index.view.php_. _index.php_ will then look like:

```php
<?php
require "connect.php";

//An SQL statement for selecting all the rows in the films table
$query = "SELECT id, title, year, duration FROM films";

// Execute this SQL query
$resultset = $conn->query($query);

/*
Grab hold of the results
We expect to get more than a single row back so we use fetchAll()
*/
$films = $resultset->fetchAll();

//We no longer need the database so close the connection
$conn = NULL;

require "views/index.view.php";
```

Test this works

## Re-writing the other pages
- Go through each of the other pages in the site and re-write them to use _connect.php_, and use a separate 'view' file. 

## Test Your Understanding
- Previously we looked at creating 'header' and 'footer' files for a simple HTML website. How can we do something similar to reduce the duplicate HTML code the 'view' files.  
- Can you add some error checking to the _show.php_ page. For example, if a user tries to access this page directly without selecting a film first, or they try and access a film that doesn't exist. How can we detect this error and display a more suitable error message. One approach would be load a '404' page and then use `die` to prevent further code from running.
