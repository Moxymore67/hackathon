<?php


namespace App;

class MiniGame extends WebcamApi
{
    /**
     * @var array
     */
    private $data;

    /**
     * MiniGame constructor.
     */
    public function __construct()
    {
        parent::BASE_URL;
        parent::API_KEY;
    }

    /**
     * @return array
     */
    public function getData() : array
    {
        return $this->data;
    }

    /**
     * @param string $category
     * @param string $country
     */
    public function setData(string $category, string $country)
    {
        $this->data['category'] = $category;
        $this->data['country'] = $country;
    }

    /**
     * @return mixed
     */
    public function getRandomCountry()
    {
        $countries = $this->getCountries();

        return $rndCountry = array_rand($countries);
    }
}