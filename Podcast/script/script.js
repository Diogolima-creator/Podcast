var btn = document.querySelector('#btnvermais');
var mais = document.querySelector('.cardsoct');
var mais1 = document.querySelector('.cardsoct1');
var mais2 = document.querySelector('.cardsoct2');
var mais3 = document.querySelector('.cardsoct3');
var episodios = document.querySelector('#episodios');
let previous = document.querySelector('#pre');
let play = document.querySelector('#play');
let next = document.querySelector('#next');
let title = document.querySelector('#title');
let recent_volume= document.querySelector('#volume');
let volume_show = document.querySelector('#volume_show');
let slider = document.querySelector('#duration_slider');
let show_duration = document.querySelector('#show_duration');
let track_image = document.querySelector('#track_image');
let auto_play = document.querySelector('#auto');
let present = document.querySelector('#present');
let total = document.querySelector('#total');
let artist = document.querySelector('#artist');
let timer;
let autoplay = 0;
var x;
let index_no = 0;
let playing_song = false;
let track = document.createElement('audio');

btn.addEventListener('click',function(){

    if(mais.style.display === 'inline-block'){
        mais.style.display = 'none';
        mais1.style.display = 'none';
        mais2.style.display = 'none';
        mais3.style.display = 'none';
        btn.innerHTML = 'Carregar mais';
        btn.style.top ='300px';
        episodios.style.height = '2400px';
    }else{
        mais.style.display = 'inline-block';
        mais1.style.display = 'inline-block';
        mais2.style.display = 'inline-block';
        mais3.style.display = 'inline-block';
        btn.innerHTML = 'Carregar menos';
        btn.style.top ='1500px';
        episodios.style.height = '4000px';
    }
});;

let All_song = [
    {
        name: "IRMÃOS PIOLOGO - Flow Podcast #377",
        path: "music/Flow Podcast 377.mp3",
        img: "img/images.png",
        singer: "Monark e Igor"
    },
    {
        name: "LÉO LINS - Flow Podcast #376",
        path: "music/Flow Podcast 376.mp3",
        img: "img/images.png",
        singer: "Monark e Igor"
    },
    {
        name: "DELEGADO DA CUNHA - Flow Podcast #375",
        path: "music/Flow Podcast 375.mp3",
        img: "img/images.png",
        singer: "Monark e Igor"
    },
    {
        name: "BABU SANTANA - Flow Podcast #374",
        path: "music/Flow Podcast 374.mp3",
        img: "img/images.png",
        singer: "Monark e Igor"
    },
    {
        name: "REZENDE - Flow Podcast #373",
        path: "music/Flow Podcast 373.mp3",
        img: "img/images.png",
        singer: "Monark e Igor"
    },
    {
        name: "THIAGO MANSUR E GABRIELA PRIOLI - Flow Podcast #372",
        path: "music/Flow Podcast 372.mp3",
        img: "img/images.png",
        singer: "Monark e Igor"
    },
    {
        name: "ESQUIVA FALCÃO - Flow Podcast #371",
        path: "music/Flow Podcast 371.mp3",
        img: "img/images.png",
        singer: "Monark e Igor"
    },
    {
        name: "EMME WHITE - Flow Podcast #370",
        path: "music/Flow Podcast 370.mp3",
        img: "img/images.png",
        singer: "Monark e Igor"
    },
    {
        name: "JOÃO GORDO - Flow Podcast #369",
        path: "music/Flow Podcast 369.mp3",
        img: "img/images.png",
        singer: "Monark e Igor"
    },
    {
        name: "FERNANDO HADDAD - Flow Podcast #368",
        path: "music/Flow Podcast 368.mp3",
        img: "img/images.png",
        singer: "Monark e Igor"
    }
];


function load_track(index_no){

    clearInterval(timer);
    reset_slider();
    track.src = All_song[index_no].path;
    title.innerHTML = All_song[index_no].name;
    track_image.src = All_song[index_no].img;
    artist.innerHTML = All_song[index_no].singer;
    track.load();

    total.innerHTML = All_song.length;
    present.innerHTML = index_no +1;
    time = setInterval(range_slider,1000);
}


load_track(index_no);



function mute_sound(){
    track.volume = 0;
    volume.value = 0;
    volume_show.innerHTML = 0;
    
}

function justplay()
{
    if(playing_song==false){
        playsong();
    }else{
        pausesong();
    }
}

function playsong(){
    track.play();
    playing_song = true;
    play.innerHTML = '<i class ="fa fa-pause"></i>';
}

function pausesong(){
    track.pause();
    playing_song = false;
    play.innerHTML = '<i class ="fa fa-play"></i>';
}

function next_song(){
    if(index_no < (All_song.length - 1)){
        index_no += 1;
        load_track(index_no);
        playsong();
    }else{
        index_no = 0;
        load_track(index_no);
        playsong();
    }
}

function previous_song(){
    if(index_no > 0){
        index_no -= 1;
        load_track(index_no);
        playsong();
    }else{
        index_no = All_song.length;
        load_track(index_no);
        playsong();
    }
}

function volume_change(){
    volume_show.innerHTML = recent_volume.value;
    track.volume = recent_volume.value / 100;
}

function change_duration(){
    slider_position = track.duration * (slider.value/100);
    track.currentTime = slider_position;
}

function autoplay_switch(){
    if(autoplay == 1){
        autoplay = 0;
        auto_play.style.background = "rgba(255,255,255,0.2";
        auto_play.style.color = "white";
    }else{
        autoplay = 1;
        auto_play.style.background = "yellow";
        auto_play.style.color = "black";
    }
}

function range_slider(){
    let position = 0;

    if(!isNaN(track.duration)){
        position = track.currentTime * (100/track.duration);
        slider.value = position;
    }
    if(track.ended){
        play.innerHTML = '<i class="fa fa-play" aria-hidden="true"></i>';
        if(autoplay==1){
            index_no += 1;
            load_track(index_no);
            playsong();
        }

    }
}

function reset_slider(){
    slider.value = 0;
}

function fecharplayer(){
    player.style.display = 'none';
    pausesong();
   
}

function trocar_player(x){
    player.style.display ='inline';
    load_track(x);
    playsong();
}


