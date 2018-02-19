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
<link rel="shortcut icon" type="image/x-icon" href="pantallaprueba/img/iconlogoWeListen.ico">
<!DOCTYPE html>
<html>
  <head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Custom CSS -->
  <link href="dist/css/sb-admin-2.css" rel="stylesheet">


  <!-- Custom Fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  </head>
  <body>

    <!--CODE PHP-->
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">WeListen</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown PERFIL DE USUARIO -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
                        <?php if(!empty($user)): ?>
                        <?= $user['email']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="index.php"><i class="fa fa-music"></i> Inicio</a>
                        </li>

                        <li>
                            <a href="tuMusica.php"><i class="fa fa-play-circle"></i> Tu música</a>
                        </li>
                        <li>
                            <a href="addMusic.php"><i class="fa fa-play-circle"></i> Agregar música</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tu Música</h1>
                    <div class="container">


                        <?php
                        	$conexion=mysqli_connect('localhost','root','','weListen');
                          $id=$user['id'];
                        ?>

                        <div class="jumbotron">
                        <table class="table" >
                          <thead>
                            <tr>
                              <th scope="col">Nombre Canción</th>
                              <th scope="col">Artista</th>
                              <th scope="col">Canción</th>
                            </tr>
                          </thead>
                          <?php
                          $sql="SELECT name, artista, song from cancion WHERE idUser='$id'";
                          $result=mysqli_query($conexion,$sql);

                          while($mostrar=mysqli_fetch_array($result)){
                           ?>
                          <tbody>
                          <tr>
                            <td><?php echo $mostrar['name'] ?></td>
                            <td><?php echo $mostrar['artista'] ?></td>
                            <td><audio controls><source src="<?php echo $mostrar['song'] ?>" type="audio/mp3"></audio></td>
                          </tr>
                        </tbody>
                        <?php
                        }
                         ?>
                        </table>
                      </div>








                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

      </div>


      <!--renderiza directamente la pagina de login-->
    <?php else:
       header('Location: index1.html');
      ?>
    <?php endif; ?>


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="js/app.js"></script>




  </body>
</html>
