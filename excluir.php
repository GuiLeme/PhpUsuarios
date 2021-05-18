<?php
session_start();
require "config.php";
require "dao/UsuarioDaoMysql.php";

$usuarioDao = new UsuarioDaoMysql($pdo);

if ($_SESSION['jaExiste']) {
    echo "<h3 id='desaparece'>Usuário já existente!</h3>";
    $_SESSION['jaExiste'] = false;
}


$id = filter_input(INPUT_GET, 'id');

if ($id){
    $usuarioDao -> delete($id);
}
    header('Location: index.php');
    exit;

?>