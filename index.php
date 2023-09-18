<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=H, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GREENWORLD</title>
</head>
<body>
  <?php
        include "conexao.php";
        // Inicializa a sessão
session_start();

// Verifica se o formulário de login foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o nome de usuário e senha do formulário
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Consulta o banco de dados para verificar se o usuário e senha correspondem a um registro
    $sql = "SELECT id FROM usuario WHERE Usuario = '$username' AND Senha = '$password'";
    $result = mysqli_query($conn, $sql);

    // Verifica se a consulta retornou algum resultado
    if (mysqli_num_rows($result) == 1) {
        // Inicia a sessão com o ID do usuário
        $row = mysqli_fetch_assoc($result);
        $_SESSION["user_id"] = $row["id"];

        // Redireciona para a página de cadastro
        header("Location: pag.html");
        exit();
    } else {
        // Exibe uma mensagem de erro caso o usuário e senha não correspondam a um registro
        $login_error = "Nome de usuário ou senha inválidos.";
    }
}

?>
        

    
  <nav>
  <div id="logo">
      <img src="loggo.jpeg" alt="HTML tutorial" style="width: 150px;;height: auto;">
    </div>
    <div class="botoes">
    <button class="cadastros" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
    <button class="cadastros"> <a href="cadastro.php">Cadastrar</a></button>
    </div>
  </nav>
                   
                
        <?php if (isset($login_error)) { ?>
    <p><?php echo $login_error; ?></p>
<?php } ?>
<h1>GREEN WORLD</h1>
<p>Site voltado para informações sobre fazendas verticais</p>
       
        <div id="id01" class="modal">
          
          <form class="modal-content animate" action="index.php" method="post">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Fechar">&times;</span>
              <img src="usuario.png" alt="Avatar" class="avatar">
            </div>
        
            <div class="container">
              <label for="username"><b>Usuário</b></label>
              <input type="text" placeholder="Nome de Usuário" name="username" required>
        
              <label for="psw"><b>Senha</b></label>
              <input type="password" placeholder="Senha" name="password" required>
                
              <button type="submit">Login</button>
              <label>
                <input type="checkbox" checked="checked" name="remember"> Lembrar de mim
              </label>
            </div>
        
            <div class="container2" style="background-color:#f1f1f1">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <span class="psw">Forgot <a href="#">Esqueceu a senha?</a></span>
            </div>
          </form>
      
        </div>
        
        

      <script src="script.js"></script>
      
     
</body>
</html>