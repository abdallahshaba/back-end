<?php

 include "../connect.php";


 $table = "addres";

 $userId  = filterRequest("userId");
 $city    = filterRequest("city");
 $street  = filterRequest("street");
 $name    = filterRequest("name");
  

 $data = array(
    "addres_usersid"  => $userId,
    "addres_name"     => $name,
    "addres_city"     => $city,
    "addres_street"   => $street,
 );

 insertData($table , $data);


?>