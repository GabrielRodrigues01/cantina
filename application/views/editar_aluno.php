<script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url();?>assets/vendor/jquery/jQuery-Mask-Plugin-master/dist/jquery.mask.js"></script> 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Atualizar Aluno</h1>
                </div>
                <div class="col-lg-12">
                    <form action="<?= base_url() ?>aluno/salvar_atualizacao" method="post">
                        <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $aluno[0]->ra;?>">   
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="ra"> RA: </label>
                                    <input type="text" class="form-control" id="ra" name="ra" value="<?= $aluno[0]->ra;?>" disabled>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label for="nome"> Nome: </label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $aluno[0]->nome_aluno;?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email_resp"> E-mail Responsável: </label>
                                    <input type="text" class="form-control" id="email_resp" name="email_resp" value="<?= $aluno[0]->email_resp;?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nome_resp"> Nome Responsável: </label>
                                    <input type="text" class="form-control" id="nome_resp" name="nome_resp" value="<?= $aluno[0]->nome_resp;?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="tel_resp"> Telefone Responsável: </label>
                                    <input type="text" class="form-control" id="tel_resp" name="tel_resp" value="<?= $aluno[0]->tel_resp;?>" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="cpf_funcionario"> CPF Funcionário: </label>
                                    <input type="text" class="form-control" id="cpf_funcionario" name="cpf_funcionario" value="<?= $aluno[0]->funcionario_cpf;?>" disabled>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="senha"> Senha: </label>
                                    <input type="button" class="btn btn-warning btn-block" id="senha" name="senha" value="Atualizar Senha" data-toggle="modal" data-target="#myModal">
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url()?>aluno/salvar_senha" method="post">
            <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $aluno[0]->ra;?>"> 
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Atualizar Senha</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <label for="senha_antiga">Senha antiga: </label>
                            <input type="password" class="form-control" name="senha_antiga" id="senha_antiga">
                        </div>
                        <div class="col-lg-12 form-group">
                            <label for="senha_nova">Senha nova: </label>
                            <input type="password" class="form-control" name="senha_nova" onkeyup="checarSenha()" id="senha_nova">
                        </div>
                        <div class="col-lg-12 form-group">
                            <label for="senha_confirmar">Confirmar senha: </label>
                            <input type="password" class="form-control" name="senha_confirmar" onkeyup="checarSenha()" id="senha_confirmar">
                        </div>
                        <div class="col-lg-12 form-group">
                            <div id="divcheck">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="enviarsenha" disabled>Salvar</button>
                </div>
            </div>
        </form> 
    </div>
</div>
<script>
    jQuery(function($){
        $("#tel_resp").mask("(99) 99999-9999");
    });
    $(document).ready(function() {
        $("#senha_nova").keyup(checarSenha);
        $("#senha_confirmar").keyup(checarSenha);
    });
    function checarSenha() {
        var password = $("#senha_nova").val();
        var confirmPassword = $("#senha_confirmar").val();
        if(password == '' || '' == confirmPassword) {
            $("#divcheck").html("<span style='color: red'>Campo vazio!</span>");
            document.getElementById("enviarsenha").disabled = true;
        } else if(password != confirmPassword) {
            $("#divcheck").html("<span style='color: red'>Senhas diferentes!</span>");
            document.getElementById("enviarsenha").disabled = true;
        } else {
            $("#divcheck").html("<span style='color: green'>Senhas iguais!</span>");
            document.getElementById("enviarsenha").disabled = false;
        }
    }
</script>