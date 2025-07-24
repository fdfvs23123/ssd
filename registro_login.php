<?php
session_start();
require_once 'config.php';

if (isset($_POST['registrarse'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$rol = $_POST['role'];

$checkEmail = $conn->query("SELECT email FROM usuario WHERE email = '$email'");
if ($checkEmail->num_rows > 0) {
$_SESSION['register_error'] = 'El email ya está registrado!!!';
$_SESSION['active_form'] = 'registrarse';
header("Location: index.php");
exit(); 
} else {
$conn->query("INSERT INTO usuario (name, email, password, rol) VALUES ('$name','$email','$password','$rol')");
$_SESSION['active_form'] = 'login';
header("Location: index.php");
exit();
}
}

if (isset($_POST['login'])) {
$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM usuario WHERE email = '$email'");
if ($result->num_rows > 0) {
$user = $result->fetch_assoc();
if (password_verify($password, $user['password'])) {
$_SESSION['name'] = $user['name'];
$_SESSION['email'] = $user['email'];
if ($user['rol'] == 'admin') {
header("Location: admin_page.php");
} else {
header("Location: user_page.php");
}
exit();
}
}

$_SESSION['login_error'] = 'Incorrect email or password';
$_SESSION['active_form'] = 'login';
header("Location: index.php");
exit();
}
?>

