<div class='card-body ' id="duyetNhac">
    <div class='card-header'>
        <h1><strong>Quản Lý Duyệt Nhạc</strong></h1>
    </div>
    <nav class="navbar bg-light">
        <div class="search_input md-8">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="ID người dùng" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </nav>
    <table class="table table-dark table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Hình</th>
                <th scope="col">Tiêu Đề</th>
                <!-- <th scope="col">Tác Giả, ca sĩ</th> -->
                <th scope="col">Ngày Phát Hành</th>
                <th scope="col">Thời Lượng</th>
                <th scope="col">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php loadNhacDuyet(); ?>

        </tbody>
    </table>
    <nav class="navbar bg-light">
        <div class="search_input md-8">
            <form class="d-flex" role="search">
                <button type="button" class="btn btn-success right">Lưu thay đổi</button>
            </form>
        </div>
    </nav>
</div>