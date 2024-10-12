<?php


include "../connect.php";
 
 $search = filterRequest("search");


 getAllData("items" , "items_name LIKE '%$search%' ");



?>