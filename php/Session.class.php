<?php

class Session
{
    public static function getCookie(string $name): string
    {
        return $_COOKIE[$name] ?? "";
    }

    public static function setCookie(string $name, string $value, int $duration = 3600): void
    {
        setcookie($name, $value, time() + $duration, "/", "", isset($_SERVER['HTTPS']), true);
    }

    public static function removeCookie(string $name): void
    {
        self::setCookie($name, "", time() - 3600); 
    }

    public static function setMensagem(Mensagem $mensagem, Tipo $tipo): void
    {
        self::setCookie("mensagem", $mensagem->value);
        self::setCookie("mensagem-tipo", $tipo->value);
    }

    public static function setUserCookies(array $user): void
    {
        self::setCookie("usuario_id", $user['id']);
        self::setCookie("usuario_nome", $user['nome']);
        self::setCookie("usuario_nivel", $user['nivel']);
    }
}