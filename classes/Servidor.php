<?php

require_once 'Auth.class.php';
require_once 'Produto.class.php';
require_once 'Mensagem.enum.php';

session_start();

function handleLogin() {
    if (isset($_POST['email'], $_POST['senha'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $senha = $_POST['senha'];

        if (Auth::login($email, $senha)) {
            $_SESSION['message'] = Mensagem::LOGIN_SUCCESS;
            header('Location: /index.php'); 
            exit();
        } else {
            $_SESSION['message'] = Mensagem::LOGIN_FAILURE;
            header('Location: /login.php'); 
            exit();
        }
    } else {
        $_SESSION['message'] = Mensagem::LOGIN_MISSING;
    }
}

function handleRegister() {
    if (isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['nivel'])) {
        $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $senha = $_POST['senha'];
        $nivel = Nivel::from($_POST['nivel']); 

        try {
            Auth::register($nome, $email, $senha, $nivel);
            $_SESSION['message'] = Mensagem::REGISTER_SUCCESS;
            header('Location: /cadastro.php'); 
            exit();
        } catch (Exception $e) {
            $_SESSION['message'] = Mensagem::REGISTER_FAILURE;
        }
    } else {
        $_SESSION['message'] = Mensagem::REGISTER_MISSING;
    }
}

function handleLogout() {
    Auth::logout();
    $_SESSION['message'] = Mensagem::LOGOUT_SUCCESS;
    header('Location: /index.php');
    exit();
}

function handleCadastroProduto() {
    if (isset($_POST['nome'], $_POST['descricao'], $_FILES['imagem'])) {
        $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
        $descricao = filter_var($_POST['descricao'], FILTER_SANITIZE_STRING);
        $imagem = $_FILES['imagem'];

        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/produtos/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $uploadPath = $uploadDir . basename($imagem['name']);
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (!in_array($imagem['type'], $allowedTypes)) {
            $_SESSION['message'] = Mensagem::IMAGE_FORMAT_ERROR;
            return;
        }

        if ($imagem['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['message'] = Mensagem::IMAGE_UPLOAD_ERROR . $imagem['error'];
            return;
        }

        $fileName = basename($imagem['name']);
        $fileName = preg_replace('/[^a-zA-Z0-9_\-\.]/', '', $fileName);
        $uploadPath = $uploadDir . $fileName;

        if (!move_uploaded_file($imagem['tmp_name'], $uploadPath)) {
            $_SESSION['message'] = Mensagem::UPLOAD_ERROR;
            return;
 }

        try {
            $produto = new Produto();
            $produto
                ->setNome($nome)
                ->setDescricao($descricao)
                ->setImagem($uploadPath);

            $produto->create();

            $_SESSION['message'] = Mensagem::PRODUCT_REGISTER_SUCCESS;
            header('Location: /cadastro-produto.php');
            exit();
        } catch (Exception $e) {
            $_SESSION['message'] = Mensagem::PRODUCT_REGISTER_FAILURE . $e->getMessage();
        }
    } else {
        $_SESSION['message'] = "Por favor, preencha todos os campos do formulário.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
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
            $_SESSION['message'] = Mensagem::ACTION_UNRECOGNIZED;
    }
} else {
    $_SESSION['message'] = Mensagem::REQUEST_METHOD_NOT_ALLOWED;
}