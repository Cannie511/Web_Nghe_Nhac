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
mode.onclick = function nightMode() {
  mode.classList.toggle("night");
  night.classList.toggle("night_body");
  turn.classList.toggle("night_on");
  btn_play_light.classList.toggle("light_btn");
  time_play.classList.toggle("light_time_play");
};
function log_in() {
  window.location = "log-in.html";
}
