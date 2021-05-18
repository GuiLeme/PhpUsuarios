<h1>Adicione um usuário abaixo</h1>
<hr>
<br>
<?php
session_start();

if ($_SESSION['jaExiste']) {
    echo "<h3 id='desaparece'>Usuário já existente!</h3>";
    $_SESSION['jaExiste'] = false;
}
?>


<form action="adicionarAction.php" method="POST">
    <label>
        Nome:
        <input type="text" name="name">
    </label><br><br>
    <label>
        email:
        <input type="email" name='email'>
    </label><br><br>
    <input type="submit">
</form>
<script>
    setTimeout(() => {
        document.getElementById('desaparece').style.display = 'none';
    }, 3000)
</script>