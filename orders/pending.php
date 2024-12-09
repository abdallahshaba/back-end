<?php

 include "../connect.php";

 $userId = filterRequest("userId");


 getAllData("ordersview" , "orders_userid = $userId");


?>