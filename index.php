<?php
  session_start();

  require 'db.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, usuario, contrasena FROM usuario WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $res = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($res) > 0) {
      $user = $res;
    }
  }
?>
<script>
  function change(x){
    document.body.style.backgroundColor = x;  
  }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INF324</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
    
</head>
<body>
    <?php require "partials/header.php"?>
    <br>
   
    <?php if(!empty($user)): ?>
      <h2><br> Bienvenido <?= $user['usuario']; ?></h2>
      <br>Sesion iniciada
      
      <select id="select" onchange='change(document.getElementById("select").value)'>
        <option value="">Elija color</option>
        <option value="Blue">Azul</option>
        <option value="Red">Rojo</option>
        <option value="Green">Verde</option>
        <option value="Purple">Morado</option>
      </select>
      <br>
      <a href="logout.php">
        Salir
      </a>
    <?php else: ?>
      <img src="assets/img/user.jpg" alt="USER" width= 500px height= 300px>
      <h1>Por favor inicie sesion o registrese</h1>
      <br>
      <a href="login.php">INICIAR SESION</a> o
      <a href="signup.php">REGISTRARSE</a>
    <?php endif; ?>
</body>
</html>