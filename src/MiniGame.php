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
     *
     */
    public function setData()
    {
        $this->data['category'] = $_POST['category-choice'];
        $this->data['country'] = $this->getRandomCountry();
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