<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    echo '<a href="register.php">Registrar</a>';
} else {
    echo '<a href="pages/home.php">Ver Livros</a>';
}
?>
