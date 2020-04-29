<?php

session_start();

$webcam = new \App\WebcamApi();
$countries = $webcam->getCountries();

// MINI GAME LOGIC
// On page first visit or reload
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // new RandomCountry object
    $countryGenerator = new \App\RandomCountry();
    // pick a random country
    $randCountry = $countryGenerator->getRandomCountry();
    // Storing it into SESSION
    $_SESSION['country'] = $randCountry;
    var_dump($randCountry);
// On guessing a country
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // checking not a blank guess
    if ($_POST['guess'] == 'none') {
        // If so, redirect
        header('location: minigame.php');
    // If valid guess
    } else {
        // Storing guess into SESSION
        $_SESSION['guess'] = $_POST['guess'];
        // Compare the results
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