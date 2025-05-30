<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login - AutomaXis</title>
  <link rel="stylesheet" href="view/style/login.css">
</head>
<body>
  <div class="logo"><span>Automa</span><span>Xis</span></div>

  <div class="login-container">
    <h1>Login</h1>
    <div class="user-icon">👤</div>

    <!-- Formulário de login -->
    <form method="post" action="?action=login">
      <input type="text" name="username" placeholder="Usuário" required>
      <input type="password" name="password" placeholder="Senha" required>
      <button type="submit" class="login-button">Login</button>
    </form>

    <!-- Link para registro -->
    <a class="forgot-password" href="?action=register">Não tem conta? Cadastre-se</a>

    <!-- Mensagem de retorno (PHP) -->
    <?php if (isset($result)) echo "<p style='color:#fff; margin-top:15px;'>$result</p>"; ?>
  </div>
</body>
</html>
