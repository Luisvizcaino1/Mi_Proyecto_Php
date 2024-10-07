<!DOCTYPE html>
<html>
<head>
  <title>EJERCICIO CON PHP</title> 
  <link rel="stylesheet" href="index.css">
<body>
  <div class="formulario">
    <h1 class="inicio">Inicio de sesión</h1> 
     
      <form action="login.php" method="post"> <br>
        <label>Usuario:</label><br> 
        <input type="text" name="user" required> 
        <br>
        
        <label>Contraseña:</label> <br> 
        <input type="password" name="password" required> 
        <br>
        <br>
        <input type="submit" value="Iniciar sesión" class="boton"> <br>  
        
      </form>
   
  </div>
</body>
</html>
<?php
include './inclides/footer.php'; 
?>