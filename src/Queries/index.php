<?php

namespace Sellix\PhpSdk;

trait Queries {
  public function get_queries() {
    $response = $this->request("/queries");
    return self::handle_response($response, "queries");
  }

  public function get_query($uniqid) {
    $response = $this->request("/queries/$uniqid");
    return self::handle_response($response, "query");
  }

  public function reply_query($uniqid, $payload) {
    $response = $this->request("/queries/reply/$uniqid", "POST", $payload);
    return self::handle_response($response);
  }

  public function close_query($uniqid) {
    $response = $this->request("/queries/close/$uniqid", "POST", []);
    return self::handle_response($response);
  }

  public function reopen_query($uniqid) {
    $response = $this->request("/queries/reopen/$uniqid", "POST", []);
    return self::handle_response($response);
  }
}

?>