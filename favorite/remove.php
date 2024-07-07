<?php
 
 include "../connect.php";

$userId = filterRequest("userId");
$itemId = filterRequest("itemId");


deleteData("favorite" , "favorite_itemsid= $itemId AND favorite_userid=$userId" );



?>