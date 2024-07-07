<?php 

include "../connect.php";

$userId = filterRequest('userId');

// $items = getAllData('items1view' , "categories_id=$id" , null);

$categoryId = filterRequest("id");


$stmt = $con->prepare("SELECT items1view.*, 1 AS favorite FROM items1view
INNER JOIN favorite ON favorite.favorite_itemsid = items1view.items_id AND favorite.favorite_userid=$userId
WHERE categories_id= $categoryId
UNION ALL 
SELECT * , 0 AS favorite FROM items1view
WHERE categories_id= $categoryId AND items_id NOT IN (SELECT items1view.items_id FROM items1view
INNER JOIN favorite ON favorite.favorite_itemsid = items1view.items_id AND favorite.favorite_userid=$userId)");


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