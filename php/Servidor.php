<?php

require_once 'Auth.class.php';
require_once 'Produto.class.php';
require_once 'Mensagem.enum.php';
require_once 'Tipo.enum.php';

function validateEmail($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function handleLogin() 
{
    if (Auth::estaLogado()) {
        header('Location: /index.php');
        Session::setMensagem(Mensagem::ALREADY_LOGGED_IN, Tipo::INFO);
        exit();
    }

    if (empty($_POST['email']) || empty($_POST['senha'])) {
        Session::setMensagem(Mensagem::LOGIN_MISSING, Tipo::WARNING);
        header('Location: /login.php');
        exit();
    }

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    Auth::login($email, $senha) 
        ? header('Location: /index.php') 
        : header('Location: /login.php');
    
    exit();
}

function handleRegister() 
{
    Auth::checkPermissao(Permissao::GERENCIAR_USUARIOS);

    if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['nivel'])) {
        Session::setMensagem(Mensagem::REGISTER_MISSING, Tipo::WARNING);
        header('Location: /cadastro.php');
        exit();
    }

    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nivel = Nivel::from($_POST['nivel']);

    if (!validateEmail($email)) {
        Session::setMensagem(Mensagem::REGISTER_EMAIL_INVALID, Tipo::WARNING);
        header('Location: /cadastro.php');
        exit();
    }

    Auth::register($nome, $email, $senha, $nivel);
    header('Location: /cadastro.php');
    exit();
}

function handleLogout() 
{
    if (!Auth::estaLogado()) {
        header('Location: /index.php');
        Session::setMensagem(Mensagem::NOT_LOGGED_IN, Tipo::INFO);
        exit();
    }

    Auth::logout();
    Session::setMensagem(Mensagem::LOGOUT_SUCCESS, Tipo::SUCCESS);
    header('Location: /index.php');
    exit();
}

function handleCadastroProduto() 
{
    Auth::checkPermissao(Permissao::GERENCIAR_PRODUTOS);

    if (empty($_POST['nome']) || empty($_POST['descricao']) || empty($_FILES['imagem'])) {
        Session::setMensagem(Mensagem::PRODUCT_REGISTER_EMPTY_FIELDS, Tipo::WARNING);
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
        Session::setMensagem(Mensagem::IMAGE_FORMAT_ERROR, Tipo::ERROR);
        header('Location: /cadastro-produto.php');
        exit();
    }

    $fileName = preg_replace('/[^a-zA-Z0-9_\-\.]/', '', basename($imagem['name']));
    $uploadPath = $uploadDir . $fileName;

    if (!move_uploaded_file($imagem['tmp_name'], $uploadPath)) {
        Session::setMensagem(Mensagem::IMAGE_UPLOAD_ERROR, Tipo::ERROR);
        header('Location: /cadastro-produto.php');
        exit();
    }

    $produto = new Produto();
    $produto->setNome($nome)->setDescricao($descricao)->setImagem($uploadPath);
    $cadastrado = $produto->create();

    $message = $cadastrado ? Mensagem::PRODUCT_REGISTER_SUCCESS : Mensagem::PRODUCT_REGISTER_FAILURE;
    $messageType = $cadastrado ? Tipo::SUCCESS : Tipo::ERROR;

    Session::setMensagem($message, $messageType);
    header('Location: /cadastro-produto.php');
    exit();
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
            Session::setMensagem(Mensagem::ACTION_UNRECOGNIZED, Tipo::WARNING);
            break;
    }
} else {
    Session::setMensagem(Mensagem::REQUEST_METHOD_NOT_ALLOWED, Tipo::WARNING);
}
