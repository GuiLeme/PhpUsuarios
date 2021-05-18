<?php
session_start();

require "config.php";
require "dao/UsuarioDaoMysql.php";

$usuarioDao = new UsuarioDaoMysql($pdo);


$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($name && $email) {

    if($usuarioDao->findByEmail($email) === false){
        $novoUsuario = new Usuario();
        $novoUsuario -> setEmail($email);
        $novoUsuario -> setNome($name);

        $usuarioDao->add($novoUsuario);
        
        $_SESSION['inserido']=true;
        header("Location: index.php");
        exit;
    } else{
        $_SESSION['jaExiste'] = true;
        header("Location: adicionar.php");
        exit;
    }


} else{
    header('Location: adicionar.php');
    exit;
}