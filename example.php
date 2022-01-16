<?php

require_once "src/Sellix.php";

// pass <MERCHANT_NAME> only if you need to be authenticated as an additional store

$sellix = new \Sellix\PhpSdk\Sellix("HuKWSxeQiT04tsrFAf9jHdjZCEiA3UI6sKEctGcQMM3aDIO1Vsmrk7XI8THftklt", "Daniele");

sellix_test_sdk($sellix, [
  // "blacklists",
  // "whitelists",
  // "categories",
  // "coupons",
  // "feedback",
  // "orders",
  // "products",
  // "queries",
  // "payments",
  "subscriptions",
  // "customers"
]);