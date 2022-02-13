<?php

include_once("conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

$sql = "select * from listapodcasts where nome like '%$filtro%' ";
$consulta = mysqli_query($conexao,$sql);
$registros = mysqli_num_rows($consulta);

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com"><link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="glide.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/glide.core.min.css">
    <link rel="stylesheet" href="css/glide.theme.min.css">
    <link rel="stylesheet" href="../css/Style4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta charset="utf8">
    <title>Podcast</title>

</head>
<header>
    <nav>
        <a href= "../index.html">Podcast</a>
        <form method="get" action="">
            <input type="text" name="filtro" class="campo" required autofocus>
            <input type ="submit" value="Pesquisar" class="btn">         
    </nav>
    <hr style="position:relative;top:50px;width:100%;text-align:left;margin-left:0">
</header>
    <body>
    <section id = 'hero1'>
       <?php echo"<script>document.getElementById('hero1').style.height = 'calc($registros*758px)';</script>" ?>;
        <div class="cards">
        <?php

                print "$registros registros encontrados.";                
                
                while($exibirRegistros = mysqli_fetch_array($consulta)){

                    $id = $exibirRegistros[0];
                    $nome = $exibirRegistros[1];
                    $episodios = $exibirRegistros[2];
                    $descricao = $exibirRegistros[3];
                    
                    
                    print "<article>"; 
                    print "<a href= '$nome.html' style = 'font-family: Lato;font-weight: bold;font-size: 20px;line-height: 32px;color:black;'> $nome</a><br>";
                    print "<p style = 'font-family: Lato;font-weight: normal;font-size: 16px;line-height: 32px;color:black;'>Episodios: $episodios<br>
                    Descriçao:$descricao</p><br>";
                    print "<img  src='../upload/$nome.jpg' alt='$nome' style ='width: 620px;height: 413px;'>";
                    print "</article>";
                    
                }


                
            ?>
            </div>
    </section>
    <section id = final>
    <?php echo"<script>document.getElementById('final').style.top = 'calc($registros*771px)';</script>" ?>;
    <p>Cadastre o seu Proprio Podcast ou 
        de outra pessoa!</p>
    <a href= 'adiciona1.php' class = "btn">Entre na sua conta</a> 
    </section>

    <section id=share>
    <?php echo"<script>document.getElementById('share').style.top = 'calc($registros*820px)';</script>" ?>;      
        <p>Compartilhe com seus amigos</p> 
        <ul>
            <li>
        <a href ="https://twitter.com/dbznetudo" target="_blank"><span class="iconify" data-inline="false" data-icon="akar-icons:twitter-fill" style="font-size: 24px;"></span></a>
        <a href ="https://www.instagram.com/diogo_lima1408/" target="_blank"><span class="iconify" data-inline="false" data-icon="uil:instagram-alt" style="font-size: 24px;"></span></a>
        <a href ="https://www.facebook.com/" target="_blank"><span class="iconify" data-inline="false" data-icon="akar-icons:facebook-fill" style="font-size: 24px;"></span></a>
            </li>
        </ul>
        <p1>Copyright by DiogoLima</p1>
    </section>
    <script src="script/script2.js" charset="utf-8"></script> 
</body>
</html>