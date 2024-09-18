<?php
session_start();
include('../includes/database.php');

// Verifica se o valor total foi passado
if (!isset($_GET['total'])) {
    die('Erro ao processar pagamento.');
}

$total = $_GET['total'];

// Chame a API do PIX para gerar um código PIX
// Exemplo fictício para ilustrar:
$pix_url = 'https://api-pix.com/gerar-codigo'; // URL da API de PIX
$chave_pix = 'chave_pix_aqui'; // Chave PIX ou código gerado pelo seu provedor
$descricao = 'Pagamento de livros sobre mitologia';
$dados_pix = [
    'valor' => $total,
    'chave_pix' => $chave_pix,
    'descricao' => $descricao
];

// Simulação de um código de resposta PIX
// Aqui você deveria realmente chamar a API via cURL ou similar
$qr_code = "https://pix-url-simulacao.com/qrcode";

// Exibe o código QR gerado e o valor total
echo "<h1>Pagamento via PIX</h1>";
echo "<p>Valor total: R$$total</p>";
echo "<img src='$qr_code' alt='QR Code de pagamento via PIX'>";
echo "<p>Escaneie o QR Code acima com seu aplicativo bancário para efetuar o pagamento.</p>";

// Após o pagamento, redirecionar para uma página de confirmação
echo "<a href='confirmar-pagamento.php'>Confirmar Pagamento</a>";
?>
