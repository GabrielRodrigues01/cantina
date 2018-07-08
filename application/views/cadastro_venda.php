<script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<style type="text/css">
    input[type=date], select {
    width: 100%;
    padding: 6px 10px;
    border: 1px solid #cccc;
    border-radius: 4px;
    color: rgba(50, 50, 50, 0.5);;
    }
</style>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Iniciar Venda</h1>
                </div>
                <div class="col-lg-12">
                    <form action="<?= base_url() ?>venda/cadastrar" method="post">      
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="cpf_func"> CPF Funcionario: </label>
                                    <input type="text" class="form-control" id="cpf_func" name="cpf_func" value="<?= $this->session->userdata('id')?>" disabled>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="nome_func"> Nome Funcionario: </label>
                                    <input type="text" class="form-control" id="nome_func" name="nome_func" value="<?=$funcionario[0]->nome_funcionario?>" disabled>
                                </div>
                            </div>    
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="data_venda"> Data Venda: </label>
                                    <input type="date" style="width: 160px" name="data_venda" id="data_venda" min="2018-07-01" required>
                                </div>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="ra_aluno"> RA: </label>
                                    <input type="text" class="form-control" id="ra_aluno" name="ra_aluno" required>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="nome_aluno"> Nome Aluno: </label>
                                    <input type="text" class="form-control" id="nome_aluno" name="nome_aluno" disabled>
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
    $(document).ready(function(){
        $("input[name='ra_aluno']").blur(function(){
            var $nome_aluno = $("input[name='nome_aluno']");
            $.getJSON('venda.php', {
                ra_aluno: $ (this).val()
            }), function(json){
                $nome_aluno.val(json.nome_aluno);
            });
        });
    });            
</script>

