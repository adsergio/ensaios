<?php


require_once("../conexao.php");

//VERIFICAR SE EXISTE ALGUM CADASTRO NO BANCO, SE NÃO TIVER CADASTRAR O USUÁRIO ADMINISTRADOR
    $res = $pdo->query("SELECT * FROM usuarios"); 
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $senha_crip = md5('123');
    if(@count($dados) == 0){
      $res = $pdo->query("INSERT into usuarios (nome, cpf, email, senha, senha_crip, nivel, imagem) values ('Administrador', '000.000.000-00', '$email', '123', '$senha_crip', 'Admin', 'sem-foto.jpg')");
    }


?>



<!DOCTYPE html>
<html>
<head>
   <title>Login - <?php echo $nome_loja ?></title>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <link href="../css/login.css" rel="stylesheet">
      <script src="../js/login.js"></script>


<link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
<link rel="icon" href="../img/favicon.ico" type="image/x-icon">

</head>

<body>
    <div class="container">
        <div class="row">
         <div class="col-md-5 mx-auto">
         <div id="first">
            <div class="myform form ">
                <div class="logo mb-3">
                   <div class="col-md-12 text-center">
                     <h1>Login</h1>
                   </div>
               </div>
                   <form action="autenticar.php" method="post" name="login">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email ou CPF</label>
                              <input type="text" name="email_login"  class="form-control" id="email_login" aria-describedby="emailHelp" placeholder="Insira seu Email ou CPF">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Senha</label>
                              <input type="password" name="senha_login" id="senha_login"  class="form-control" aria-describedby="emailHelp" placeholder="Senha">
                           </div>
                          

                           <div class="col-md-12 text-center mt-4">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                           </div>
                          

                           

                           <div class="form-group mt-4">
                              <small>
                              <p class="text-center">Não possui Cadastro? <a href="#" data-toggle="modal" data-target="#modalCadastro">Cadastre-se</a></p>
                              <p class="text-center"><a class="text-danger" href="#" data-toggle="modal" data-target="#modalRecuperar">Recuperar Senha?</a></p>
                           </small>
                           </div>
                        </form>
                 
            </div>
         </div>
           
         </div>
      </div>
      </div>   
         
</body>


</html>


<!-- Modal Cadastro -->



<div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastre-se</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
            </button>
      </div>

      <div class="modal-body">
         <form method="post">

            <div class="form-group">
              <label for="exampleInputEmail1">Nome Completo</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome e Sobrenome">
            </div>

           <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Seu Email">
           </div>

           <div class="form-group">
              <label for="exampleInputEmail1">CPF</label>
              <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Insira seu CPF">
           </div>

              <div class="row">

                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="exampleInputEmail1">Senha</label>
                               <input type="password" class="form-control" id="senha" name="senha" placeholder="Inserir a senha">
                           </div>
                        </div>   
                        

                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="exampleInputEmail1">Confirmar Senha</label>
                               <input type="password" class="form-control" id="confirmar-senha" name="confirmar-senha" placeholder="Confirmar Senha">
                           </div>
                        </div>         
               </div>   
                     <div align="center" id="div-mensagem" class="text-center"></div>    
                     <div class="modal-footer">
                        
                        <button type="button" id="btn-fechar-cadastrar" class="btn btn-secondary" data-dismiss="modal">Fechar</button>   
                        <button type="button" id="btn-cadastrar" class="btn btn-info">Cadastrar</button>
                     </div>               
            </div>             
         </form>
      </div>
   </div>   
</div>



<!-- Modal Recupera Senha -->

<div class="modal fade" id="modalRecuperar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperar Senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
       </button>
    </div>
    <div class="modal-body">
      <form method="post">


       <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" id="email-recuperar" name="email-recuperar" placeholder="Seu Email">

       </div>




    </div>
    <div class="modal-footer">
      <div align="center" id="div-mensagem-rec" class="text-center"></div> 
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

     <button type="button" id="btn-recuperar" class="btn btn-info">Recuperar</button>
     

  </form>

</div>
</div>
</div>
</div>
</div>



<!-- Script Modal Recuperar Senha -->
<script type="text/javascript">
    $('#btn-recuperar').click(function(event){
        event.preventDefault();
        
        $.ajax({
            url:"recuperar.php",
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg){              
                if(msg.trim() === 'Senha Enviada para o E-mail!!'){  
                     $('#div-mensagem-rec').addClass('text-success')                 
                     $('#div-mensagem-rec').text(msg)
                                        
                 }else if(msg.trim() === 'Preencha o Campo Email!'){
                      $('#div-mensagem-rec').addClass('text-success')
                      $('#div-mensagem-rec').text(msg);

                 }else if(msg.trim() === 'Este email não está cadastrado!'){
                      $('#div-mensagem-rec').addClass('text-success')
                      $('#div-mensagem-rec').text(msg);
                    }else{
                    $('#div-mensagem-rec').addClass('text-danger')
                    $('#div-mensagem-rec').text('Deu erro ao Enviar o Formulário! Provavelmente seu servidor de hospedagem não está com permissão de envio habilitada ou você está em um servidor local');
                   

                 }
                 
            } 
        })
    }) 
</script>


<!-- Script Modal Cadastro -->
<script type="text/javascript">
    $('#btn-cadastrar').click(function(event){
        event.preventDefault();
        
        $.ajax({
            url:"cadastrar.php",
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg){
                if(msg.trim() === 'Cadastrado com Sucesso!'){
                    
                    $('#div-mensagem').addClass('text-success')
                    $('#div-mensagem').text(msg);
                    $('#btn-fechar-cadastrar').click();
                    $('#email_login').val(document.getElementById('email').value);
                    $('#senha_login').val(document.getElementById('senha').value);
                    }
                 else{
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text(msg);
                   

                 }
            }
        })
    })
</script>

<!-- Formatação de CPF -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="../js/mascara.js"></script>


    
