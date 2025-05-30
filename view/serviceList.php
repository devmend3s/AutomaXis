<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Produtos</title>
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

  <h2>Serviços 🧰</h2>
  <table id="tabela">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>

  <div class="buttons">
    <button class="btn" onclick="prevPage()">Anterior</button>
    <span id="paginaInfo"></span>
    <button class="btn" onclick="nextPage()">Próxima</button>
  </div>

  <script>
    const dados = Array.from({ length: 100 }, (_, i) => ({
      nome: `Produto ${i + 1}`,
      descricao: `Descrição do produto ${i + 1}`,
      preco: `R$ ${(Math.random() * 100).toFixed(2)}`
    }));

    let paginaAtual = 1;
    const registrosPorPagina = 15;

    function exibirTabela() {
      const tbody = document.querySelector("#tabela tbody");
      tbody.innerHTML = "";

      const inicio = (paginaAtual - 1) * registrosPorPagina;
      const fim = inicio + registrosPorPagina;
      const registrosPagina = dados.slice(inicio, fim);

      registrosPagina.forEach(item => {
        const row = `<tr>
          <td>${item.nome}</td>
          <td>${item.descricao}</td>
          <td>${item.preco}</td>
        </tr>`;
        tbody.innerHTML += row;
      });

      document.getElementById("paginaInfo").textContent = 
        `Página ${paginaAtual} de ${Math.ceil(dados.length / registrosPorPagina)}`;
    }

    function nextPage() {
      if (paginaAtual * registrosPorPagina < dados.length) {
        paginaAtual++;
        exibirTabela();
      }
    }

    function prevPage() {
      if (paginaAtual > 1) {
        paginaAtual--;
        exibirTabela();
      }
    }

    exibirTabela();
  </script>

</body>
</html>
