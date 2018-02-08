$(document).ready(function(){
  getSongs();

});
var audio;
var music;

function getSongs(){
  $.getJSON("js/app.json",function(mjson){
    music = mjson;
    genList(music);

  });
}

function playSong(id){
  $('#img-album').attr('src',music.songs[id].image);
  $('#player').attr('src',music.songs[id].song);
}

function genList(music){
  $.each(music.songs,function(i,song){
    $('#playlist').append('<li class="list-group-item" id="'+i+'">'+song.name+'</li>')
  });
  $('#playlist li').click(function(){
    var selectedsong = $(this).attr('id');
    playSong(selectedsong);
  });
}
