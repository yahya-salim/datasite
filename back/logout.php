<?php
session_start();

// Détruire toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Rediriger vers la page de login après la déconnexion
header('Location: ../front/index');
exit();
?>
