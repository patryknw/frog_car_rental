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
        <div id="account">
            <?php
                if(isset($_SESSION["email"])){
                    $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");
                    $query = "SELECT name, surname, email, is_business, nip, regon FROM users WHERE email = '".$_SESSION["email"]."'";
                    $res = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($res);

                    echo "<h2>".$row["name"]." ".$row["surname"]."</h2>";
                    echo "<h4>".$row["email"]."</h4>";
    
                    if($row["is_business" == 1]){
                        echo "<h4>".$row["nip"]."</h4>";
                        echo "<h4>".$row["regon"]."</h4>";
                    }

                    mysqli_close($conn);

                    echo '
                    <form method="POST" id="account-form">
                        <input type="submit" id="logout" name="logout" value="Wyloguj się"/>
                    </form>
                    ';

                    $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");
                    $query = mysqli_query($conn, '
                    SELECT cars.brand, cars.model, rent_data.date_from, rent_data.date_until
                    FROM users
                    INNER JOIN rent_data ON users.id = rent_data.user_id
                    INNER JOIN cars ON cars.id = rent_data.car_id
                    WHERE users.email = "'.$_SESSION["email"].'" AND rent_data.date_until >= UNIX_TIMESTAMP(CURRENT_TIMESTAMP)
                    ORDER BY rent_data.date_from ASC;
                    ');

                    if(mysqli_num_rows($query) > 0){
                        echo "<h3>Wynajęte auta</h3>";
                    }

                    if(mysqli_num_rows($query) > 0){
                        while($row = mysqli_fetch_array($query)){
                            $date_from = date("d.m.Y H:i", $row["date_from"]);
                            $date_until = date("d.m.Y H:i", $row["date_until"]);
                            $car_url = implode("_", explode(" ", $row["brand"]))."_".implode("_", explode(" ", $row["model"]));

                            echo "<div class='account-car-div'>";
                            echo "<p class='account-car'><a href='rent.php?auto=".$car_url."'>".$row["brand"]." ".$row["model"]."</a></p>";
                            echo "<p class='account-date'>".$date_from." - ".$date_until."</p>";
                            echo "</div>";
                        }
                    }

                    mysqli_close($conn);

                    $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");
                    $query = mysqli_query($conn, '
                    SELECT cars.brand, cars.model, rent_data.date_from, rent_data.date_until
                    FROM users
                    INNER JOIN rent_data ON users.id = rent_data.user_id
                    INNER JOIN cars ON cars.id = rent_data.car_id
                    WHERE users.email = "'.$_SESSION["email"].'" AND rent_data.date_until < UNIX_TIMESTAMP(CURRENT_TIMESTAMP)
                    ORDER BY rent_data.date_from ASC;
                    ');

                    if(mysqli_num_rows($query) > 0){
                        echo "<h3>Historia wynajmu</h3>";
                    }

                    if(mysqli_num_rows($query) > 0){
                        while($row = mysqli_fetch_array($query)){
                            $date_from = date("d.m.Y H:i", $row["date_from"]);
                            $date_until = date("d.m.Y H:i", $row["date_until"]);
                            $car_url = implode("_", explode(" ", $row["brand"]))."_".implode("_", explode(" ", $row["model"]));

                            echo "<div class='account-car-div'>";
                            echo "<p class='account-car-history'><a href='rent.php?auto=".$car_url."'>".$row["brand"]." ".$row["model"]."</a></p>";
                            echo "<p class='account-date-history'>".$date_from." - ".$date_until."</p>";
                            echo "</div>";
                        }
                    }

                    mysqli_close($conn);
                }

                if(isset($_POST["logout"])){
                    session_unset();
                    session_destroy();
                    header("Location: index.php");
                }
            ?>
        </div>
    </main>
    <footer>
        <p>Copyright &copy; 2023 frogcarrental.pl</p>
    </footer>
</body>
</html>
