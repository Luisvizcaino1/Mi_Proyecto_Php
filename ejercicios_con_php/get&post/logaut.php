<?php
session_start(); // La usamos para iniciar lla sesion y asi poder acceder a los dtos almacenados en la sesion .

// Verificamos si existe una variable de sesion llamada posts.
// Y Si existe Guardar los posts en una cookie antes de destruir la sesión.
if (isset($_SESSION['posts'])) {
    setcookie('posts', json_encode($_SESSION['posts']), time() + 3600); // Guardamos los posts en la cookie.
}

session_destroy(); // procedemos a destruir la sesion
header('Location: index.php'); // y esto nos manda al index nuevamente.
exit; // y con el exit lo que hacemos es finalizar la ejecucion 
?>