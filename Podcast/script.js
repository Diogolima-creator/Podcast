function abrirMenu(){
    document.getElementById('menu').style.width = '180px';
}

function fecharMenu(){
    document.getElementById('menu').style.width = '0px';
}


var btn = document.querySelector('#btnvermais');
var mais = document.querySelector('.cardsoct');


btn.addEventListener('click',function(){

    if(mais.style.display === 'block'){
        mais.style.display = 'none';
    }else{
        mais.style.display = 'block';
    }

});
