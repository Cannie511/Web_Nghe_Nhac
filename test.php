<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Ẩn nút Dừng mặc định */
    #btnStop {
      display: none;
    }
  </style>
</head>
<body>

<!-- Nút Play -->
<div id="btnPlay" onclick="playAudio()">Play</div>

<!-- Nút Dừng -->
<div id="btnStop" onclick="stopAudio()">Dừng</div>

<!-- Đối tượng Audio -->
<audio id="myAudio" onplay="showStopButton()" onpause="showPlayButton()">
  <source src="your-audio-file.mp3" type="audio/mp3">
  Your browser does not support the audio element.
</audio>

<script>
  var audio = document.getElementById("myAudio");
  var btnPlay = document.getElementById("btnPlay");
  var btnStop = document.getElementById("btnStop");

  function playAudio() {
    audio.play();
  }

  function stopAudio() {
    audio.pause();
    audio.currentTime = 0;
  }

  function showStopButton() {
    btnPlay.style.display = "none";
    btnStop.style.display = "inline-block";
  }

  function showPlayButton() {
    btnPlay.style.display = "inline-block";
    btnStop.style.display = "none";
  }
</script>

</body>
</html>
