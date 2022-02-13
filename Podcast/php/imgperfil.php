<?php

session_start();

require("conexao2.php");
$p = new Conexao();
$conexao3 = $p->conectar(); 

var_dump($_SESSION["cadastro"]);
$id = $_SESSION["cadastro"][0];
$nome = $_SESSION["cadastro"][1];
$arquivo = $_FILES['arquivo'];

if(isset($_FILES['arquivo'])){
    $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
    $novo_nome = ($nome).".".$extensao;
    $diretorio = "../upload/";
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

}
session_destroy();
$arq = $conexao3->query("UPDATE cadastro SET img = '$novo_nome' WHERE id = $id");
echo "<script>window.location = 'Perfil.php' </script>";
?>
