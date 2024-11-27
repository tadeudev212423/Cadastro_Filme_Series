<?php
// Configurações do banco de dados
$host = "localhost";
$user = "root";
$password = "";
$dbname = "filmes_series";

// Conexão com o banco de dados
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consultar dados
$sql = "SELECT * FROM filmes_series ORDER BY data_cadastro DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Cadastros</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
    <div class="top-banner">
    <img src="image.png" alt="Banner de Filmes e Séries">
</div>

        <h1>Filmes e Séries Cadastrados</h1>
        <a href="index.html" class="btn">Cadastrar Novo</a>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Nome</th>
                        <th>Capítulo/Episódio</th>
                        <th>Categoria</th>
                        <th>Sinopse</th>
                        <th>Data de Cadastro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']); ?></td>
                            <td><?= htmlspecialchars($row['tipo']); ?></td>
                            <td><?= htmlspecialchars($row['nome']); ?></td>
                            <td><?= $row['capitulo'] ? htmlspecialchars($row['capitulo']) : 'N/A'; ?></td>
                            <td><?= htmlspecialchars($row['categoria']); ?></td>
                            <td><?= htmlspecialchars($row['sinopse']); ?></td>
                            <td><?= htmlspecialchars($row['data_cadastro']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum cadastro encontrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
// Fechar conexão
$conn->close();
?>
