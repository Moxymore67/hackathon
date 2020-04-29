<?php

$webcam = new \App\WebcamApi();
$countries = $webcam->getCountries();
$categories = $webcam->getCategories();

$countryGenerator = new \App\RandomCountry();
$country = $countryGenerator->getRandomCountry();

var_dump($country, $countries);

include './template-parts/header.php';
include './template-parts/minigame-parts/minigame-content.php';
include './template-parts/footer.php';