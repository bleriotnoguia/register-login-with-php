<?php
session_start();
if(isset($_SESSION['user'])){
    $username = $_SESSION['user'];
}else{
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reloga - Register, Login, Account in php</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php
                if(isset($_SESSION['user'])) {
                    echo "<li><a href='app/logout.php'>Logout</a></li>";
                }else{
                    echo "<li><a href='index.php?p=login'>Login</a></li>";
                    echo "<li><a href='index.php?p=register'>Register</a></li>";
                }
            ?>
        </ul>
    </nav>
    <div class="container">
        <?php
        if(isset($_SESSION['user'])) {
            echo "<h1>Welcome ".$username.", Your are logged !!</h1>";
        }else{
            if(!isset($_GET['p'])){
                ?>
                <h1>Se connecter pour voir le contenu !</h1>
                <?php
            }elseif($_GET['p']=='login') {
                ?>
                <form action="app/login.php" method="post">
                    <h1>Connexion de l'user</h1>
                    <input type="text" name="name" placeholder="Enter your username">
                    <input type="password" name="password" placeholder="Enter your password">
                    <input type="submit" value="Connexion">
                </form>
                <?php
            }elseif($_GET['p']=='register') {
                ?>
                <form action="app/insert.php" method="post">
                    <h1>Inscription de l'user</h1>
                    <input type="text" name="name" placeholder="Enter your username">
                    <input type="text" name="email" placeholder="Enter your email">
                    <input type="password" name="password" placeholder="Enter password">
                    <input type="submit" value="Inscription">
                </form>
                <?php
            }
        }
        ?>
    </div>
</body>
</html>