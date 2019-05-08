<?php 
     
     
     $resFormulario = $formulario->listarTodos();
     $resAvaliacao = $avaliacao->listarTodos();
?>


<div class="card">
    <div class="card-body">
        <h4>Cadastrar avaliações para o formulário</h4>
            <p class="card-description">
                Ex.: Exemplo...
            </p>
            <form class="forms-sample" method="post" action="../controller/FormularioAvaliacaoController.php?acao=cadastrar"> <!-- ADD ACTION AQUI -->
                <div class="form-group">
                    <label for="selectFormulario">Selecione o formulário</label>
                    <select class="form-control" name="idFormulario">
                        <?php 
                        foreach ($resFormulario as $Formulario) {
                            echo '<option value="' .  $Formulario['IdFormulario'] . '">' . $Formulario['Descricao'] .'</option>';
                        } 
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selectAvaliacao">Selecione a avaliação</label>
                    <select class="form-control" name="idAvaliacao">
                        <?php 
                        foreach ($resAvaliacao as $Avaliacao) {
                           echo '<option value="' .  $Avaliacao['IdAvaliacao'] . '">' . $Avaliacao['Descricao'] .'</option>';
                        } 
                        ?>
                      </select>
                </div>
            <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
        </form>
    </div>
</div>