<script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url();?>assets/vendor/jquery/jQuery-Mask-Plugin-master/dist/jquery.mask.js"></script>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="page-header">Vendas</h1>
                </div>
                <div class="col-lg-12">
                    <table class="table table-condensed">
                        <tr>
                            <th>RA</th>
                            <th>Nome Aluno</th>
                            <th>Data Venda</th>
                        </tr>
                        <?php foreach($registo as $reg) { ?>
                        <tr>
                            <td><?= $reg->ra; ?></td>
                            <td><?= $reg->nome_aluno; ?></td>
                            <td><?= $reg->data; ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th>CPF Funcionario</th>
                            <th>Nome Funcionário</th>
                        </tr>
                        <?php foreach($registo as $reg) { ?>
                        <tr>
                            <td><span class="cpf" /><?= $reg->cpf; ?></td>
                            <td><?= $reg->nome_funcionario; ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="col-lg-12">
                    <form action="<?= base_url() ?>venda/cadastrar_itens" method='post'>
                        <div class="row">
                            <div class="col-lg-1">
                                <div class="form-group">
                                    <label for="quantidade"> Qtd. </label>
                                    <input type="text" class="form-control" id="quantidade" name="quantidade" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="id_produto"> ID Produto</label>
                                    <input type="text" class="form-control" id="id_produto" name="id_produto" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nome_produto"> Produto </label>
                                    <input type="text" class="form-control" id="nome_produto" name="nome_produto" disabled>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="valor_produto"> Valor Unitário </label>
                                    <input type="text" class="form-control" id="valor_produto" name="valor_produto" disabled>
                                </div>
                            </div>
                            <div class="col-lg-1" style="padding-top: 20px">
                                <button type="submit" class="btn btn-link"><i class="fa fa-plus" style="font-size:30px;"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>               
        </div>     
    </div>
<script>
    jQuery(function($){
        $(".cpf").mask("999.999.999-99");
    });
</script>