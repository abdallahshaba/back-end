<?php

include "../connect.php";

 $usersId = filterRequest("usersId");
 $itemsId = filterRequest("itemsId");
  
 $std = $con->prepare("SELECT COUNT(cart_id) AS countitems FROM cart WHERE cart_users_id=$usersId AND cart_items_id=$itemsId AND card_orders = 0");
 $std -> execute();
 
 $count = $std -> rowCount();

 $data = $std -> fetchColumn();

 if($count > 0){
    echo json_encode(array("status" => "success" , "data" => $data));
 }
 else{
    echo json_encode(array("status" => "success" , "data" => "0"));
 }


?>