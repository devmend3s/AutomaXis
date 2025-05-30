<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Serviço</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f2f6fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-card {
            background: white;
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 420px;
            max-width: 90%;
        }

        .form-card h2 {
            text-align: center;
            color: #0A66C2;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px 15px;
            border-radius: 10px;
            border: 1px solid #ccc;
            outline: none;
            font-size: 14px;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .buttons button {
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 20px;
            font-weight: bold;
            background-color: #0A66C2;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .buttons button.cancel {
            background-color: #ccc;
            color: #333;
        }

        .buttons button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

    <form class="form-card" method="POST" action="?action=registerService">
        <h2>🧰 Cadastrar Serviço</h2>

        <div class="form-group">
            <label for="name">Nome do Serviço</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Preço (R$)</label>
            <input type="number" step="0.01" name="price" id="price" required>
        </div>

        <div class="buttons">
            <button type="submit">Cadastrar</button>
            <button type="button" class="cancel" onclick="window.location.href='home.php'">Cancelar</button>
        </div>
    </form>

</body>
</html>
