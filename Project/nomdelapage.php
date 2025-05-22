<?php 
include 'hobby.php';

$formSubmitted = false;
$errors = [];
$name = $surname = $email = $title = $optradio = $message = ""; // valores padrão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $title = htmlspecialchars(trim($_POST['title']));
    $optradio = htmlspecialchars(trim($_POST['optradio'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message']));

    // Nome
    if (empty($name)) {
        $errors['name'] = "O campo 'Nome' é obrigatório.";
    }

    // Sobrenome
    if (empty($surname)) {
        $errors['surname'] = "O campo 'Sobrenome' é obrigatório.";
    }

    // Email
    if (empty($email)) {
        $errors['email'] = "O campo 'Email' é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "O e-mail inserido não é válido.";
    }

    // Title
    if (empty($title)) {
        $errors['title'] = "Selecione um título.";
    }

    // Message
    if (strlen($message) < 5) {
        $errors['message'] = "A mensagem deve ter pelo menos 5 caracteres.";
    }

    // Só considera enviado se não houver erros
    if (empty($errors)) {
        $formSubmitted = true;
    }
}
?>
