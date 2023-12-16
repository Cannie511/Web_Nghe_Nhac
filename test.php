<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page</title>
</head>
<body>

<div class="view_item" id="1">Playlist 1</div>
<div class="view_item" id="2">Playlist 2</div>
<!-- Add more div.view_item as needed -->

<script>
  var playlist = [];
document.addEventListener('DOMContentLoaded', function () {
  
    var idPL = document.querySelectorAll('.view_item');
    idPL.forEach(function (div) {
        div.addEventListener('click', function () {
            var idPlaylist = div.id;
            console.log('idPlaylist:', idPlaylist);
            const xhrPath = new XMLHttpRequest();
            xhrPath.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    playlist = JSON.parse(this.responseText);
                    console.log(playlist);

                    // Rest of your code...
                }
            };
            xhrPath.open("GET", "Xuly/laypath.php?idPlaylist=" + idPlaylist, true);
            xhrPath.send();
        });
    });
});
</script>
<!-- #region-->
<script>
   var idPL = document.querySelectorAll('.view_item');
        idPL.forEach(function (div) {
            div.addEventListener('click', function () {
                var idPlaylist = div.id;
                console.log('idPlaylist:', idPlaylist);
                const xhrPath = new XMLHttpRequest();
                xhrPath.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(idPlaylist);
                    }
                };
                xhrPath.open("GET", "Xuly/laypath.php?idPlaylist=" + idPlaylist, true);
                xhrPath.send();
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        playlist = JSON.parse(xhr.responseText);
                        if (playlist.length > 0) {
                            // playCurrentSong();
                            console.log(playlist);
                        }
                        else {
                            console.log("playlist rỗng");
                        }
                    }
                };
                xhr.open("GET", "Xuly/laypath.php", true);
                xhr.send();
            });
        });
</script>
</body>
</html>
