<?php

namespace Sellix\PhpSdk;

trait Groups {
  public function get_groups() {
    $response = $this->request("/groups");
    return self::handle_response($response, "groups");
  }

  public function create_group($payload) {
    $response = $this->request("/groups", "POST", $payload);
    return self::handle_response($response, "uniqid");
  }

  public function get_group($uniqid) {
    $response = $this->request("/groups/$uniqid");
    return self::handle_response($response, "group");
  }

  public function update_group($uniqid, $payload) {
    $response = $this->request("/groups/$uniqid", "PUT", $payload);
    return self::handle_response($response);
  }

  public function delete_group($uniqid) {
    $response = $this->request("/groups/$uniqid", "DELETE");
    return self::handle_response($response);
  }
}

?>