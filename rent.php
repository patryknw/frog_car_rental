<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Frog Car Rental</title>
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.ico">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <header>
        <div id="header-links">
            <a href="index.html">O nas</a>
            <a href="cars.php">Samochody</a>
            <a href="login.html">Zaloguj się</a>
        </div>
        <div id="header-socials">
            <div id="header-icon-div"><a href="https://www.youtube.com/channel/UCVtZlKSOkcDwc2X5tu1_dtQ" target="_blank"><img src="images/icons/youtube.svg"/></a></div>
            <div id="header-icon-div"><a href="https://www.facebook.com/RobertNogalFrog/" target="_blank"><img src="images/icons/facebook.svg"/></a></div>
            <div id="header-icon-div"><a href="https://www.instagram.com/robertnogalfrog/" target="_blank"><img src="images/icons/instagram.svg"/></a></div>
        </div>
    </header>
    <main>
        <div id="rent-container">
            <h2>test</h2>
            <?php
                if(isset($_GET["id"])){
                    echo "<p>".$_GET["id"]."</p>";

                    $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");
                    $query = mysqli_query($conn, "SELECT * FROM `cars` WHERE id=".$_GET["id"]);
                    $row = mysqli_fetch_array($query);

                    echo "<pre>";
                    print_r($row);
                    echo "</pre>";

                    mysqli_close($conn);
                }
            ?>
        </div>
    </main>
    <footer>
        <p>Copyright &copy; 2023 <a href="index.html">frogcarrental.pl</a></p>
    </footer>
</body>
</html>
