<div class='card-body' id="Account">
    <div class='card-header'>
        <h1><strong>Quản lý tài khoản</strong></h1>
    </div>
    <nav class="navbar bg-light">
        <div class="search_input md-8">
            <form class="d-flex" role="search" method="get" action="xuLyTimKiem.php">
                <input class="form-control me-2" type="search" placeholder="ID người dùng" aria-label="Search"
                    name="IDsearch">
                <button class="btn btn-outline-success" type="submit" name="timKiem"><i
                        class="fas fa-search"></i></button>
            </form>
        </div>
    </nav>
    <table class="table table-dark table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tài khoản</th>
                <th scope="col">Mật khẩu</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php loadUserAccount(); ?>
        </tbody>
    </table>
</div>
<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="editRole"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Quyền Truy Cập</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <strong style="font-size: 20px">Chỉnh sửa quyền truy cập</strong>
        <form action="" id="editUserRole" method="get" onsubmit="">
            <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="tenPlaylist">
                <option value="0" selected>Người dùng</option>
                <option value="1">Nghệ sĩ</option>
                <option value="2">Admin</option>
            </select>
            <input type="hidden" id="" name="">
            <button type="submit" class="btn btn-success float-sm-end">Lưu</button>
        </form>

    </div>
</div>