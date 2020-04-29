<?php

namespace App;


class WebcamApi
{
    const BASE_URL = 'https://api.windy.com/api/webcams/v2/list';
    const API_KEY = 'CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv';
    private string $country;
    private string $category;
    private string $orderBy = 'popularity';
    private int $limit = 50;
    private string $showCam = '?show=webcams:player,location&key=';

    public function __construct(){  }

    public function getLimit()
    {
        return '/limit=' . $this->limit;
    }

    public function getOrderBy()
    {
        return "/orderby=" . $this->orderBy;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getCategory(): ?string
    {
        return "/category=" . $this->category;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getCountry(): ?string
    {
        return "/country=" . $this->country;
    }

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

    public function setUrl(): ?string
    {
        $endpoint = self::BASE_URL;
        $endpoint .= (!empty($this->getCountry())) ? $this->getCountry() : '';
        $endpoint .= (!empty($this->getCategory())) ? $this->getCategory() : '';
        $endpoint .= (!empty($this->getOrderBy())) ? $this->getOrderBy() : '';
        $endpoint .= (!empty($this->getLimit())) ? $this->getLimit() : '';
        $endpoint .= $this->showCam . self::API_KEY;
        return $endpoint;
    }


    public function callAPI( string $endpoint): ?array
    {
        $curl = new \Curl\Curl();
        $curl->setOpt(CURLOPT_RETURNTRANSFER, 1);
        $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        $curl->setOpt(CURLOPT_TIMEOUT, 10);
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