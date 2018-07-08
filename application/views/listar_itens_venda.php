        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <tr>
                            <th>Qnt.</th>
                            <th>ID Produto</th>
                            <th>Produto</th>
                            <th>Valor Unitário</th>
                            <th>Valor Atualizado</th>
                        </tr>
                        <?php foreach($itens as $item){?>
                        <tr>
                            <td><?= $item->quantidade; ?> x </td>
                            <td><?= $item->id_produto; ?></td>
                            <td><?= $item->nome_produto; ?></td>
                            <td>R$ <?= $item->preco; ?></td>
                            <td>R$ <?= $item->precot; ?></td>
                        </tr>
                        <?php }
                            foreach($precot as $pt){ ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: right"><b>Valor Total:</b></td>
                            <td>R$ <?= $pt->total; ?></td>
                        </tr>
                            <?php } ?>
                    </table>
                </div>
                <div class="col-lg-12">
                    <form action="<?= base_url()?>venda/update_status_venda" method="post">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="status_venda"> Status Venda: </label>
                                    <select name="status_venda" id="status_venda" class="form-control" required>
                                        <option value="0"> ------- </option>
                                        <option value="pago"> Pago </option>
                                        <option value="fiado"> Fiado </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 pull-right" style="padding-top: 24px">
                                <button type="submit" class="btn btn-success">Finalizar Venda</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>     
    </div>
