<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/ResultadoModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/DiagnosticoModel.php";

    $questao = new ResultadoModel();
    $diagnostico = new DiagnosticoModel();
    $resDiagnostico = $diagnostico->listarTodos();
?>

<div class="card">
    <div class="card-body">
        <h4>Cadastrar resultado</h4>
        <p class="card-description">
            Ex.: Exemplo de resultado aqui
        </p>
            <form class="forms-sample" method="post" action="../controller/ResultadoController.php?acao=cadastrar">
                    <div class="form-group">
                      <label for="inputResultado">Resultado</label>
                      <input required type="text" class="form-control" name="descricao" placeholder="Exemplo de resultado">
                    </div>
                    <div class="form-group">
                      <label for="idDiagnostico">Diagnóstico</label>
                      <select class="form-control" name="idDiagnostico">
                        <?php foreach($resDiagnostico as $diagnostico){?>
                        <option value="<?php echo $diagnostico['IdDiagnostico']?>"><?php echo $diagnostico['Descricao']?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
            </form>
    </div>
</div>