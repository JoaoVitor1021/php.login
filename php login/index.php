<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){
    if(strlen($_POST['email']) == 0){
        echo "Preencha seu e-mail";
    
    }
    else if(strlen($_POST['senha']) == 0){
        echo "Preencha sua senha";
    }
    else{
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
        $sql_query =$mysqli->query($sql_code) or
        die("falha na execução do código SQL" . $mysqli->error);

        $quantidade = $sql_query ->num_rows;
        if($quantidade ==1){
            $usuario == $sql_query ->fetch_assoc();
       
        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];

        header("locatioan: painel.php");
    } else {
            echo "falha ao logar! E-mail ou senha incorretos";
        }

    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>acesse sua conta</h1>
    <form action="" method="post">
        <p>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email">
        </p>
    </form>
    <p>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha">
    </p>
    <button type="submit">Entrar</button>

</body>
</html>