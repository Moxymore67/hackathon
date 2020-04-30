<?php

session_start();

if (isset($_SESSION['countries']) && isset($_SESSION['categories'])) {
    session_unset();
}

$webcam = new \App\WebcamApi();
$countries = $webcam->getCountries();
$categories = $webcam->getCategories();
asort($countries);

$miniGame = new \App\MiniGame();
$data = [];
if (isset($_POST['category-choice'])) {
    $_SESSION['message'] = '';
    $_SESSION['player'] = '';

    $_SESSION['category'] = $_POST['category-choice'];
    $_SESSION['country'] = $miniGame->getRandomCountry();

    $miniGame->setData($_SESSION['category'], $_SESSION['country']);
    $data = $miniGame->getData();

    if (!empty($data['country'])) {
        $final = $miniGame->sexyData($data);
        if (!empty($final)) {
            $randWebcam = array_rand($final);
            $_SESSION['player'] = $final[$randWebcam]['player']['month']['embed'];
            $_SESSION['continent'] = $final[$randWebcam]['location']['continent'];
        }
    }
}
elseif (isset($_POST['guess']) && $_POST['guess'] == "none") {
    $_SESSION['message'] = '';
    $_SESSION['country'] = $miniGame->getRandomCountry();

    $miniGame->setData($_SESSION['category'], $_SESSION['country']);
    $data = $miniGame->getData();

    if (!empty($data['country'])) {
        $final = $miniGame->sexyData($data);
        if (!empty($final)) {
            $randWebcam = array_rand($final);
            $_SESSION['player'] = $final[$randWebcam]['player']['month']['embed'];
            $_SESSION['continent'] = $final[$randWebcam]['location']['continent'];
        }
    }
}
elseif (isset($_POST['guess'])) {
    $message = '';
    if ($_POST['guess'] == $_SESSION['country']){
        $message = "You're the best !";
    } else {
        $message = "Nope ...";
    }
    $_SESSION['message'] = $message;
}

include './template-parts/header.php';
if (isset($_POST['category-choice']) || isset($_POST['guess'])) {
    include './template-parts/minigame-parts/minigame-content.php';
} else {
    include './template-parts/minigame-parts/minigame-start.php';
}
include './template-parts/footer.php';
