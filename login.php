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
                    header("Location: index.php");
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
        <form method="POST">
            <h2>Logowanie</h2>
            <?php
                if(isset($_POST["login"])){
                    if(!empty($_POST["email"]) && !empty($_POST["password"])){

                        $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");
                        $query = "SELECT * FROM users WHERE email = '".$_POST["email"]."'";
                        $res = mysqli_query($conn, $query);
                        mysqli_close($conn);

                        if(mysqli_num_rows($res) > 0){
                            $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");
                            $query = "SELECT password FROM users WHERE email = '".$_POST["email"]."'";
                            $res = mysqli_query($conn, $query);
                            $row = mysqli_fetch_array($res);

                            if(hash("sha512", $_POST["password"]) == $row["password"]){
                                $_SESSION["email"] = $_POST["email"];
                                if(isset($_GET["redirect"])){
                                    header("Location: rent.php?auto=".$_GET["redirect"]."");
                                    exit;
                                } else{
                                    header("Location: index.php");
                                    exit;
                                }
                            } else{
                                echo "<span class='error-span'>Niepoprawne hasło</span>";
                            }

                            mysqli_close($conn);
                        } else{
                            echo "<span class='error-span'>Brak konta o podanym adresie e-mail</span>";
                        }

                    } elseif(empty($_POST["email"]) && empty($_POST["password"])){
                        echo "<span class='error-span'>Uzupełnij wszystkie dane</span>";
                    } elseif(empty($_POST["email"])){
                        echo "<span class='error-span'>Uzupełnij adres e-mail</span>";
                    } elseif(empty($_POST["password"])){
                        echo "<span class='error-span'>Uzupełnij hasło</span>";
                    }
                }
                echo "<span class='error-span'>&nbsp;</span>";
                echo "<br/>";
            ?>
            <input type="email" id="email" name="email" class="form-first-element" placeholder="E-Mail"/>
            <br/>
            <input type="password" id="password" name="password" placeholder="Hasło"/>
            <br/>
            <input type="submit" id="login" name="login" value="Zaloguj się"/>
            <p>Nie masz konta?</p>
            <p><a id="register-link" href="register.php">Zarejestruj się</a></p>
        </form>
    </main>
    <footer>
        <p>Copyright &copy; 2023 frogcarrental.pl</p>
    </footer>
</body>
</html>
