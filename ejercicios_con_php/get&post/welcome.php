<?php
session_start(); // Inicia la sesion

if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Mostrar los posts si existen en la sesión
if (isset($_SESSION['posts']) && !empty($_SESSION['posts'])) {
    echo "BIENVENID@: {$_SESSION['user']['name']} <br>";
    echo "<h1>Posts creados:</h1>";

    foreach ($_SESSION['posts'] as $post) {
        echo "<h2>{$post['titulo']}</h2>";
        echo "<p>{$post['contenido']}</p>";
        echo "<small>Creado por: {$post['autor']} el {$post['fecha']}</small><br><br>";
    }
} else {
    echo "No hay posts creados, Crea uno por favor.";
}
?>

<!-- Formulario para crear un nuevo post -->
<form action="crear_post.php" method="post"> <!-- Cuando se envie el formulario, nos envia a crear_post.php -->
    <input type="submit" value="Crear un nuevo post"> <!-- Boton para crear un nuevo post -->
</form>

<!-- Formulario para cerrar sesion -->
<form action="logaut.php" method="post"> <!-- Cuando se envíe el formulario, nos envia a index.php -->
    <input type="submit" value="Cerrar sesión"> <!-- Botonn para cerrar sesión -->
</form>

<!-- Formulario para bloquear sesiin -->
<form action="bloquear.php" method="post"> <!-- Cuando se envie el formulario, nos envia a bloquear.php -->
    <input type="submit" value="Bloquear Sesión"> <!-- Botonn para bloquear sesion -->
</form>


<?php
include './inclides/footer.php'; // Incluir el pie de pagina :) .
?>


