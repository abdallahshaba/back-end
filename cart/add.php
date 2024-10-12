<?php

include "../connect.php"; 


$userId = filterRequest('userId');
$itemId = filterRequest('itemId');
  
$count = getData("cart" , "cart_users_id = $userId AND cart_items_id = $itemId AND card_orders = 0" , null , false);
 

$data = array("cart_users_id"=> $userId ,"cart_items_id"=> $itemId ,);


 insertData("cart", $data);

?>