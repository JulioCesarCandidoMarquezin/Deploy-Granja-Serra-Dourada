<?php

if (isset($_COOKIE['message'])) {
    echo '<div class="alert alert-info" role="alert">' . htmlspecialchars($_COOKIE['message']) . '</div>';
    
    setcookie("message", "", time() - 3600, "/", "", true, true);
}