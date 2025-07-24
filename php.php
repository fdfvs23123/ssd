<?php
session_start();

$errors = [
'login' => $_SESSION['login_error'] ?? '',
'registrarse' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error) {
return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
return $formName === $activeForm ? 'active' : '';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Formulario y login</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body class="body2">
<div class="container">

<div class="caja-formulario <?= isActiveForm('login', $activeForm); ?>" id="formulario-login">
<form action="registro_login.php" method="post">
<h2>Login</h2>
<?= showError($errors['login']); ?>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Contraseña" required>
<button type="submit" name="login">Login</button>
<p>No tienes cuenta? <a href="#" onclick="showForm('formulario-registro')">Registrarse</a></p>
</form>
</div>


<div class="caja-formulario <?= isActiveForm('registrarse', $activeForm); ?>" id="formulario-registro">
<form action="registro_login.php" method="post">
<h2>Registrarse</h2>
<?= showError($errors['registrarse']); ?>
<input type="text" name="name" placeholder="Nombre" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Contraseña" required>
<select name="role" required>
<option value="">--seleccione rol--</option>
<option value="usuario">usuario</option>
<option value="admin">administrador</option>
</select>
<button type="submit" name="registrarse">Registrarse</button>
<p>Ya tienes una cuenta? <a href="#" onclick="showForm('formulario-login')">Login</a></p>
</form>
</div>

</div>

<script src="javascript/script.js"></script>
</body>
</html>
