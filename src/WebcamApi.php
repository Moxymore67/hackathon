<?php

namespace App;

class WebcamApi
{
    const BASE_URL = 'https://api.windy.com/api/webcams/v2/list?';
    const API_KEY = 'CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv';

    private array $categories = [];

    public function __construct(){  }

    public function getCategories(): ?array
    {
        $endpoint = 'show=categories&key=' . self::API_KEY;
        $data = $this->callAPI($endpoint);

        $array = [];
        foreach ($data['result']['categories'] as $key => $value)
        {
            $array[$value['id']] = $value['name'];
        }

        return $array;
    }


    public function getCountries(): ?array
    {
        $endPoint = 'show=countries&key=' . self::API_KEY;
        $data = $this->callAPI($endPoint);
        $array = [];

        foreach ($data['result']['countries'] as $key => $value)
        {
            $array[$value['id']] = $value['name'];
        }
        return $array;
    }

//    public function getWebcam(string $country, string $show): ?array
//    {
//        $endPoint = 'show=categories&key=' . self::API_KEY;
//
//        $data = $this->callAPI($endPoint);
//
//        $params = ['categories' => $data['result']['categories'], 'countries' => $data['result']['countries']];
//
//
//        var_dump($params);
//
//        return $data['result']['webcams'];
//    }


    public
    function callAPI( string $endpoint): ?array
    {
        $curl = new \Curl\Curl();
        $curl->setOpt(CURLOPT_RETURNTRANSFER, 1);
        $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        $curl->setOpt(CURLOPT_TIMEOUT_MS, 1500);
        $curl->get(self::BASE_URL . $endpoint);

        if ($curl->error)
        {
            echo "<p style='color:red;font-weight: bold'>request error : " . $curl->http_status_code . ' ' . $curl->error_message . " at ".$endpoint."</p>";
        } else
        {
            echo "<p style='color:green;font-weight: bold;'>request successful : " . $curl->http_status_code . " at ".$endpoint."</p>";
        }
        return json_decode($curl->response, 1);
    }
}