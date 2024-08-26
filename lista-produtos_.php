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


    
           
    <!-- Shop Produtos  -->
    <div class="container-fluid pt-5 pb-3">
        
        <div class="row px-xl-5">
            <?php 
                 $query = $pdo->query("SELECT * FROM produtos where ativo = 'Sim' and estoque > 0 order by vendas desc limit 8 ");
                 $res = $query->fetchAll(PDO::FETCH_ASSOC);

                 for ($i=0; $i < count($res); $i++) { 
                  foreach ($res[$i] as $key => $value) {
                  }

                  $nome = $res[$i]['nome'];
                  $valor = $res[$i]['valor'];
                  $nome_url = $res[$i]['nome_url'];
                  $imagem = $res[$i]['imagem'];
                  $promocao = $res[$i]['promocao'];
                  $id = $res[$i]['id'];

                  $valor = number_format($valor, 2, ',', '.');

                                  

                    ?>

            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-50" src="img/produtos/<?php echo $imagem ?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>                            
                            <a class="btn btn-outline-dark btn-square" href="produto-<?php echo $nome_url ?>"><i class="fa fa-eye"></i></a>
                            
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate"href="sub-categoria-de-<?php echo $nome_url ?>"><?php echo $nome ?>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>R$ <?php echo $valor ?> </h5>
                        </div>
                        </a>
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
    <!-- Shop produtos fim  -->
       
  

    <!-- Produtos em promoção inicio -->
    <div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3 text-light">Produtos em Promoção </span></h2>
    <h4 class="mx-xl-5 mb-4"><span><a class="text-muted" href="promocoes.php" title="Ver todas as Promoções"><small><i class="fa fa-eye mr-1"></i>Ver Todas</span></h4></small>
         <div class="row px-xl-5">
            <?php 
                 $query = $pdo->query("SELECT * FROM produtos where ativo = 'Sim' and estoque > 0 order by vendas desc limit 8 ");
                 $res = $query->fetchAll(PDO::FETCH_ASSOC);

                 for ($i=0; $i < count($res); $i++) { 
                  foreach ($res[$i] as $key => $value) {
                  }

                  $nome = $res[$i]['nome'];
                  $valor = $res[$i]['valor'];
                  $nome_url = $res[$i]['nome_url'];
                  $imagem = $res[$i]['imagem'];
                  $promocao = $res[$i]['promocao'];
                  $id = $res[$i]['id'];

                  $valor = number_format($valor, 2, ',', '.');

                                  

                    ?>

            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/produtos/<?php echo $imagem ?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>                            
                            <a class="btn btn-outline-dark btn-square" href="produto-<?php echo $nome_url ?>"><i class="fa fa-eye"></i></a>
                            
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate"href="sub-categoria-de-<?php echo $nome_url ?>"><?php echo $nome ?>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>R$ <?php echo $valor ?> </h5>
                        </div>
                        </a>
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
    <!-- Produtos em promoção fim -->

    

    </html>

   <?php
   require_once("rodape.php");
   ?>
   

