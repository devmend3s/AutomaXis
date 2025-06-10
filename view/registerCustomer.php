<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Cliente - AutomaXis</title>
  <link rel="stylesheet" href="view/style/registerCustomer.css">
</head>
<body>
  <h1>Cadastrar Novo Cliente</h1>

  <?php if (isset($_SESSION['message'])): ?>
    <p style="color: green; font-weight: bold;">
      <?= htmlspecialchars($_SESSION['message']) ?>
    </p>
    <?php unset($_SESSION['message']); ?>
  <?php endif; ?>

  <form action="index.php?action=registerCustomer" method="post">
    <label>Nome:
      <input type="text" name="name" required>
    </label>
    <br><br>
    <label>Telefone:
      <input type="text" name="phone">
    </label>
    <br><br>
    <label>Email:
      <input type="email" name="email">
    </label>
    <br><br>
    <label>CPF:
      <input type="text" name="cpf" required>
    </label>
    <br><br>
    <button type="submit">Cadastrar</button>
  </form>
</body>
</html>
