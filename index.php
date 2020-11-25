<?php
	# Stop Hacking attempt
	define('__APP__', TRUE);
	
	# Start session
    session_start();
    
    # Database connection
    include ("dbconn.php");

    if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
	if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }
    
    if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }

    if (!isset($menu)) { $menu = 1; }

    include_once("pickerDateToMySql.php");
    
print '
<!DOCTYPE html>
<html>
	<head>
        <title>NTPWS Miroslav Vranić</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="description" content="vjezbe iz ntpws">
        <meta name="keyword" content="ships, star, stars, trek">
        <meta name="author" content="Miroslav Vranić">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <meta charset="UTF-8">
        <meta name="author" content="Miroslav Vranić">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
		    integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link rel="stylesheet" href="ntpws.css">
	</head>
<body>
    <header class="container-fluid bg-dark">
    </header>
    <div class="bg-dark sticky-top m-0">
        <nav class="navbar navbar-expand-md navbar-light bg-dark navbar-dark">';
            include("menu.php");
        print'
        </nav>
    </div>
	<main>';
		
	# Homepage
	if (!isset($_GET['menu']) || $_GET['menu'] == 1) { include("home.php"); }
	
	# News
	else if ($_GET['menu'] == 2) { include("ships.php"); }
	
	# Contact
	else if ($_GET['menu'] == 3) { include("contact.php"); }
	
	# About us
    else if ($_GET['menu'] == 4) { include("about.php"); }
    
    # Gallery
    else if ($_GET['menu'] == 5) { include("gallery.php"); }

    # Prijava
    else if ($_GET['menu'] == 6) { include("signin.php"); }

    # Registracija
    else if ($_GET['menu'] == 7) { include("signup.php"); }

    # Novi članak
    else if ($_GET['menu'] == 8) { include("new-article.php"); }

    # Korisnici
    else if ($_GET['menu'] == 9) { include("users.php"); }

    # Članci
    else if ($_GET['menu'] == 10) { include("articles.php"); }
	
	print '
    </main>
    <footer class="container-fluid bg-dark text-center">
        <p><small>&copy; Copyright ' . date("Y") . ', Tehničko veleučilište Zagreb, NTPWS (Miroslav Vranić)</small></p>
    </footer>
</body>
</html>';
?>