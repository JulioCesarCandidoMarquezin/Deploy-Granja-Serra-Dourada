<?php

require_once 'Database.class.php';
require_once 'Usuario.class.php';
require_once 'Nivel.enum.php';
require_once 'Permissao.enum.php';
require_once 'Mensagem.enum.php';

class Auth
{
    public static function login(string $email, string $senha): bool
    {
        $user = Usuario::getByEmail($email)[0];

        if ($user && password_verify($senha, $user['senha'])) {
            self::setUserCookies($user);
            return true;
        }

        return false;
    }

    public static function register(string $nome, string $email, string $senha, Nivel $nivel): bool
    {
        if (Usuario::getByEmail($email)) {
            throw new Exception("Email já está em uso.");
        }

        $cadastrado = (new Usuario())
            ->setNome($nome)
            ->setEmail($email)
            ->setSenha($senha)
            ->setNivel($nivel)
            ->create();
        
        return $cadastrado; 
    }

    public static function logout(): void
    {
        setcookie("usuario_id", "", time() - 3600, "/", "", true, true);
        setcookie("usuario_nome", "", time() - 3600, "/", "", true, true);
        setcookie("usuario_nivel", "", time() - 3600, "/", "", true, true);

        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset(); 
            session_destroy(); 
        }

        setMensagem(Mensagem::LOGOUT_SUCCESS->value);

        header('Location: /index.php');
        exit();
    }

    public static function checkLogin(): void
    {
        if (!self::estaLogado()) {
            header('Location: /login.php');
            exit();
        }
    }

    public static function usuarioAtual(): ?Usuario
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
        $usuario = self::usuarioAtual();

        if ($usuario === null) {
            return false; 
        }

        return in_array($permissao, $usuario->getNivel()->permissoes());
    }

    public static function estaLogado(): bool
    {
        return self::usuarioAtual() !== null;
    }

    private static function setUserCookies(array $user): void
    {
        setcookie("usuario_id", $user['id'], time() + 3600, "/", "", true, true);
        setcookie("usuario_nome", $user['nome'], time() + 3600, "/", "", true, true);
        setcookie("usuario_nivel", $user['nivel'], time() + 3600, "/", "", true, true);
        header('Location: /index.php');
        exit();
    }
}