<?php

require_once "src/Sellix.php";

// pass <MERCHANT_NAME> only if you need to be authenticated as an additional store

$sellix = new Sellix("<SELLIX_API_KEY>", "<MERCHANT_NAME>");

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