<?php

include "../connect.php";


$allData = array();
//دي المصفوفة اللي هزن فيها كل البيانات بتاعة الهوم 
$allData['status'] = 'success';

//categories
$categories = getAllData("categories" , null , null , false );
$allData['categories'] = $categories ;


//items
$items = getAllData("items1view" , "items_discount != 0" , null , false );
$allData['items'] = $items ;
 echo json_encode($allData);
?>