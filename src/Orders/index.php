<?php

trait Orders {
  public function get_orders() {
    $response = $this->request("/orders");
    return self::handle_response($response, "orders");
  }

  public function get_order($uniqid) {
    $response = $this->request("/orders/$uniqid");
    return self::handle_response($response, "order");
  }
}

?>