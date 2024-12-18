<?php 
include_once 'php/Auth.class.php';
include_once 'php/Permissao.enum.php';
?>

<li><a class="navigation-link" href="/index.php">Home</a></li>
<li><a class="navigation-link" href="/sobre.php">Quem Somos</a></li>
<li><a class="navigation-link" href="/produtos.php">Produtos</a></li>
<li><a class="navigation-link" href="/contato.php">Contato</a></li>
<li><a class="navigation-link" href="/sustentabilidade.php">Sustentabilidade</a></li>

<?php
    if (Auth::temPermissao(Permissao::GERENCIAR_USUARIOS)) {
        echo <<<HTML
            <li><a class="navigation-link" href="cadastro.php">Cadastro de usuário</a></li>
        HTML;
    }
    if (Auth::temPermissao(Permissao::GERENCIAR_PRODUTOS)) {
        echo <<<HTML
            <li><a class="navigation-link" href="cadastro-produto.php">Cadastro de produto</a></li>
        HTML;
    }
    if (Auth::estaLogado()) {       
        echo <<<HTML
            <li>
                <form action="/php/Servidor.php" method="POST" style="display:inline;">
                    <input type="hidden" name="action" value="logout">
                    <button type="submit" class="btn btn-link navigation-link" style="padding: 0; background: none; border: none; color: inherit; cursor: pointer;">Sair</button>
                </form>
            </li>
        HTML;
    } else {
        echo <<<HTML
            <li><a class="navigation-link" href="/login.php">Login</a></li>
        HTML;
    }
?>
