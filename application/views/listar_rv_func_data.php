<script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url();?>assets/vendor/jquery/jQuery-Mask-Plugin-master/dist/jquery.mask.js"></script>        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="page-header">Relatório de Vendas: Período</h1>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="ra"> RA: </label>
                                <input type="text" class="form-control" id="ra" name="ra" value="<?=$registros[0]->aluno_ra?>" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nome"> Aluno: </label>
                                <input type="text" class="form-control" id="nome" name="nome" value="<?=$registros[0]->nome_aluno?>" disabled>
                            </div>
                        </div>
                    </div>
                    <table id="table1" class="table table-condensed">
                        <tr>
                            <th>ID Venda</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Funcionário</th>
                            <th>RA</th>
                            <th>Aluno</th>
                            <th>Valor Total</th>
                            <th></th>
                        </tr>
                        <?php foreach($registros as $row) { ?>
                        <tr>
                            <td><?= $row->id_registro; ?></td>
                            <td><?= $row->data; ?></td>
                            <td><?= $row->status; ?></td>
                            <td><span class="cpf" /><?= $row->funcionario_cpf; ?></td>
                            <td><?= $row->aluno_ra; ?></td>
                            <td><?= $row->nome_aluno; ?></td>
                            <td><?= $row->valor_total; ?></td>
                        </tr>
                        <?php } 
                            foreach($registros_pagos as $pagos){ ?>
                        <tr>
                             <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: right"><b>Total de Pagos:</b></td>
                            <td><?= !is_null($pagos->total) ? $pagos->total : 0; ?></td>
                        </tr>
                            <?php } 
                            foreach($registros_fiados as $fiados){ ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: right"><b>Total de Fiados:</b></td>
                            <td><?= !is_null($fiados->total) ? $fiados->total : 0; ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="pull-right">
                    <a href="<?= base_url()?>rv_func/relatorio"><button type="button" class="btn btn-default">Voltar</button></a>
                </div>
            </div>               
        </div>     
    </div>

<script>
    jQuery(function($){
        $(".cpf").mask("999.999.999-99");
    });
</script>