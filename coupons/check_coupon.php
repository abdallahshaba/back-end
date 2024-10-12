<?php
 
include "../connect.php";

$couponneme = filterRequest("couponneme");


$now = date("Y-m-d H:i:s");

getData("coupon", "coupon_name = '$couponneme' AND coupon_expiredate > '$now' AND coupon_count > 0");

?>
