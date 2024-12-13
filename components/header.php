<header id="header">
    <a id="logo-link" href="/">
        <img id="logo" src="assets/images/banner.webp" alt="Logo - Granja Serra Dourada" loading="lazy">
    </a>

    <div id="menu">
        <button id="menu-toggle" onclick="menuToggle()">
            <img id="menu-icon" src="assets/icons/menu-closed.png" alt="Menu" loading="lazy">
        </button>

        <div id="menu-box" class="hidden">
            <nav>
                <ul id="navigation-links-mobile">
                    <li><a class="navigation-link" href="index.php">Home</a></li>
                    <li><a class="navigation-link" href="sobre.php">Quem Somos</a></li>
                    <li><a class="navigation-link" href="produtos.php">Produtos</a></li>
                    <li><a class="navigation-link" href="contato.php">Contato</a></li>
                    <li><a class="navigation-link" href="login.php">Login</a></li>
                    <li><a class="navigation-link" href="cadastro.php">Cadastro</a></li>
                    <li><a class="navigation-link" href="cadastro-produto.php">Cadastro Produto</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <nav>
        <ul id="navigation-links-desktop">
            <li><a class="navigation-link" href="index.php">Home</a></li>
            <li><a class="navigation-link" href="sobre.php">Quem Somos</a></li>
            <li><a class="navigation-link" href="produtos.php">Produtos</a></li>
            <li><a class="navigation-link" href="contato.php">Contato</a></li>
            <li><a class="navigation-link" href="login.php">Login</a></li>
            <li><a class="navigation-link" href="cadastro.php">Cadastro</a></li>
            <li><a class="navigation-link" href="cadastro-produto.php">Cadastro Produto</a></li>
        </ul>
    </nav>

    <script>
        function menuToggle() {
            const menuLinks = document.getElementById('menu-box');
            const menuIcon = document.getElementById('menu-icon');                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  

            if (menuLinks.classList.contains('hidden')) {
                menuLinks.classList.remove('hidden');
                menuLinks.classList.add('show');
                menuIcon.src = "assets/icons/menu-open.png"; 
            } else {
                menuLinks.classList.remove('show');
                menuLinks.classList.add('hidden');
                menuIcon.src = "assets/icons/menu-closed.png"; 
            }
        }
    </script>
</header>