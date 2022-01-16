<?php

namespace Sellix\PhpSdk;

trait Customers {
  public function get_customers() {
    $response = $this->request("/customers");
    return self::handle_response($response, "customers");
  }

  public function create_customer($payload) {
    $response = $this->request("/customers", "POST", $payload);
    return self::handle_response($response, "customer_id");
  }

  public function get_customer($id) {
    $response = $this->request("/customers/$id");
    return self::handle_response($response, "customer");
  }

  public function update_customer($id, $payload) {
    $response = $this->request("/customers/$id", "PUT", $payload);
    return self::handle_response($response);
  }
}
