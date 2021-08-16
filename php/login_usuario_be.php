<?php 
session_start();
//incluyendo conexion con la base de datos
include 'conexion_be.php';

//insertando columna correo y la contraseña
$correo=$_POST['correo'];
$contraseña=$_POST['contraseña'];

//validacion de correo y la contraseña
$validar_login=mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'
and contraseña='$contraseña");

if(mysqli_num_rows($validar_login)>0 ){
  $_SESSION['usuario']= $correo;  
  header("location: ../bienvenido.html");
    exit;
  }else{
     echo '
        <script>
           alert("El esuario no existe, por favor verifique los datos introducidos");
           window.location="../index.php"
        </script>
  ';
   exit;
}
?>