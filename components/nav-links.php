<?php 
include_once 'classes/Auth.class.php';
include_once 'classes/Permissao.enum.php';
?>

<li><a class="navigation-link" href="index.php">Home</a></li>
<li><a class="navigation-link" href="sobre.php">Quem Somos</a></li>
<li><a class="navigation-link" href="produtos.php">Produtos</a></li>
<li><a class="navigation-link" href="contato.php">Contato</a></li>
<li><a class="navigation-link" href="login.php">Login</a></li>
<?php
    if (Auth::temPermissao(Permissao::GERENCIAR_USUARIOS)) {
        echo '<li><a class="navigation-link" href="cadastro.php">Cadastro Produto</a></li>';
    }
    if (Auth::temPermissao(Permissao::GERENCIAR_PRODUTOS)) {
        echo '<li><a class="navigation-link" href="cadastro-produto.php">Cadastro Produto</a></li>';
    }
?>
