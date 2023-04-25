<?php 
    require_once('templates/common.php');

    if (!isset($_SESSION['user'])) {     // if user is not logged in
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Trouble Tickets</title>
        <meta charset="UTF-8">
        <meta name="css/viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div class="main">
            <div class="main-text">
                <a href="index.php">Trouble<br/>Tickets</a>
                <h2>We're here to help!<br/>Submit your tickets today.</h2>
                <img src="icons/ticket.png" alt="ticket">
            </div>
            <form action="ticket.php" method="post">
                <p>Welcome!</p>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
                <p>Don't have an account? <a href="register.php">Sign up</a></p>
            </form>
        </div>
    </body>
</html>

<?php
    } else {                // if user is logged in, go to the main page
        outputHeader();
        outputFooter();
    }
?>