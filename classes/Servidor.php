<?php

require_once 'Auth.class.php';
require_once 'Produto.class.php';

function handleLogin() {
    if (isset($_POST['email'], $_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (Auth::login($email, $senha)) {
            $_SESSION['message'] = "Login realizado com sucesso!";
            header('Location: /index.php'); 
        } else {
            $_SESSION['message'] = "Credenciais inválidas!";
            header('Location: /login.php'); 
        }
    } else {
        $_SESSION['message'] = "Por favor, forneça o e-mail e a senha.";
    }
}

function handleRegister() {
    if (isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['nivel'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $nivel = Nivel::from($_POST['nivel']); 

        if (Auth::register($nome, $email, $senha, $nivel)) {
            $_SESSION['message'] = "Cadastro realizado com sucesso! Agora você pode fazer login.";
            header('Location: /cadastro.php'); 
            exit();
        } else {
            $_SESSION['message'] = "Erro ao realizar o cadastro. Verifique se o e-mail já está em uso.";
        }
    } else {
        $_SESSION['message'] = "Por favor, forneça todos os dados para o cadastro.";
    }
}

function handleLogout() {
    Auth::logout();
    $_SESSION['message'] = "Você saiu com sucesso!";
    header('Location: /index.php');
    exit();
}

function handleCadastroProduto() {
    if (isset($_POST['nome'], $_POST['descricao'], $_FILES['imagem'])) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $imagem = $_FILES['imagem'];

        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/produtos/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $uploadPath = $uploadDir . basename($imagem['name']);
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (!in_array($imagem['type'], $allowedTypes)) {
            $_SESSION['message'] = "Formato de imagem inválido. Use JPEG, PNG ou GIF.";
            return;
        }

        if ($imagem['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['message'] = "Erro no upload da imagem: " . $imagem['error'];
            return;
        }

        if (!move_uploaded_file($imagem['tmp_name'], $uploadPath)) {
            $_SESSION['message'] = "Erro ao fazer upload da imagem.";
            return;
        }

        try {
            $produto = new Produto();
            $produto
                ->setNome($nome)
                ->setDescricao($descricao)
                ->setImagem($uploadPath);

            $produto->create();

            $_SESSION['message'] = "Produto cadastrado com sucesso!";
            header('Location: /cadastro-produto.php');
            exit();
        } catch (Exception $e) {
            $_SESSION['message'] = "Erro ao cadastrar o produto: " . $e->getMessage();
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
            $_SESSION['message'] = "Ação não reconhecida.";
    }
} else {
    $_SESSION['message'] = "Método de requisição não permitido.";
}