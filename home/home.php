<?php

include "../connect.php";


$allData = array();
//دي المصفوفة اللي هزن فيها كل البيانات بتاعة الهوم 
$allData['status'] = 'success';

//categories
$categories = getAllData("categories" , null , null , false );
$allData['categories'] = $categories ;


// //items
// $items = getAllData("items1view" , "items_discount != 0" , null , false );
// $allData['items'] = $items ;



// //sallingItem
// $sallingItem = getAllData("items" , "sales_number > 5" , null , false);
// $allData['sallingItem'] = $sallingItem;



// $offers = getAllData("items" , "offers !=0 " , null , false);
// $allData['offers'] = $offers;


$itemsGeneral = getAllData("items" , "1=1 " , null , false);
$allData['itemsGeneral'] = $itemsGeneral;

 echo json_encode($allData);
 
?>