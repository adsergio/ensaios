<?php
require_once("cabecalho.php");

?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">INÍCIO</a>
                  <span class="breadcrumb-item active">CONTATOS</span> 
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <div class="container-fluid">
     <!--   <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3 text-light">Contate-nos</span></h2>  -->
    </div>


<!-- Contact Section Begin -->
<section class="contact spad bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span><i class="fa fa-phone"></i></span>
                        <h4>Telefone</h4>
                        <p><?php echo $telefone ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_whatsapp">
                            <a target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $whatsapp_link ?>" title="<?php echo $whatsapp_loja ?>"><i class="fab fa-whatsapp text-info"></i></a>
                        </span>
                        <h4>Whatsapp</h4>
                        <p><?php echo $whatsapp ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span><i class="fa fa-history"></i></span>
                        <h4>Horário Atendimento</h4>
                        <p>09:00 ás 19:00 </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span><i class="fa fa-envelope"></i></span>
                        <h4>Email</h4>
                        <p><?php echo $email ?></p>
                    </div>
                </div>
            </div>
        </div>
</section>
    <!-- Contact Section End -->

    <!-- Contact Form Begin -->

<section>
    <div class="contact-form spad bg-transparent ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        
                    </div>
                </div>
            </div>
            <form method="post">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <input type="text" name="nome" id="nome" placeholder="Seu Nome">
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <input type="text" name="email" id="email" placeholder="Seu Email">
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <input type="text" name="telefone" id="telefone" placeholder="Seu Whatsapp">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea name="mensagem" id="mensagem" placeholder="Sua Mensagem"></textarea>
                        <button name="btn-enviar-email" id="btn-enviar-email" type="button" class="btn btn-lg btn-primary font-weight-bold py-3">Enviar</button>
                    </div>
                    
                    <div class="col-md-12 text-center mt-3 text-info" id="div-mensagem"></div>
                </div>
            </form>
        </div>
    </div>
</section>  
    <!-- Contact Form End -->

    <!-- Contact Start -->
    <div class="container-fluid">
                
        <div class="col-lg-12 mb-12">
                <div class="bg-light p-30 mb-30">
                    <iframe style="width: 100%; height: 250px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3750.9906357469226!2d-43.940128724014635!3d-19.924799438148113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa699e41bf81167%3A0xebaee7aff81f11c1!2sAv.%20Augusto%20de%20Lima%2C%20145%20-%20Centro%2C%20Belo%20Horizonte%20-%20MG%2C%2030190-001!5e0!3m2!1spt-BR!2sbr!4v1719250918447!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                
            </div>

    </div>
    <!-- Contact End -->


<?php  
require_once("rodape.php");

?>   

<!-- Contact Javascript File -->
<script type="text/javascript">
    
    $('#btn-enviar-email').click(function(event) {
        event.preventDefault();
        $('#div-mensagem').addClass('text-info')
        $('#div-mensagem').removeClass('text-danger')
        $('#div-mensagem').removeClass('text-success')
        $('#div-mensagem').text('Enviando')
        
         
        $.ajax({
            url:"enviar.php",
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg){
                if(msg.trim() === 'Enviado com Sucesso!'){  
                    $('#div-mensagem').removeClass('text-info')                 
                    $('#div-mensagem').addClass('text-success')
                    $('#div-mensagem').text(msg)
                    $('#email').val('');
                    $('#nome').val('');
                    $('#telefone').val('');
                    $('#mensagem').val('');

                }else if(msg.trim() === 'Preecha o Campo Nome'){
                    
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text(msg);
                 

                 }else if(msg.trim() === 'Preecha o Campo Mensagem'){
                    
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text(msg);
                 

                 }else if(msg.trim() === 'Preecha o Campo Email'){
                    
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text(msg);
                 }

                 else{
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text('Deu erro ao Enviar o Formulário! Provavelmente seu servidor de hospedagem não está com permissão de envio habilitada ou você está em um servidor local!');
                    //$('#div-mensagem').text(msg);
                }

            }
        })  
    })  
                
    
</script>