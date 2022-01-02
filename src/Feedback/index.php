<?php

trait Feedback {
  public function get_feedback($uniqid = NULL) {
    if ($uniqid) {
      $response = $this->request("/feedback/$uniqid");
    } else {
      $response = $this->request("/feedback");
    }
    return self::handle_response($response, "feedback");
  }

  public function reply_feedback($uniqid, $payload) {
    $response = $this->request("/feedback/reply/$uniqid", "POST", $payload);
    return self::handle_response($response);
  }
}

?>