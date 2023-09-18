<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
<link rel="stylesheet" href="cadastro.css">
</head>
<body>


<center>
  <div class="cad-laranja">
    <img src="icone.png" alt="">
    <form class="cadastro-cad" action="cadastro.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br><br>

        <input class="button-cad" type="submit" value="Cadastrar" >
    
    </form>
</div>
</center>



<button class="button-voltar"><a href="index.php">Voltar</a>
</button>
  
 


    <?php
        include "conexao.php";
        // Inicializa a sessão

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $Nome = $_POST['nome'];
$Usuario = $_POST['usuario'];
$Senha = $_POST['senha']; // Hash da senha

// Inserir os dados no banco de dados
$sql = "INSERT INTO usuario (Nome, Usuario, Senha) VALUES ('$Nome', '$Usuario', '$Senha')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

$conn->close();
        }

    
?>












</body>
</html>