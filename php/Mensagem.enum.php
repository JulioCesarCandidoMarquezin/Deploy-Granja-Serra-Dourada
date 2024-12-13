<?php

enum Mensagem: string
{
    case LOGIN_SUCCESS = "Login realizado com sucesso!";
    case LOGIN_FAILURE = "Credenciais inválidas!";
    case LOGIN_MISSING = "Por favor, forneça o e-mail e a senha.";
    case REGISTER_SUCCESS = "Cadastro realizado com sucesso! Agora você pode fazer login.";
    case REGISTER_FAILURE = "Erro ao realizar o cadastro. Verifique se o e-mail já está em uso.";
    case REGISTER_MISSING = "Por favor, forneça todos os dados para o cadastro.";
    case LOGOUT_SUCCESS = "Você saiu com sucesso!";
    case UPLOAD_ERROR = "Erro ao fazer upload da imagem.";
    case IMAGE_FORMAT_ERROR = "Formato de imagem inválido. Use JPEG, PNG ou GIF.";
    case IMAGE_UPLOAD_ERROR = "Erro no upload da imagem: ";
    case PRODUCT_REGISTER_SUCCESS = "Produto cadastrado com sucesso!";
    case PRODUCT_REGISTER_FAILURE = "Erro ao cadastrar o produto: ";
    case ACTION_UNRECOGNIZED = "Ação não reconhecida.";
    case REQUEST_METHOD_NOT_ALLOWED = "Método de requisição não permitido.";
}
