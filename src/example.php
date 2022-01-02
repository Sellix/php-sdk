<?php

require_once "index.php";

$sellix = new Sellix("<SELLIX_API_KEY>");
sellix_test_sdk($sellix, [
  "blacklists",
  "whitelists",
  "categories",
  "coupons",
  "feedback",
  "orders",
  "products",
  "queries",
  "payments"
]);