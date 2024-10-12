<?php

include "../connect.php"; 

$userId = filterRequest('userId');

$std = $con->prepare("SELECT * FROM myfavorites WHERE favorite_userid = ?");
$std->execute(array($userId));
$count = $std->rowCount(); 

if ($count > 0) {
    $favorites = $std->fetchAll(PDO::FETCH_ASSOC);
    printSuccess($favorites);
} else {
    printFailure("No favorite items found");
}

?>