<?php

$webcam = new \App\WebcamApi();
$countries = $webcam->getCountries();

$countryGenerator = new \App\RandomCountry();
$randCountry = $countryGenerator->getRandomCountry();

$message = '';
if ($_POST['guess'] == $randCountry) {
    $message = "You're the best !";
} else {
    $message = "Nope ...";
}

var_dump($randCountry, $_POST);

include './template-parts/header.php';
include './template-parts/minigame-parts/minigame-content.php';
include './template-parts/footer.php';