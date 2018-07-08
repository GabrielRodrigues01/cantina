<script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url();?>assets/vendor/jquery/jQuery-Mask-Plugin-master/dist/jquery.mask.js"></script>
    <div class="container">
      <form class="form-signin" method="POST" action="<?= base_url()?>dashboard/logar">
        <h1 class="text-center">Acesso Restrito</h1>
        <label class="radio-inline"><input type="radio" name="tipo_login" id="tipo_aluno" value="tipo_aluno" onClick="habilitacao()">Aluno</label>
        <label class="radio-inline"><input type="radio" name="tipo_login" id="tipo_func" value="tipo_func" onClick="habilitacao()">Funcionário</label>
        <h3><span class="label label-default">E-mail ou CPF</span></h3>
        <input type="email" id="email" name="email" class="form-control" placeholder="Digite seu E-mail..." disabled autofocus>
        <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite seu CPF..." disabled>
        <h3><span class="label label-default">Senha</span></h3>
        <input type="password" id="senha" name="senha" class="form-control" placeholder="Digite sua senha" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
      </form>
    </div>

<script>
        jQuery(function($){
          $("#cpf").mask("999.999.999-99");
        });
        function habilitacao(){
            if(document.getElementById('tipo_aluno').checked == true){
              document.getElementById('email').disabled = false;
              document.getElementById('cpf').disabled = true;
            }
              if(document.getElementById('tipo_aluno').checked == false){
              document.getElementById('email').disabled = true;
              document.getElementById('cpf').disabled = false;
            }
        }
</script>