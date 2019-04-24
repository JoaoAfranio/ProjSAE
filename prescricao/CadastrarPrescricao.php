<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/PrescricaoModel.php";


    $prescricao = new PrescricaoModel();
?>

<div class="card">
    <div class="card-body">
        <h4>Cadastrar prescrição</h4>
        <p class="card-description">
            Ex.: Exemplo de prescricao aqui
        </p>
            <form class="forms-sample" method="post" action="../controller/PrescricaoController.php?acao=cadastrar">
                    <div class="form-group">
                      <label for="inputPrescricao">Prescricao</label>
                      <input required type="text" class="form-control" name="descricao" placeholder="Exemplo de prescricao">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
            </form>
    </div>
</div>