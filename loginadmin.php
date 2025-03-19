<?php
// Сесія для збереження статусу входу
session_start();

// Логін і пароль адміністратора
$admin_username = 'admin';  // Заміни на свій логін
$admin_password = 'password123';  // Заміни на свій пароль

// Перевірка, чи були введені логін і пароль
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Перевірка введених даних
    if ($username === $admin_username && $password === $admin_password) {
        // Створення сесії для входу
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_dashboard.php'); // Перехід на сторінку адміністратора
        exit;
    } else {
        echo "<p>Невірний логін або пароль!</p>";
    }
}
?>
