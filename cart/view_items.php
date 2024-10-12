<?php

include "../connect.php"; 

$userId = filterRequest('userId');

$std = $con->prepare("SELECT * FROM cart_view WHERE cart_users_id = ? AND card_orders = 0");
$std->execute(array($userId));
$count = $std->rowCount(); 

if ($count > 0) {
    $cart = $std->fetchAll(PDO::FETCH_ASSOC);
    printSuccess($cart);
} else {
    printFailure("No cart items found");
}

?>