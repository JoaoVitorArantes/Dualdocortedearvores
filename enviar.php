<?php
// Checa se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = strip_tags(trim($_POST["nome"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensagem = strip_tags(trim($_POST["mensagem"]));

    // Aqui você configura para onde vai o e-mail
    $destinatario = "dossantosjoaovitor340@gmail.com";
    $assunto = "Nova mensagem do site Top Corte de Árvores";

    // Conteúdo do e-mail
    $corpo = "Nome: $nome\n";
    $corpo .= "E-mail: $email\n";
    $corpo .= "Mensagem:\n$mensagem\n";

    // Cabeçalhos do e-mail
    $headers = "From: $nome <$email>";

    // Envia o e-mail
    if (mail($destinatario, $assunto, $corpo, $headers)) {
        echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Erro ao enviar a mensagem. Tente novamente.'); window.history.back();</script>";
    }
} else {
    // Se não for POST, redireciona de volta
    header("Location: index.html");
    exit;
}
?>
