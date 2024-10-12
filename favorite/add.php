<?php
 
 include "../connect.php";

$userId = filterRequest('userId');
$itemId = filterRequest('itemId');

$data = array(
    "favorite_userid" => $userId,
    "favorite_itemsid" => $itemId,
);

  insertData("favorite" , $data)
?>