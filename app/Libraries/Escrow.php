<?php
namespace App\Libraries;
use GuzzleHttp\Client;

class Escrow {
    private $user_name = null;
    private $user_pass = null;
    private $api_key = null;
    private $sand_box_url = null;
    private $http_client = null;

    function __construct(){
        $this->user_name = 'naeemkhan667@yahoo.com';
        $this->user_pass = 'Escrow@123';
        $this->api_key = '3368_xQnzdozXATxkDSDsCA6U5xBmLOj6Yvi7tjnFg9NAqvJND42UBXMEln0kS8S4945h';
        $this->sand_box_url = 'https://api.escrow-sandbox.com/2017-09-01';
        $this->http_client = new Client();
    }


    public function create_transaction($params = []){

        $buyer = "me";
        $seller = "keanu.reaves@test.escrow.com";
        $amount = 100;

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode("naeemkhan667@yahoo.com:Escrow@123")
        ];

        $data = array(
            'currency' => 'usd',
            'items' => array(
                array(
                    'description' => 'johnwick.com',
                    'schedule' => array(
                        array(
                            'payer_customer' => $buyer,
                            'amount' => $amount,
                            'beneficiary_customer' => $seller,
                        ),
                    ),
                    'title' => 'johnwick.com',
                    'inspection_period' => '259200',
                    'type' => 'domain_name',
                    'quantity' => '1',
                    'extra_attributes' => array(
                        'image_url' => 'https://i.ebayimg.com/images/g/RicAAOSwzO5e3DZs/s-l1600.jpg',
                        'merchant_url' => 'https://www.ebay.com'
                    ),
                ),
            ),
            'description' => 'The sale of johnwick.com',
            'parties' => array(
                array(
                    'customer' => $buyer,
                    'role' => 'buyer',
                ),
                array(
                    'customer' => $seller,
                    'role' => 'seller',
                ),
            ),
        );

        $postResponse = $this->http_client->post($this->sand_box_url.'/transaction', [
            'headers' => $headers,
            'verify' => false,
            'json' => $data,
        ]);

        $response_code = $postResponse->getStatusCode();
        $result  = json_decode($postResponse->getBody(), true);
        return [$result['id'], $response_code];
    }

    public function agree_transaction(){

    }

    public function disburse_transaction(){

    }
}

?>
