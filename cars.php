<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Frog Car Rental</title>
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.ico">
    <link rel="stylesheet" href="style.css"/>
    <script src="scripts/redirect.js" defer></script>
    <script src="scripts/sort.js" defer></script>
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
            <div class="header-icon-div"><a href="https://www.youtube.com/channel/UCVtZlKSOkcDwc2X5tu1_dtQ" target="_blank"><img src="images/icons/youtube.svg"/></a></div>
            <div class="header-icon-div"><a href="https://www.facebook.com/RobertNogalFrog/" target="_blank"><img src="images/icons/facebook.svg"/></a></div>
            <div class="header-icon-div"><a href="https://www.instagram.com/robertnogalfrog/" target="_blank"><img src="images/icons/instagram.svg"/></a></div>
        </div>
    </header>
    <main>
        <div id="cars">
            <div id="car-sort">
                <select id="car-sort-select">
                    <option value="" selected disabled hidden>sortuj</option>
                    <option value="recommended">polecane</option>
                    <option value="price_ascending">cena rosnąco</option>
                    <option value="price_descending">cena malejąco</option>
                    <option value="horsepower_ascending">moc rosnąco</option>
                    <option value="horsepower_descending">moc malejąco</option>
                </select>
            </div>
            <div id="car-container">
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");
                    $query = mysqli_query($conn, "SELECT * FROM `cars`");

                    if(isset($_GET["sort"])){
                        switch($_GET["sort"]){
                            case "recommended":
                                $query = mysqli_query($conn, "SELECT * FROM `cars`");
                                break;
                            case "price_ascending":
                                $query = mysqli_query($conn, "SELECT * FROM `cars` ORDER BY price ASC");
                                break;
                            case "price_descending":
                                $query = mysqli_query($conn, "SELECT * FROM `cars` ORDER BY price DESC");
                                break;
                            case "horsepower_ascending":
                                $query = mysqli_query($conn, "SELECT * FROM `cars` ORDER BY horsepower ASC");
                                break;
                            case "horsepower_descending":
                                $query = mysqli_query($conn, "SELECT * FROM `cars` ORDER BY horsepower DESC");
                                break;
                            default:
                                $query = mysqli_query($conn, "SELECT * FROM `cars`");
                                break;
                        }
                    }

                    while($row = mysqli_fetch_array($query)){
                        echo '
                        <div class="car-card">
                            <a href="#">
                                <img src="images/cars/'.$row["id"].'.jpg"/>
                                <h5>'.$row["brand"].' '.$row["model"].'</h5>
                                <p>'.$row["horsepower"].' KM</p>
                                <p>'.$row["acceleration"].' s</p>
                                <p>'.$row["top_speed"].' km/h</p>
                                <p class="car-card-price"><b>'.$row["price"].' zł</b> za dzień</p>
                            </a>
                        </div>
                        ';
                    }

                    mysqli_close($conn);
                ?>
            </div>
        </div>
    </main>
    <footer>
        <p>Copyright &copy; 2023 frogcarrental.pl</p>
    </footer>
</body>
</html>
