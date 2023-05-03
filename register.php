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
    <script src="scripts/business.js" defer></script>
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
            <div id="header-icon-div"><a href="https://www.youtube.com/channel/UCVtZlKSOkcDwc2X5tu1_dtQ" target="_blank"><img src="images/icons/youtube.svg"/></a></div>
            <div id="header-icon-div"><a href="https://www.facebook.com/RobertNogalFrog/" target="_blank"><img src="images/icons/facebook.svg"/></a></div>
            <div id="header-icon-div"><a href="https://www.instagram.com/robertnogalfrog/" target="_blank"><img src="images/icons/instagram.svg"/></a></div>
        </div>
    </header>
    <main>
        <form method="POST">
            <h2>Rejestracja</h2>
            <?php

                function addToDB($is_business){
                    $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");
                    if($is_business == TRUE){
                        $query_text = '
                            INSERT INTO users VALUES(
                                NULL,
                                "'.$_POST["name"].'",
                                "'.$_POST["surname"].'",
                                "'.$_POST["email"].'",
                                "'.$_POST["password"].'",
                                1,
                                "'.$_POST["nip"].'",
                                "'.$_POST["regon"].'"
                            );
                        ';
                    } else{
                        $query_text = '
                            INSERT INTO users VALUES(
                                NULL,
                                "'.$_POST["name"].'",
                                "'.$_POST["surname"].'",
                                "'.$_POST["email"].'",
                                "'.$_POST["password"].'",
                                0,
                                NULL,
                                NULL
                            );
                        ';
                    }
                    $res = mysqli_query($conn, $query_text);
                    mysqli_close($conn);
                }

                function checkIfExists($dataInDB, $dataInForm){
                    $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");
                    $query = "SELECT * FROM users WHERE ".$dataInDB." = '".$dataInForm."'";
                    $res = mysqli_query($conn, $query);

                    if(mysqli_num_rows($res) > 0){
                        return TRUE;
                    } else{
                        return FALSE;
                    }
                    mysqli_close($conn);
                }

                if(isset($_POST["register"])){
                    $conn = mysqli_connect("localhost", "root", "", "frog_car_rental");
                    if(!empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password2"])){
                        if($_POST["password"] == $_POST["password2"]){
                            if(isset($_POST["business"])){
                                if(!empty($_POST["nip"]) && !empty($_POST["regon"])){
                                    if(checkIfExists("email", $_POST["email"])){
                                        echo "<span class='error-span'>Konto z tym e-mailem już istnieje</span>";
                                    } else{
                                        if(checkIfExists("nip", $_POST["nip"])){
                                            echo "<span class='error-span'>Konto z tym numerem NIP już istnieje</span>";
                                        } else{
                                            if(checkIfExists("regon", $_POST["regon"])){
                                                echo "<span class='error-span'>Konto z tym numerem REGON już istnieje</span>";
                                            } else{
                                                addToDB(TRUE);
                                                header("Location: success_account.php");
                                                exit;
                                            }
                                        }
                                    }
                                } else{
                                    echo "<span class='error-span'>Uzupełnij numery NIP i REGON</span>";
                                }
                            } else{
                                if(checkIfExists("email", $_POST["email"])){
                                    echo "<span class='error-span'>Konto z tym e-mailem już istnieje</span>";
                                } else{
                                    addToDB(FALSE);
                                    header("Location: success_account.php");
                                    exit;
                                }
                            }
                        } else{
                            echo "<span class='error-span'>Hasła się nie zgadzają</span>";
                        }
                    } else{
                        echo "<span class='error-span'>Uzupełnij wszystkie dane</span>";
                    }
                    mysqli_close($conn);
                }
                echo "<span class='error-span'>&nbsp;</span>";
                echo "<br/>";
            ?>
            <input type="text" id="name" name="name" class="form-first-element" placeholder="Imię"/>
            <br/>
            <input type="text" id="surname" name="surname" placeholder="Nazwisko"/>
            <br/>
            <input type="email" id="email" name="email" placeholder="E-Mail"/>
            <br/>
            <input type="password" id="password" name="password" placeholder="Hasło"/>
            <br/>
            <input type="password" id="password2" name="password2" placeholder="Powtórz hasło"/>
            <br/>
            <label for="business"><input type="checkbox" id="business" name="business" value="business"/><span id="business-span"> Mam firmę</span></label>
            <br/>

            <input type="text" id="nip" name="nip" placeholder="NIP" minlength="10" maxlength="10"/>
            <br/>
            <input type="text" id="regon" name="regon" placeholder="REGON" minlength="9" maxlength="9"/>
            <br/>

            <input type="submit" id="register" name="register" value="Zarejestruj się"/>
        </form>
    </main>
    <footer>
        <p>Copyright &copy; 2023 frogcarrental.pl</p>
    </footer>
</body>
</html>
