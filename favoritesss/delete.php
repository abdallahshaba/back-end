<?php

include "../connect.php"; 


$userId = filterRequest('userId');
$itemId = filterRequest('itemId');

$std = $con->prepare("SELECT * FROM favorite WHERE `favorite_userid` = ? AND `favorite_itemsid` = ?");
$std->execute(array($userId, $itemId));
$count = $std->rowCount();

if ($count > 0) {

    $delete = $con->prepare("DELETE FROM favorite WHERE `favorite_userid` = ? AND `favorite_itemsid` = ?");
    $delete->execute(array($userId, $itemId));

    if ($delete) {
        printSuccess("Item removed from favorite");
    } else {
        printFailure("Failed to remove item");
    }
} else {
   printFailure("Item not found in favorites");
}

?>