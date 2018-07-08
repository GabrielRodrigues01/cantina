        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="page-header">Alunos</h1>
                </div>
                <div class="col-lg-2" style="padding-top: 10px">
                    <a class="btn btn-link btn-block" href="<?= base_url()?>aluno/cadastro"><i class="fa fa-plus" style="font-size:60px;"></i></a>
                </div>
                <div class="col-lg-12">
                    <table class="table table-condensed">
                        <tr>
                            <th>RA</th>
                            <th>Aluno</th>
                            <th>E-mail Responsável</th>
                            <th>Responsável</th>
                            <th>Telefone Responsável</th>
                            <th></th>
                        </tr>
                        <?php foreach($alunos as $alu) { ?>
                        <tr>
                            <td><?= $alu->ra; ?></td>
                            <td><?= $alu->nome_aluno; ?></td>
                            <td><?= $alu->email_resp; ?></td>
                            <td><?= $alu->nome_resp; ?></td>
                            <td><?= $alu->tel_resp; ?></td>
                            <td>
                                <a href="<?= base_url('aluno/atualizar/'.$alu->ra) ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-edit"></i> Atualizar</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                    <?php echo $pagination; ?>
                </div>
                
            </div>               
        </div>     
    </div>
