<?php

include "../connect.php";


$allData = array();
//دي المصفوفة اللي هزن فيها كل البيانات بتاعة الهوم 

$categories = getAllData("categories" , null , null , false );

$allData['status'] = 'success';
$allData['categories'] = $categories ;

 echo json_encode($allData);
?>