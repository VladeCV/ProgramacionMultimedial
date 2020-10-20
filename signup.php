<?php
  require 'db.php';
  $mensaje = '';

  if (!empty($_POST['id']) && !empty($_POST['usuario']) && !empty($_POST['contrasena'])) {
    $sql = "INSERT INTO usuario (id,usuario,contrasena) VALUES (:id,:usuario, :contrasena)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->bindParam(':usuario', $_POST['usuario']);
    $pass = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
    $stmt->bindParam(':contrasena', $pass);

    if ($stmt->execute()) {
      $mensaje = 'Usuario creado correctamente';
    } else {
      $mensaje = 'Error creando usuario';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
  </head>
  <body>

    <?php include 'partials/header.php' ?>

    <?php if(!empty($mensaje)): ?>
      <p> <?= $mensaje ?></p>
    <?php endif; ?>

    <h1>Registrarse</h1>
    <span>o <a href="login.php">Iniciar Sesion</a></span>

    <form action="signup.php" method="POST">
      <input name="id" type="text" placeholder="Ingresa tu id">
      <input name="usuario" type="text" placeholder="Ingresa tu usuario">
      <input name="contrasena" type="password" placeholder="Ingresa tu contrasena">
      <input type="submit" value="Submit">
    </form>

  </body>
</html>
