<!DOCTYPE>
<html>
    <head>
        <title>MVC PHP</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="panel.css">
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <h1>Panele allegro</h1>
                <div id="nav">
                    <ul>
                        <?php
                            if(isset($_SESSION['user'])):
                                echo 'Zalogowano jako ' . $_SESSION['user']['login']; 
                        ?>
                            <li><a href="?panel">Twoje panele</a></li>
                            <li><a href="?account&amp;edit">Twoje dane</a></li>
                            <li><a href="?logout">Wyloguj</a></li>
                        <?php else: ?>
                            <li><a href="?register">Zrejestruj się</a></li>
                            <li><a href="?account">Zaloguj się</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div id="content">
              <?php if(isset($data['error'])) 
                echo '<div id="error">' . $data['error'] . '</div>'; 
              ?>
