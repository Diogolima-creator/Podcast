<?php
    session_start();

    if(isset($_SESSION["cadastro"])){
        require("conexao2.php");
        $conexaoClass = new Conexao();
        $conexao = $conexaoClass->conectar();   
    }else{
        echo "<script>window.location = '../login.html'</script>";
    }
    $img = $_SESSION["cadastro"][6];
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
    <link rel="stylesheet" href="../css/Style9.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Podcast</title>
    <meta charset="utf-8"> 
</head>
<header>
        <nav>
           <ul>
               <li><a class="headerprp" href= "../index.html">PODCAST</a></li>
           </ul>     
        </nav>
        <nav>
            <ul> 
            <li><a class="headertexto" href= "listageral.php">Pesquisar</a></li>
            <li><a class="headertexto" href= "Podcast.php">Meu Podcast</a></li>   
            <li><a class="headertexto" href= "Perfil.php">Meu Perfil</a></li> 
            </ul>
        </nav>
        <hr style="position:relative;top:20px;width:100%;text-align:left;margin-left:0;height:2px;border-width:0;color:rgb(255, 255, 255);background-color:rgb(255, 255, 255)">
</header>
    <body>
        <div1 id ="login">
        <a href="logout.php"><?php print "<img  src='../upload/$img' alt='$img' >"?> </a>
        </div1> 
    <section id = "hero1">       
        <div>
            <p>Criando o seu Podcast</p>
            <p2>Bem vindo a area de criação</p2>
            <p3>Primeiramente, você deve dar a atenção ao nome do seu Podcast
                este vai ser o responsável para que as pessoas se conectem 
                ao seu Podcast facilmente,lembre-se nome criativo é melhor
                que um nome padrão.
            </p3>
            <p4>
                Segundamente,uma descrição bem feita com uma facil compreensão
                do que é conversado em seu Podcast ajuda o ouvinte na identificação.
                Uma boa descrição aumenta facilmente o numero de 'clicks' no seu Podcast.
            </p4>
            <p5>
                Terceiramente,o visual do seu Podcast é importantíssimo,para aquele que não 
                lê,uma boa imagem é suficiente para o despertar da sua curiosidade.
            </p5>
        </div>
        <nav id="FormuPodcast">
            <h1>Cadastro de Podcast</h1>
            <form method="post" action="adiciona.php" enctype="multipart/form-data">
                <input type="submit" value='Salvar' class="btn">
                <input type="reset" value='Limpar' class="btn">
                <br>  
                <p>Nome do Seu Podcast</p>
                <input type="text" name="nome" class="campo" maxlength="40" required autofocus><br>
                <p>Episodios</p>
                <input type="text" name="episodios" class="campo" maxlength="3" required><br>
                <p>Descrição</p>
                <input type="text" name="descricao" class="campo" maxlength="300" required><br>
                <p>Imagem do Podcast</p>
                <input type="file" required name="arquivo"><br>
        </nav>

        <div id="FormuPodcastN">
            <p>PODCAST JÁ CADASTRADO!</p>
            <a href ="Podcast.php">MEU PODCAST</a>
        </div>

        <?php
            if($_SESSION["cadastro"][4] == 1){
                echo "<script> FormuPodcast.style.display = 'none' </script>";
                echo "<script> FormuPodcastN.style.display = 'block' </script>";
            }
        ?>
         

    </section>

    <section id=share>
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
    <script src="script/script4.js" charset="utf-8"></script> 
</body>
</html>