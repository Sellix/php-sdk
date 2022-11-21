<?php

namespace Sellix\PhpSdk;

trait Orders {
  public function get_orders() {
    $response = $this->request("/orders");
    return self::handle_response($response, "orders");
  }

  public function get_order($uniqid) {
    $response = $this->request("/orders/$uniqid");
    return self::handle_response($response, "order");
  }

  public function update_order($uniqid, $payload) {
    $response = $this->request("/orders/update/$uniqid", "PUT", $payload);
    return self::handle_response($response, "order");
  }

  public function issue_order_replacement($uniqid, $payload) {
    $response = $this->request("/orders/replacement/$uniqid", "POST", $payload);
    return self::handle_response($response, "order");
  }
}

?>