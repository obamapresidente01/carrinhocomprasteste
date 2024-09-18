<?php
session_start();
include('../includes/database.php');

if (!isset($_SESSION['usuario_email'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_email = $_SESSION['usuario_email'];
    $total = 0;

    // Registro da compra
    foreach ($_POST['quantidade'] as $livro_id => $quantidade) {
        if ($quantidade > 0) {
            $stmt = $pdo->prepare("SELECT preco FROM livros WHERE id = ?");
            $stmt->execute([$livro_id]);
            $livro = $stmt->fetch();

            $valor_total = $livro['preco'] * $quantidade;
            $total += $valor_total;

            $stmt = $pdo->prepare("INSERT INTO pedidos (usuario_email, livro_id, quantidade, valor_total) VALUES (?, ?, ?, ?)");
            $stmt->execute([$usuario_email, $livro_id, $quantidade, $valor_total]);
        }
    }

    // Redirecionar para a página de pagamento PIX
    header('Location: pix-payment.php?total=' . $total);
    exit();
}
?>
