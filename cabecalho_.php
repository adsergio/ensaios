<?php
require_once("config.php");
require_once("conexao.php");

?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="utf-8">
    <title><?php echo $nome_loja?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="A loja Modelo Apps Sistemas é a maior loja de esportes com produtos fitness,
     de musculação, ciclismo, futebol, corrida, camping, trilha, natação e mais. Confira!" name="description">
    <meta content="fitness, musculação, ciclismo, futebol, corrida, camping, trilha, natação" name="keywords">
    

    <!-- Favicon -->
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <!-- <link href="img/favicon.png" rel="icon">-->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet d-block d-lg-none-->
     <!-- d-lg-none-->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <span class="text-light bg-dark px-2"><?php echo $email?></span>  
                </div>
            </div>
            <div class="col-lg-6  text-lg-right">
                
                <a href="https://instagram.com" target="_blank"" title="ir para instagram" class="btn px-0 ml-2 ">
                <i class="fab fa-instagram" style="color: #ffffff;"></i>                 
                </a>
                <a href="https://facebook.com" target="_blank"" title="ir para facebook"  class="btn px-0 ml-2 ">
                <i class="fab fa-facebook text-info" ></i>                 
                </a>
                <a href="sistema" target="_blank"" title="ir para Login"  class="btn px-0 ml-2 ">
                    <i class="fas fa-user text-light"></i>                    
                </a>
                
                                
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="carrinho.php" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a  href="index.php"> <img src="img/logo.jpg"  width=75px height=75px></a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar produtos">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Central de Atendimento</p>
                
            
                <div class="central__atendimento__phone">
                        <div class="central__atendimento__phone__icon">
                            <a href="https://api.whatsapp.com/send?1=pt-BR&phone=<?php echo $whatsapp_link?>" target="_blank"  title="<?php echo $whatsapp ?>"><i class="fab fa-whatsapp text-success"></i></a>
                        </div>
                        <div class="hero__search__phone__text">
                            <h6> <?php echo $telefone ?></h6>
                            <span></span>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-dark w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-white m-0"><i class="fa fa-bars mr-2"></i>CATEGORIAS</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-dark" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright ">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Roupas <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0 bg-dark">
                                <a href="" class="dropdown-item">Roupas de Homens</a>
                                <a href="" class="dropdown-item">Roupas de Mulheres</a>
                                <a href="" class="dropdown-item">Roupas de Crianças</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Camisas</a>
                        <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Roupas de banho</a>
                        <a href="" class="nav-item nav-link">Roupas de dormir</a>
                        <a href="" class="nav-item nav-link">Roupas esportivas</a>
                        <a href="" class="nav-item nav-link">Macacões</a>
                        <a href="" class="nav-item nav-link">Blazers</a>
                        <a href="" class="nav-item nav-link">Jaquetas</a>
                        <a href="" class="nav-item nav-link">Sapatos</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="index.php" class="text-decoration-none d-block d-lg-none">
                    <img src="img/logo.jpg" alt="" width=50px height=50px>
                    </a>
                    <div class="col-lg-4 col-6 text-right text-center d-block d-lg-none">
                        <div>
                            <p class="m-0">Central de Atendimento</p>
                            <p><h7 class="m-0 text-center" ><?php echo $telefone?> <i class="fab fa-whatsapp"></i></h7></p>
                        </div>
            </div>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">INÍCIO</a>
                             <!-- 
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">PRODUTOS <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-dark rounded-0 border-0 m-0">
                                    <a href="produtos.php" class="dropdown-item">PRODUTOS</a>
                                    <a href="lista-produtos.php" class="dropdown-item">LISTA DE PRODUTOS</a>
                                    <a href="lista-produtos.php" class="dropdown-item">CATEGORIAS</a>
                                </div>
                            </div> 
                             -->
                            <a href="produtos.php" class="nav-item nav-link">PRODUTOS</a>                           
                            <a href="lista-produtos.php" class="nav-item nav-link">LISTA DE PRODUTOS</a>
                            <a href="categorias.php" class="nav-item nav-link">CATEGORIAS</a>                           
                            <a href="contatos.php" class="nav-item nav-link">CONTATOS</a>
                            <a href="checkout.php" class="nav-item nav-link">CHECKOUT</a>
                           
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0">
                                <i class="fas fa-dollar-sign text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">R$ 789,45</span>
                            </a>
                            <a href="carrinho.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">3</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


   