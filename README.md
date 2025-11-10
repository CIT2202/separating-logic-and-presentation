# Separating logic and presentation

## If you are using Codespaces <a name="codespaces"></a>

- Open your existing codespace (DON'T CREATE A NEW ONE) [https://github.com/codespaces](https://github.com/codespaces).
- In the terminal enter

```
git clone https://github.com/CIT2202/separating-logic-and-presentation
```

This will copy the contents of this repository into your codespace.

- Open _connect.php_. Change the connection settings to match your database and environment. This is the line you need to change

```
    $conn = new PDO('mysql:host=localhost;dbname=MyDatabase', 'MyUsername', 'MyPassword');
```

You will need to change it to:

```
    $conn = new PDO('mysql:host=db;dbname=cht2520', 'root', 'secret');
```

- Start Apache (`apache2ctl start`)
- Browse to the _separating-logic-and-presentation_ folder. You should see the _index.php_ page displayed. It should be showing the list of films from the database.
- Right-click on the page and select 'view page source' so you can see the page that has been generated.
- Now, have a good look at the code in _index.php_. Make sure you understand how this page is using `require` statements to construct the page.

Now move onto [Completing the practical work](#practical)

## If you are using XAMPP <a name="xampp"></a>

- Download this repository and unzip it. Move the folder into your _htdocs_ directory on XAMPP.

- Start with _index.php_. In the PHP code, change the connection settings to match your database. This is the line you need to change

```
    $conn = new PDO('mysql:host=localhost;dbname=MyDatabase', 'MyUsername', 'MyPassword');
```

You will need to change _MyDatabase_ to cht2520, and _MyUsername_ and _MyPassword_ to match the username and password you entered.

- View _index.php_ in a browser. You should see a list of films.
- Right click on the page and select 'view page source' so you can see the page that has been generated.
- Now, have a good look at the code in _index.php_. Make sure you understand how this page is using `require` statements to construct the page.

Now move onto [Completing the practical work](#practical).

## Completing the practical work <a name="practical"></a>

When the user clicks on a film they are taken to the _show_ page where the full details for a film are displayed.

- Re-write this page so that is uses `require` to remove duplicate code.
- Once this works, add some error checking to the _show.php_ page. For example, if a user tries to access this page directly without selecting a film first, we get an error. How can we detect this error and display a more suitable error message.
  - One approach would be load a '404' page and then use `die` to prevent further code from running. If you look in the _views_ folder you should find there is already a 404 page you can use.
