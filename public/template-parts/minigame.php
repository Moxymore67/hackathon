<?php

session_start();

$webcam = new \App\WebcamApi();
$countries = $webcam->getCountries();


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $countryGenerator = new \App\RandomCountry();
    $randCountry = $countryGenerator->getRandomCountry();
    $_SESSION['country'] = $randCountry;
    var_dump($randCountry);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['guess'] == 'none') {
        header('location: minigame.php');
    } else {
        $_SESSION['guess'] = $_POST['guess'];
        $message = '';
        if ($_SESSION['country'] == $_SESSION['guess']) {
            $message = "You're the best !";
        } else {
            $message = 'Nope ...';
        }
        var_dump($message);
    }
}
include './template-parts/header.php';
include './template-parts/minigame-parts/minigame-content.php';
include './template-parts/footer.php';