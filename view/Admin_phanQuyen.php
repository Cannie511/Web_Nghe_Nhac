<div class='card-body ' id="Permission">
    <div class='card-header'>
        <h1><strong>Quản Lý Quyền Truy Cập</strong></h1>
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
                <th scope="col">Tài khoản</th>
                <th scope="col">Mật khẩu</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Ngày sinh</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope='row'>#1</th>
                <td>admin@trivieco.com</td>
                <td><input type='password' id='pass' readonly value='Abc123@'></td>
                <td>
                    <Select>
                        <option value="0">Người dùng</option>
                        <option value="1">Nghệ sĩ</option>
                        <option value="2">Admin</option>
                    </Select>
                </td>
                <td>1/1/2023</td>
            </tr>
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