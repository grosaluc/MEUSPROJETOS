<?php
// Configurações do e-mail
$destinatario = 'gabrielarosaluc@gmail.com'; // Altere para o seu e-mail
$assunto = 'Fale com Amigumimo';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Limpa os dados para prevenir injeção de código
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

	// Verifica se os dados estão válidos
	if ($nome && $email && $mensagem) {
		// Cabeçalho do e-mail
		$cabecalho = "From: $nome <$email>\r\n";
		$cabecalho .= "Reply-To: $email\r\n";
		$cabecalho .= "Content-Type: text/plain; charset=UTF-8\r\n";

		// Corpo do e-mail
		$corpo = "Nome: $nome\n";
		$corpo .= "Email: $email\n";
		$corpo .= "Mensagem: $mensagem\n";

		// Envia o e-mail
		if (mail($destinatario, $assunto, $corpo, $cabecalho)) {
			echo 'Email enviado com sucesso!';
		} else {
			echo 'Erro ao enviar email.';
		}
	} 
    else {
		echo 'Dados inválidos.';
	}
} 
else {
	echo 'Método de requisição inválido.';
}
?>