<?php

include_once 'php/Session.class.php';

$mensagem = Session::getCookie('mensagem');
$tipo = Session::getCookie('mensagem-tipo');

if ($mensagem && $tipo) {
    Session::removeCookie('mensagem');

    echo <<<HTML
        <div class="alert-container" style="position: fixed; bottom: 20px; right: 20px; z-index: 1050; width: auto;">
            <div class="alert alert-{$tipo} shadow-sm" role="alert" id="alert-message">
                <span>{$mensagem}</span>
            </div>
        </div>

        <script>
            function closeAlert() {
                const alert = document.getElementById('alert-message');
                if (alert) {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500); 
                }
            }

            setTimeout(closeAlert, 5000);

            document.getElementById('alert-message').addEventListener('click', closeAlert);

            document.getElementById('alert-close').addEventListener('click', function(event) {
                event.stopPropagation();
                closeAlert();
            });
        </script>
    HTML;
}
