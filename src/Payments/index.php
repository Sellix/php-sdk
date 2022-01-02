<?php

trait Payments {
  public function create_payment($payload) {
    $response = $this->request("/payments", "POST", $payload);
    return self::handle_response($response, [ "oneOf" => [ "url,uniqid", "invoice" ] ]);
  }

  public function delete_payment($uniqid) {
    $response = $this->request("/payments/$uniqid", "DELETE");
    return self::handle_response($response);
  }
}

?>