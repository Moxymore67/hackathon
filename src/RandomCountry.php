<?php


namespace App;

use App\WebcamApi;

class RandomCountry extends WebcamApi
{
    public function __construct()
    {
        parent::BASE_URL;
        parent::API_KEY;
    }

    public function getRandomCountry()
    {
        $countries = $this->getCountries();

        return $rndCountry = array_rand($countries);
    }
}