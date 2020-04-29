<?php

/**
 * Reminders for API keys
 *
 * Point Forecast : KzIAJvoO7fv0IQboxiNsAf5dgkZYuZ5C
 * Webcam : CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv
 * Map : BEJn4Y9vLjc0xRQwTh3g8dd3UEdzZXRW
 */
require '../vendor/autoload.php';
require 'class/webcamApi.php';
// Autoload
//phpinfo();

$webcam = new webcamApi();
//show=webcams:image,location,map,player;categories&lang=fr&property=hd
$result = $webcam->getWebcam('FR', 'show=webcams:image,location,player;categories;countries&lang=fr&property=hd/');

//var_dump($result);
foreach ($result as $key => $value)
{
    $id = $value['id'];
    $status = $value['status'];
    $title = $value['title'];
    $embedLink = $value['player']['month']['embed'];
//    var_dump($embedLink);
    echo "<p> id : $id | status : $status</p>";
    echo "<h4>$title</h4>";
    echo "<iframe src='$embedLink' style='border:2px #000000 solid;' name='myiFrame' scrolling='no' frameborder='1' marginheight='10px' marginwidth='10px' height='400px' width='600px' allowfullscreen></iframe>";
}

?>



