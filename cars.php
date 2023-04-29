<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Frog Car Rental</title>
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.ico">
    <link rel="stylesheet" href="style.css"/>
    <script src="redirect.js" defer></script>
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
        <div id="car-container">
            <?php
                $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");
                $query = mysqli_query($conn, "SELECT * FROM `cars`");

                while($row = mysqli_fetch_array($query)){
                    echo '
                    <div class="car-card">
                        <img src="images/cars/'.$row["id"].'.jpg"/>
                        <h5>'.$row["brand"].' '.$row["model"].'</h5>
                        <p>'.$row["horsepower"].' KM</p>
                        <p>'.$row["acceleration"].' s</p>
                        <p>'.$row["top_speed"].' km/h</p>
                        <p class="car-card-price"><b>'.$row["price"].' zł</b> za dzień</p>
                    </div>
                    ';
                }

                for($i = 0; $i < 20; $i++){
                    echo '
                    <div class="car-card">
                        <img src="images/cars/1.jpg"/>
                        <h5>BMW M3 E92</h5>
                        <p>420 KM</p>
                        <p>600 zł za dzień</p>
                    </div>
                    ';
                }

                mysqli_close($conn);
            ?>
        </div>
    </main>
    <footer>
        <p>Copyright &copy; 2023 <a href="index.html">frogcarrental.pl</a></p>
    </footer>
</body>
</html>
