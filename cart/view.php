<?php

include "../connect.php"; 

$userId = filterRequest('userId');

//$data = getAllData("viewcart" , "cart_users_id = $userId" , null , false);

$stmt = $con->prepare("SELECT SUM(itemsprice) AS totalPrice , COUNT(totalitems) AS allItems FROM `cart_view` 
WHERE cart_view.cart_users_id= $userId
GROUP BY cart_users_id");

 $stmt -> execute();

 $totalCountAndPrice = $stmt -> fetch(PDO::FETCH_ASSOC);
  

 $count= $stmt ->rowCount();

 if($count> 0){
   echo json_encode (array(
      "status" => "success",
      "totalCountAndPrice" => $totalCountAndPrice,
   )
  );
 }else{
   echo json_encode (array(
      "status" => "faliure",
      "totalCountAndPrice" => "0",
   )
  );
 }
 

?>