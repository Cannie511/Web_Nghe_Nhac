var navbar_toggle = document.getElementById("navbar");
var menu = document.getElementById("menu");
var all = document.querySelector("*");
var main_play = document.getElementById("main_play");
var logoT = document.getElementById("logo_T");
var logoV = document.getElementById("logo_V");
var per = document.getElementById("personal");
var more = document.getElementById("more");
var mode = document.getElementById("scroll");
var night = document.querySelector("body");
var turn = document.getElementById("switch");
var search = document.getElementById("search");
var btn_play_light = document.getElementById("btn");
var time_play = document.getElementById("time_play");
var list_music = document.getElementById("list_mp3");
var logori = document.getElementById("logo_ri");
var logoie = document.getElementById("logo_ie");
var logo = document.getElementById("logo");
var nav_rotate = document.getElementById("nav_rotate");
var topMenu = document.getElementById("topMenu");
var menu_cover = document.getElementById("menu_cover");
if (navbar_toggle != null) {
  navbar_toggle.onclick = function () {
    navbar_toggle.classList.toggle("open");
    menu.classList.toggle("hide");
    main_play.classList.toggle("full");
    logoT.classList.toggle("hide");
    logoV.classList.toggle("hide");
    logori.classList.toggle("hide");
    logoie.classList.toggle("hide");
    logo.classList.toggle("hide");
    search.classList.toggle("full_scr");
    list_music.classList.toggle("full_pg");
    topMenu.classList.toggle("hide");
    menu_cover.classList.toggle('hide');
  };
};

function play() {
  var play = document.getElementById("play_btn");
  var pause = document.getElementById("pause_btn");
  play.style.display = "none";
  pause.style.display = "block";
  pause.style.position = "relative";
}
function pause() {
  var play = document.getElementById("play_btn");
  var pause = document.getElementById("pause_btn");
  play.style.display = "block";
  pause.style.display = "none";
}
function showMore() {
  more.style.display = "block";
}
function hideMore() {
  more.style.display = "none";
}
if (mode != null) {
  mode.onclick = function () {
    mode.classList.toggle("night");
    night.classList.toggle("night_body");
    turn.classList.toggle("night_on");
    btn_play_light.classList.toggle("light_btn");
    time_play.classList.toggle("light_time_play");
  };
};

function log_in() {
  window.location = "log-in.html";
}
function Edit() {
  window.location = "EditProfile.html";
}
function back() {
  window.history.back();
}
function Home() {
  window.location = "index.php";
}
function playList() {
  window.location = "playlist.html";
}
function Register() {
  window.location = "Register.php";
}
var playlist = [
  "https://vnso-pt-24-tf-a128-zmp3.zmdcdn.me/966012e4e868f2efc96237dedc1145af?authen=exp=1702026755~acl=/966012e4e868f2efc96237dedc1145af/*~hmac=082a75cb29b93bf5b0684f81ff20e085",
  "https://vnso-pt-14-tf-a128-zmp3.zmdcdn.me/667dfa7991c627e54f506d737e49390a?authen=exp=1702097802~acl=/667dfa7991c627e54f506d737e49390a/*~hmac=6ca85577f75d85335736eb8b27648a8e"];
var currentSongIndex = 0;
var audioPlayer = document.getElementById("music");
var loop = false;

function playNext() {
  currentSongIndex++;
  if (currentSongIndex >= playlist.length) {
    currentSongIndex = 0;
  }
  audioPlayer.src = playlist[currentSongIndex];
  audioPlayer.load(); 
  audioPlayer.play(); 
}
function playPrev() {
  currentSongIndex--;
  if (currentSongIndex < 0)
    currentSongIndex = 0;
  if (currentSongIndex >= playlist.length) {
    currentSongIndex = 0; 
  }
  audioPlayer.src = playlist[currentSongIndex];
  audioPlayer.load();
  audioPlayer.play(); 
}
function Loop(){
  var loopBtn = document.getElementById('loopBtn');
  if(loop == true){
    loopBtn.classList.add('loop');
  }
  else loopBtn.classList.remove('loop');
  loop = !loop;
  audioPlayer.loop = loop;
  console.log(loop);
}
document.addEventListener("DOMContentLoaded", function () {
  var audio = document.getElementById("music");
  var timeline = document.getElementById("timeline");
  var startTime = document.getElementById("start-time");
  var endTime = document.getElementById("end-time");

  audio.addEventListener("timeupdate", function () {
    var value = (audio.currentTime / audio.duration) * 100;
    timeline.value = value;

    // Format time as MM:SS
    var formatTime = function (time) {
      var minutes = Math.floor(time / 60);
      var seconds = Math.floor(time % 60);
      return (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
    };

    startTime.textContent = formatTime(audio.currentTime);
    endTime.textContent = formatTime(audio.duration);
  });

  timeline.addEventListener("input", function () {
    var value = timeline.value;
    var currentTime = (value / 100) * audio.duration;
    audio.currentTime = currentTime;
  });
  audio.addEventListener('ended', playNext);
});

