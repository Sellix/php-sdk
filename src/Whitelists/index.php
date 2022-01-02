<?php

namespace Sellix\PhpSdk;

trait Whitelists {
  public function get_whitelists() {
    $response = $this->request("/whitelists");
    return self::handle_response($response, "whitelists");
  }

  public function create_whitelist($payload) {
    $response = $this->request("/whitelists", "POST", $payload);
    return self::handle_response($response, "uniqid");
  }

  public function get_whitelist($uniqid) {
    $response = $this->request("/whitelists/$uniqid");
    return self::handle_response($response, "whitelist");
  }

  public function update_whitelist($uniqid, $payload) {
    $response = $this->request("/whitelists/$uniqid", "PUT", $payload);
    return self::handle_response($response);
  }

  public function delete_whitelist($uniqid) {
    $response = $this->request("/whitelists/$uniqid", "DELETE");
    return self::handle_response($response);
  }
}

?>