<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect("localhost", "meusite", "illusionsociety", "lab");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $nivel = $_POST['nivel'];

    switch ($nivel) {
        case '1':
            $query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
            echo "Query: $query<br>";
            $result = mysqli_query($conn, $query);
            break;

        case '2':
          $user = str_replace("'", "", $user);
          $pass = str_replace("'", "", $pass);
          $query = "SELECT * FROM users WHERE username = $user AND password = $pass";
          echo "Query: $query<br>";
          $result = mysqli_query($conn, $query);
          break;

        case '3':
          $user = $_POST['username'];
          $pass = $_POST['password'];
            
          $user = htmlspecialchars($user, ENT_QUOTES);
          $pass = htmlspecialchars($pass, ENT_QUOTES);
            
          $user = mysqli_real_escape_string($conn, $user);
          $pass = mysqli_real_escape_string($conn, $pass);
            
          $user = str_replace("'", "", $user);
          $pass = str_replace("'", "", $pass);
            
          $user = preg_replace('/[^a-zA-Z0-9_]/', '', $user);
          $pass = preg_replace('/[^a-zA-Z0-9_]/', '', $pass);
            
           
          $query = "SELECT * FROM users WHERE username = '$user'-- AND password = '$pass'";
          echo "Query: $query<br>";
            
          $result = mysqli_query($conn, $query);
          break;
    }

    if ($result && mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['username'] = $user;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<div class='warning'>Login inválido!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <style>
        body {
          background-color: #0f0f1a; 
          color: #9b30ff; 
          font-family: monospace;
          text-align: center;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          margin: 0;
        }
        .login-container {
          background-color: #1c1c1c; 
          padding: 30px;
          border-radius: 10px;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
        }
        h2 {
          margin-bottom: 20px;
          color: #d8aaff; 
        }
        label {
          display: block;
          margin-bottom: 8px;
          color: #d8aaff; 
        }
        input[type="text"], input[type="password"] {
          width: 250px;
          padding: 10px;
          margin-bottom: 15px;
          border: 1px solid #9400D3; 
          border-radius: 5px;
          background-color: #2c2c38; 
          color: #9400D3; 
        }
        input[type="submit"] {
          width: 100%;
          padding: 10px;
          background-color: #9400D3; 
          border: none;
          border-radius: 5px;
          color: #fff; 
          font-size: 16px;
          cursor: pointer;
        }
        input[type="submit"]:hover {
          background-color: #8b00b2; 
        }
        .warning {
          color: red;
          margin-top: 20px;
        }

        select {
          width: 100%;
          padding: 10px;
          margin-bottom: 15px;
          border: 1px solid #9400D3; 
          border-radius: 5px;
          background-color: #2c2c38;
          color: #9400D3;
          font-family: monospace;
          font-size: 16px;
          appearance: none;
        }

        select:focus {
          outline: none;
          border-color: #d8aaff;
          box-shadow: 0 0 5px #9400D3;
        }
 
    </style>
</head>
<body> 
    <div class="login-container">
        <h2>Painel de Admin</h2>
        <form action="login.php" method="POST">
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required><br>
            <label for="nivel">Nível de Dificuldade:</label>
        
            <select name="nivel" id="nivel" required>
              <option value="1">Fácil</option>
              <option value="2">Médio</option>
              <option value="3">Difícil</option>
            </select><br><br>

            <input type="submit" value="Entrar">
        </form>
        <?php if (isset($erro)) echo "<div class='warning'>$erro</div>"; ?>
    </div>
</body>
</html>
