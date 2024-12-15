<?php

require_once 'Auth.class.php';
require_once 'Produto.class.php';
require_once 'Mensagem.enum.php';
require_once 'Tipo.enum.php';

function handleLogin() 
{
    if (!empty($_POST['email']) && !empty($_POST['senha'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $senha = $_POST['senha'];

        Auth::login($email, $senha) 
            ? header('Location: /index.php') 
            : header('Location: /login.php');
    } else {
        Session::setMensagem(Mensagem::LOGIN_MISSING, Tipo::WARNING);
    }
    exit();
}

function handleRegister() 
{
    if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['nivel'])) {
        $nome = htmlspecialchars(trim($_POST['nome']));
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $senha = $_POST['senha'];
        $nivel = Nivel::from($_POST['nivel']);

        if (!$email) {
            Session::setMensagem(Mensagem::REGISTER_EMAIL_INVALID, Tipo::WARNING);
        } else {
            Auth::register($nome, $email, $senha, $nivel);
        }

        header('Location: /cadastro.php');
    } else {
        Session::setMensagem(Mensagem::REGISTER_MISSING, Tipo::WARNING);
    }
    exit();
}

function handleLogout() 
{
    Auth::logout();
    Session::setMensagem(Mensagem::LOGOUT_SUCCESS, Tipo::SUCCESS);
    header('Location: /index.php');
    exit();
}

function handleCadastroProduto() 
{
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

    if ($cadastrado) {
        Session::setMensagem(Mensagem::PRODUCT_REGISTER_SUCCESS, Tipo::SUCCESS);
    } else {
        Session::setMensagem(Mensagem::PRODUCT_REGISTER_FAILURE, Tipo::ERROR);
    }

    header('Location: /cadastro-produto.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['action'])) 
{
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
    }
} else {
    Session::setMensagem(Mensagem::REQUEST_METHOD_NOT_ALLOWED, Tipo::WARNING);
}