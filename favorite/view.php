<?php

include "../connect.php";

$userId = filterRequest("userId");

getAllData("myfavorite" ,"favorite_userid = $userId " )

?>