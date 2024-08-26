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
$nome_pag = 'categorias.php';
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
            


    <!-- Categorias Inicio -->
    <div class="container-fluid pt-5">
        <h5 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-dark pr-3 text-light">Departamentos</span></h5>

        <div class="row">
            <div class="col-sm-3">
                <div class="col-lg-10 col-md-5">
                    <div class="sidebar">

                        <div class="sidebar__item" ml-3>
                            
                            <ul>
                                <?php 
                                $query = $pdo->query("SELECT * FROM categorias order by nome asc");
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
                  </div>  



              </div>
          </div>
          <div class="col-lg-9 col-md-7">

          <h5 class="py-2">Lista de Departamentos</h5>
          <div class="col-9"><div class="row px-xl-5 pb-3">
            
            
            
            
                   
               <?php 
                       $query = $pdo->query("SELECT * FROM categorias order by nome LIMIT $limite, $itens_por_pagina ");
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
                          $itens = @count($res2);

                          //BUSCAR O TOTAL DE REGISTROS PARA PAGINAR
                          $query3 = $pdo->query("SELECT * FROM categorias ");
                          $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                          $num_total = @count($res3);
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
</div>
          </div>
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

     <!-- paginação Inicio -->
<!--
      <div class="col-12">
                        <nav>
                          <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">VOLTAR</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">PRÓXIMO</a></li>
                          </ul>
                        </nav>
                    </div>

        
    </div>
    -->
     <!-- paginação Fim -->


  

    </html>

   <?php
   require_once("rodape.php");
   ?>
   

