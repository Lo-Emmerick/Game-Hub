function selectItem(item){
    var quadro = document.getElementById('imgVizualizada');
    var nome = document.getElementById('itemName');
    var campoDescricao = document.getElementById('descricao');
    var preco = document.getElementById('preco');
    var imagem = item.getElementsByTagName('img');
    var descricao = item.getElementsByTagName('div');
    console.log(descricao[1].innerText);
    quadro.src = imagem[0].src;
    nome .innerText = imagem[0].alt;
    campoDescricao.innerText = descricao[0].innerText;
    preco.innerText = descricao[1].innerText;
}
