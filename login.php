<?php
    session_start();
    
    if (isset($_SESSION['user_id'])) {
        header('Location: partials/header.php'); 
    }

    require 'db.php';
    
    if(!empty($_POST['usuario']) && !empty($_POST['contrasena'])){
        $records = $conn->prepare('SELECT id, usuario, contrasena FROM usuario WHERE usuario = :usuario');
        $records->bindParam(':usuario', $_POST['usuario']);
        $records->execute();
        $res = $records->fetch(PDO::FETCH_ASSOC);
    
        $mensaje = '';
    
        if (count($res) > 0 && password_verify($_POST['contrasena'], $res['contrasena'])) {
          $_SESSION['user_id'] = $res['id'];
          header("Location: /");
        } else {
          $mensaje = 'Credenciales incorrectas';
        }
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   <link rel="stylesheet" href="assets/css/style.css">
  
   <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">

  </head>
<body>
    <?php include "partials/header.php"?>
    <h1>Iniciar Sesion</h1>
    <?php if(!empty($mensaje)): ?>
      <p> <?= $mensaje ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <input type="text" name="usuario" placeholder="Usuario">
        <br>
        <input type="password" name="contrasena" placeholder="Contrasena">
        <br>
        <input type="submit" value="Enviar">
    </form>
    

</body>
</html>