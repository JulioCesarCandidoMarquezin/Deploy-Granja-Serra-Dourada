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
                Permissao::ACESSO_TOTAL
            ],
            self::GERENTE => [
                Permissao::GERENCIAR_USUARIOS,
                Permissao::GERENCIAR_PRODUTOS
            ],
            self::FUNCIONARIO => [
                Permissao::GERENCIAR_PRODUTOS
            ],
        };
    }
}
