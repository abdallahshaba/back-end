<?php

 include "../connect.php";

 $userId = filterRequest("userId");


 getAllData("orderss" , "orders_userid = $userId");


?>