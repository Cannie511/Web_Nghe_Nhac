<div id="music_list" class="layout">
    <div id="banner_play_list">
        <img src="IMAGE/Hay-Trao-Cho-Anh-3.jpg" alt="">
        <div id="play_list_info">
            <strong style="font-size: 110%;">playlist</strong><br>
            <strong style="font-size: 300%;">PLAYLIST của tôi</strong>
            <br>
        </div>
    </div>
    <div id="title_music">
        <div class="cover">
            <ion-icon id="playButton" name="play-circle-sharp"></ion-icon>
            <strong>Play</strong>
        </div>

        <!-- <ion-icon name="heart-outline"></ion-icon> -->
    </div>
    <div id='music_panel'>
        <table class="table table-dark table-hover list" id="viewMusic">
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
            <tbody id='result'>
            </tbody>
        </table>
    </div>
</div>
<div id="music_list_user" class="layout">
    <div id="banner_play_list_user">
        <img src="IMAGE/banner2.png" alt="">
        <div id="play_list_info">
            <strong style="font-size: 110%;">playlist</strong><br>
            <strong style="font-size: 300%;">PLAYLIST của tôi</strong>
            <br>
        </div>
    </div>
    <div id="title_music">
        <div class="cover">
            <ion-icon id="playButton" name="play-circle-sharp"></ion-icon>
            <strong>Play</strong>
        </div>
        <!-- <ion-icon name="heart-outline"></ion-icon> -->
    </div>
    <div id='music_panel'>
        <table class="table table-dark table-hover list" id="viewMusic">
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
            <tbody id='result_userplaylist'>
            </tbody>
        </table>
    </div>
</div>
<div id="playlist" class="col-md-5 layout show">
    <div class="title_pl">
        <h1>BÀI HÁT MỚI</h1>
        <table class="table table-dark table-hover list">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">STT</th>
                    <th scope="col">Hình</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Tác giả, ca sĩ</th>
                    <th scope="col">Ngày phát hành</th>
                </tr>
            </thead>
            <tbody>
                <?php getAllMusic(); ?>
            </tbody>
        </table>
    </div>
    <div class="title_pl">
        <h1>TẤT CẢ PLAYLIST HIỆN CÓ</h1>
    </div>
    <div id="1" class="list_item">
        <?php loadPlaylist();
        ?>
    </div>
    <div class="title_pl">
        <h1>CA SĨ HIỆN CÓ</h1>
    </div>
    <div id="1" class="list_item">
        <?php loadNgheSi(); ?>
    </div>
</div>