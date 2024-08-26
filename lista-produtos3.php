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
$nome_pag = 'lista-produtos3.php';
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

            <!-- Shop Product Start -->




<!-- Shop Product Start -->
<!-- Categorias Inicio -->
<div class="container-fluid pt-5">
    <div class="row">
        <!-- Título de Departamentos -->
        <div class="col-lg-2 col-md-3 col-sm-3 ">
            <h5 class=" position-relative text-uppercase mb-4"><span class="bg-dark pr-3 text-light">Departamentos</span></h5>
        </div>
        
        <!-- Título de Produtos -->
        <div class="col-lg-10 col-md-9 col-sm-9">
            <h5 class=" text-uppercase mb-4">Produtos</h5>
        </div>
    </div>

    <div class="row">
        <!-- Sidebar de Categorias -->
        <div class="col-lg-2 col-md-3 col-sm-3">
            <div class="sidebar">
                <div class="sidebar__item ml-3">
                    <ul>
                        <?php 
                        $query = $pdo->query("SELECT * FROM categorias ORDER BY nome ASC");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);

                        for ($i = 0; $i < count($res); $i++) { 
                            $nome = $res[$i]['nome'];
                            $nome_url = $res[$i]['nome_url'];
                        ?>
                            <li><a href="sub-categoria-de-<?php echo $nome_url ?>"><?php echo $nome ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>



        <!-- Área de Produtos -->
        <div class="col-lg-10 col-md-9">
            <div class="row px-xl-5 pb-3">
                <?php 
                $query = $pdo->query("SELECT * FROM categorias ORDER BY nome LIMIT $limite, $itens_por_pagina ");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);

                for ($i = 0; $i < count($res); $i++) { 
                    $nome = $res[$i]['nome'];   
                    $imagem = $res[$i]['imagem'];                     
                    $nome_url = $res[$i]['nome_url'];
                    $id = $res[$i]['id'];

                    // Busca o total de produtos na subcategoria
                    $query2 = $pdo->query("SELECT * FROM sub_categorias WHERE id_categoria = '$id'");
                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                    $itens = @count($res2);

                       //BUSCAR O TOTAL DE REGISTROS PARA PAGINAR
                    $query3 = $pdo->query("SELECT * FROM categorias ");
                    $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                    $num_total = @count($res3);
                    $num_paginas = ceil($num_total/$itens_por_pagina);

                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-75" src="img/produtos/product-1.jpg" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>                            
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="produto.php">Câmera Canon Profissional 24.1mp</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>R$9.612,10</h5><h6 class="text-muted ml-2"><del>R$10.223,00</del></h6>
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
                <?php } ?>
            </div>
        </div>
    </div>





    

    <!-- Paginação -->
    <div class="col-12">
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="<?php echo $nome_pag ?>?pagina=0">VOLTAR</a></li>
                <?php 
                for ($i = 0; $i < @$num_paginas; $i++) {
                    $estilo = '';
                    if ($pagina == $i) {
                        $estilo = 'active';
                    }

                    if ($pagina >= ($i - 2) && $pagina <= ($i + 2)) { ?>
                        <li class="page-item <?php echo $estilo ?>"><a class="page-link" href="<?php echo $nome_pag?>?pagina=<?php echo $i ?>"><?php echo $i + 1 ?></a></li>
                    <?php } 
                } ?>
                <li class="page-item"><a class="page-link" href="<?php echo $nome_pag ?>?pagina=<?php echo $num_paginas - 1 ?>">PRÓXIMO</a></li>
            </ul>
        </nav>
    </div>
</div>





    

    </html>

   <?php
   require_once("rodape.php");
   ?>
   

