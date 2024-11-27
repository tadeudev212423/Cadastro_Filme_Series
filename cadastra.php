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

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Capturar dados do formulário
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : null;
    $nome = isset($_POST['nome']) ? $conn->real_escape_string($_POST['nome']) : null;
    $capitulo = isset($_POST['capitulo']) ? (int)$_POST['capitulo'] : null;
    $categoria = isset($_POST['categoria']) ? implode(", ", $_POST['categoria']) : null;
    $sinopse = isset($_POST['sinopse']) ? $conn->real_escape_string($_POST['sinopse']) : null;

    // Validar campos obrigatórios
    if (!$tipo || !$nome || !$categoria || !$sinopse) {
        die("Por favor, preencha todos os campos obrigatórios.");
    }

    // Inserir no banco de dados
    $sql = "INSERT INTO filmes_series (tipo, nome, capitulo, categoria, sinopse) 
            VALUES ('$tipo', '$nome', " . ($capitulo ? $capitulo : "NULL") . ", '$categoria', '$sinopse')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso! <a href='visualiza.php'>Ver Cadastros</a>";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}

// Fechar conexão
$conn->close();
?>
