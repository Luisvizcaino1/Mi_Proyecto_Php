<?php
session_start(); // iniciamos una nuevamente la sesion 

// Incluimos el archivo del arreglo donde tenemos la lista de usuarios.
require_once './db/db.php'; 

//  Verificamos si exixte una  cokkies llamada post y procedemos a Recuperar posts desde la cookie si existen
if (isset($_COOKIE['posts'])) {
    $_SESSION['posts'] = json_decode($_COOKIE['posts'], true); // Decodificamos los posts guardados en la cookie y los almacenamos en la sesión..
}

// comprobamos si el formulario ha enviado el nombre de usuario y la contraseña, y que estos no esten vacios..
if (isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $user_name = $_POST['user']; // le asignamos el nombre enviado por el formulario a la variable user_name
    $pass = $_POST['password']; // lo mismo aca a la contraseña que se envia medieante el formulario se le asigna a la variable pass

    foreach ($users as $user) { // lo utilizamos para recorrer el arreglo 
        if ($user['user'] == $user_name && $user['password'] == $pass) { // verifica si hay coincidencias 
            $_SESSION['user'] = $user; 

            // Creamos una cookie para guardar el nombre de usuario que expira en  una hora.
            setcookie('user', $user['user'], time() + 3600);

            // nos vuelve a mandar a la vista  de bienvenida.
            header('Location: welcome.php');
            exit;
        }
    }

    echo "Usuario o contraseña incorrectos"; 
} 
?>