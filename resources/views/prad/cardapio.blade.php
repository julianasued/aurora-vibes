<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Semanal</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .table-container {
            margin-top: 20px;
        }
        .btn-primary {
            background-color: #0056b3;
            border: none;
        }
        .btn-primary {
            background-color: #0056b3;
            border: none;
        }
        .btn-primary:hover {
            background-color: #004494;
        }
        .form-group textarea {
            resize: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Menu Semanal</h1>
    </div>

    <div class="container mt-4">
        <h2>Cadastrar Prato</h2>
        <form id="pratoForm">
            <!--Campo com o nome do prato-->
            <div class="form-group"> 
                <label for="nome">Nome do Prato</label> 
                <input type="text" class="form-control" id="nome" placeholder="Digite o nome do prato" required>
            </div>

            <!--DropDown com as opções do dia da semana-->
            <div class="form-group">
                <label for="dia-da-semana">Dia da Semana</label>
                <select class="form-control" id="dia-da-semana" required>
                    <option value="" disabled selected>Selecione um dia</option>
                    <option value="segunda">Segunda-feira</option>
                    <option value="terca">Terça-feira</option>
                    <option value="quarta">Quarta-feira</option>
                    <option value="quinta">Quinta-feira</option>
                    <option value="sexta">Sexta-feira</option>
                    <option value="sabado">Sábado</option>
                </select>
            </div>

            <!--Campo da guarnição-->
            <div class="form-group">
                <label for="guarnicao">Guarnição</label>
                <textarea class="form-control" id="guarnicao" rows="2" placeholder="Digite a guarnição do prato"></textarea>
            </div>

            <!--Campo do acompanhamento-->
            <div class="form-group">
                <label for="acompanhamento">Acompanhamento</label>
                <textarea class="form-control" id="acompanhamento" rows="2" placeholder="Digite o acompanhamento do prato"></textarea>
            </div>
            
            <!--Campo da sobremesa-->
            <div class="form-group">
                <label for="sobremesa">Sobremesa</label>
                <textarea class="form-control" id="sobremesa" rows="2" placeholder="Digite a sobremesa do prato"></textarea>
            </div>
            
            <!--Campo da descrição-->
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" rows="3" placeholder="Digite a descrição do prato"></textarea>
            </div>
            
            <!--Botão cadastrar (Ainda sem a lógica)-->
            <button type="submit" class="btn btn-primary">Cadastrar</button>

        </form>
        
        <!-- Os pratos cadastrados deverão aparecerão aqui -->
        <div class="table-container mt-4">
            <h3>Pratos Cadastrados</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Dia</th>
                        <th>Guarnição</th>
                        <th>Acompanhamento</th>
                        <th>Sobremesa</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody id="pratosTableBody">
                </tbody>
           