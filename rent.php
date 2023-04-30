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
            <a href="login.php">Zaloguj się</a>
        </div>
        <div id="header-socials">
            <div id="header-icon-div"><a href="https://www.youtube.com/channel/UCVtZlKSOkcDwc2X5tu1_dtQ" target="_blank"><img src="images/icons/youtube.svg"/></a></div>
            <div id="header-icon-div"><a href="https://www.facebook.com/RobertNogalFrog/" target="_blank"><img src="images/icons/facebook.svg"/></a></div>
            <div id="header-icon-div"><a href="https://www.instagram.com/robertnogalfrog/" target="_blank"><img src="images/icons/instagram.svg"/></a></div>
        </div>
    </header>
    <main>
        <div id="rent">
            <div id="rent-go-back"><a href="javascript:history.go(-1)"><p>&#8592; Powrót</p></a></div>
            <?php
                if(isset($_GET["auto"])){
                    $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");

                    $unformatted = explode("_", $_GET["auto"]);
                    $brand = $unformatted[0];
                    array_shift($unformatted);
                    $model = implode(" ", $unformatted);
                    $query = mysqli_query($conn, "SELECT * FROM `cars` WHERE brand='".$brand."' AND model='".$model."'");
                    $row = mysqli_fetch_array($query);

                    switch($row["drivetrain"]){
                        case "AWD":
                            $drivetrain_loc = "Na cztery koła";
                            break;
                        case "RWD":
                            $drivetrain_loc = "Na tył";
                            break;
                        case "FWD":
                            $drivetrain_loc = "Na przód";
                            break;
                    }

                    switch($row["transmission"]){
                        case "manual":
                            $transmission_loc = "Manualna";
                            break;
                        case "automatic":
                            $transmission_loc = "Automatyczna";
                            break;
                        case "sequential":
                            $transmission_loc = "Sekwencyjna";
                            break;
                        case "automatic_sequential":
                            $transmission_loc = "Automatyczna / Sekwencyjna";
                            break;
                    }

                    switch($row["fuel"]){
                        case "petrol":
                            $fuel_loc = "Benzyna";
                            break;
                        case "diesel":
                            $fuel_loc = "Diesel";
                            break;
                    }

                    echo "<h2>".$brand." ".$model."</h2>";
                    echo "<div id='rent-container'>";
                        echo "<div id='rent-description'>";
                            echo '
                            <table>
                                <tr>
                                    <td><p>moc</p></td>
                                    <td><p><b>'.$row["horsepower"].' KM</b></p></td>
                                </tr>
                                <tr>
                                    <td><p>0-100</p></td>
                                    <td><p><b>'.$row["acceleration"].' s</b></p></td>
                                </tr>
                                <tr>
                                    <td><p>prędkość</p></td>
                                    <td><p><b>'.$row["top_speed"].' km/h</b></p></td>
                                </tr>
                                <tr>
                                    <td><p>silnik</p></td>
                                    <td><p><b>'.$row["engine"].'</b></p></td>
                                </tr>
                                <tr>
                                    <td><p>napęd</p></td>
                                    <td><p><b>'.$drivetrain_loc.'</b></p></td>
                                </tr>
                                <tr>
                                    <td><p>skrzynia</p></td>
                                    <td><p><b>'.$transmission_loc.'</b></p></td>
                                </tr>
                                <tr>
                                    <td><p>paliwo</p></td>
                                    <td><p><b>'.$fuel_loc.'</b></p></td>
                                </tr>
                                <tr>
                                    <td><p>rocznik</p></td>
                                    <td><p><b>'.$row["year"].'</b></p></td>
                                </tr>
                                <tr>
                                    <td><p>cena</p></td>
                                    <td><p><b>'.$row["price"].' za dzień</b></p></td>
                                </tr>
                            </table>
                            ';

                        echo '<button type="button" id="rent-button" name="rent-button">Wynajmij</button>';
                        echo "</div>";

                        echo '
                        <div id="rent-image">
                            <img src="images/cars/'.$row["id"].'.jpg"/>
                        </div>
                        ';

                    echo "</div>";
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
