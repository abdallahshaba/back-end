<?php

include "../connect.php"; 


$userId = filterRequest('userId');
$itemId = filterRequest('itemId');

$std = $con->prepare("SELECT * FROM favorite WHERE `favorite_userid` = ? AND `favorite_itemsid` = ?");
$std->execute(array($userId, $itemId));
$count = $std->rowCount();

if ($count > 0) {
    printFailure("Item already added");
} else {
    $insert = $con->prepare("INSERT INTO favorite (`favorite_userid`, `favorite_itemsid`) VALUES (?, ?)");
    $insert->execute(array($userId, $itemId));

    if ($insert) {
        printSuccess("Item added to favorite");
    } else {
        printFailure("Failed to add item");
    }
}

?>