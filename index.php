<?php 

    if(isset($_FILES['arquivo'])){
        $arquivo = $_FILES['arquivo'];

        if ($arquivo['error']) {
            die('Falha ao enviar arquivo');
        }

        if ($arquivo['size'] > 2097152 ) {
            die('Arquivo muito grande!! Max: 2MB');
        }
        $pasta = "arquivos/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if($extensao != 'jpg' && $extensao != 'png'){
            die("Tipo de arquivo nao aceito");
        }

        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $pasta . $novoNomeDoArquivo . "." .$extensao);
        if($deu_certo)
           { echo "<p>arquivo enviado com sucesso! Para acessá-lo,  <a target=\"blank\"  href=\"arquivos/$novoNomeDoArquivo.$extensao\">clique aqui:</a></p>";
           }
           else
           {
            echo "<p>Falha ao enviar arquivo</p>";
        }
        }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>
    <form enctype="multipart/form-data" method="post" action="">
        <p><label for="">Selecione o arquivo</label>
        <input name="arquivo" type="file"></p>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>