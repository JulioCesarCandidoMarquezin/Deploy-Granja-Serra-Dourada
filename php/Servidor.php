<?php

require_once 'Auth.class.php';
require_once 'Produto.class.php';
require_once 'Mensagem.enum.php';

function setMensagem(string $message) {
    setcookie("message", $message, time() + 3600, "/", true, true);
}

function handleLogin() {
    if (!empty($_POST['email']) && !empty($_POST['senha'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $senha = $_POST['senha'];

        if (Auth::login($email, $senha)) {
            setMensagem(Mensagem::LOGIN_SUCCESS->value);
            header('Location: /index.php');
        } else {
            setMensagem(Mensagem::LOGIN_FAILURE->value);
            header('Location: /login.php');
        }
    } else {
        setMensagem(Mensagem::LOGIN_MISSING->value);
    }
    exit();
}

function handleRegister() {
    if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['nivel'])) {
        $nome = htmlspecialchars(trim($_POST['nome']));
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $senha = $_POST['senha'];
        $nivel = Nivel::from($_POST['nivel']);

        Auth::register($nome, $email, $senha, $nivel);
        setMensagem(Mensagem::REGISTER_SUCCESS->value);
        header('Location: /cadastro.php');
    } else {
        setMensagem(Mensagem::REGISTER_MISSING->value);
    }
    exit();
}

function handleLogout() {
    Auth::logout();
    setMensagem(Mensagem::LOGOUT_SUCCESS->value);
    header('Location: /index.php');
    exit();
}

function handleCadastroProduto() {
    if (empty($_POST['nome']) || empty($_POST['descricao']) || empty($_FILES['imagem'])) {
        setMensagem("Por favor, preencha todos os campos do formulário.");
        saveFormData($_POST); 
        header('Location: /cadastro-produto.php');
        exit();
    }

    $nome = htmlspecialchars(trim($_POST['nome']));
    $descricao = htmlspecialchars(trim($_POST['descricao']));
    $imagem = $_FILES['imagem'];

    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/produtos/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($imagem['type'], $allowedTypes) || $imagem['error'] !== UPLOAD_ERR_OK) {
        setMensagem(Mensagem::IMAGE_FORMAT_ERROR->value);
        saveFormData($_POST);
        header('Location: /cadastro-produto.php');
        exit();
    }

    $fileName = preg_replace('/[^a-zA-Z0-9_\-\.]/', '', basename($imagem['name']));
    $uploadPath = $uploadDir . $fileName;

    if (!move_uploaded_file($imagem['tmp_name'], $uploadPath)) {
        setMensagem(Mensagem::UPLOAD_ERROR->value);
        saveFormData($_POST); 
        header('Location: /cadastro-produto.php');
        exit();
    }

    $produto = new Produto();
    $produto->setNome($nome)->setDescricao($descricao)->setImagem($uploadPath);
    $produto->create();

    setMensagem(Mensagem::PRODUCT_REGISTER_SUCCESS->value);
    header('Location: /cadastro-produto.php');
    exit();
}

function saveFormData(array $data) {
    $_SESSION['form_data'] = $data; // Salva os dados do formulário na sessão
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['action'])) {
    $action = $_POST['action'];
    
    switch ($action) {
        case 'login':
            handleLogin();
            break;

        case 'cadastro':
            handleRegister();
            break;

        case 'logout':
            handleLogout();
            break;

        case 'cadastro-produto':
            handleCadastroProduto();
            break;

        default:
            setMensagem(Mensagem::ACTION_UNRECOGNIZED->value);
    }
} else {
    setMensagem(Mensagem::REQUEST_METHOD_NOT_ALLOWED->value);
}