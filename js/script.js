function calcularDesconto(valor, desconto) {
    let novoValor = valor - valor * desconto / 100;
    return novoValor.toFixed(2);
}

function toReal(dolar){
    return dolar.toString().replace(".", ",")
}


function selecionarProdutos() {
    const url = "./includes/select/select-produto.php";
    fetch(url, {
        method: "GET",
    }).then((response) => {
        return response.json()
    }).then((text) => {
        // console.log(text);
        text.forEach(produto => {
            exibirCarousel(produto)
            exibirCard(produto)
        });
        selecionarCategorias()
    }).catch((error) => {
        console.error(error);
    });
}

function exibirCarousel(produto) {
    // carousel
    let url = "./includes/html/carousel-item.php";
    let formData = new FormData();
    formData.append('vl_produto', produto['vl_produto'].toFixed(2));
    formData.append('pc_desconto', produto['pc_desconto']);
    formData.append('nm_promocao', produto['nm_promocao']);
    formData.append('nm_produto', produto['nm_produto']);
    formData.append('ds_produto', produto['ds_produto']);
    formData.append('cd_produto', produto['cd_produto']);
    formData.append('nm_imagem_produto', produto['nm_imagem_produto']);

    fetch(url, {
        method: "POST",
        body: formData,
    }).then((response) => {
        return response.text()
    }).then((text) => {
        // console.log(text);
        let carousel = document.getElementById("main-carousel");
        carousel.innerHTML += text
    }).catch((error) => {
        console.error(error);
    });
}

function exibirCard(produto) {
    // carousel
    let url = "./includes/html/card-item.php";
    let formData = new FormData();
    formData.append('nm_produto', produto['nm_produto']);
    formData.append('ds_produto', produto['ds_produto']);
    formData.append('nm_imagem_produto', produto['nm_imagem_produto']);
    formData.append('cd_produto', produto['cd_produto']);
    fetch(url, {
        method: "POST",
        body: formData,
    }).then((response) => {
        return response.text()
    }).then((text) => {
        // console.log(text);
        let card = document.getElementById("div-card");
        card.innerHTML += text;
    }).catch((error) => {
        console.error(error);
    });
}

function selecionarCategorias() {
    let url = "./includes/select/select-categoria.php";
    fetch(url, {
        method: "GET",
    }).then((response) => {
        return response.json()
    }).then((text) => {
        text.forEach(categoria => {
            exibirCategorias(categoria)
        });
    }).catch((error) => {
        console.error(error);
    });
}
function exibirCategorias(categoria) {
    let url = "./includes/html/carousel-categoria.php";
    // console.log(categoria);
    let formData = new FormData();
    formData.append('nm_categoria', categoria['nm_categoria']);
    formData.append('nm_icone_categoria', categoria['nm_icone_categoria']);
    fetch(url, {
        method: "POST",
        body: formData,
    }).then((response) => {
        return response.text()
    }).then((text) => {
        const div = document.getElementById("div-categoria");
        div.innerHTML += text;
    }).catch((error) => {
        console.error(error);
    });
}
function exibirProdutoWhere() {
    let url = "./includes/select/select-produto-where.php";
    let formData = new FormData();
    const urlParams = new URLSearchParams(window.location.search);
    const cd = urlParams.get("cd");
    formData.append('cd_produto', cd);
    fetch(url, {
        method: "POST",
        body: formData,
    }).then((response) => {
        return response.json()
    }).then((produto) => {
        // console.log(produto[0]);
        let img = document.getElementById("img-produto");
        let nome = document.getElementById("nome-produto");
        let desc = document.getElementById("ds-produto");
        let valor = document.getElementById('preco-produto');

        if (produto[0]['pc_desconto'] === null) {
            document.getElementById('div-desconto').hidden = true;
            let divPreco = document.getElementById('div-preco');
            valor.innerText = "R$:" + toReal(produto[0]['vl_produto']);
            divPreco.classList.remove("align-self-end");
            divPreco.classList.add("align-self-center");
        } else {
            let valorAntigo = document.getElementById('valor-antigo-produto');
            let desconto = document.getElementById('desconto-produto');

            valorAntigo.innerText = "R$:" + toReal(produto[0]['vl_produto']);
            desconto.innerText = produto[0]['pc_desconto'] + "% de Desconto";
            let novoPreco = calcularDesconto(produto[0]['vl_produto'], produto[0]['pc_desconto']);
            valor.innerText = "R$:" + toReal(novoPreco);
        }


        img.src = "./assets/img/" + produto[0]['nm_imagem_produto'];
        nome.innerText = produto[0]['nm_produto'].slice(0, 30) + "...";
        desc.innerText = produto[0]['ds_produto'].slice(0, 30) + "...";
    }).catch((error) => {
        console.error(error);
    });
}


function exibirProdutoCategoria() {
    // carousel
    let url = "./includes/select/select-produto-por-categoria.php";
    let formData = new FormData();
    const urlParams = new URLSearchParams(window.location.search);
    const categoria = urlParams.get("categoria");
    formData.append('categoria', categoria);
    fetch(url, {
        method: "POST",
        body: formData,
    }).then((response) => {
        return response.text()
    }).then((text) => {
        // console.log(text);
        let card = document.getElementById("div-produtos");
        card.innerHTML += text;
    }).catch((error) => {
        console.error(error);
    });
}
// koé goat uncle drew e tesouro tão me iludindo 
const input = document.getElementById("input-search");
input.addEventListener("keyup", buscarProduto);


function buscarProduto(){
    let url = "./includes/select/select-search-produto.php";
    // console.log(input.value);
    let formData = new FormData();
    formData.append('nm_produto', input.value);
    fetch(url, {
        method: "POST",
        body: formData,
    }).then((response) => {
        return response.text()
    }).then((text) => {
        // console.log(text);
        let divSearch = document.querySelector(".div-search-return");
        divSearch.innerHTML = text;

    }).catch((error) => {
        console.error(error);
    });
}


document.getElementById("input-search").addEventListener("focusin", (e) => {
    document.querySelector(".div-search-return").hidden = false;
});

document.getElementById("input-search").addEventListener("focusout", (e) => {
    const myTimeout = setTimeout(function(){
        document.querySelector(".div-search-return").hidden = true;
    }, 100);

});

function exibirPesquisa(){
    let url = "./includes/select/search-produto.php";
    const urlParams = new URLSearchParams(window.location.search);
    const search = urlParams.get("search");
    let formData = new FormData();
    formData.append('search', search);
    fetch(url, {
        method: "POST",
        body: formData,
    }).then((response) => {
        return response.text()
    }).then((text) => {
        // console.log(text);
        let divSearch = document.querySelector("#div-produtos");
        divSearch.innerHTML = text;

    }).catch((error) => {
        console.error(error);
    });
}