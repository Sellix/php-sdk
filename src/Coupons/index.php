<?php

trait Coupons {
  public function get_coupons() {
    $response = $this->request("/coupons");
    return self::handle_response($response, "coupons");
  }

  public function create_coupon($payload) {
    $response = $this->request("/coupons", "POST", $payload);
    return self::handle_response($response, "uniqid");
  }

  public function get_coupon($uniqid) {
    $response = $this->request("/coupons/$uniqid");
    return self::handle_response($response, "coupon");
  }

  public function update_coupon($uniqid, $payload) {
    $response = $this->request("/coupons/$uniqid", "PUT", $payload);
    return self::handle_response($response);
  }

  public function delete_coupon($uniqid) {
    $response = $this->request("/coupons/$uniqid", "DELETE");
    return self::handle_response($response);
  }
}

?>