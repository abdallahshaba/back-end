<?php

include "../connect.php"; 


$addresId = filterRequest('addresId');
  
deleteData("addres", "addres_id  = $addresId" , true);

?>