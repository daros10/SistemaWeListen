<?php
  require 'database.php';
  $message = '';
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    if ($stmt->execute()) {
      $message = 'Usuario creado satisfactoriamente';
    } else {
      $message = 'Problema al crear cuenta, usuario ya existe!!';
    }
  }
?>

<link rel="shortcut icon" type="image/x-icon" href="pantallaprueba/img/iconlogoWeListen.ico">
<!DOCTYPE html>
<html>
<<<<<<< Updated upstream
<header class="masthead">
  <head> <meta charset="utf-8">
    <title>Regístrate</title>

   <link rel="shortcut icon" type="image/x-icon" href="pantallaprueba/img/iconlogoWeListen.ico">

=======
<header class="masthead">
  <head>
    <meta charset="utf-8">
    <title>Registrate</title>
>>>>>>> Stashed changes
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Registrate</h1>
    <span>o <a href="login.php">Inicia Sesión</a></span>

    <form action="signup.php" method="POST">
      <input name="email" type="email" placeholder="Ingresa tu email" required>
      <input name="password" type="password" placeholder="Ingresa tu contraseña" required>
      <input name="confirm_password" type="password" placeholder="Confirma tu contraseña" required>
      <input type="submit" value="Registrarse">
    </form>

  </body>
   </header>
</html>
