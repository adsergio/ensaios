<?php
require_once("cabecalho.php");

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
$nome_pag = 'promocoes.php';
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


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            


    <!-- Sub-categorias Inicio -->
    <div class="container-fluid pt-5">
        <h5 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-dark pr-3 text-light">Sub departamentos</span></h5>

        <div class="row">
            <div class="col-sm-3">
                <div class="col-lg-10 col-md-5">
                    <div class="sidebar">

                        <div class="sidebar__item" ml-3>

                            <ul>
                                <?php 
                                $query = $pdo->query("SELECT * FROM sub_categorias order by nome asc");
                                $res = $query->fetchAll(PDO::FETCH_ASSOC);

                                for ($i=0; $i < count($res); $i++) { 
                                  foreach ($res[$i] as $key => $value) {
                                  }

                                  $nome = $res[$i]['nome'];

                                  $nome_url = $res[$i]['nome_url'];

                                  ?>
                                  <li><a href="produto-<?php echo $nome_url ?>"><?php echo $nome ?></a></li>

                              <?php } ?>

                          </ul>
                      </div>
                  </div>  



              </div>
          </div>
    <!-- Sub-categorias Fim --> 

    <!-- Promotion Start -->


          <div class="col-lg-9 col-md-7">

          <h5 class="py-2">Lista de Promoções</h5>
          <div class="col-9"><div class="row px-xl-5 pb-3">
            
          
            
            
                   
               <?php 
                       $query = $pdo->query("SELECT * FROM produtos WHERE promocao = 'Sim' order by id LIMIT $limite, $itens_por_pagina ");
                       $res = $query->fetchAll(PDO::FETCH_ASSOC);

                       for ($i=0; $i < count($res); $i++) { 
                        foreach ($res[$i] as $key => $value) {
                        }

                        $nome = $res[$i]['nome'];
                        $promocao = $res[$i]['promocao'];    
                        $imagem = $res[$i]['imagem'];                     
                        $nome_url = $res[$i]['nome_url'];
                        $valor = $res[$i]['valor'];
                        $valor_integ = $res[$i]['valor'];
                        $id = $res[$i]['id'];
                        $valor_integ = number_format($valor_integ, 2, ',', '.');

                        
                                        

                      
                      //BUSCAR O TOTAL DE REGISTROS PARA PAGINAR
                      $query3 = $pdo->query("SELECT * FROM produtos where promocao = 'Sim' ");
                      $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                      $num_total = @count($res3);
                      $num_paginas = ceil($num_total/$itens_por_pagina);

                      
                      $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
                      $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
                      $valor = $resp[0]['valor'];
                      $desconto = $resp[0]['desconto'];
                      $valor = number_format($valor, 2, ',', '.');
                    

                      


            ?>
            <div class="col-lg-4 col-md-4 col-sm-6 pb-1">
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
             
            <?php } ?>
        </div>
</div>
          </div>
      </div>
 <!-- Promotion End -->




 <!-- paginação Inicio -->
 <div class="col-12">
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
</nav>
</div>        
</div>
 <!-- paginação Fim -->



   
  

    </html>

   <?php
   require_once("rodape.php");
   ?>
   

