        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Atualizar Produto</h1>
                </div>
                <div class="col-lg-12">
                    <form action="<?= base_url() ?>produto/salvar_atualizacao" method="post">
                        <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $produto[0]->id_produto;?>">   
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="id_produto"> ID Produto: </label>
                                    <input type="text" class="form-control" id="id_produto" name="id_produto" value="<?= $produto[0]->id_produto;?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label for="nome"> Nome: </label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $produto[0]->nome_produto;?>" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="preco"> Valor: </label>
                                    <input type="text" class="form-control" id="preco" name="preco" value="<?= $produto[0]->preco;?>" required>
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