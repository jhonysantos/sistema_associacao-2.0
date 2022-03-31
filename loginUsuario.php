<?php
     session_start();
     if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])){
         include_once('config.php');
         $usuario = $_POST['email'];
         $senha = $_POST['password'];
 
         $sql = "SELECT * FROM usuario WHERE email = '$usuario' and senha = '$senha'";
         $result = $conexao1->query($sql);
 
         if(mysqli_num_rows($result) < 1){
             unset($_SESSION['email']);
             unset($_SESSION['password']);
             header('Location: login.php');
         }else{
             $_SESSION['email'] = $usuario;
             $_SESSION['password'] = $senha;
             header('Location: index.php');
         }
     }else{
         header('Location: login.php');
     }
