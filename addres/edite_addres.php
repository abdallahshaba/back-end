<?php

 include "../connect.php";


 $table = "addres";

 $addresId = filterRequest("addresId");
 $city     = filterRequest("city");
 $name     = filterRequest("name");
 $street   = filterRequest("street");

  

 $data = array(
    "addres_city"     => $city,
    "addres_name"     => $name,
    "addres_street"   => $street,
 );

 updateData($table , $data , "addres_id = $addresId");


?>