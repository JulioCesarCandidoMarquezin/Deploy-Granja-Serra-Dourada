<?php

require_once 'Nivel.enum.php';

enum Nivel: string
{
    case ADMINISTRADOR = 'administrador';
    case GERENTE = 'gerente';
    case FUNCIONARIO = 'funcionario';

    public function permissoes(): array
    {
        return match ($this) {
            self::ADMINISTRADOR => [
                Permissao::GERENCIAR_USUARIOS,
                Permissao::GERENCIAR_PRODUTOS,
                Permissao::VER_RELATORIOS,
                Permissao::ACESSO_TOTAL
            ],
            self::GERENTE => [
                Permissao::GERENCIAR_PRODUTOS,
                Permissao::VER_RELATORIOS
            ],
            self::FUNCIONARIO => [
                Permissao::GERENCIAR_PEDIDOS,
                Permissao::VER_PRODUTOS
            ],
        };
    }

    public static function all(): array
    {
        return array_map(fn($nivel) => "'$nivel'", self::cases());
    }

    public static function allString(): string
    {
        return implode(', ', self::all());
    }
}
