<?php

require_once 'Auth.class.php';
require_once 'Produto.class.php';
require_once 'Mensagem.enum.php';

function handleLogin() {
    if (isset($_POST['email'], $_POST['senha'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $senha = $_POST['senha'];

        if (Auth::login($email, $senha)) {
            setcookie("message", Mensagem::LOGIN_SUCCESS->value, time() + 3600, "/", true, true);
            header('Location: /index.php'); 
            exit();
        } else {
            setcookie("message", Mensagem::LOGIN_FAILURE->value, time() + 3600, "/", true, true);
            header('Location: /login.php'); 
            exit();
        }
    } else {
        setcookie("message", Mensagem::LOGIN_MISSING->value, time() + 3600, "/", true, true);
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
            setcookie("message", Mensagem::REGISTER_SUCCESS->value, time() + 3600, "/", true, true);
            header('Location: /cadastro.php'); 
            exit();
        } catch (Exception $e) {
            setcookie("message", Mensagem::REGISTER_FAILURE->value, time() + 3600, "/", true, true);
        }
    } else {
        setcookie("message", Mensagem::REGISTER_MISSING->value, time() + 3600, "/", true, true);
    }
}

function handleLogout() {
    Auth::logout();
    setcookie("message", Mensagem::LOGOUT_SUCCESS->value, time() + 3600, "/", true, true);
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
            setcookie("message", Mensagem::IMAGE_FORMAT_ERROR->value, time() + 3600, "/", true, true);
            return;
        }

        if ($imagem['error'] !== UPLOAD_ERR_OK) {
            setcookie("message", Mensagem::IMAGE_UPLOAD_ERROR . $imagem['error'], time() + 3600, "/", true, true);
            return;
        }

        $fileName = basename($imagem['name']);
        $fileName = preg_replace('/[^a-zA-Z0-9_\-\.]/', '', $fileName);
        $uploadPath = $uploadDir . $fileName;

        if (!move_uploaded_file($imagem['tmp_name'], $uploadPath)) {
            setcookie("message", Mensagem::UPLOAD_ERROR->value, time() + 3600, "/", true, true);
            return;
        }

        try {
            $produto = new Produto();
            $produto
                ->setNome($nome)
                ->setDescricao($descricao)
                ->setImagem($uploadPath);

            $produto->create();

            setcookie("message", Mensagem::PRODUCT_REGISTER_SUCCESS->value, time() + 3600, "/", true, true);
            header('Location: /cadastro-produto.php');
            exit();
        } catch (Exception $e) {
            setcookie("message", Mensagem::PRODUCT_REGISTER_FAILURE . $e->getMessage(), time() + 3600, "/", true, true);
        }
    } else {
        setcookie("message", "Por favor, preencha todos os campos do formulário.", time() + 3600, "/", true, true);
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
            setcookie("message", Mensagem::ACTION_UNRECOGNIZED->value, time() + 3600, "/", true, true);
    }
} else {
    setcookie("message", Mensagem::REQUEST_METHOD_NOT_ALLOWED->value, time() + 3600, "/", true, true);
}