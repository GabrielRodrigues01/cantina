<style type="text/css">
    input[type=date], select {
    width: 100%;
    padding: 6px 10px;
    border: 1px solid #cccc;
    border-radius: 4px;
    color: rgba(50, 50, 50, 0.5);;
    }
</style>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Relatório Venda</h1>
        </div>
        <div class="col-lg-12">
            <form action="<?= base_url() ?>rv_func/realizar_select" method="post">
                <div class="form-group">
                    <label class="radio-inline"><input type="radio" name="tipo_consulta" id="tipo_ra" value="tipo_ra" onClick="habilitacao()">RA</label>
                    <label class="radio-inline"><input type="radio" name="tipo_consulta" id="tipo_nome" value="tipo_nome" onClick="habilitacao()">Nome Aluno</label>
                    <label class="radio-inline"><input type="radio" name="tipo_consulta" id="tipo_data" value="tipo_data" onClick="habilitacao()">Data</label>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="ra"> RA: </label>
                            <input type="text" class="form-control" id="ra" name="ra" placeholder="RA do aluno" disabled>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label for="nome"> Nome Aluno: </label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do aluno" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="data_venda_inicio"> Data Início: </label>
                            <input type="date" style="width: 160px" name="data_venda_inicio" id="data_venda_inicio" min="2018-07-04" disabled>
                        </div>
                    </div>  
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="data_venda_fim"> Data Fim: </label>
                            <input type="date" style="width: 160px" name="data_venda_fim" id="data_venda_fim" min="2018-07-04" disabled>
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
<script>
    function habilitacao(){
        if(document.getElementById('tipo_ra').checked == true){
            document.getElementById('ra').disabled = false;
            document.getElementById('nome').disabled = true;
            document.getElementById('data_venda_inicio').disabled = true;
            document.getElementById('data_venda_fim').disabled = true;
        }
        if(document.getElementById('tipo_nome').checked == true){
            document.getElementById('ra').disabled = true;
            document.getElementById('nome').disabled = false;
            document.getElementById('data_venda_inicio').disabled = true;
            document.getElementById('data_venda_fim').disabled = true;
        }
        if(document.getElementById('tipo_data').checked == true){
            document.getElementById('ra').disabled = true;
            document.getElementById('nome').disabled = true;
            document.getElementById('data_venda_inicio').disabled = false;
            document.getElementById('data_venda_fim').disabled = false;
        }
    }
   </script>