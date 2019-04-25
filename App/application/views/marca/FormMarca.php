<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
              integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
              integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <style>
            .inativo{
                opacity: 0.5;                
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="mt-3 col-12">
                    <h1>Gerenciador de Veículos</h1>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="mt-3 col-4">
                    <form method="POST" action="veiculo.php" name="cadastrar" class="border rounded" enctype="multipart/form-data">
                        <input type="hidden" name="acao" value="">
                        <h4 id="label-form" class="card-header bg-transparent ">
                            <i class="fas fa-edit"></i>
                            Cadastro de Veículo</h3><br>
                            <div class="col-12">
                                <label for="modelo">Modelo:</label>
                                <input class="form-control" id="modelo" type="text" name="modelo" value=""><br>
                                <label for="preco">Preço:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">R$</span>
                                    </div>
                                    <input type="text" id="preco" name="preco" class="form-control"  value="">
                                </div><br>
                                <label for="marca_id">Marca <a href="marca.php">[ +adicionar ]</a></label>
                                <select class="form-control" id="marca_id" name="marca_id">
                                    <option> Selecione uma marca </option>
                                </select>
                                <br>
                                <label for="status">Status:</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="0">Inativo</option>
                                    <option value="1">Ativo</option>
                                </select>
                                <label for="imagem">Imagem:</label>                           
                                <input style="width:135px" class="form-control-file" type="file" name="imagem" id="imagem">
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>