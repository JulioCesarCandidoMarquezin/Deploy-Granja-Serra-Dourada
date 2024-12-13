<?php

require_once 'Database.class.php';
require_once 'Usuario.class.php';
require_once 'Nivel.enum.php';
require_once 'Permissao.enum.php';

class Auth
{
    public static function login(string $email, string $senha): bool
    {
        $sql = "SELECT * FROM Usuario WHERE email = ?";
        $stmt = Database::prepare($sql);
        $stmt->execute([$email]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData && password_verify($senha, $userData['senha'])) {
            self::setUserCookies($userData);
            return true;
        }

        return false;
    }

    public static function register(string $nome, string $email, string $senha, Nivel $nivel): bool
    {
        if (Usuario::emailExists($email)) {
            throw new Exception("Email já está em uso.");
        }

        $hashedPassword = password_hash($senha, PASSWORD_BCRYPT);
        $sql = "INSERT INTO Usuario (nome, email, senha, nivel) VALUES (?, ?, ?, ?)";
        $cadastrado = Usuario::execute($sql, [$nome, $email, $hashedPassword, $nivel->value]);

        return $cadastrado; 
    }

    public static function logout(): void
    {
        setcookie("user_id", "", time() - 3600, "/", true, true);
        setcookie("user_name", "", time() - 3600, "/", true, true);
        setcookie("user_level", "", time() - 3600, "/", true, true);
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
        if (!isset($_COOKIE['user_id'])) {
            return null;
        }

        return (new Usuario())
            ->setId((int)$_COOKIE['user_id'])
            ->setNome($_COOKIE['user_name'])
            ->setNivel(Nivel::from($_COOKIE['user_level']));
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

    private static function setUserCookies(array $userData): void
    {
        setcookie("user_id", $userData['id'], time() + 3600, "/", "", true, true);
        setcookie("user_name", $userData['nome'], time() + 3600, "/", "", true, true);
        setcookie("user_level", $userData['nivel'], time() + 3600, "/", "", true, true);
        header('Location: /index.php');
        exit();
    }
}