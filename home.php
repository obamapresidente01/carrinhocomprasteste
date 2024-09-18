<?php
session_start();
include('../includes/database.php');

if (!isset($_SESSION['usuario_email'])) {
    header('Location: ../login.php');
    exit();
}

$stmt = $pdo->query("SELECT * FROM livros");
$livros = $stmt->fetchAll();
?>

<h1>Livros sobre Mitologia</h1>
<form method="POST" action="checkout.php">
    <?php foreach ($livros as $livro): ?>
        <div>
            <h3><?php echo $livro['titulo']; ?></h3>
            <p><?php echo $livro['autor']; ?></p>
            <p>Preço: R$<?php echo $livro['preco']; ?></p>
            <input type="number" name="quantidade[<?php echo $livro['id']; ?>]" placeholder="Quantidade" min="1">
        </div>
    <?php endforeach; ?>
    <button type="submit">Finalizar Compra</button>
</form>
