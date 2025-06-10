<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Cadastro de Serviço</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }
    table {
      width: 80%;
      margin: 20px auto;
      border-collapse: collapse;
    }
    th, td {
      padding: 12px;
      border-bottom: 1px solid #ccc;
    }
    th {
      background-color: #0288d1;
      color: white;
    }
    .buttons {
      margin: 20px;
    }
    .btn {
      padding: 10px 20px;
      margin: 5px;
      background-color: #0288d1;
      color: white;
      border: none;
      border-radius: 20px;
      cursor: pointer;
    }
    .logo {
      font-size: 32px;
      font-weight: bold;
      margin: 20px 0 10px;
    }
    .logo span:first-child {
      color: #F22222;
    }
    .logo span:last-child {
      color: #0477BF;
    }
  </style>
</head>
<body>

  <div class="logo"><span>Automa</span><span>Xis</span></div>

  <h1>Cadastro de Serviço</h1>

  <?php if (!empty($_SESSION['message'])): ?>
    <p><?php echo htmlspecialchars($_SESSION['message']); unset($_SESSION['message']); ?></p>
  <?php endif; ?>

  <form action="index.php?action=registerService" method="post">
    <label for="name">Nome do Serviço:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="description">Descrição:</label><br>
    <textarea id="description" name="description" required></textarea><br><br>

    <label for="price">Preço:</label><br>
    <input type="number" id="price" name="price" step="0.01" min="0" required><br><br>

    <button class="btn" type="submit">Cadastrar</button>
  </form>

</body>
</html>
