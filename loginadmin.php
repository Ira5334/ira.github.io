<?php
// Сесія для збереження статусу входу
session_start();

// Логін і пароль адміністратора (використовуємо email)
$admin_email = 'admin@example.com';  
$admin_password = 'password123';  

// Перевірка, чи були введені email та пароль
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Перевірка введених даних
    if ($email === $admin_email && $password === $admin_password) {
        // Створення сесії для входу
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_dashboard.php'); // Перехід на сторінку адміністратора
        exit;
    } else {
        echo "<p>Невірна пошта або пароль!</p>";
    }
}
?>
