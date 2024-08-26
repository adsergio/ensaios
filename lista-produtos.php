<?php
@session_start();
@$_SESSION['menu'] = 'prod';
require_once("cabecalho.php");
require_once("conexao.php");
?>

<?php 
//PEGAR PAGINA ATUAL PARA PAGINAÇAO
if(@$_GET['pagina'] != null){
    $pag = $_GET['pagina'];
}else{
    $pag = 0;
}

$limite = $pag * @$itens_por_pagina;
$pagina = $pag;
$nome_pag = 'lista-produtos.php';
?>


<?php 
//recuperar o nome da subcat para filtrar os produtos
$subcategoria_get = @$_GET['nome'];
$query = $pdo->query("SELECT * FROM sub_categorias where nome_url = '$subcategoria_get' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_subcategoria = @$res[0]['id'];
 ?>


 <?php 
//recuperar o valor inicial e valor final para filtrar produto
$valor_inicial = @$_GET['valor-inicial'];
$valor_final = @$_GET['valor-final'];
 ?>

<!-- Product Section Begin -->

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>DEPARTAMENTOS</h4>
                        <ul>
                            <?php 
                            $query = $pdo->query("SELECT * FROM categorias order by nome asc ");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);

                            for ($i=0; $i < count($res); $i++) { 
                              foreach ($res[$i] as $key => $value) {
                              }

                              $nome = $res[$i]['nome'];

                              $nome_url = $res[$i]['nome_url'];

                              ?>
                              <li><a href="sub-categoria-de-<?php echo $nome_url ?>"><?php echo $nome ?></a></li>

                          <?php } ?>

                      </ul>
                  </div>

                  <div class="sidebar__item">
                    <h4>SUB DEPARTAMENTOS</h4>
                    <ul>
                        <?php 
                        $query = $pdo->query("SELECT * FROM sub_categorias order by nome asc ");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);

                        for ($i=0; $i < count($res); $i++) { 
                          foreach ($res[$i] as $key => $value) {
                          }

                          $nome = $res[$i]['nome'];

                          $nome_url = $res[$i]['nome_url'];

                          ?>
                          <li><a href="produtos-<?php echo $nome_url ?>"><?php echo $nome ?></a></li>

                      <?php } ?>

                  </ul>
              </div>
<!-- FILTRAR VALOR INICIO -->

               

<!-- FILTRAR VALOR FIM -->

    </div>
</div>


<div class="col-lg-9 col-md-7">

       


        <?php
        if(@$_GET['txtBuscar'] != "") {
            $buscar = '%'.@$_GET['txtBuscar'].'%';
            $itens_por_pagina = 100;
        }else{
            $buscar = '%';
        }
        
        if($subcategoria_get == "" and $valor_inicial == "") {
        $query = $pdo->query("SELECT * FROM produtos where (nome LIKE '$buscar' or palavras like '$buscar') and ativo = 'Sim' order by id desc LIMIT $limite, $itens_por_pagina ");
        }else if($valor_inicial != ""){
            $query = $pdo->query("SELECT * FROM produtos where valor >= '$valor_inicial' and valor <= '$valor_final' and ativo = 'Sim' order by id desc");
        }

        else{
            $query = $pdo->query("SELECT * FROM produtos where sub_categoria = '$id_subcategoria' and ativo = 'Sim' order by id desc");
        }
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_prod = @count($res);
        if(@$_GET['txtBuscar'] != "" or @$id_subcategoria!= "" or @$valor_inicial!= "") {
        echo $total_prod.' Produtos Encontrados!';
        }

        echo '<div class="row mt-4">';

        for ($i=0; $i < count($res); $i++) { 
          foreach ($res[$i] as $key => $value) {
          }

          $nome = $res[$i]['nome'];
          $valor = $res[$i]['valor'];
          $nome_url = $res[$i]['nome_url'];
          $imagem = $res[$i]['imagem'];
          $promocao = $res[$i]['promocao'];
          $id = $res[$i]['id'];
          $estoque = $res[$i]['estoque'];

          if($estoque > 0){
            $classe_esgotado = 'none';
            $classe_carrinho = 'inline-block';
          }else{
             $classe_esgotado = 'block';
              $classe_carrinho = 'none';
          }

          $valor = number_format($valor, 2, ',', '.');

   //BUSCAR O TOTAL DE REGISTROS PARA PAGINAR
          $query3 = $pdo->query("SELECT * FROM produtos where ativo = 'Sim'");
          $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
          $num_total = @count($res3);
          $num_paginas = ceil($num_total/$itens_por_pagina);

          if($promocao == 'Sim'){
            $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
            $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
            $valor_promo = $resp[0]['valor'];
            $desconto = $resp[0]['desconto'];
            $valor_promo = number_format($valor_promo, 2, ',', '.');




            ?>

            <div class="col-lg-4 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4 text-center">
                    <div class="product__discount__item__pic product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/produtos/<?php echo $imagem ?>"  alt="">
                        <!-- Badge de desconto -->
                        <div class="product__discount__percent">-<?php echo $desconto?>% </div>
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                           <a class="btn btn-outline-dark btn-square" href="promocao-<?php echo $nome_url ?>"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate-1"href="sub-categoria-de-<?php echo $nome_url ?>"><?php echo $nome ?>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>R$ <?php echo $valor_promo ?> </h5>
                            <h6 class="text-muted ml-2"><del>R$ <?php echo $valor ?></del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star-half-alt text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>

    <?php }else{ ?>


     <div class="col-lg-4 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4 text-center">
                    <div class="product__discount__item__pic product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/produtos/<?php echo $imagem ?>"  alt="">
                        <!-- Badge de desconto -->
                        
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate-1"href="produto-<?php echo $nome_url ?>"><?php echo $nome ?>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>R$ <?php echo $valor ?> </h5>
                            <h6 class="text-muted ml-2"><del>R$ <?php echo $valor ?></del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star-half-alt text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>     

<?php } } ?>



</div>

</div>
            <div class="col-12">
                <?php if(@$categoria_get == "") { ?>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="<?php echo $nome_pag ?>?pagina=0">VOLTAR</span></a></li>
                            <?php 
                            for($i = 0; $i < @$num_paginas; $i++){
                                $estilo = '';
                                if($pagina == $i){
                                    $estilo = 'active';
                                }

                                if($pagina >= ($i - 2) && $pagina <= ($i + 2)){ ?>
                                    <li class="page-item <?php echo $estilo ?>"><a class="page-link" href=" <?php echo $nome_pag?>?pagina=<?php echo $i ?>"><?php echo $i + 1 ?></a></li>

                                <?php } 

                            }
                            ?>
                            <li class="page-item"><a class="page-link" href="<?php echo $nome_pag ?>?pagina=<?php echo $num_paginas - 1 ?>">PRÓXIMO</a></li>

                        </ul>
                    <?php } ?>
                </nav>
            </div>
        </div>

<!-- Product Section End -->

<?php

require_once("rodape.php");

?>