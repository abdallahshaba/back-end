<?php 

// كلمة المرور المشفرة التي تم الحصول عليها من قاعدة البيانات
$passwordFromDatabase = '$2y$10$D1Ch5POKNvXO4Vdsc6sF2.0JYd0i9mlVqHzprwpkZdR0OghKK7yEu';

// كلمة المرور التي دخلها المستخدم في نموذج تسجيل الدخول
$passwordToVerify = 'password123'; // كلمة المرور المدخلة

// التحقق من كلمة المرور
if (password_verify($passwordToVerify, $passwordFromDatabase)) {
    echo "Password is valid!";
} else {
    echo "Invalid password.";
}
?>

?>