<?php

enum Mensagem: string
{
    case LOGIN_SUCCESS = "Login realizado com sucesso!";
    case LOGIN_FAILURE = "Credenciais inválidas!";
    case LOGIN_MISSING = "Por favor, forneça o e-mail e a senha.";
    case NOT_LOGGED_IN = "Você não está logado.";
    case ALREADY_LOGGED_IN = "Você já está logado.";
    case REGISTER_SUCCESS = "Cadastro realizado com sucesso! Agora o usuário pode fazer login.";
    case REGISTER_FAILURE = "Erro ao realizar o cadastro. Verifique se o e-mail já está em uso.";
    case REGISTER_MISSING = "Por favor, forneça todos os dados para o cadastro.";
    case REGISTER_EMAIL_INVALID = "Email inválido. Por favor, forneça um email válido.";
    case REGISTER_EMAIL_ALREADY_EXISTS = "O email já está em uso.";
    case LOGOUT_SUCCESS = "Você saiu com sucesso!";
    case ALREADY_LOGGED_OUT = "Você já foi deslogado.";
    case IMAGE_FORMAT_ERROR = "Formato de imagem inválido. Use JPEG, PNG ou GIF.";
    case IMAGE_UPLOAD_ERROR = "Erro no upload da imagem: ";
    case PRODUCT_REGISTER_SUCCESS = "Produto cadastrado com sucesso!";
    case PRODUCT_REGISTER_FAILURE = "Erro ao cadastrar o produto: ";
    case PRODUCT_REGISTER_EMPTY_FIELDS = "Por favor, preencha todos os campos do formulário.";
    case ACTION_UNRECOGNIZED = "Ação não reconhecida.";
    case REQUEST_METHOD_NOT_ALLOWED = "Método de requisição não permitido.";
    case PERMISSSION_DENIED = "Você não tem permissão para acessar/modificar este conteúdo";
}
