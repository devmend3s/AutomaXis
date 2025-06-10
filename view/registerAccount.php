<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Conta - AutomaXis</title>
  <link rel="stylesheet" href="view/style/registerAccount.css">
</head>
<body>
  <h1>Cadastrar Conta</h1>
  <form action="/controllers/AccountController.php?action=register" method="post">
    <label>Descrição:
      <input type="text" name="description" required>
    </label>
    <label>Valor:
      <input type="number" step="0.01" name="amount" required>
    </label>
    <label>Pago?
      <select name="paid">
        <option value="Y">Sim</option>
        <option value="N" selected>Não</option>
      </select>
    </label>
    <button type="submit">Salvar</button>
  </form>
</body>
</html>
