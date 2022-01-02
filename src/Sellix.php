<?php

namespace Sellix\PhpSdk;

define("BASE_DIR", dirname(__FILE__));

require_once BASE_DIR."/Blacklists/index.php";
require_once BASE_DIR."/Whitelists/index.php";
require_once BASE_DIR."/Categories/index.php";
require_once BASE_DIR."/Coupons/index.php";
require_once BASE_DIR."/Feedback/index.php";
require_once BASE_DIR."/Orders/index.php";
require_once BASE_DIR."/Products/index.php";
require_once BASE_DIR."/Queries/index.php";
require_once BASE_DIR."/Payments/index.php";
require_once BASE_DIR."/Exceptions/index.php";;
require_once BASE_DIR."/Tests/index.php";

class Sellix {
  protected string $api_key;

  use Blacklists;
  use Whitelists;
  use Categories;
  use Coupons;
  use Feedback;
  use Orders;
  use Products;
  use Queries;
  use Payments;

  static $API_ENDPOINT = 'https://dev.sellix.io/v1';

  public function __construct(string $api_key) {
    $this->api_key = $api_key;
  }

  private function handle_response($response, $key = NULL) {
    if ($response->status != 200) {
      throw new SellixException($response->error, $response->status);
    } else {
      if ($key === NULL) {
        return NULL;
      }

      if (is_array($key) && array_key_exists("oneOf", $key)) {
        $updated_response = new stdClass();
        foreach ($key["oneOf"] as $option) {
          $keys = NULL;
          if (strpos($option, ",") !== false) {
            foreach (explode(",", $option) as $key_option) {
              if (property_exists($response->data, $key_option)) {
                $updated_response->$key_option = $response->data->$key_option;
              }
            }
          } else if (property_exists($response->data, $option)) {
            return $response->data->$option;
          }
        }

        return $updated_response;
      }

      return $response->data->$key;
    }
  }

  private function request($component, $action = "GET", $payload = NULL) {
    $curl = curl_init();
    
    $curl_array = [
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => $action,
      CURLOPT_URL => self::$API_ENDPOINT.$component,
      CURLOPT_HTTPHEADER => [
        "Content-type: application/json",
        "Authorization: Bearer ".$this->api_key
      ]
    ];

    if ($payload) {
      $curl_array[CURLOPT_POSTFIELDS] = json_encode($payload);
    }

    curl_setopt_array($curl, $curl_array);

    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response);
  }
}