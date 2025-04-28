<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mensagem = htmlspecialchars(trim($_POST['mensagem']));

    $para = "dossantosjoaovitor340@gmail.com"; // Troque para o seu e-mail
    $assunto = "Novo Contato do Site";

    $corpo = "Nome: $nome\n";
    $corpo .= "E-mail: $email\n";
    $corpo .= "Mensagem:\n$mensagem";

    $cabecalhos = "From: $email" . "\r\n" .
                  "Reply-To: $email" . "\r\n" .
                  "X-Mailer: PHP/" . phpversion();

    if (mail($para, $assunto, $corpo, $cabecalhos)) {
        echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Erro ao enviar mensagem. Tente novamente.'); window.location.href='index.html';</script>";
    }
} else {
    header("Location: index.html");
    exit();
}
?>
