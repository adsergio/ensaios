<?php
require_once("cabecalho.php");
?>


<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Início</a>
                <a class="breadcrumb-item text-dark" href="#">carrinho</a>
                <span class="breadcrumb-item active">Checkout</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Checkout Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3 text-light">Endereço de Envio</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="row">
                    <div class="col-md-9 form-group">
                        <label>Nome Completo*</label>
                        <input id="nome" name="nome" class="form-control" type="text" placeholder="Nome">
                    </div>
                    <div class="col-md-3 form-group">
                        <label>CPF*</label>
                        <input id="cpf" name="cpf" class="form-control" type="text" placeholder="000.000.000-99">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail*</label>
                        <input class="form-control" type="email" placeholder="example@email.com">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Telefone:</label>
                        <input id="telefone" name="telefone" class="form-control" type="text" placeholder="(31) 90000-0000">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Rua</label>
                        <input id="rua" name="rua" class="form-control" type="text" placeholder="Rua 123">
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Bairro</label>
                        <input id="bairro" name="bairro" class="form-control" type="text" placeholder="Pindorama">
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Número</label>
                        <input id="numero" name="numero" class="form-control" type="number" placeholder="123">
                    </div>


                    <div class="col-md-5 form-group">
                        <label>Complemento</label>
                        <input id="complemento" name="complemento" class="form-control" type="text" placeholder="Casa, comércio">
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Cidade</label>
                        <input id="cidade" name="cidade" class="form-control" type="text" placeholder="Belo Horizonte">
                    </div>
                    <div class="col-md-2 form-group">
                        <label>CEP</label>
                        <input id="cep" name="cep" class="form-control" type="text" placeholder="30000-000">
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Estado</label>
                        <input id="estado" name="estado" class="form-control" type="text" placeholder="MG">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>State</label>
                        <input class="form-control" type="text" placeholder="New York">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>ZIP Code</label>
                        <input class="form-control" type="text" placeholder="123">
                    </div>

                </div>
            </div>

        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3 text-light">Sua compra</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">
                    <h6 class="mb-3">Produtos</h6>
                    <div class="d-flex justify-content-between">
                        <p>Product Name 1</p>
                        <p>R$ 150</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Product Name 2</p>
                        <p>R$ 150</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Product Name 3</p>
                        <p>R$ 150</p>
                    </div>
                </div>
                <div class="border-bottom pt-3 pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>R$ 1500 </h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Envio</h6>
                        <h6 class="font-weight-medium">R$ 910</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>R$ 16.050</h5>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3 text-light">Pagamento</span></h5>
                <div class="bg-light p-30">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="paypal">
                            <label class="custom-control-label" for="paypal">Paypal</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                            <label class="custom-control-label" for="directcheck">Direct Check</label>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                            <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                        </div>
                    </div>
                    <button class="btn btn-block btn-primary font-weight-bold py-3" data-toggle="modal" data-target="#modalPagamento"  type="submit" class="site-btn">FINALIZAR COMPRA</button>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->

<!-- Modal -->
<div class="modal fade" id="modalPagamento" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal Pagamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>



<?php
require_once("rodape.php");

?>