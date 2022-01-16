<?php

namespace Sellix\PhpSdk;

trait Subscriptions {
  public function get_subscriptions() {
    $response = $this->request("/subscriptions");
    return self::handle_response($response, "subscriptions");
  }

  public function create_subscription($payload) {
    $response = $this->request("/subscriptions", "POST", $payload);
    return self::handle_response($response, [ "oneOf" => [ "url,uniqid", "subscription_id" ] ]);
  }

  public function get_subscription($id) {
    $response = $this->request("/subscriptions/$id");
    return self::handle_response($response, "subscription");
  }

  public function delete_subscription($id) {
    $response = $this->request("/subscriptions/$id", "DELETE");
    return self::handle_response($response);
  }
}
