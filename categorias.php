<?php
@session_start();
@$_SESSION['menu'] = 'cat';
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
$nome_pag = 'categorias.php';
 ?>

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">

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




              </div>
          </div>


          <div class="col-lg-9 col-md-7">

<h5>CATEGORIAS</h5>

            <div class="row mt-4">

               <?php 
               $query = $pdo->query("SELECT * FROM categorias order by nome asc LIMIT $limite, $itens_por_pagina");
               $res = $query->fetchAll(PDO::FETCH_ASSOC);

               for ($i=0; $i < count($res); $i++) { 
                  foreach ($res[$i] as $key => $value) {
                  }

                  $nome = $res[$i]['nome'];
                  $imagem = $res[$i]['imagem'];
                  $nome_url = $res[$i]['nome_url'];
                  $id = $res[$i]['id'];

                  $query2 = $pdo->query("SELECT * FROM sub_categorias where id_categoria = '$id' ");
                  $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                  $total_itens = @count($res2);

                  //BUSCAR O TOTAL DE REGISTROS PARA PAGINAR
                  $query3 = $pdo->query("SELECT * FROM categorias ");
                  $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                  $num_total = @count($res3);
                  $itens = @count($res2);
                  $num_paginas = ceil($num_total/$itens_por_pagina);

                  ?>

                  <div class="col-lg-4 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" href="sub-categoria-de-<?php echo $nome_url ?>">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/categorias/<?php echo $imagem ?>" alt="<?php echo $nome ?>">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?php echo $nome ?> </h6>
                            <small class="text-body"> <?php echo $itens ?> Sub Departamentos </small>
                        </div>
                    </div>
                </a>
            </div>

                <?php } ?>






            </div>
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

        </div>
    </div>
</div>
</section>
<!-- Product Section End -->

<?php
require_once("rodape.php");
?>