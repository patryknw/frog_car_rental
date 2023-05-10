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
    <script src="scripts/gallery.js" defer></script>
    <script src="scripts/scroll.js" defer></script>
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
        <div id="welcome-video">
            <video autoplay muted loop>
                <source src="videos/frog.mp4" type="video/mp4"/>
            </video>
        </div>
        <div id="welcome">
            <h1><span>Frog</span> Car Rental</h1>
            <h2>Pobaw się. Zaimponuj dziewczynie. Wynajmij luksusowy samochód.</h2>
        </div>
        <div id="welcome-scroll">
            <p>></p>
        </div>
        <div id="license-plates-container">
            <img src="images/license_plates/license_plate1.png" class="license-plate" alt="S2 YBKI"/>
            <img src="images/license_plates/license_plate2.png" class="license-plate" alt="M3 BOGUS"/>
            <img src="images/license_plates/license_plate3.png" class="license-plate" alt="W8 XXX"/>
            <img src="images/license_plates/license_plate1.png" class="license-plate" alt="S2 YBKI"/>
            <img src="images/license_plates/license_plate2.png" class="license-plate" alt="M3 BOGUS"/>
            <img src="images/license_plates/license_plate3.png" class="license-plate" alt="W8 XXX"/>
        </div>
        <div id="quote">
            <img src="images/people/frog.jpg" alt="Robert Nogal"/>
            <h3>Naszymi samochodami możesz sobie po*******alać. Nie ma limitu mocy, ani kilometrów. Płacisz i jeździsz tyle, na ile wynająłeś auto. To jest nasza wizja.</h3>
            <h4>— Robert „Frog” Nogal, właściciel</h4>
        </div>
        <div id="gallery">
            <div id="gallery-container">
                <img src="images/gallery/1.jpg" id="gallery-photos" alt="Galeria"/>
                <div id="gallery-description">
                    <h3>Spełnij swoje marzenia</h3>
                    <p>Każdy z nas chciałby przejechać się najnowszym Lamborghini Aventador'em po obwodnicy S2 z prędkością trzystu dwudziestu kilometrów na godzinę, słuchając „Manieczki – Surrender” na głośnikach. Bez wyjątku.</p>
                    <p>Już dziś Twoje fantazje mogą się spełnić. U nas wynajmiesz swoje wymarzone, sportowe auto.</p>
                    <p>Ferrari, Porsche, McLaren'y – mamy je wszystkie. Niezależnie czy chcesz pościgać się z motorkami, poderwać dziewczynę, czy wejść do klubu bez kolejki – u nas znajdziesz coś dla siebie.</p>
                </div>
            </div>
        </div>
        <div id="have-fun">
            <div id="have-fun-container">
                <div id="have-fun-description">
                    <h3>Baw się!</h3>
                    <p>My nie patrzymy Ci na ręce. Wynajmujesz auto i możesz robić z nim co chcesz. Ufamy Ci. Jednak w przypadku uszkodzenia samochodu, pokrywasz koszty naprawy.</p>
                    <p>Nie ma limitu kilometrów. Jeździsz tak długo, aż skończy się benzyna. Wtedy tankujesz i jedziesz dalej. W każdej chwili możesz też przedłużyć długość wynajmu.</p>
                </div>
                <div id="have-fun-video">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/6YUBjJiF0tE?autoplay=1&mute=1" title="BMW M3 E92 (onboard) vs. Motorcycles street race in Warsaw, Poland" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div id="bestseller">
            <h2>Coś na start</h2>
            <h4>Nie wiesz co wybrać? Polecamy nasz bestseller – <b>BMW M3 E92</b> – legendarne auto „Bogusia z M3”, czyli Roberta „Froga” Nogala.</h4>
            <div id="bestseller-container">
                <div id="bestseller-description">
                    <p><b>BMW M3 E92 (2011)</b></p>
                    <table>
                        <tr>
                            <td><p>moc</p></td>
                            <td><p><b>420 KM</b></p></td>
                        </tr>
                        <tr>
                            <td><p>0-100</p></td>
                            <td><p><b>4,6 s</b></p></td>
                        </tr>
                        <tr>
                            <td><p>prędkość</p></td>
                            <td><p><b>290 km/h</b></p></td>
                        </tr>
                        <tr>
                            <td><p>silnik</p></td>
                            <td><p><b>4L V8</b></p></td>
                        </tr>
                    </table>
                    <button onclick="window.location.href = 'rent.php?auto=BMW_M3_E92';">Wynajmij</button>
                </div>
                <img src="images/other/m3.jpg" alt="BMW M3 E92"/>
            </div>
        </div>
        <div id="opinions">
            <h2>Opinie naszych klientów</h2>
            <div id="opinions-container">
                <div class="opinion-card">
                    <img src="images/people/zbysiu.jpg" alt="Zbigniew Stonoga"/>
                    <h4>Zbigniew Stonoga</h4>
                    <p>Zawsze kiedy jadę po zioło, korzystam z usług Frog Car Rental. Trzeba jednak uważać, bo Mercedes S klasy przy 250 jest trochę podsterowny.</p>
                </div>
                <div class="opinion-card">
                    <img src="images/people/szymool.jpg" alt="Szymon Besser"/>
                    <h4>Szymon Besser</h4>
                    <p>Sportowe samochody są najlepszym sposobem na wyrwanie dziewczyny, a Frog Car Rental ma najlepszą ofertę na rynku. Wystarczy tylko podjechać pod Sketch'a i każda laska Twoja.</p>
                </div>
                <div class="opinion-card">
                    <img src="images/people/kondzio.jpg" alt="Konrad Małaczek"/>
                    <h4>Konrad Małaczek</h4>
                    <p>Nie mam prawa jazdy, ale i tak wynajmuję auta we Frog Car Rental. Jeśli złapie mnie policja, nie ma mi czego zabrać.</p>
                </div>
            </div>
        </div>
        <div id="contact">
            <h2>Kontakt</h2>
            <div id="contact-container">
                <div id="contact-description">
                    <p>Frog Car Rental sp. z o.o.</p>
                    <p>Warszawa, ul. Złota 44 (00-120)</p>
                    <p><a href="tel:+48420691337">+48 420 691 337</a></p>
                    <p><a href="mailto:biuro@frogcarrental.pl">biuro@frogcarrental.pl</a></p>
                    <br/><br/>
                    <p>Godziny otwarcia:</p>
                    <p>pon – pt&emsp;<b>9:00 - 23:00</b></p>
                    <p>sob – niedz&emsp;<b>11:00 - 22:00</b></p>
                </div>
                <div id="contact-map">
                    <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Z%C5%82ota%2044,%20Warszawa+(Frog%20Car%20Rental)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed""></iframe>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>Copyright &copy; 2023 frogcarrental.pl</p>
    </footer>
</body>
</html>
