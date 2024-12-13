<header id="header">
    <a id="logo-link" href="/">
        <img id="logo" src="assets/images/banner.png" alt="Logo - Granja Serra Dourada" loading="lazy">
    </a>

    <div id="menu">
        <button id="menu-toggle" onclick="menu_toggle()">
            <img id="menu-icon" src="assets/icons/menu-closed.png" alt="Menu" loading="lazy">
        </button>

        <div id="menu-box" class="hidden">
            <nav>
                <ul id="navigation-links-mobile">
                    <?php include 'nav-links.php'; ?>
                </ul>
            </nav>
        </div>
    </div>

    <nav>
        <ul id="navigation-links-desktop">
            <?php include 'nav-links.php'; ?>
        </ul>
    </nav>

    <script>
        function menu_toggle() {
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