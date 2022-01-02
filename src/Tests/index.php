<?php

namespace Sellix\PhpSdk;

function sellix_test_sdk($sellix, $components = []) {
  try {
    if (!count($components) || in_array("blacklists", $components)) {
      echo "Testing blacklists\n";
      $blacklist_payload = [
        "type" => "EMAIL",
        "data" => "sample@gmail.com",
        "note" => "demo"
      ];
      $blacklist_uniqid = $sellix->create_blacklist($blacklist_payload);
      echo "  Create blacklist passed ✓\n";
      $sellix->get_blacklist($blacklist_uniqid);
      echo "  Get blacklist passed ✓\n";
      $sellix->get_blacklists();
      echo "  Get blacklists passed ✓\n";
      $sellix->update_blacklist($blacklist_uniqid, $blacklist_payload);
      echo "  Update blacklist passed ✓\n";
      $sellix->delete_blacklist($blacklist_uniqid);
      echo "  Delete blacklist passed ✓\n";
    }

    if (!count($components) || in_array("whitelists", $components)) {
      echo "Testing whitelists\n";
      $whitelist_payload = [
        "type" => "EMAIL",
        "data" => "sample@gmail.com",
        "note" => "demo"
      ];
      $whitelist_uniqid = $sellix->create_whitelist($whitelist_payload);
      echo "  Create whitelist passed ✓\n";
      $sellix->get_whitelist($whitelist_uniqid);
      echo "  Get whitelist passed ✓\n";
      $sellix->get_whitelists();
      echo "  Get whitelists passed ✓\n";
      $sellix->update_whitelist($whitelist_uniqid, $whitelist_payload);
      echo "  Update whitelist passed ✓\n";
      $sellix->delete_whitelist($whitelist_uniqid);
      echo "  Delete whitelist passed ✓\n";
    }

    if (!count($components) || in_array("categories", $components)) {
      echo "Testing categories\n";
      $category_payload = [
        "title" => "Software",
        "unlisted" => false,
        "products_bound" => [],
        "sort_priority" => 0
      ];
      $category_uniqid = $sellix->create_category($category_payload);
      echo "  Create category passed ✓\n";
      $sellix->get_category($category_uniqid);
      echo "  Get category passed ✓\n";
      $sellix->get_categories();
      echo "  Get categories passed ✓\n";
      $sellix->update_category($category_uniqid, $category_payload);
      echo "  Update category passed ✓\n";
      $sellix->delete_category($category_uniqid);
      echo "  Delete category passed ✓\n";
    }

    if (!count($components) || in_array("coupons", $components)) {
      echo "Testing coupons\n";
      $coupon_payload = [
        "code" => "TESTING_COUPON",
        "discount_value" => 35,
        "max_uses" => 50,
        "products_bound" => [],
        "discount_type" => "PERCENTAGE",
        "disabled_with_volume_discounts" => true
      ];
      $coupon_uniqid = $sellix->create_coupon($coupon_payload);
      echo "  Create coupon passed ✓\n";
      $sellix->get_coupon($coupon_uniqid);
      echo "  Get coupon passed ✓\n";
      $sellix->get_coupons();
      echo "  Get coupons passed ✓\n";
      $sellix->update_coupon($coupon_uniqid, $coupon_payload);
      echo "  Update coupon passed ✓\n";
      $sellix->delete_coupon($coupon_uniqid);
      echo "  Delete coupon passed ✓\n";
    }

    if (!count($components) || in_array("feedback", $components)) {
      echo "Testing feedback\n";
      $feedback_list = $sellix->get_feedback();
      echo "  List feedback passed ✓\n";
      if ($feedback_list[0]) {
        $feedback_uniqid = $feedback_list[0]->uniqid;
        $sellix->get_feedback($feedback_uniqid);
        echo "  Get feedback passed ✓\n";
        $feedback_payload = [
          "reply" => "Testing reply"
        ];
        $sellix->reply_feedback($feedback_uniqid, $feedback_payload);
        echo "  Reply feedback passed ✓\n";
      }
    }

    if (!count($components) || in_array("orders", $components)) {
      echo "Testing orders\n";
      $orders = $sellix->get_orders();
      echo "  Get orders passed ✓\n";
      if ($orders[0]) {
        $sellix->get_order($orders[0]->uniqid);
        echo "  Get order passed ✓\n";
      }
    }

    if (!count($components) || in_array("products", $components)) {
      echo "Testing products\n";
      $product_payload = [
        "title" => "Software Activation Keys",
        "price" => 12.5,
        "description" => "Product description example.",
        "currency" => "EUR",
        "gateways" => ["PAYPAL","STRIPE","BITCOIN"],
        "type" => "SERIALS",
        "serials" => [
          "activation-key-#1"
        ]
      ];
      $product_uniqid = $sellix->create_product($product_payload);
      echo "  Create product passed ✓\n";
      $sellix->get_product($product_uniqid);
      echo "  Get product passed ✓\n";
      $sellix->get_products();
      echo "  Get products passed ✓\n";
      $sellix->update_product($product_uniqid, $product_payload);
      echo "  Update product passed ✓\n";
      $sellix->delete_product($product_uniqid);
      echo "  Delete product passed ✓\n";
    }

    if (!count($components) || in_array("queries", $components)) {
      echo "Testing queries\n";
      $queries = $sellix->get_queries();
      echo "  Get queries passed ✓\n";
      if ($queries[0]) {
        $sellix->get_query($queries[0]->uniqid);
        echo "  Get query passed ✓\n";
        $sellix->reply_query($queries[0]->uniqid, [
          "reply" => "this is a demo reply"
        ]);
        echo "  Reply query passed ✓\n";
        $sellix->close_query($queries[0]->uniqid);
        echo "  Close query passed ✓\n";
        $sellix->reopen_query($queries[0]->uniqid);
        echo "  Reopen query passed ✓\n";
      }
    }

    if (!count($components) || in_array("payments", $components)) {
      echo "Testing payments\n";
      $payment_payload = [
        "title" => "Sellix Payment",
        "value" => 1.5,
        "currency" => "EUR",
        "quantity" => 5,
        "email" => "no-reply@sellix.io",
        "white_label" => false,
        "return_url" => "https://sample.sellix.io/return"
      ];

      $payment_no_white_label = $sellix->create_payment($payment_payload);
      echo "  Create payment no white label passed ✓\n";
      $payment_payload["white_label"] = true;
      $payment_white_label = $sellix->create_payment($payment_payload);
      echo "  Create payment white label passed ✓\n";
      $sellix->delete_payment($payment_no_white_label->uniqid);
      echo "  Delete payment no white label passed ✓\n";
      $sellix->delete_payment($payment_white_label->uniqid);
      echo "  Delete payment white label passed ✓\n";
    }
  } catch (SellixException $e) {
    echo $e->__toString();
  }
}

?>