<?php

require_once "src/Sellix.php";

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