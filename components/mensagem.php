<?php
session_start(); 

if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-info" role="alert">' . htmlspecialchars($_SESSION['message']) . '</div>';
    unset($_SESSION['message']); 
}