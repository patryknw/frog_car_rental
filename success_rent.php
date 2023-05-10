<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8"/>
    <meta name="description" content="Pobaw się. Zaimponuj dziewczynie. Wynajmij luksusowy samochód. Sprawdź naszą ofertę - na pewno znajdziesz coś dla siebie."/>
    <meta name="author" content="Patryk Nowak">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Frog Car Rental</title>
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <header>
        <div id="header-links">
            <a href="index.php">O nas</a>
            <a href="cars.php">Samochody</a>
            <?php
                if(isset($_SESSION["email"])){
                    echo '<a href="account.php">Konto</a>';
                } else{
                    echo '<a href="login.php">Zaloguj się</a>';
                }
            ?>
        </div>
        <div id="header-socials">
            <div class="header-icon-div"><a href="https://www.youtube.com/channel/UCVtZlKSOkcDwc2X5tu1_dtQ" target="_blank"><img src="images/icons/youtube.svg" alt="YouTube"/></a></div>
            <div class="header-icon-div"><a href="https://www.facebook.com/RobertNogalFrog/" target="_blank"><img src="images/icons/facebook.svg" alt="Facebook"/></a></div>
            <div class="header-icon-div"><a href="https://www.instagram.com/robertnogalfrog/" target="_blank"><img src="images/icons/instagram.svg" alt="Instagram"/></a></div>
        </div>
    </header>
    <main>
        <div id="success">
            <h2>Gratulacje</h2>
            <h4>Pomyślnie wynajęto auto!</h4>
            <h4>Aby wyświetlić szczegóły wynajmu, przejdź do zakładki<br/><a id="register-link" href="account.php">Moje konto</a></h4>
            <h4>Dziękujemy za korzystanie z usług Frog Car Rental.<br/>Miłego za*******ania :)</h4>
        </div>
    </main>
    <footer>
        <p>Copyright &copy; 2023 frogcarrental.pl</p>
    </footer>
</body>
</html>
