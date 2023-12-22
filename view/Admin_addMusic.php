
<div class='card-body' id="addMusic">
    <div class="container max-width-xxl">
    <?php include "XuLy/AddNhac.php";?>
        <h1 class="text-center mb-4"><strong>Thêm Nhạc Mới</strong> </h1>

        <form action="Admin.php?action=addMusic" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="songTitle" class="form-label">Tiêu đề bài hát</label>
                    <input type="text" class="form-control" id="songTitle" name="songTitle" required>
                </div>

                <div class="col-md-6">
                    <label for="artistName" class="form-label">Tên Nghệ Sĩ</label>
                    <input type="text" class="form-control" id="artistName" name="artistName" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="duration" class="form-label">Thời Lượng (giây)</label>
                    <input type="number" class="form-control" id="duration" name="duration" required>
                </div>

                <div class="col-md-6">
                    <label for="coverImage" class="form-label">Banner Bài Hát</label>
                    <input type="file" class="form-control" id="coverImage" name="coverImage" accept="image/*" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="musicFile" class="form-label">File Âm Thanh</label>
                    <input type="file" class="form-control" id="musicFile" name="musicFile" required>
                </div>

                <div class="col-md-6">
                    <label for="musicGenre" class="form-label">Thể Loại Bài Hát</label>
                    <select class="form-select" id="musicGenre" name="musicGenre" required>
                        <?php loadTheLoai() ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="country" class="form-label">Quốc Gia</label>
                    <select class="form-select" id="country" name="country" required>
                        <?php
                        loadQuocGia();
                        ?>
                    </select>
                </div>

            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary right" name="SubmitMusic">Add Music</button>
                </div>
            </div>
        </form>


        <form id="themQuocGia" action="Admin.php?action=addMusic" method="post" class="form-inline">
            <h1>Thêm Quốc Gia</h1>
            <div class="form-group mx-sm-3 mb-2">
                <label for="countryName" class="sr-only">Tên Quốc Gia</label>
                <input type="text" class="form-control" id="countryName" name="countryName" placeholder="Tên Quốc Gia"
                    required>
            </div>
            <button type="submit"  class="btn btn-primary mb-2">Thêm mới</button>
        </form>
        <?php include "XuLy/themQuocGia.php";?>

        <form action="Admin.php?action=addMusic" method="post" id="themTheLoai">
            <h1 class="mt-4">Thêm Thể Loại</h1>
            <div class="form-group mx-sm-3 mb-2">
                <label for="genreName" class="sr-only">Genre Name:</label>
                <input type="text" class="form-control" id="genreName" name="genreName" placeholder="Tên Thể Loại"
                    required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Thêm Mới</button>
        </form>
        <?php include "XuLy/themTheLoai.php";?>
        <br>
        <table class="table table-light table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hình</th>
                    <th scope="col">Tiêu Đề</th>
                    <th scope="col">Tác Giả, ca sĩ</th>
                    <th scope="col">Ngày Phát Hành</th>
                    <th scope="col">Thời Lượng</th>
                    <th scope="col">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php loadNhacAdmin(); ?>
            </tbody>
        </table>
    </div>
    <div id="result_QGTL"></div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function newCountry() {
        var name = document.getElementById('countryName').value;
        var xhr = new XMLHttpRequest();

        // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('result_QGTL').innerHTML = xhr.responseText;
            }
        };
        xhr.open('POST', '../Xuly/themQuocGia.php', true);
        // Gửi dữ liệu form đến file xử lý
        xhr.send('countryName=' + encodeURIComponent(name));
    }
</script>