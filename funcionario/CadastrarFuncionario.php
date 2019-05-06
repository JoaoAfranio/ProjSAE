<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/FuncionarioModel.php";


?>

<div class="card">
    <div class="card-body">
    <h4>Cadastrar Usuário</h4>
        <p class="card-description">
        </p>
        <form class="forms-sample" method="post" action="../controller/FuncionarioController.php?acao=create">
        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="inputLogin">Login</label>
            <input type="text" class="form-control" name="login" placeholder="Login">
        </div>
        <div class="form-group">
            <label for="inputSenha">Senha Usuario</label>
            <input type="text" class="form-control" name="senha" placeholder="Senha">
        </div>
        <div class="form-group">
            <label >Tipo Usuario</label>
            <select class="form-control" name="tipoFuncionario">
                <option value="2"> Usuario </option>
                <option value="1"> Administrador </option>
            </select>
        </div> 
        <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
        <button class="btn btn-light">Cancelar</button>
        </form>
    </div>
</div>