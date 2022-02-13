<?php
    include_once("conexao.php");
    session_start();

    if(isset($_SESSION["cadastro"]) && $_SESSION["cadastro"][4] != 1){
        require("conexao2.php");
        $p = new Conexao();
        $conexao2 = $p->conectar(); 
        $id = $_SESSION["cadastro"][0];
        $muda = $conexao2->query("UPDATE cadastro SET indice = '1' WHERE id = $id");      
    
        
    $nome = $_POST['nome'];
    $episodios = $_POST['episodios'];
    $descricao = $_POST['descricao'];
    $arquivo = $_FILES['arquivo'];

    if(isset($_FILES['arquivo'])){
    $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
    $novo_nome = ($nome).".".$extensao;
    $diretorio = "upload/";
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

    }

    $sql = "insert into listapodcasts(nome,episodios,descricao,arquivo) values ('$nome','$episodios','$descricao','$novo_nome')";
    $salvar = mysqli_query($conexao,$sql);
    $linhas = mysqli_affected_rows($conexao);

    mysqli_close($conexao);
    session_destroy();
    echo "<script>window.location = 'adiciona1.php' </script>";
    }else{
        echo "<script>window.location = 'adiciona1.php' </script>";
    }

?>