<?php

trait Blacklists {
  public function get_blacklists() {
    $response = $this->request("/blacklists");
    return self::handle_response($response, "blacklists");
  }

  public function create_blacklist($payload) {
    $response = $this->request("/blacklists", "POST", $payload);
    return self::handle_response($response, "uniqid");
  }

  public function get_blacklist($uniqid) {
    $response = $this->request("/blacklists/$uniqid");
    return self::handle_response($response, "blacklist");
  }

  public function update_blacklist($uniqid, $payload) {
    $response = $this->request("/blacklists/$uniqid", "PUT", $payload);
    return self::handle_response($response);
  }

  public function delete_blacklist($uniqid) {
    $response = $this->request("/blacklists/$uniqid", "DELETE");
    return self::handle_response($response);
  }
}

?>