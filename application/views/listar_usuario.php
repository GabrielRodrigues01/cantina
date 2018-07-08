<script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url();?>assets/vendor/jquery/jQuery-Mask-Plugin-master/dist/jquery.mask.js"></script>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="page-header">Funcionários</h1>
                </div>
                <div class="col-lg-2" style="padding-top: 10px">
                    <a class="btn btn-link btn-block" href="<?= base_url()?>usuario/cadastro"><i class="fa fa-plus" style="font-size:60px;"></i></a>
                </div>
                <div class="col-lg-12">
                    <table class="table table-condensed">
                        <tr>
                            <th>CPF</th>
                            <th>Funcionário</th>
                            <th></th>
                        </tr>
                        <?php foreach($usuarios as $usu) { ?>
                        <tr>
                            <td><span class="cpf" /><?= $usu->cpf; ?></td>
                            <td><?= $usu->nome_funcionario; ?></td>
                            <td>
                                <a href="<?= base_url('usuario/atualizar/'.$usu->cpf) ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-edit"></i> Atualizar</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                    <?php echo $pagination; ?>
                </div>
            </div>               
        </div>     
    </div>
<script>
    jQuery(function($){
        $(".cpf").mask("999.999.999-99");
    });
</script>