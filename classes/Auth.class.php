<?php

require_once 'Database.class.php';
require_once 'Usuario.class.php';
require_once 'Nivel.enum.php'; 

class Auth
{
    public static function login(string $email, string $senha): void
    {
        $sql = "SELECT * FROM Usuario WHERE email = ?";
        $stmt = Database::prepare($sql);
        $stmt->execute([$email]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData && password_verify($senha, $userData['senha'])) {
            session_start();
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['user_name'] = $userData['nome'];
            $_SESSION['user_level'] = $userData['nivel'];
        }
    }

    public static function register(string $nome, string $email, string $senha, Nivel $nivel): bool
    {
        $hashedPassword = password_hash($senha, PASSWORD_BCRYPT);
        $sql = "INSERT INTO Usuario (nome, email, senha, nivel) VALUES (?, ?, ?, ?)";
        $cadastrado = Usuario::execute($sql, [$nome, $email, $hashedPassword, $nivel->value]);

        return $cadastrado ? true : false;
    }

    public static function logout(): void
    {
        session_start();
        session_unset();
        session_destroy();
    }

    public static function checkLogin(): void
    {
        session_start();
        
        if (!isset($_SESSION['user_id'])) {
            header('Location: login.php');
            exit();
        }
    }

    public static function usuarioAtual(): ?Usuario
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            return null;
        }

        $usuario = new Usuario();

        $usuario
            ->setId($_SESSION['user_id'])
            ->setNome($_SESSION['user_name'])
            ->setNivel(Nivel::from($_SESSION['user_level']));

        return $usuario;
    }

    public static function temPermissao(string $permissao): bool
    {
        $usuario = self::usuarioAtual();

        if ($usuario === null) {
            return false; 
        }

        return in_array($permissao, $usuario->getNivel()->permissoes());
    }
}