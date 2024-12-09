<?php

include "../connect.php";

// استلام البيانات من الطلب
$username = filterRequest("username");
$password = filterRequest("password");
$email = filterRequest("email");
$phone = filterRequest("phone");


$stmt = $con->prepare("SELECT * FROM users WHERE email = ? OR phone = ? ");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("PHONE OR EMAIL Already EXIST");
} else {

   
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


    $data = array(
        "username" => $username,
        "password" => $hashedPassword,  
        "email" => $email,
        "phone" => $phone,
    );

    insertData("users", $data);
}

?>
