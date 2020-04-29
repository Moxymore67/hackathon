<?php

/**
 * Reminders for API keys
 *
 * Point Forecast : KzIAJvoO7fv0IQboxiNsAf5dgkZYuZ5C
 * Webcam : CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv
 * Map : BEJn4Y9vLjc0xRQwTh3g8dd3UEdzZXRW
 */

// Autoload
require '../vendor/autoload.php';

// Populate URL parameter
$baseUrl = 'https://api.windy.com/api/webcams/v2/list/orderby=popularity/property=hd/limit=30/?show=webcams:player,location/';
$key = '&key=CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv';

/**
 * Defines specific $mainParams parameters
 */

// Category
$category = (new Curl\Curl())->get('https://api.windy.com/api/webcams/v2/list?show=categories&key=CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv');
$category = json_decode($category->response, true);
$category = $category['result']['categories'];
foreach ($category as $key => $value) {
    $resultCategory[] = $value['id'];
}

// Country
$country = (new Curl\Curl())->get('https://api.windy.com/api/webcams/v2/list?show=countries&key=CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv');
$country = json_decode($country->response, true);
$country = $country['result']['countries'];
foreach ($country as $key => $value) {
    $resultCountry[$value['id']] = $value['name'];
}

// Composer Curl Settings
$curl = new Curl\Curl();
$curl->setOpt(CURLOPT_RETURNTRANSFER, TRUE);
$curl->setOpt(CURLOPT_SSL_VERIFYPEER, FALSE);
$curl->setOpt(CURLOPT_TIMEOUT, 10);

// We defines an object which will serve us several needed data
$api = $curl->get($url);

/**
 * Error managements
 */
$genericError = $api->error_message;
$curlError = $api->curl_error_message;
$httpError = $api->http_error_message;

/**
 * Needed data
 */
$response = $api->response;

$response = json_decode($response, true);
$status = $response['status'];
$result = $response['result'];
$webcams = $result['webcams'];


/**
 * Mandatory : needed to close curl request (server side)
 */
$curl->close();

require_once './src/layout/_head.php';
require_once './src/layout/_navbar.php';

require_once './src/layout/_footer.php';
