$(document).ready(function () {
  var backBtn = 0;
  $("#main_play").scroll(function () {
    if ($(this).scrollTop()) {
      $("#topMenu").css("background-color", "var(--primary-color-custom)");
      $("#topMenu").css("box-shadow", "1px 2px 5px black");
      $("#personal").css("color", "black");
    } else {
      $("#topMenu").css("background-color", "transparent");
      $("#personal").css("color", "white");
      $("#topMenu").css("box-shadow", "0 0 0 white");
    }
  });
  $(".menu_item").click(function () {
    $("#main_play").animate(
      {
        scrollTop: 0,
      },
      400
    );
    return false;
  });
  $(".index").click(function (event) {
    index = $(this).index();
    backBtn = index;
    $(".menu_item").removeClass("init");
    $(this).addClass("init");
    switch (index) {
      case 0:
        $(".layout.show").removeClass("show");
        $("#playlist").addClass("show");
        break;
      case 1:
        $(".layout.show").removeClass("show");
        $("#searchModal").addClass("show");
        var searchinput = document.getElementById("search_input");
        searchinput.focus();
        break;
      case 3:
        $(".layout.show").removeClass("show");
        $("#Ranked").addClass("show");
        break;
      default:
        break;
    }
    console.log(index);
  });
  $(".menu_item").click(function (event) {
    index = $(this).index();
    backBtn = index;
    $(".menu_item").removeClass("init");
    $(this).addClass("init");
    switch (index) {
      case 0:
        $(".layout.show").removeClass("show");
        $("#playlist").addClass("show");
        break;
      case 1:
        $(".layout.show").removeClass("show");
        $("#searchModal").addClass("show");
        var searchinput = document.getElementById("search_input");
        searchinput.focus();
        break;
      case 2:
        $(".layout.show").removeClass("show");
        $("#myPL").addClass("show");
        break;
      case 4:
        $(".layout.show").removeClass("show");
        $("#Ranked").addClass("show");
        break;
      case 5:
        $(".layout.show").removeClass("show");
        
        $("#LoveIt").addClass("show");
        break;
      default:
        break;
    }
    console.log(index);
  });
  
  $(".view_item").click(function () {
    $(".layout.show").removeClass("show");
    $("#music_list").addClass("show");
  });
  $("#backTab").click(function () {
    switch (backBtn) {
      case 0:
        $(".layout.show").removeClass("show");
        $("#playlist").addClass("show");
        break;
      case 1:
        $(".layout.show").removeClass("show");
        $("#searchModal").addClass("show");
        var searchinput = document.getElementById("search_input");
        searchinput.focus();
        break;
      case 2:
        $(".layout.show").removeClass("show");
        $("#myPL").addClass("show");
        break;
      case 3:
        $(".layout.show").removeClass("show");
        $("#Ranked").addClass("show");
        break;
      case 4:
        $(".layout.show").removeClass("show");
        $("#LoveIt").addClass("show");
        break;
      case 5:
        break;
      default:
        break;
    }
  });
  $('.log-in-for-next').click(function () {
    $('#alert-login').css("display", "block");
    setTimeout(function () {
      $('#alert-login').css("display", "none");
    }, 2500);
    $(".layout.show").removeClass("show");
    $("#playlist").addClass("show");
  });
  $("#btnPassConfirm").click(function () {
    $("#alert-success").css("display", "block");
    setTimeout(function () {
      $("#alert-success").css("display", "none");
    }, 2500);
    $("#ModalChangePass").modal("hide");
    return false;
  });
  $(".btnCancel").click(function () {
    $("#alert-warning").css("display", "bloack");
    setTimeout(function () {
      $("#alert-warning").css("display", "none");
    }, 2500);
  });
  const music = document.getElementById("music");
  $("#play_btn").click(function () {
    music.play();
  });
  $("#pause_btn").click(function () {
    music.pause();
  });
  // $('#newPlaylist').click(function () {
  //   $('#alert-login').css("display", "block");
  //   setTimeout(function () {
  //     $('#alert-login').css("display", "none");
  //   }, 2500);
  // })

});
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
var play_btn = document.getElementById("play_btn");
var pause_btn = document.getElementById("pause_btn");
var music_src = document.getElementById("music");
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
    topMenu.classList.toggle("hide");
    menu_cover.classList.toggle("hide");
  };
}
function showStopButton() {
  play_btn.style.display = "none";
  pause_btn.style.display = "inline-block";
}

function showPlayButton() {
  play_btn.style.display = "inline-block";
  pause_btn.style.display = "none";
}
function play() {
  var play = document.getElementById("play_btn");
  var pause = document.getElementById("pause_btn");
  play.style.display = "none";
  pause.style.display = "block";
  pause.style.position = "relative";
  var listId = [];
  var z = new XMLHttpRequest();
  z.onreadystatechange = function () {
    if (z.readyState == 4 && z.status == 200) {
      listId = JSON.parse(z.responseText);
      if (listId.length > 0) {
        var mabaihat = listId[currentSongIndex];
        var xhr = new XMLHttpRequest();
        xhr.open(
          "GET",
          "Xuly/increase_listen_count.php?Ma_Bai_Hat=" + mabaihat,
          true
        );
        xhr.send();
      }
    }
  };
  z.open("GET", "Xuly/layMa.php", true);
  z.send();
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
}

function log_in() {
  window.location = "log-in.php";
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

// chinh sửa ở đâyy
// var playlist = [];

// var xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function () {
//   if (xhr.readyState == 4 && xhr.status == 200) {
//     playlist = JSON.parse(xhr.responseText);
//     if (playlist.length > 0) {
//       audioPlayer.src = playlist[0];
//     }
//   }
// };
// // const temp = document.querySelector("#btn ");
// // temp.click = function(){

// // }
// xhr.open("GET", "Xuly/laypath.php", true);
// xhr.send();
// chỉnh sửa ơ
function increaseListenCount(songId) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "increase_listen_count.php?id=" + songId, true);
  xhr.send();
}
var currentSongIndex = 0;
var audioPlayer = document.getElementById("music");
var loop = false;

function playNext() {
  currentSongIndex++;
  if (currentSongIndex >= playlist.length) {
    currentSongIndex = 0;
  }
  var listId = [];
  var z = new XMLHttpRequest();
  z.onreadystatechange = function () {
    if (z.readyState == 4 && z.status == 200) {
      listId = JSON.parse(z.responseText);
      if (listId.length > 0) {
        var mabaihat = listId[currentSongIndex];
        var xhr = new XMLHttpRequest();
        xhr.open(
          "GET",
          "increase_listen_count.php?Ma_Bai_Hat=" + mabaihat,
          true
        );
        xhr.send();
      }
    }
  };
  z.open("GET", "Xuly/layMa.php", true);
  z.send();
  audioPlayer.src = playlist[currentSongIndex];
  audioPlayer.load();
  audioPlayer.play();
}
function playPrev() {
  currentSongIndex--;
  if (currentSongIndex < 0) currentSongIndex = 0;
  if (currentSongIndex >= playlist.length) {
    currentSongIndex = 0;
  }
  var listId = [];
  var z = new XMLHttpRequest();
  z.onreadystatechange = function () {
    if (z.readyState == 4 && z.status == 200) {
      listId = JSON.parse(z.responseText);
      if (listId.length > 0) {
        var mabaihat = listId[currentSongIndex];
        var xhr = new XMLHttpRequest();
        xhr.open(
          "GET",
          "increase_listen_count.php?Ma_Bai_Hat=" + mabaihat,
          true
        );
        xhr.send();
      }
    }
  };
  z.open("GET", "Xuly/layMa.php", true);
  z.send();
  audioPlayer.src = playlist[currentSongIndex];
  audioPlayer.load();
  audioPlayer.play();
}
// audioPlayer.src = playlist[currentSongIndex];
// audioPlayer.load();
// audioPlayer.play();

// function playPrev() {
//   currentSongIndex--;
//   if (currentSongIndex < 0) currentSongIndex = 0;
//   if (currentSongIndex >= playlist.length) {
//     currentSongIndex = 0;
//   }
//   audioPlayer.src = playlist[currentSongIndex];
//   audioPlayer.load();
//   audioPlayer.play();
// }
function Loop() {
  var loopBtn = document.getElementById("loopBtn");
  if (loop == true) {
    loopBtn.classList.add("loop");
  } else loopBtn.classList.remove("loop");
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
      return (
        (minutes < 10 ? "0" : "") +
        minutes +
        ":" +
        (seconds < 10 ? "0" : "") +
        seconds
      );
    };
    startTime.textContent = formatTime(audio.currentTime);
    endTime.textContent = formatTime(audio.duration);
  });
  timeline.addEventListener("input", function () {
    var value = timeline.value;
    var currentTime = (value / 100) * audio.duration;
    audio.currentTime = currentTime;
  });
  audio.addEventListener("ended", playNext);
});
$("#btnConfirm").click(function () {
  $("#alert-warning").css("opacity", "1");
  setTimeout(function () {
    $("#alert-warning").css("opacity", "0");
  }, 2500);
  $("#exampleModal").modal("hide");
});
$("#btnPassConfirm").click(function () {
  $("#alert-success").css("opacity", "1");
  setTimeout(function () {
    $("#alert-success").css("opacity", "0");
  }, 2500);
  $("#ModalChangePass").modal("hide");
  return false;
});
$(".btnCancel").click(function () {
  $("#alert-warning").css("opacity", "1");
  setTimeout(function () {
    $("#alert-warning").css("opacity", "0");
  }, 2500);
});
$(".btnChangePass").click(function () {
  $("#alert-login").css("display", "block");
  setTimeout(function () {
    $("#alert-login").css("display", "none");
  }, 2500);
});
