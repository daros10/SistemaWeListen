<?php
  session_start();
  if (isset($_SESSION['user_id'])) {
    header('Location: index1.html');
  }
  require 'database.php';
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: index.php");
    } else {
      $message = 'Lo sentimos, contraseña incorrecta o usuario no existe';
    }
  }
 
?>

<!DOCTYPE html>
<html>
<header class="masthead">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
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
 
    <h1>Inicia Sesión</h1>
    <span>o <a href="signup.php">Registrate</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Ingresa tu email" required>
      <input name="password" type="password" placeholder="Ingresa tu contraseña" required>
      <input type="submit" value="Iniciar Sesión">
    </form>
  </body>
  </header>
</html>
 