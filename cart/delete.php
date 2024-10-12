<?php

include "../connect.php"; 


$userId = filterRequest('userId');
$itemId = filterRequest(requestname: 'itemId');
  
deleteData("cart", "cart_id = (SELECT cart_id FROM cart WHERE cart_users_id = $userId AND card_orders = 0 AND cart_items_id = $itemId LIMIT 1)" , true);

?>