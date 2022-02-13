$(function(){
    $("button#btn").on("click", function(e){
        e.preventDefault();

        var campoEmail = $("form#formularioLogin #email").val();
        var campoSenha = $("form#formularioLogin #senha").val();

        if(campoEmail.trim() == "" || campoSenha.trim() == ""){
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos.");
        }else{
            $.ajax({
                url: "login.php",
                type: "POST",
                data: {
                    type: "login",
                    email: campoEmail,
                    senha: campoSenha
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);

                    if(retorno["erro"]){
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else{
                        window.location = "adiciona1.php";
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });
    
    $("button#btnCadastrar").on("click", function(e){
        e.preventDefault();

        var campoEmail = $("form#formularioCadastro #emailCadastro").val();
        var campoSenha = $("form#formularioCadastro #senhaCadastro").val();
        var campoNome = $("form#formularioCadastro #nomeCadastro").val();

        if(campoEmail.trim() == "" || campoSenha.trim() == "" || campoNome.trim() == ""){
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos.");
        }else{
            $.ajax({
                url: "login.php",
                type: "POST",
                data: {
                    type: "cadastro",
                    email: campoEmail,
                    senha: campoSenha,
                    nome: campoNome
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);

                    if(retorno["erro"]){
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else{
                        window.location = "adiciona1.php";
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });

    $("button#btnCadastro").on("click",function(){
        $("div#campos").hide();
        $("div#campos2").show();
    })

    $("button#btnLogin").on("click",function(){
        $("div#campos").show();
        $("div#campos2").hide();
    })
});

