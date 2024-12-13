<?php 
include_once 'classes/Auth.class.php';
include_once 'classes/Permissao.enum.php';
?>

<li><a class="navigation-link" href="/index.php">Home</a></li>
<li><a class="navigation-link" href="/obre.php">Quem Somos</a></li>
<li><a class="navigation-link" href="/produtos.php">Produtos</a></li>
<li><a class="navigation-link" href="/contato.php">Contato</a></li>

<?php

    if (Auth::temPermissao(Permissao::GERENCIAR_USUARIOS)) {
        echo '<li><a class="navigation-link" href="cadastro.php">Cadastro de usuário</a></li>';
    }
    if (Auth::temPermissao(Permissao::GERENCIAR_PRODUTOS)) {
        echo '<li><a class="navigation-link" href="cadastro-produto.php">Cadastro de produto</a></li>';
    }
    if (Auth::estaLogado()) {       
        echo 
        '<li>
            <form action="/classes/Servidor.php" method="POST" style="display:inline;">
                <input type="hidden" name="action" value="logout">
                <button type="submit" class="btn btn-link navigation-link" style="padding: 0; background: none; border: none; color: inherit; text-decoration: underline; cursor: pointer;">Sair</button>
            </form>
        </li>';
    } else {
        echo '<li><a class="navigation-link" href="/login.php">Login</a></li>';
    }

?>
