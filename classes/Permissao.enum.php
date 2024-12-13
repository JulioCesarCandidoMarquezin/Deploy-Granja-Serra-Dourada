<?php

enum Permissao: string
{
    case GERENCIAR_USUARIOS = 'gerenciar_usuarios';
    case GERENCIAR_PRODUTOS = 'gerenciar_produtos';
    case VER_RELATORIOS = 'ver_relatorios';
    case ACESSO_TOTAL = 'acesso_total';
    case GERENCIAR_PEDIDOS = 'gerenciar_pedidos';
    case VER_PRODUTOS = 'ver_produtos';
}
