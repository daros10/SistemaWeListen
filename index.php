<?php
  session_start();
  require 'database.php';
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WeListen</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">





  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido <?= $user['email']; ?>
      <br>Has iniciado sesión correctamente
      <a href="logout.php">
        Logout
      </a>



      <!--navbar-->

      <nav class="navbar navbar-light" style="background-color: #F8F8FF;" >
        <!-- Navbar content -->
        <a class="navbar-brand light" href="components/home/home.php">Home</a>
        <a class="navbar-brand light" href="components/about/about.php">About</a>
        <a class="navbar-brand light" href="#">Tag2</a>
        <a class="navbar-brand light" href="#">Tag3</a>
      </nav>
      <!---->

    <?php else: ?>
      <h1> Inicia Sesión o Registrate</h1>

      <a href="login.php">Inicia Sesión</a> o
      <a href="signup.php">Registrate</a>
    <?php endif; ?>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



  </body>
</html>
