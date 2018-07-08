        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Novo Produto</h1>
                </div>
                <div class="col-lg-12">
                    <form action="<?= base_url() ?>produto/cadastrar" method="post">      
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label for="nome"> Produto: </label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do produto" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="preco"> Valor: </label>
                                    <input type="text" class="form-control" id="preco" name="preco" placeholder="Valor do produto" required>
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
           