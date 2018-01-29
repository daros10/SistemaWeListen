/* inicio de sesion y registro conectado a base de datos */
<?php
  session_start();
  session_unset();
  session_destroy();
  header('Location: /WeListen');
?>
