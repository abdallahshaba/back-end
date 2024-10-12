<?php

include "../connect.php"; 

$userId = filterRequest('userId');

getAllData("addres" , "addres_usersid = $userId");

?>