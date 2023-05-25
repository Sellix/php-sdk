<?php

namespace Sellix\PhpSdk;

trait Products {
  public function get_products() {
    $response = $this->request("/products");
    return self::handle_response($response, "products");
  }

  public function create_product($payload) {
    $response = $this->request("/products", "POST", $payload);
    return self::handle_response($response, "uniqid");
  }

  public function get_product($uniqid) {
    $response = $this->request("/products/$uniqid");
    return self::handle_response($response, "product");
  }

  public function update_product($uniqid, $payload) {
    $response = $this->request("/products/$uniqid", "PUT", $payload);
    return self::handle_response($response);
  }

  public function delete_product($uniqid) {
    $response = $this->request("/products/$uniqid", "DELETE");
    return self::handle_response($response);
  }

  public function licensing_check($payload) {
    $response = $this->request("/products/licensing/check", "POST", $payload);
    return self::handle_response($response);
  }

  public function licensing_update_hardware_id($payload) {
    $response = $this->request("/products/licensing/hardware_id", "PUT", $payload);
    return self::handle_response($response);
  }
}

?>
