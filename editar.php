<h1>Editar um usuário:</h1>
<hr>
<br>
<?php

require "config.php";
require "dao/UsuarioDaoMysql.php";

$usuarioDao = new UsuarioDaoMysql($pdo);

session_start();
require "config.php";
$usuario = false;

if ($_SESSION['jaExiste']) {
    echo "<h3 id='desaparece'>Usuário já existente!</h3>";
    $_SESSION['jaExiste'] = false;
}


$id = filter_input(INPUT_GET, 'id');

if ($id){

    $usuario = $usuarioDao -> findById($id);


}if ($usuario === false) {
    header('Location: index.php');
    exit;
}

?>


<form action="editarAction.php" method="POST">
    <input type="hidden" name='id' value="<?php echo $usuario->getId();?>">
    <label>
        Nome:
        <input type="text" name="name" value="<?php echo $usuario->getNome();?>">
    </label><br><br>
    <label>
        email:
        <input type="email" name='email' value="<?php echo $usuario->getEmail();?>">
    </label><br><br>
    <input type="submit" value='Salvar'>
</form>
<script>
    setTimeout(() => {
        document.getElementById('desaparece').style.display = 'none';
    }, 3000)
</script>