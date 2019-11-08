<?php
    require_once "cabecalho.php";
    require_once "class/conexao.php";
?>

<div class="container">
    <div class="produto-grid row d-flex justify-content-center">
        <div class="produto col-xl-2 offset-xl-1 col-lg-3 offset-lg-1 col-md-4 offset-md-1 col-sm-4 offset-sm-1 col-6 offset-1 recentes mt-4 rounded border border-secondary" v-for="produto in produtos" :key="produto.id">
            <div class="row d-flex justify-content-center">
    	    	<img :src="getImgUrl(produto.foto_produto)" class="imgProd rounded border-secondary">
            </div>
		    <div class="row d-flex justify-content-center">
                <h6><strong>{{produto.nome_produto}}</strong></h6>
            </div>
            <div class="row pl-2 pr-2">
                <h6> Preço: {{produto.preco}} Kg</h6>
            </div>
            <div class="row pl-2 pr-2">
                <h6> Mercado: {{produto.nome_mercado}}</h6>
            </div>
            <div class="row pl-2 pr-2">
                <h6> Visto em:{{produto.data_visu}} </h6>
            </div>
            <div class="row pl-2 pr-2">
                <h6><img src="imagens/{{produto.foto_usuario}}" style="width: 15%" class="rounded-circle"> {{produto.nome_completo}}</h6>
            </div>
            <p><button @click="addLike(produto)">Like</button><strong>{{produto.likes}}</strong></p>
        </div>
    </div>
</div>


<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>

<script>
    const router = new VueRouter({
        mode: 'history',

    })
    var vm = new Vue({
        router,
        el: ".container",
        data: {
            produtos: []

        },
        created() {
            cat = this.$route.query.cat
            if (cat) {
                this.getProdutos(cat)
            } else {
                this.getProdutos()
            }
        },
        methods: {
            getProdutos (cat){
                if (cat) {
                    axios.get('utils/getProdutos.php', {
                        params: {
                            cat: cat
                        }
                    })
                    .then(function (response) {
                        vm.produtos = response.data
                        console.log(vm.produtos)
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                } else {
                    axios.get('utils/getProdutos.php')
                    .then(function (response) {
                        vm.produtos = response.data
                        console.log(vm.produtos)
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                }
                
            },
            getImgUrl(imagem) {
                return 'imagens/alimentos/'+imagem
            },
            addLike(produto) {
                id = produto.id_produto
                axios.get('utils/likeProduto.php', {
                    params: {
                        id: id
                    }
                })
                    .then(function (response) {
                        produto.likes++        
                })
                    .catch(function (error) {
                        console.log(error);
                })
            }
        }
    })
</script>





<?php
	require_once "rodape.php";
?>