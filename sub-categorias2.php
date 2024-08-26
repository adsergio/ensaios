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
$nome_pag = 'sub-categorias.php';
 ?>

<?php 
//recuperar o nome da categoria para filtrar as subcategorias
$categoria_get = @$_GET['nome'];


$query = $pdo->query("SELECT * FROM categorias where nome_url = '$categoria_get' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_categoria = @$res[0]['id'];

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
            




    <div class="container-fluid">
    <div class="row ">
        <!-- Coluna de Categorias (Sidebar) -->
        <div class="col-lg-3 col-md-4">
            <div class="sidebar">
                <h5 class="section-title position-relative text-uppercase mx-xl-5">
                    <span class="bg-dark pr-3 text-light">Departamentos</span>
                </h5>
                <div class="sidebar__item ml-3">
                    <ul>
                        <?php 
                        $query = $pdo->query("SELECT * FROM categorias ORDER BY nome ASC");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);

                        for ($i=0; $i < count($res); $i++) { 
                            foreach ($res[$i] as $key => $value) {}

                            $nome = $res[$i]['nome'];
                            $nome_url = $res[$i]['nome_url'];
                        ?>
                            <li><a href="produto-<?php echo $nome_url ?>"><?php echo $nome ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Coluna de Subcategorias -->
        <div class="col-lg-9 col-md-8">
            <h5 class="px-xl-5">SUB DEPARTAMENTOS</h5>
            <div class="row px-xl-5 pb-3">
                <?php
                if ($categoria_get != "") {
                    $query = $pdo->query("SELECT * FROM sub_categorias WHERE id_categoria = '$id_categoria' ORDER BY nome ASC");
                } else {
                    $query = $pdo->query("SELECT * FROM sub_categorias ORDER BY nome ASC LIMIT $limite, $itens_por_pagina");
                }

                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                $total_sub = @count($res);
                if ($total_sub == 0) {
                    echo 'Não temos Sub departamento para este Departamento!';
                }

                for ($i = 0; $i < count($res); $i++) { 
                    foreach ($res[$i] as $key => $value) {}

                    $nome = $res[$i]['nome'];
                    $imagem = $res[$i]['imagem'];
                    $nome_url = $res[$i]['nome_url'];
                    $id = $res[$i]['id'];

                    // BUSCAR O TOTAL DE PRODUTOS EM CADA SUB-CATEGORIA
                    $query2 = $pdo->query("SELECT * FROM produtos WHERE sub_categoria = '$id'");
                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                    $itens = @count($res2);

                    //BUSCAR O TOTAL DE REGISTROS PARA PAGINAR
                        $query3 = $pdo->query("SELECT * FROM sub_categorias ");
                        $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                        $num_total = @count($res3);
                        $num_paginas = ceil($num_total/$itens_por_pagina);


                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <a class="text-decoration-none" href="sub-categoria-de-<?php echo $nome_url ?>">
                            <div class="cat-item img-zoom d-flex align-items-center mb-4">
                                <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                    <img class="img-fluid" src="img/sub-categorias/<?php echo $imagem ?>" alt="<?php echo $nome ?>">
                                </div>
                                <div class="flex-fill pl-3">
                                    <h6><?php echo $nome ?> </h6>
                                    <small class="text-body"><?php echo $itens ?> Itens</small>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>



<!-- paginação Inicio -->
    	<div class="col-12">
    		<?php if($categoria_get == "") { ?>
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

</div>
<!-- paginação Fim -->
     

  

    </html>

   <?php
   require_once("rodape.php");
   ?>
   

