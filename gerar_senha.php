<?php
    require_once 'configDB.php';//conexão com o banco de dados
    if(isset($_GET['token']) && srtlrn($_GET['token']) == 10){
        $token = $_GET['token'];
        $sql = $conecta->prepare("SELECT * FROM usuario WHERE token = ? AND tempo_de_vida > now()");
        $sql->bind_param("s", $token);
        $sql->execute();
        $resultado = $sql->get_result();
        if($resultado-> num_rows > 0){
            echo "Nova senha:".@$_POST[senha];
        }else{ //com token
        header('location: index.php');//KICK DA PÁGINA
        exit();
    }else{//sem token
        header('location: index.php');//KICK DA PÁGINA
        exit();}

    }
?>

<!doctype html>

<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Crie uma nova senha</title>
</head>

<body>
    <main class="container">
        <section class="row justify-content-center">
            <div class="col-lg-5 mt-5">
                <h3 class="text-center bg-dark text-light p-2 rounded">
                    Crie uma nova senha
                </h3>
                <h4 class="text-center">
                    <?= @$msg ?>
                <h4>
                <form action="" method="post">
                    <div class="form-group">
                    <label for="senha">Nova Senha</label>
                        <input  class="form-control "type="password" name="senha" 
                        id="senha" placeholder="Nova senha" required> 
                    </div>
                    <div class="form-group">
                    <label for="csenha"> Confirme a Nova Senha</label>
                        <input  class="form-control "type="password" name="csenha" 
                        id="csenha" placeholder=" Confirma a Nova senha" required> 
                    </div>
                    <div class="form-group">
                        <input type="submit" value=" :: Gerar nova senha ::" 
                        name="criar" class="btn btn-primary btn-block" style="background: deepSkyBlue color: black; 
                        font-weigth:  bolder; padding: 10px; font-size: 22px; box-shadow: 3px 3px 5px black;">
                    </div>
                </form>
            </div>
        </section>
    </main>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>