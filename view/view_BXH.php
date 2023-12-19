<div id="Ranked" class="layout">
    <div id="banner_play_list_BXH">
        <img src="IMAGE/bannerBXH.png" alt="">
        <div id="play_list_info">
            <strong style="font-size: 110%;">Bảng Xếp Hạng</strong><br>
            <strong style="font-size: 300%;">V-POP INDIE Việt</strong>
            <br>
        </div>
    </div>
    <div id="title_music">
        <div class="cover">
            <ion-icon id="playButton" name="play-circle-sharp"></ion-icon>
            <strong>Play</strong>
        </div>
        <select class="form-select form-select-lg mb-3 BXH_item" aria-label=".form-select-lg example">
            <option selected>Bảng xếp hạng theo lượt thích</option>
            <option value="1">Bảng xếp hạng theo Quốc gia</option>
        </select>
    </div>
    <div id='music_panel'>
        <table class="table table-dark table-hover list">
            <thead>
                <tr>
                    <th scope="col">Hạng</th>
                    <th scope="col">Hình</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Tác giả, ca sĩ</th>
                    <th scope="col">Ngày phát hành</th>
                    <th scope="col">Thời lượng</th>
                    <th scope="col">Lượt nghe</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                <?php loadBXHTuan(); ?>
            </tbody>
        </table>
    </div>
</div>