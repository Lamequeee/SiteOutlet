<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylecompra.css">
    <link rel="stylesheet" href="stylecriar.css">
</head>
<body>
    <header class="fundopreto-lado">
        <div class="titulo-imagem-lado">
 
         <div class="imagem-lado">
             <img src="img/icon.webp" alt="mascote">
         </div>
 
         <div id="titulo-lado">
             <h1>Sabel outlet!</h1>
             <p>Vendas no atacado e varejo</p>
         </div>
     </div>
     </header>
     <main class="main-buy">
     <div class="container">
        <div class="criar">
        <form action="SiteOutlet/crud_roupa.php" method="post">
        
            <h2>Criar Card</h2>
            <input type="text" id="nome" placeholder="Nome"><br><br>
            <input type="text" id="descricao" placeholder="Descrição"><br><br>
            <input type="file" id="imagem" accept="image/*"><br><br>
            <input type="number" id="preco" placeholder="Preço"><br><br>
            <button onclick="criarCardRoupa()">Criar Card</button>
       
    </form>
</div> 
        
        <div class="card-container"></div>
    </div>
</main>
<footer>

</footer>
</body>
<script>
    function criarCardRoupa() {
        var nome = document.getElementById("nome").value;
        var descricao = document.getElementById("descricao").value;
        var imagemInput = document.getElementById("imagem");
        var imagem = imagemInput.files[0];
        var preco = document.getElementById("preco").value;

        var formData = new FormData();
        formData.append('nome', nome);
        formData.append('descricao', descricao);
        formData.append('imagem', imagem);
        formData.append('preco', preco);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'salvar_card.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert('Card criado com sucesso!');
            } else {
                alert('Erro ao criar o card. Por favor, tente novamente.');
            }
        };
        xhr.send(formData);
    }

</script>
</html>