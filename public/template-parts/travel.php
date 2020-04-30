<?php

$data = new App\WebcamApi();
$data = $data->sexyData(array(
    'category' => 'beach',
    'country' => 'FR',
    'limit' => 1,
    'order_by' => 'popularity',
));

var_dump($data);

include './template-parts/header.php';
include './template-parts/index-parts/index-content.php';
include './template-parts/footer.php';