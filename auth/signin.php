<?php

include "../connect.php"; 

$email = filterRequest("email");
$password = filterRequest("password");

$stmt = $con->prepare("SELECT * FROM users WHERE `email` = ?");
$stmt->execute(array($email));
$user = $stmt->fetch();

if ($user) {
    if (password_verify($password, $user['password'])) {

        printSuccess("Login successful");
    } else {
        printFailure("Invalid email or password");
    }
} else {
    printFailure("Invalid email or password");
}

?>
