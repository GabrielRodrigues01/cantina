<script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url();?>assets/vendor/jquery/jQuery-Mask-Plugin-master/dist/jquery.mask.js"></script>        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Novo Aluno</h1>
                </div>
                <div class="col-lg-12">
                    <form action="<?= base_url() ?>aluno/cadastrar" method="post">      
                        <div class="form-group">
                            <label for="nome"> Aluno: </label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do aluno" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="ra"> RA: </label>
                                    <input type="text" class="form-control" id="ra" name="ra" placeholder="RA do aluno" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email_resp"> E-mail Responsável: </label>
                                    <input type="text" class="form-control" id="email_resp" name="email_resp" placeholder="E-mail do responsável" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="nome_resp"> Responsável: </label>
                                    <input type="text" class="form-control" id="nome_resp" name="nome_resp" placeholder="Nome do responsável" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="tel_resp"> Telefone Responsável: </label>
                                    <input type="text" class="form-control" id="tel_resp" name="tel_resp" placeholder="(99) 99999-9999)" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="cpf_funcionario"> CPF Funcionário: </label>
                                    <input type="text" class="form-control" id="cpf_funcionario" name="cpf_funcionario" value="<?= $this->session->userdata('id')?>" disabled>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="senha"> Senha: </label>
                                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha do aluno" required>
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
        $("#tel_resp").mask("(99) 99999-9999");
    });
</script>