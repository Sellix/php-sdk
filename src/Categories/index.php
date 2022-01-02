<?php

namespace Sellix\PhpSdk;

trait Categories {
  public function get_categories() {
    $response = $this->request("/categories");
    return self::handle_response($response, "categories");
  }

  public function create_category($payload) {
    $response = $this->request("/categories", "POST", $payload);
    return self::handle_response($response, "uniqid");
  }

  public function get_category($uniqid) {
    $response = $this->request("/categories/$uniqid");
    return self::handle_response($response, "category");
  }

  public function update_category($uniqid, $payload) {
    $response = $this->request("/categories/$uniqid", "PUT", $payload);
    return self::handle_response($response);
  }

  public function delete_category($uniqid) {
    $response = $this->request("/categories/$uniqid", "DELETE");
    return self::handle_response($response);
  }
}

?>