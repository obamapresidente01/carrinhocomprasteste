<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['usuario_email'] = $_POST['email'];
    header('Location: pages/home.php');
}
?>

<form method="POST" action="login.php">
    <input type="email" name="email" placeholder="Digite seu e-mail" required>
    <button type="submit">Continuar</button>
</form>
