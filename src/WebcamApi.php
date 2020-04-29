<?php

namespace App;


class WebcamApi
{
    const BASE_URL = 'https://api.windy.com/api/webcams/v2/list';
    const API_KEY = 'CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv';
    private string $country;
    private string $category;
    private string $showCam = '?show=webcams:player,location&key=';


    /**
     * getCategories
     * @return array|null
     */
    public function getCategories(): ?array
    {
        $endpoint = '?show=categories&key=' . self::API_KEY;
        $data = $this->callAPI($endpoint);

        $array = [];
        foreach ($data['result']['categories'] as $key => $value)
        {
            $array[$value['id']] = $value['name'];
        }

        return $array;
    }


    /**
     * getCountries
     * @return array|null
     */
    public function getCountries(): ?array
    {
        $endPoint = '?show=countries&key=' . self::API_KEY;
        $data = $this->callAPI($endPoint);
        $array = [];

        foreach ($data['result']['countries'] as $key => $value)
        {
            $array[$value['id']] = $value['name'];
        }
        return $array;
    }

    /**
     * sexyData
     * @param array $array
     * @return mixed
     */
    public function sexyData(array $array)
    {
        $endpoint = '';
        foreach ($array as $paramKey => $paramValue) {
            switch ($paramKey) {
                case 'country':
                    $endpoint .= '/country=' . $paramValue;
                    break;
                case 'category':
                    $endpoint .= '/category=' . $paramValue;
                    break;
                case 'order_by':
                    $endpoint .= '/orderby=' . $paramValue;
                    break;
                case 'limit':
                    $endpoint .= '/limit=' . $paramValue;
                    break;
            }
        }

        // Default value
        if(strpos($endpoint, '/limit=') === false) {
            $endpoint .= '/limit=50';
        }

        // Default value
        if(strpos($endpoint, '/orderby=') === false) {
            $endpoint .= '/orderby=popularity';
        }

        if (!empty($endpoint)) {
            $final = $this->callAPI($endpoint . $this->showCam . self::API_KEY);
            return $final['result']['webcams'];
        }
    }

    /**
     * callAPI
     * @param string $endpoint
     * @return array
     */
    public function callAPI(string $endpoint): array
    {
        $curl = new \Curl\Curl();
        $curl->setOpt(CURLOPT_RETURNTRANSFER, 1);
        $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        $curl->setOpt(CURLOPT_TIMEOUT, 10);
        $curl->get(self::BASE_URL . $endpoint);

        if (!empty($curl->error))
        {
            echo "<p style='color:#ff0000;font-weight: bold'>request error : " . $curl->http_status_code . ' ' .
                $curl->error_message . " at ".$endpoint."</p>";
        }
        return json_decode($curl->response, 1);
    }
}