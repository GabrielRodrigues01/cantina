        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Atualizar Funcionário</h1>
                </div>
                <div class="col-lg-12">
                    <form action="<?= base_url() ?>usuario/salvar_atualizacao" method="post">
                        <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $usuario[0]->cpf;?>">   
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="cpf"> CPF: </label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $usuario[0]->cpf;?>" disabled>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label for="nome"> Funcionário: </label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $usuario[0]->nome_funcionario;?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
        <form action="<?= base_url()?>usuario/salvar_senha" method="post">
            <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $usuario[0]->cpf;?>"> 
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