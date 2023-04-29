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
            <?php
                if(isset($_GET["auto"])){
                    $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");

                    $unformatted = explode("_", $_GET["auto"]);
                    $brand = $unformatted[0];
                    array_shift($unformatted);
                    $model = implode(" ", $unformatted);

                    $query = mysqli_query($conn, "SELECT * FROM `cars` WHERE brand='".$brand."' AND model='".$model."'");
                    $row = mysqli_fetch_array($query);

                    echo "<h2>".$brand." ".$model."</h2>";

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
