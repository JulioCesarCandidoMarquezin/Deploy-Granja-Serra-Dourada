<?php

require_once 'Database.class.php';
require_once 'Usuario.class.php';
require_once 'Nivel.enum.php';
require_once 'Permissao.enum.php';
require_once 'Mensagem.enum.php';
require_once 'Tipo.enum.php';
require_once 'Session.class.php';

class Auth
{
    public static function login(string $email, string $senha): bool
    {
        $user = Usuario::getByEmail($email);

        if ($user && password_verify($senha, $user['senha'])) {
            Session::setMensagem(Mensagem::LOGIN_SUCCESS, Tipo::SUCCESS);
            Session::setUserCookies($user);

            return true;
        }

        Session::setMensagem(Mensagem::LOGIN_FAILURE, Tipo::ERROR);
        return false;
    }

    public static function register(string $nome, string $email, string $senha, Nivel $nivel): bool
    {
        if (Usuario::getByEmail($email)) {
            Session::setMensagem(Mensagem::REGISTER_EMAIL_ALREADY_EXISTS, Tipo::ERROR);
        }

        $cadastrado = (new Usuario())
            ->setNome($nome)
            ->setEmail($email)
            ->setSenha($senha)
            ->setNivel($nivel)
            ->create();

        if ($cadastrado) {
            Session::setMensagem(Mensagem::REGISTER_SUCCESS, Tipo::SUCCESS);
        } else {
            Session::setMensagem(Mensagem::REGISTER_FAILURE, Tipo::ERROR);
        }
        
        return $cadastrado; 
    }

    public static function logout(): void
    {
        Session::setCookie("usuario_id", "");
        Session::setCookie("usuario_nome", "");
        Session::setCookie("usuario_nivel", "");

        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset(); 
            session_destroy(); 
        }

        Session::setMensagem(Mensagem::LOGOUT_SUCCESS, Tipo::SUCCESS);

        header('Location: /index.php');
        exit();
    }

    public static function usuario(): ?Usuario
    {
        if (!isset($_COOKIE['usuario_id'])) {
            return null;
        }

        return (new Usuario())
            ->setId((int)$_COOKIE['usuario_id'])
            ->setNome($_COOKIE['usuario_nome'])
            ->setNivel(Nivel::from($_COOKIE['usuario_nivel']));
    }

    public static function temPermissao(Permissao $permissao): bool
    {
        $usuario = self::usuario();

        if ($usuario === null) {
            return false; 
        }

        return in_array($permissao, $usuario->getNivel()->permissoes());
    }

    public static function estaLogado(): bool
    {
        return self::usuario() !== null;
    }
}