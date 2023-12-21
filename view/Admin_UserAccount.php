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