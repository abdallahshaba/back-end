<?php

 include "../connect.php";
  
 $orderId = filterRequest("orderId");

 getAllData("orderdetailsview" , "card_orders = $orderId");

?>