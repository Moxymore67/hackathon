<?php

$webcam = new \App\WebcamApi();
$countries = $webcam->getCountries();
$categories = $webcam->getCategories();

include './template-parts/header.php';
include './template-parts/index-parts/index-content.php';
include './template-parts/footer.php';