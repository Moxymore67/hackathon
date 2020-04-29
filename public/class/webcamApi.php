<?php


class webcamApi
{
    private $apiKey;

    public function __construct()
    {

        $this->apiKey = 'CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv';
        return 0;
    }

    public function getWebcam(string $country, string $show): ?array
    {

        $endPoint = $show . '&country=' . $country . '&key=' . $this->apiKey . '&limit=30';
        $baseUrl = 'https://api.windy.com/api/webcams/v2/list?';

        $data = $this->callAPI($baseUrl, $endPoint);

         $params = ['categories'=>$data['result']['categories'], 'countries'=>$data['result']['countries']];


        var_dump($params);

        return $data['result']['webcams'];
    }


    public
    function callAPI(string $baseUrl, string $endpoint): ?array
    {
        $curl = new \Curl\Curl();
        $curl->setOpt(CURLOPT_RETURNTRANSFER, 1);
        $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        $curl->setOpt(CURLOPT_TIMEOUT_MS, 1500);
        $curl->get($baseUrl . $endpoint);

        if ($curl->error)
        {
            echo "<p style='color:red;font-weight: bold'>request error : " . $curl->http_status_code . ' ' . $curl->error_message . "</p>";
        } else
        {
            echo "<p style='color:green;font-weight: bold;'>request successful : " . $curl->http_status_code . "</p>";
        }
        return json_decode($curl->response, 1);
    }
}