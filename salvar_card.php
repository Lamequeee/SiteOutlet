<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta ao banco de dados (substitua as credenciais pelos seus próprios)
    $conn = new mysqli("http://127.0.0.1:5500/", "root", "aluno", "sabel");

    // Verifica se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Obtém os dados do POST
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $imagem = $_FILES['imagem']['name'];
    $preco = $_POST['preco'];

    // Move o arquivo de imagem para o diretório desejado
    move_uploaded_file($_FILES['imagem']['tmp_name'], 'imagens/' . $imagem);

    // Insere os dados na tabela de cards
    $sql = "INSERT INTO cards (nome, descricao, imagem, preco) VALUES ('$nome', '$descricao', '$imagem', $preco)";
    if ($conn->query($sql) === TRUE) {
        echo "Card criado com sucesso!";
    } else {
        echo "Erro ao criar o card: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
