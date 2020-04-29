<?php

/**
 * Reminders for API keys
 *
 * Point Forecast : KzIAJvoO7fv0IQboxiNsAf5dgkZYuZ5C
 * Webcam : CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv
 * Map : BEJn4Y9vLjc0xRQwTh3g8dd3UEdzZXRW
 */
require '../vendor/autoload.php';


$webcam = new \App\WebcamApi();
$countries = $webcam->getCountries();
$categories = $webcam->getCategories();

include './template-parts/home.php';