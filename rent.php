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
    <script src="scripts/rent.js" defer></script>
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
                    $car_id = $row["id"];

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
                                    <td><p id="rent-car-price"><b>'.$row["price"].' za dzień</b></p></td>
                                </tr>
                            </table>
                            ';

                        echo '<button type="button" id="rent-button" name="rent-button">Wynajmij</button>';
                        echo "</div>";

                        echo '
                        <div id="rent-image">
                            <img src="images/cars/'.$car_id.'.jpg"/>
                        </div>
                        ';

                    echo "</div>";
                    mysqli_close($conn);
                }
            ?>
        </div>
        <div id="rent-form">
            <form method="POST">
                <div id="rent-form-close"><span id="rent-form-close-span">&#x2715;</span></div>
                <h3>Wynajmij</h3>
                <span class="error-span" id="rent-form-error">&nbsp;</span>
                <br/>
                <span>od</span>
                <input type="datetime-local" id="rent-form-date-from" name="rent-form-date-from" class="first-element"/>
                <br/>
                <span>do</span>
                <input type="datetime-local" id="rent-form-date-to" name="rent-form-date-to"/>
                <br/>
                <p id="rent-form-disclaimer">Cena naliczana od każdej zaczętej doby</p>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");
                    $query = mysqli_query($conn, '
                    SELECT cars.id, rent_data.date_from, rent_data.date_until
                    FROM users
                    INNER JOIN rent_data ON users.id = rent_data.user_id
                    INNER JOIN cars ON cars.id = rent_data.car_id
                    WHERE cars.id = '.$car_id.' AND rent_data.date_until > UNIX_TIMESTAMP(CURRENT_TIMESTAMP)
                    ORDER BY rent_data.date_from ASC;
                    ');

                    if(mysqli_num_rows($query) > 0){
                        echo "<h4>Wynajęte w terminach</h4>";
                        echo "<div id='rent-form-dates'>";
                    }

                    while($row = mysqli_fetch_array($query)){
                        $date_from = date("d.m.Y H:i", $row["date_from"]);
                        $date_until = date("d.m.Y H:i", $row["date_until"]);
                        echo "<p>".$date_from." - ".$date_until."</p>";
                    }

                    if(mysqli_num_rows($query) > 0){
                        echo "</div>";
                    }

                    mysqli_close($conn);
                ?>
                <h4>Opcje wynajmu</h4>
                <div id="rent-form-options">
                    <label for="rent-form-car-wash"><input type="checkbox" id="rent-form-car-wash" name="rent-form-car-wash"/><span>Myjnia (+50 zł)</span></label>
                    <label for="rent-form-flowers"><input type="checkbox" id="rent-form-flowers" name="rent-form-flowers"/><span>Kwiaty (+75 zł)</span></label>
                    <?php
                        if(isset($_SESSION["email"])){
                            $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");
                            $query = mysqli_query($conn, 'SELECT id, is_business FROM users WHERE email = "'.$_SESSION["email"].'";');
                            $row = mysqli_fetch_array($query);

                            $user_id = $row["id"];
                            $is_business = $row["is_business"];

                            if($is_business == 1){
                                echo '<label for="rent-form-business"><input type="checkbox" id="rent-form-business" name="rent-form-business" checked/><span>Wynajmij na firmę</span></label>';
                            } else{
                                echo "<label><span>&nbsp;</span></label>";
                            }

                            mysqli_close($conn);
                        } else{
                            echo "<label><span>&nbsp;</span></label>";
                        }
                    ?>
                </div>
                <div id="rent-form-total">
                    <h4 id="rent-form-total-text">Suma: <b>0 zł</b></h4>
                </div>
                <div id="rent-form-button">
                    <input type="submit" id="rent-form-submit" name="rent-form-submit" value="Wynajmij"/>
                </div>
            </form>
        </div>
        <?php
            function insertIntoDatabase($user_id, $car_id){
                if(isset($_POST["rent-form-car-wash"])){
                    $car_wash = 1;
                } else{
                    $car_wash = 0;
                }

                if(isset($_POST["rent-form-flowers"])){
                    $flowers = 1;
                } else{
                    $flowers = 0;
                }

                if(isset($_POST["rent-form-business"])){
                    $business = 1;
                } else{
                    $business = 0;
                }

                $conn2 = mysqli_connect("localhost", "root", "", "frog_car_rental");
                $query2 = mysqli_query($conn2, '
                INSERT INTO rent_data VALUES(
                NULL,
                '.$user_id.',
                '.$car_id.',
                '.strtotime($_POST["rent-form-date-from"]).',
                '.strtotime($_POST["rent-form-date-to"]).',
                '.$car_wash.',
                '.$flowers.',
                '.$business.'
                );
                ');
                mysqli_close($conn2);
            }

            if(isset($_POST["rent-form-submit"])){
                $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");
                $query = mysqli_query($conn, '
                SELECT cars.id, rent_data.date_from, rent_data.date_until
                FROM users
                INNER JOIN rent_data ON users.id = rent_data.user_id
                INNER JOIN cars ON cars.id = rent_data.car_id
                WHERE cars.id = '.$car_id.' AND rent_data.date_until > UNIX_TIMESTAMP(CURRENT_TIMESTAMP)
                ORDER BY rent_data.date_from ASC;
                ');

                if(isset($_POST["rent-form-date-from"], $_POST["rent-form-date-to"]) && !empty($_POST["rent-form-date-from"]) && !empty($_POST["rent-form-date-to"])){
                    $date1 = strtotime($_POST["rent-form-date-from"]);
                    $date2 = strtotime($_POST["rent-form-date-to"]);
                    if(($date1 >= time()) && ($date2 >= time())){
                        if($date1 < $date2){
                            if((($date2 - $date1) / 60 / 60) >= 24){
                                if((($date2 - $date1) / 60 / 60) <= 8784){
                                    if(mysqli_num_rows($query) > 0){
                                        $i = 0;
                                        while($row = mysqli_fetch_array($query)){
                                            $date_from = $row["date_from"];
                                            $date_until = $row["date_until"];

                                            if(($date1 >= $date_from && $date1 <= $date_until) || ($date2 >= $date_from && $date2 <= $date_until) || ($date1 <= $date_from && $date2 >= $date_until)){
                                                break;
                                            } else{
                                                if($i == (mysqli_num_rows($query) - 1)){
                                                    insertIntoDatabase($user_id, $car_id);
                                                    echo("<script>location.href = 'success_rent.php';</script>");
                                                    exit();
                                                } else{
                                                    $i++;
                                                }
                                            }
                                        }
                                    } else{
                                        insertIntoDatabase($user_id, $car_id);
                                        echo("<script>location.href = 'success_rent.php';</script>");
                                        exit();
                                    }
                                }
                            }
                        }
                    }
                }
                mysqli_close($conn);
            }
        ?>
    </main>
    <footer>
        <p>Copyright &copy; 2023 frogcarrental.pl</p>
    </footer>
</body>
</html>
