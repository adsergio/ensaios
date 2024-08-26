<?php
require_once("cabecalho.php");

?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->





    
            
    <!-- Products Promotion -->
    <div class="container pt-5 pb-3">
        <h5 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3 text-light">Produtos em Promoção </span></h5>
        <h4 class="mx-xl-5 mb-4"><span><a class="text-muted" href="promocoes.php" title="Ver todas as Promoções"><small><i class="fa fa-eye mr-1"></i>Ver Todas</span></h4></small>
        <div class="row px-xl-5">

            <?php 
                 $query = $pdo->query("SELECT * FROM produtos where ativo = 'Sim' and estoque > 0  and promocao = 'Sim' order by vendas desc limit 4 ");
                 $res = $query->fetchAll(PDO::FETCH_ASSOC);

                 for ($i=0; $i < count($res); $i++) { 
                  foreach ($res[$i] as $key => $value) {
                  }

                  $nome = $res[$i]['nome'];
                  $valor = $res[$i]['valor'];
                  $valor_integ = $res[$i]['valor'];
                  $nome_url = $res[$i]['nome_url'];
                  $imagem = $res[$i]['imagem'];
                  $promocao = $res[$i]['promocao'];
                  $id = $res[$i]['id'];

                    if($promocao == 'Sim'){
                  $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
                  $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
                  $valor = $resp[0]['valor'];
                  $desconto = $resp[0]['desconto'];
                  $valor = number_format($valor, 2, ',', '.');
                    }else{
                      $valor = number_format($valor, 2, ',', '.');
                    }

                                  

                    ?>

            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4 text-center">
                    <div class="product__discount__item__pic product-img position-relative overflow-hidden">
                        <img class="img-fluid w-75" src="img/produtos/<?php echo $imagem ?>"  alt="">
                        <!-- Badge de desconto -->
                        <div class="product__discount__percent">- <?php echo $desconto?>%</div>
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate"href="sub-categoria-de-<?php echo $nome_url ?>"><?php echo $nome ?>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>R$ <?php echo $valor ?> </h5>
                            <h6 class="text-muted ml-2"><del>R$ <?php echo $valor_integ ?></del></h6>
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
             <?php  } ?>
            
        </div>
    </div>
    <!-- Products Promotion End -->        
            

    <!-- featured products Start -->
    <div class="container pt-5 pb-3">

        <h5 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3 text-light">Produtos destaque</span></h5>
        <h4 class="mx-xl-5 mb-4"><span><a class="text-muted" href="promocoes.php" title="Ver + produtos"><small><i class="fa fa-eye mr-1"></i>Ver + produtos</span></h4></small>
        <div class="row px-xl-5">
            <?php 
                 $query = $pdo->query("SELECT * FROM produtos where ativo = 'Sim' and estoque > 0 order by vendas desc limit 16 ");
                 $res = $query->fetchAll(PDO::FETCH_ASSOC);

                 for ($i=0; $i < count($res); $i++) { 
                  foreach ($res[$i] as $key => $value) {
                  }

                  $nome = $res[$i]['nome'];
                  $valor = $res[$i]['valor'];
                  $valor_integ = $res[$i]['valor'];
                  $nome_url = $res[$i]['nome_url'];
                  $imagem = $res[$i]['imagem'];
                  $promocao = $res[$i]['promocao'];
                  $id = $res[$i]['id'];

                    if($promocao == 'Sim'){
                  $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
                  $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
                  $valor = $resp[0]['valor'];
                  $valor = number_format($valor, 2, ',', '.');
                  ?>
                  <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4 text-center">
                    <div class="product__discount__item__pic product-img position-relative overflow-hidden">
                        <img class="img-fluid w-75" src="img/produtos/<?php echo $imagem ?>"  alt="">
                        <!-- Badge de desconto -->
                        <div class="product__discount__percent">-20%</div>
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate"href="produto-<?php echo $nome_url ?>"><?php echo $nome ?>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>R$ <?php echo $valor ?> </h5>
                            <h6 class="text-muted ml-2"><del>R$ <?php echo $valor_integ ?></del></h6>
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
               <?php
                    }else{
                      $valor = number_format($valor, 2, ',', '.');
                      ?>

            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4 text-center">
                    <div class="product__discount__item__pic product-img position-relative overflow-hidden">
                        <img class="img-fluid w-75" src="img/produtos/<?php echo $imagem ?>"  alt="">
                        <!-- Badge de desconto -->
                        
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate"href="produto-<?php echo $nome_url ?>"><?php echo $nome ?>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>R$ <?php echo $valor ?> </h5>
                            <h6 class="text-muted ml-2"><del>R$ <?php echo $valor_integ ?></del></h6>
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
          <?php  } 

                    }

                 ?>                 

                    
        </div>
    </div>
    <!-- featured products End -->

    <!-- Combos Promocionais -->

    <div class="container pt-5 pb-3">
        <h5 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3 text-light">Combos mais vendidos</span></h5>
        <h4 class="mx-xl-5 mb-4"><span><a class="text-muted" href="combos.php" title="Ver + combos"><small><i class="fa fa-eye mr-1"></i>Ver + combos</span></h4></small>

        <div class="row px-xl-5">
            <?php 
            $query = $pdo->query("SELECT * FROM combos where ativo = 'Sim' order by vendas desc limit 8 ");
            $res = $query->fetchAll(PDO::FETCH_ASSOC);

            for ($i=0; $i < count($res); $i++) { 
              foreach ($res[$i] as $key => $value) {
              }

              $nome = $res[$i]['nome'];
              $valor = $res[$i]['valor'];
              $nome_url = $res[$i]['nome_url'];
              $imagem = $res[$i]['imagem'];

              $id = $res[$i]['id'];

              $valor = number_format($valor, 2, ',', '.');



              ?>

              <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden d-flex justify-content-center">
                        <img class="img-fluid" src="img/combos/<?php echo $imagem ?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="combo-<?php echo $nome_url ?>"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="produto-<?php echo $nome_url ?>"><?php echo $nome ?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>R$ <?php echo $valor ?></h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>

        <?php  } ?>
    </div>
</div>

    <!-- Combos End -->

</html>
<?php
require_once("rodape.php");
?>
   

