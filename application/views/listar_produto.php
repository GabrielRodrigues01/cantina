        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="page-header">Produtos</h1>
                </div>
                <div class="col-lg-2" style="padding-top: 10px">
                    <a class="btn btn-link btn-block" href="<?= base_url()?>produto/cadastro"><i class="fa fa-plus" style="font-size:60px;"></i></a>
                </div>
                <div class="col-lg-12">
                    <table class="table table-condensed">
                        <tr>
                            <th>ID Produto</th>
                            <th>Produto</th>
                            <th>Valor</th>
                            <th></th>
                        </tr>
                        <?php foreach($produtos as $prod) { ?>
                        <tr>
                            <td><?= $prod->id_produto; ?></td>
                            <td><?= $prod->nome_produto; ?></td>
                            <td>R$ <?= $prod->preco; ?></td>
                            <td>
                                <a href="<?= base_url('produto/atualizar/'.$prod->id_produto) ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-edit"></i> Atualizar</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                    <?php echo $pagination; ?>
                </div>
            </div>               
        </div>     
    </div>
