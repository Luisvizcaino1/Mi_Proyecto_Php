<?php
session_start(); // Iniciamos la sesión para poder acceder a los datos del usuario.

// Verificar si el usuario está logueado.
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: index.php'); // Si no está logueado, nos enviara  al formulario de inicio de sesión.
    exit; // Detener la ejecución después de que nos mande a el formulario.
}

// Inicializamos el arreglo de posts si aún no existe en la sesión.
if (!isset($_SESSION['posts'])) {
    $_SESSION['posts'] = []; // Creamos  un arreglo vacío para almacenar los posts.
}

// Verificamos si el formulario ha sido enviado usando el método POST.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['titulo']) && isset($_POST['contenido'])) {
      $titulo = $_POST['titulo'];
      $contenido = $_POST['contenido'];
      
  } else {
      echo "Por favor asegurese de enviar los datos correctamente." ;
  }


    // Verificamos que los campos de titulo y contenido no esten vacios.
    if (!empty($titulo) && !empty($contenido)) {
        $autor = $_SESSION['user']['name']; // Obtener el nombre del autor desde la sesión.

        // Crear un nuevo post como un arreglo con el titulo, contenido, autor y fecha de creación.
        $nuevo_post = [
            'titulo' => $titulo,
            'contenido' => $contenido,
            'autor' => $autor,
            'fecha' => date('Y-m-d') // Guardar la fecha y hora actual del post.
        ];

        // Guardamos el nuevo post en el arreglo de posts dentro de la sesión.
        $_SESSION['posts'][] = $nuevo_post;

        // Mostramos un mensaje de exito indicando que el post se ha publicado.
        echo "Publicado exitosamente. <br>";

        // Mostrar un formulario con un botón para ver los posts publicados.
        echo '<form action="ver_posts.php" method="post">';
        echo '<input type="submit" value="Ver posts">'; // Botón para mandarnos a la vista de los posts.
        echo '</form>';
        exit; // Detiene la ejecucion después de mostrar el mensaje.
    } else {
        // Si los campos estan vacios, mostrar un mensaje de error.
        echo "Todos los campos son obligatorios.";
    }
}
?>



<!DOCTYPE html>
<html>
<head>
  <title>Crear un nuevo post</title> 
</head>
<body>
  <h1>Crear un nuevo post</h1> 
  
  <!-- Formulario para ingresar el título y contenido del nuevo post -->
  <form action="crear_post.php" method="post">
    <label>Título:</label>
    <input type="text" name="titulo" required> <!-- Campo para ingresar el título del post -->
    <br><br>
    
    <label>Contenido:</label>
    <textarea name="contenido" required></textarea> 
    <br><br>
    
    <input type="submit" value="Publicar"> 
  </form>
</body>
</html>