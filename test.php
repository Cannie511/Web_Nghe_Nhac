<!-- <?php

require_once("DB/ketnoi.php");
$sql = "select * from nguoi_dung ";
$stm = $conn->prepare($sql);
$stm->execute();
$data = $stm->fetchAll(PDO::FETCH_ASSOC);



var_dump($data);

?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Timeline</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    .audio-container {
        text-align: center;
        width: 80%;
    }

    .timeline-container {
        position: relative;
    }

    #timeline {
        width: 100%;
    }

    #start-time,
    #end-time {
        position: absolute;
        top: 0;
        font-size: 12px;
    }

    #start-time {
        left: 0;
    }

    #end-time {
        right: 0;
    }

    input[type="range"] {
        transition: all 0.3s ease-in-out;
    }
</style>

<body>
    <div class="audio-container">
        <audio controls id="audio"
            src="https://vnso-pt-24-tf-a128-zmp3.zmdcdn.me/966012e4e868f2efc96237dedc1145af?authen=exp=1702026755~acl=/966012e4e868f2efc96237dedc1145af/*~hmac=082a75cb29b93bf5b0684f81ff20e085"></audio>
        <div class="timeline-container">
            <span id="start-time">0:00</span>
            <input type="range" id="timeline" min="0" value="0" step="1">
            <span id="end-time">0:00</span>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var audio = document.getElementById("audio");
            var timeline = document.getElementById("timeline");
            var startTime = document.getElementById("start-time");
            var endTime = document.getElementById("end-time");

            var lastTime = 0;
            var fps = 120; // 60 frames per second
            var frameDuration = 1000 / fps;

            function updateTimeline(timestamp) {
                var currentTime = audio.currentTime;

                if (timestamp - lastTime >= frameDuration || currentTime === 0) {
                    var value = (currentTime / audio.duration) * 100;
                    timeline.value = value;

                    // Format time as MM:SS
                    var formatTime = function (time) {
                        var minutes = Math.floor(time / 60);
                        var seconds = Math.floor(time % 60);
                        return (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
                    };

                    startTime.textContent = formatTime(currentTime);
                    endTime.textContent = formatTime(audio.duration);

                    lastTime = timestamp;
                }

                requestAnimationFrame(updateTimeline);
            }

            audio.addEventListener("timeupdate", function () {
                requestAnimationFrame(updateTimeline);
            });

            timeline.addEventListener("input", function () {
                var value = timeline.value;
                var currentTime = (value / 100) * audio.duration;
                audio.currentTime = currentTime;
            });

            updateTimeline(); // Kích thích bắt đầu cập nhật
        });
    </script>
</body>

</html>