<script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url();?>assets/vendor/jquery/jQuery-Mask-Plugin-master/dist/jquery.mask.js"></script>        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Novo Funcionário</h1>
                </div>
                <div class="col-lg-12">
                    <form action="<?= base_url() ?>usuario/cadastrar" method="post">      
                        <div class="form-group">
                            <label for="nome"> Nome: </label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome funcionário" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="cpf"> CPF: </label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="999.999.999-99" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="senha"> Senha: </label>
                                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha funcionário" required>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success">Enviar</button>
                            <a href="<?= base_url()?>dashboard"><button type="button" class="btn btn-danger">Cancelar</button></a>
                        </div>
                    </form>
                </div>
            </div>
            
<script>
    jQuery(function($){
        $("#cpf").mask("999.999.999-99");
    });
</script>