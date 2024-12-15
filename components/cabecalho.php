<header id="header">
    <a id="logo-link" href="/" aria-label="Página inicial">
        <img id="logo" src="assets/images/banner.png" alt="Logo - Granja Serra Dourada" loading="lazy">
    </a>

    <div id="menu">
        <button id="menu-toggle" aria-expanded="false" aria-controls="menu-box" onclick="menu_toggle()">
            <img id="menu-icon" src="assets/icons/menu-closed.png" alt="Abrir menu" loading="lazy">
        </button>

        <div id="menu-box" class="hidden" aria-hidden="true">
            <nav>
                <ul id="navigation-links-mobile" class="navigation-links">
                    <?php include 'nav-links.php'; ?>
                </ul>
            </nav>
        </div>
    </div>

    <nav>
        <ul id="navigation-links-desktop" class="navigation-links">
            <?php include 'nav-links.php'; ?>
        </ul>
    </nav>

    <script>
        function menu_toggle() {
            const menuBox = document.getElementById('menu-box');
            const menuIcon = document.getElementById('menu-icon');
            const menuToggle = document.getElementById('menu-toggle');
            const isHidden = menuBox.classList.contains('hidden');

            menuBox.classList.toggle('hidden', !isHidden);
            menuBox.classList.toggle('show', isHidden);

            menuToggle.setAttribute('aria-expanded', isHidden.toString());
            menuBox.setAttribute('aria-hidden', (!isHidden).toString());

            menuIcon.src = isHidden 
                ? "assets/icons/menu-open.png" 
                : "assets/icons/menu-closed.png";
        }
    </script>
</header>