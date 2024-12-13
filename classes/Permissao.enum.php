<?php

enum Permissao: string
{
    case GERENCIAR_USUARIOS = 'gerenciar_usuarios';
    case GERENCIAR_PRODUTOS = 'gerenciar_produtos';
    case ACESSO_TOTAL = 'acesso_total';
}
