
   <?php  
   require_once("config.php");
   ?>
   
   <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-md-5 mb-5">
                        <div class="d-flex flex-column justify-content-start">
                        <h5 class="text-secondary text-uppercase mb-4">Endereço</h5>
                        <div class="">
                                <a  href="index.php"> <img src="img/logo.jpg"  width=75px height=75px></a>
                        </div>
                            <p class="mb-4"></p>
                            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Rua Tereza, 127 Bairro Castelo -  Belo Horizonte - MG</p>
                            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><?php echo $email?></ph>
                            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i><?php echo $telefone?></p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Acesso Rápido</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="produtos.php"><i class="fa fa-angle-right mr-2"></i>Lista de Produtos</a>
                            <a class="text-secondary mb-2" href="carrinho.php"><i class="fa fa-angle-right mr-2"></i>Carrinho</a>
                            <a class="text-secondary mb-2" href="checout.php"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary mb-2" href="blog.php"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                            <a class="text-secondary" href="contatos.php"><i class="fa fa-angle-right mr-2"></i>Contatos</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Cadastre-se</h5>
                        <p>Cadastre-se para receber efortas exclusicas e últimos lançamentos.</p>
                        <form action="">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Seu e-mail" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Siga nossas mídias sociais</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="https://api.whatsapp.com/send?l=pt-BR&phone=<?php echo $whatsapp_link?>"target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                <small> &copy;<script>document.write(new Date().getFullYear());</script> Todos os Produtos são Demonstrativos | Loja Virtual Demo <i class="fa fa-heart" aria-hidden="true"></i> by <a class="text-info" href="https://www.appssistemas.com.br" target="_blank">Portal Apps Sistemas</a></small>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    

    
    

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <!-- Mascaras CPF E-mail e Telefone Javascript -->
    <script src="js/mascara.js"></script>



    
</body>

</html>