<?php

include "../connect.php";


 $orderAddress       = filterRequest("orderAddress");
 $orderPrice         = filterRequest("orderPrice");
 $orderdeliveryPrice = filterRequest("deliveryPrice");
 $orderUserId        = filterRequest("orderUserId");
 $orderType          = filterRequest("orderType");
 $orderPayment       = filterRequest("orderPayment");
 
 $orderCoupon        = filterRequest("orderCoupon");
 $couponDiscount     = filterRequest("couponDiscount");

 
  
 $totalPrice = $orderPrice + $orderdeliveryPrice;

// check Coupon
 $now = date("Y-m-d H:i:s");
  $checkCoupon = getData("coupon", "coupon_name = '$orderCoupon' AND coupon_expiredate > '$now' AND coupon_count > 0" , null , false);

  if ($checkCoupon > 0) {
     $totalPrice = $totalPrice - $orderPrice * $couponDiscount / 100;
     $sss = $con-> prepare("UPDATE `orderss` SET `orders_coupon` = 1");
     $sss -> execute();
     $stmt = $con -> prepare("UPDATE `coupon` SET `coupon_count` = coupon_count - 1");
     $stmt -> execute();
  };




  if ($orderType == "1") {
    $orderdeliveryPrice = 0;
   }





  $data = array(
    "orders_address"        => $orderAddress,
    "orders_deliveryPrice"  => $orderdeliveryPrice,
    "orders_price"          => $orderPrice,
    "orders_userid"         => $orderUserId,
    "orders_type"           => $orderType,
    "orders_coupon"         => $orderCoupon,
    "orders_payment"        => $orderPayment,
    "orders_totalprice"     => $totalPrice,

  ) ;
 $count = insertData("orderss" , $data , false);

 if ($count > 0) {
    $stmt = $con->prepare("SELECT MAX(orders_id) from orderss");
    $stmt->execute();
    $maxId = $stmt->fetchColumn();

    $data2 = array(
        "card_orders"=> $maxId

    ) ;
    updateData("cart" , $data2 , "cart_users_id  = $orderUserId AND card_orders = 0" );
 }


?>