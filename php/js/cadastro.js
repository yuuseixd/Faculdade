// Adiciona um evento de clique ao botão "Clientes"
document.getElementById("clientesBtn").addEventListener("click", function() {
    // Redireciona para o arquivo clientes.php
    window.location.href = "clientes/clientes.php";
});

document.getElementById("vendedoresBtn").addEventListener("click", function() {
    // Redireciona para o arquivo clientes.php
    window.location.href = "vendedores/vendedores.php";
});

document.getElementById("produtosBtn").addEventListener("click", function() {
    // Redireciona para o arquivo clientes.php
    window.location.href = "produtos/produtos.php";
});

// Adiciona um evento de clique ao botão "Voltar"
document.getElementById("voltarBtn").addEventListener("click", function() {
    // Redireciona para o arquivo index.php
    window.location.href = "../index.php";
});