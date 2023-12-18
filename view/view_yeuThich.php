<div id="LoveIt" class="layout">
    <div id="banner_play_list_LoveIt">
        <img src="IMAGE/LoveThumb.png" alt="">
        <div id="play_list_info">
            <strong style="font-size: 110%;">Playlist</strong><br>
            <strong style="font-size: 300%;"> PLAYLIST YÊU THÍCH CỦA TÔI</strong>
            <br>
        </div>
    </div>
    <div id="title_music">
        <div class="cover">
            <ion-icon id="playButton" name="play-circle-sharp"></ion-icon>
            <strong>Play</strong>
        </div>
    </div>
    <div id='music_panel'>
        <table class="table table-dark table-hover list">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">STT</th>
                    <th scope="col">Hình</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Tác giả, ca sĩ</th>
                    <th scope="col">Ngày phát hành</th>
                    <th scope="col">Thời lượng</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php loadYeuThich(); ?>
            </tbody>
        </table>
    </div>
</div>