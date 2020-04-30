<?php

session_start();

$webcam = new \App\WebcamApi();
$countries = $webcam->getCountries();
$categories = $webcam->getCategories();
asort($countries);

$data = [];

if (isset($_POST['category-choice'])) {
    $miniGame = new \App\MiniGame();
    $category = $_POST['category-choice'];
    $randCountry = $miniGame->getRandomCountry();

    $data['category'] = $category;
    $data['country'] = $randCountry;

    $final = $miniGame->sexyData($data);

    var_dump($data, $final);
}

/*
// MINI GAME LOGIC
// On page first visit or reload
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // new MiniGame object
    $miniGame = new \App\MiniGame();

    // pick a random country
    $randCountry = $miniGame->getRandomCountry();

    $data['country'] = $randCountry;
    $final = $miniGame->sexyData($data);

    // Storing it into SESSION
    $_SESSION['country'] = $randCountry;
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
*/

include './template-parts/header.php';
if (isset($_POST['category-choice'])) {
    include './template-parts/minigame-parts/minigame-content.php';
} else {
    include './template-parts/minigame-parts/minigame-start.php';
}
include './template-parts/footer.php';
