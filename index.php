<?php
require_once("cabecalho.php");

?>
    <!-- Topbar Start -->
    
 <!-- Carousel Start -->
 <div class="container-fluid py-1 ">
        <div class="row ">
            <div class="col-lg-12">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                        <li data-target="#header-carousel" data-slide-to="3"></li>
                        
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/banner-principal/carousel-1.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 1000px;">
                                    
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/banner-principal/carousel-2.png" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 1000px;">
                                    
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/banner-principal/carousel-3.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 1000px;">
                                    
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                         <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/banner-principal/carousel-4.png" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 1000px;">
                                    
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
        </div>
    </div>
    <!-- Carousel End -->




    <!-- Sub-categories Start -->
    <div class="container-fluid pt-5">
        <h5 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-dark pr-3 text-light" >Sub-Departamentos</span></h5>
        <div class="row px-xl-5 pb-3">

            <?php 
                       $query = $pdo->query("SELECT * FROM sub_categorias order by nome limit 8 ");
                       $res = $query->fetchAll(PDO::FETCH_ASSOC);

                       for ($i=0; $i < count($res); $i++) { 
                        foreach ($res[$i] as $key => $value) {
                        }

                        $nome = $res[$i]['nome'];   
                        $imagem = $res[$i]['imagem'];                     
                        $nome_url = $res[$i]['nome_url'];
                        $id = $res[$i]['id'];

                        $query2 = $pdo->query("SELECT * FROM produtos where sub_categoria = '$id' ");
                        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                        $itens = @count($res2);

            ?>



            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="produtos-<?php echo $nome_url ?>">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/sub-categorias/<?php echo $imagem ?>" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?php echo $nome ?></h6>
                            <small class="text-body"><?php echo $itens?> Produtos </small>
                        </div>
                    </div>
                </a>
            </div>
          <?php } ?>

        </div>
    </div>
    <!-- Sub-categories end -->
   

    <!-- featured products -->
    <div class="container-fluid pt-5 pb-3">

        <h5 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3 text-light">Produtos destaque</span></h5>
        <span class="mx-xl-5 mb-4" ><a class= "text-dark" href="promocoes.php">VER + PRODUTOS >> </a></span>
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
                  $valor_integ = number_format($valor_integ, 2, ',', '.');
                    if($promocao == 'Sim'){
                  $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
                  $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
                  $valor = $resp[0]['valor'];
                  $desconto = $resp[0]['desconto'];
                  $valor = number_format($valor, 2, ',', '.');
                  ?>
                  <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4 text-center">
                    <div class="product__discount__item__pic product-img position-relative overflow-hidden">
                        <img class="img-fluid w-75" src="img/produtos/<?php echo $imagem ?>"  alt="">
                        <!-- Badge de desconto -->
                        <div class="product__discount__percent">-<?php echo $desconto?>% </div>
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                           <a class="btn btn-outline-dark btn-square" href="promocao-<?php echo $nome_url ?>"><i class="fa fa-eye"></i></a>
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

<!-- Vendor Start -->
    
    <div class="container-fluid py-5">
        <h5 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3 text-light">Podutos</span></h5>
        <div class="row">
        <span class="mx-xl-4 mb-4" ><a class= "text-dark" href="produtos.php">VER + PRODUTOS >> </a></span>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">

                    <?php 
                 $query = $pdo->query("SELECT * FROM produtos where ativo = 'Sim' and estoque > 0 order by vendas  ");
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

                    if($promocao == 'Sim'){
                  $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
                  $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
                  $valor = $resp[0]['valor'];
                  $valor = number_format($valor, 2, ',', '.');
                    }else{
                      $valor = number_format($valor, 2, ',', '.');
                    }

                                  

                    ?>

                    <div class="bg-light p-4">
                        <img src="img/produtos/<?php echo $imagem ?>"alt="">
                        <div class="carousel-caption-cat d-flex flex-column ">
                            <div class="" style="max-width: 1000px;">

                                <a class="btn btn-outline-dark" href="#">Ver agora</a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate"href="produto.php"><small><?php echo $nome ?></small>
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
                        
                                        
                    <?php  } ?>
                    
                   
                </div>
            </div>

        </div>
    </div>

    <!-- Vendor End -->

<!-- Promoções Inicio -->
 <div class="container-fluid py-1 ">
        <div class="row ">

            <?php 
                 $query = $pdo->query("SELECT * FROM promocao_banner where ativo = 'Sim'");
                 $res = $query->fetchAll(PDO::FETCH_ASSOC);

                 for ($i=0; $i < count($res); $i++) { 
                  foreach ($res[$i] as $key => $value) {
                  }

                  $link = $res[$i]['link'];                  
                  $imagem = $res[$i]['imagem'];
                  $titulo = $res[$i]['titulo'];
                 


                  

                                  

                    ?>
            <div class="col-lg-12">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        
                        
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/promocoes/<?php echo $imagem ?>" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 1000px;">
                                    
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="<?php echo $link ?> "title="<?php echo $titulo ?>">Compre agora</a>
                                </div>
                            </div>
                        </div>
                        
                        
                </div>
            </div>
       
        </div>

        <?php  } ?>
    </div>
    <!-- Promoções  Fim -->

    <!-- Combos Promocionais -->

    <div class="container-fluid pt-5 pb-3">
        <h5 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3 text-light">Combos de Promocionais</span></h5>
        <div class="row px-xl-5">
            <?php 
            $query = $pdo->query("SELECT * FROM combos where ativo = 'Sim' limit 4 ");
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




     <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Qualidade</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Maior estoque do Brasil</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Entrega rápida</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Atendimento Qualificado</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->

    


<?php
require_once("rodape.php");
?>