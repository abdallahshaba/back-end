
<?php

include "../connect.php";


$email = filterRequest("email");
$password = filterRequest("password");



// $stmt = $con->prepare("SELECT * FROM users WHERE `email` = ? AND `password` = ? ");
// $stmt->execute(array($email, $password));
// $count = $stmt->rowCount();
// if ($count > 0) {
//     printSuccess(
//         "Email is Exist"
//     );
// } else {

//    printFailure(
//     "Email Is Not Found "
//    );

// }

getData("users" , "`email` = ? AND `password` = ?" , array($email , $password));

?>