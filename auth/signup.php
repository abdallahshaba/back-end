
<?php

include "../connect.php";


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

    $data = array(
        "username" => $username,
        "password" =>  $password,
        "email" => $email,
        "phone" => $phone,
    );
    insertData("users" , $data) ; 

}

?>