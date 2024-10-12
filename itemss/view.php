<?php 

include "../connect.php";

$userId = filterRequest('userId');

// $items = getAllData('items1view' , "categories_id=$id" , null);

$categoryId = filterRequest("categoryId");

$stmt = $con->prepare("SELECT itemview3.*, 1 AS favorite 
FROM itemview3 
INNER JOIN favorite 
ON favorite.favorite_itemsid = itemview3.items_id 
AND favorite.favorite_userid = $userId
WHERE categories_id = $categoryId

UNION ALL 

SELECT itemview3.*, 0 AS favorite 
FROM itemview3 
WHERE categories_id = $categoryId
AND items_id NOT IN (
    SELECT itemview3.items_id 
    FROM itemview3 
    INNER JOIN favorite 
    ON favorite.favorite_itemsid = itemview3.items_id 
    AND favorite.favorite_userid = $userId
);");


$stmt -> execute();

$data = $stmt ->fetchAll(PDO::FETCH_ASSOC);

$count = $stmt ->rowCount();

if($count > 0){
    echo json_encode(array("status" => "success" , "data" => $data));
}
else {
    echo json_encode(array("status" => "faluire"));
}

?>