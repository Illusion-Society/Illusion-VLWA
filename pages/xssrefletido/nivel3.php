<?php
if (isset($_GET['busca'])) {
    $busca = $_GET['busca'];

    $busca = strip_tags($busca, '<b><i><u><strong><em><font><style>');
} else {
    $busca = "";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Illusion VLWA - Nível 2</title>
  <link rel="icon" href="/img/logo.ico" type="image/svg+xml">
  <style>
    body {
      background-color: #0f0f1a;
      color: #00ff88;
      font-family: monospace;
      text-align: center;
      padding: 50px;
    }
    input, button {
      background-color: #1a1a2e;
      border: 1px solid #00ff88;
      color: #00ff88;
      padding: 10px;
      font-family: monospace;
      margin-top: 20px;
    }
    button:hover, input:hover {
      border-color: #00ccff;
    }
    h1, h2 {
      margin-bottom: 30px;
    }
    a {
      color: #00ccff;
      display: block;
      margin: 10px;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1>Illusion VLWA - Nível 3</h1>

  <p>Digite um valor para buscar:</p>

  <form method="GET">
    <input type="text" name="busca" placeholder="Digite algo" value="<?php echo htmlspecialchars($busca); ?>">
    <button type="submit">Buscar</button>
  </form>

  <div class="resultado">
    <p>Resultado da Busca:</p>
    <div>
      <?php
      echo $busca; 
      ?>
    </div>
  </div>
  
</html>
