<?php
session_start();
$_SESSION['jaExiste'] = false;


require "config.php";
require "dao/UsuarioDaoMysql.php";

$usuarioDao = new UsuarioDaoMysql($pdo);
$lista = $usuarioDao->findAll();
?>


<a href="adicionar.php">Adicionar novo</a>

<table border='1' width='100%'>
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php
    if(count($lista)>0){
        foreach($lista as $usuario){
            echo "<tr>";
            echo "<td>".$usuario->getId()."</td>";
            echo "<td>".$usuario->getNome()."</td>";
            echo "<td>".$usuario->getEmail()."</td>";
            echo "<td><a href='editar.php?id=".$usuario->getId()."'>[Editar]</a><a href='excluir.php?id=".$usuario->getId()."' onclick='confirma()'>[Excluir]</a></td>";
            echo "<tr>";
        }
    }
    ?>
</table>

<script>
    function confirma() {
        return confirm('Deseja mesmo excluir?');
    }
    setTimeout(() => {
        document.getElementById('desaparece').style.display = 'none';
    }, 3000);
    
</script>