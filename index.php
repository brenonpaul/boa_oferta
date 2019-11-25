<?php
session_start();
require_once "cabecalho.php";
require_once "class/conexao.php";

if (isset($_SESSION['usuario'])){

    $result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
    $resultado_usuario = mysqli_query($conexao, $result_usuario);

    while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
    ?>

        <div style="background-color: white;">
            <div class="container">
                <div class="w-100 row d-flex justify-content-center mt-1">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control" type="search" name="buscar" v-model="buscar" aria-label="Pesquisar" style="border-radius: 5px 0px 0px 5px" placeholder="Busque por um produto">
                        <button class="btn my-2 my-sm-0" type="submit" v-on:click.prevent="busca" id="buscar">Buscar</button>
                    </form>
                </div>
                <div class="produto-grid row">
                    <div class="produto col-xl-2 offset-xl-1 col-lg-3 offset-lg-1 col-md-4 offset-md-1 col-sm-4 offset-sm-1 col-6 offset-1 recentes mt-4 rounded border border-secondary" v-for="produto in produtos" :key="produto.id" style="background-color: white;">
                        <div class="row d-flex justify-content-center">
                            <img :src="getImgUrl(produto.foto_produto)" class="imgProd rounded border-secondary">
                        </div>
                        <div class="row d-flex justify-content-center">
                            <h6><strong>{{produto.nome_produto}}</strong></h6>
                        </div>
                        <div class="row pl-2 pr-2">
                            <h6> Preço: R$ {{produto.preco}}</h6>
                        </div>
                        <div class="row pl-2 pr-2">
                            <h6> Mercado: {{produto.nome_mercado}}</h6>
                        </div>
                        <div class="row pl-2 pr-2">
                            <h6> Visto em: 
                                <?php 
                                $data_visu = "{{produto.data_visu}}";
                            
                                echo $data_visu;
                             ?> 
                             </h6>
                        </div>
                        <div class="row pl-2 pr-2">

                        <?php 
                        if ($row_usuario['fk_id_tipo'] == 1){
                        ?>
                            
                            <a :href="getExcluirConta(produto.cpf)">
                                <h6>
                                    <img :src="getImgUrl2(produto.foto_usuario)" style="width: 15%" class="rounded-circle"> {{produto.nome_completo}}
                                </h6>
                            </a>

                        <?php }else{
                        ?>

                            <h6>
                                <img :src="getImgUrl2(produto.foto_usuario)" style="width: 15%" class="rounded-circle"> {{produto.nome_completo}}
                            </h6>

                            <?php } 
                            ?>

                        </div>
                        <p class="text-center">Preço atualizado?</p>
                        <div class="row pl-2 pr-2">
                            <div class="col-6">
                                <p>
                                    <button v-if='checkCurtida(produto.id_produto)' @click="addLike(produto)" class="btn p-1" style="background-color: #000080; color: white;">Sim
                                    </button>
                                    <br>
                                    <strong class="pl-2">{{produto.curtida}}</strong>
                                </p>
                            </div>
                            <div class="col-6">
                                <p>
                                    <button v-if='checkDescurtida(produto.id_produto)' @click="addDesc(produto)" class="btn p-1 pl-2m btn-danger" style="color: white;">Não
                                    </button>
                                    <br>
                                    <strong class="pl-4">{{produto.descurtida}}</strong>
                                </p>
                            </div>
                        </div>

                            <?php
                            if ($row_usuario['fk_id_tipo'] == 1){                        
                            ?>      

                                <div class="row text-center mb-1" style="margin-top: -8%;"> 
                                    <a :href="getExcluir(produto.id_produto)">
                                        <img src="imagens/lixeira.png" id="imgExcluir">
                                    </a>
                                </div>

                        <?php   }
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>

<?php }else{ 
?>
        <div style="background-color: white;">
            <div class="container">
                <div class="w-100 row d-flex justify-content-center mt-1">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control" type="search" name="buscar" v-model="buscar" aria-label="Pesquisar" style="border-radius: 5px 0px 0px 5px" placeholder="Busque por um produto">
                        <button class="btn my-2 my-sm-0" type="submit" v-on:click.prevent="busca" id="buscar">Buscar</button>
                    </form>
                </div>
                <div class="produto-grid row">
                    <div class="produto col-xl-2 offset-xl-1 col-lg-3 offset-lg-1 col-md-4 offset-md-1 col-sm-4 offset-sm-1 col-6 offset-1 recentes mt-4 rounded border border-secondary" v-for="produto in produtos" :key="produto.id" style="background-color: white;">
                        <div class="row d-flex justify-content-center">
                            <img :src="getImgUrl(produto.foto_produto)" class="imgProd rounded border-secondary">
                        </div>
                        <div class="row d-flex justify-content-center">
                            <h6><strong>{{produto.nome_produto}}</strong></h6>
                        </div>
                        <div class="row pl-2 pr-2">
                            <h6> Preço: R$ {{produto.preco}}</h6>
                        </div>
                        <div class="row pl-2 pr-2">
                            <h6> Mercado: {{produto.nome_mercado}}</h6>
                        </div>
                        <div class="row pl-2 pr-2">
                            <?php
                            
                            


                            ?>
                            <h6> Visto em: 
                            <?php 
                                $data_visu = "{{produto.data_visu}}";
                            
                                echo $data_visu;
                             ?> 

                        </h6>
                        </div>
                        <div class="row pl-2 pr-2">
                            <h6>   
                                <img :src="getImgUrl2(produto.foto_usuario)" style="width: 15%" class="rounded-circle"> {{produto.nome_completo}}
                            </h6>
                        </div>
                        <div class="row justify-content-center"> 
                            <p class="text-danger text-center">Entre em sua conta e avalie este produto!</p>
                        </div>
                        <div class="row pl-2 pr-2">
                            <div class="col-6">
                                <p>
                                    <button class="btn p-1" style="background-color: #000080; color: white;">Correto
                                    </button>
                                    <br>
                                    <strong class="pl-4">{{produto.curtida}}</strong>
                                </p>
                            </div>
                            <div class="col-6">
                                <p>
                                    <button class="btn p-1 pl-2m btn-danger" style="color: white;">Errado</button>
                                    <br>
                                    <strong class="pl-4">{{produto.descurtida}}</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php } 
?>

<script src="js/vue_router.js"></script>
<script>
    const router = new VueRouter({
        mode: 'history',
    })
    var vm = new Vue({
        router,
        el: ".container",
        data: {
            produtos: [],
            buscar: '',
        },
        created() {
            cat = this.$route.query.cat
            if (cat) {
                this.getProdutos(cat)
            } else {
                this.getProdutos()
            }
            window.addEventListener('beforeunload', this.handler)
        },
        methods: {
            handler(event) {
            },
            busca() {
                axios.get('utils/getProdutos.php', {
                    params: {
                        buscar: this.buscar
                    }
                })
                .then(function (response) {
                    vm.produtos = response.data
                    console.log(vm.produtos)
                })
                .catch(function (error) {
                    console.log(error);
                })
            },
            checkCurtida(produto) {
                produto_id = produto
                if(produto_id){
                    axios.get('utils/verificarCurt.php',{
                        params:{
                            produto_id: produto_id
                        }
                    }) 
                    .then(function (response) {
                    })
                    return true
                }
            },
            checkDescurtida(produto) {
                produto_id = produto
                if(produto_id){
                    axios.get('utils/verificarDesc.php',{
                        params:{
                            produto_id: produto_id
                        }
                    }) 
                    .then(function (response) {
                    })
                    return true
                }
            },
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
            getImgUrl2(imagem2) {
                return 'imagens/'+imagem2
             },
            getExcluir(id) {
                return 'exclusaoProduto.php?id='+id
             },
            getExcluirConta(cpf) {
                return 'exclusaoConta.php?cpf='+cpf
             },
            addLike(produto) {
                id = produto.id_produto
                axios.get('utils/likeProduto.php', {
                    params: {
                        id: id
                    }
                })
                .then(function (response) {
                    arrayId = localStorage.getItem('id')
                    arrayId = (arrayId) ? JSON.parse(arrayId) : [];
                    if (arrayId.includes(id)) {
                        index = arrayId.indexOf(id)
                        arrayId.splice(index, 1)
                        localStorage.setItem('id', JSON.stringify(arrayId))
                        produto.curtida--
                    }else {
                        arrayId.push(id)
                        localStorage.setItem('id', JSON.stringify(arrayId))
                        produto.curtida++
                    }
                })
                .catch(function (error) {
                    console.log(error);
                })
            }, 
            addDesc(produto) {
                id = produto.id_produto
                axios.get('utils/deslikeProduto.php', {
                    params: {
                        id: id
                    }
                })
                .then(function (response) {
                    arrayId = localStorage.getItem('id')
                    arrayId = (arrayId) ? JSON.parse(arrayId) : [];
                    if (arrayId.includes(id)) {
                        index = arrayId.indexOf(id)
                        arrayId.splice(index, 1)
                        localStorage.setItem('id', JSON.stringify(arrayId))
                        produto.descurtida--
                    }else {
                        arrayId.push(id)
                        localStorage.setItem('id', JSON.stringify(arrayId))
                        produto.descurtida++
                    }
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