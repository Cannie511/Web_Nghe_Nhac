<div class="container mt-5 layout" id="addMusicLayout">
    <h2 style="color: white;" class="mb-4">Thông Tin Bài Hát</h2>
    <form action="Index-ID.php" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col">
                <label for="tenBaiHat" class="form-label">Tên Bài Hát</label>
                <input type="text" class="form-control" id="tenBaiHat" name="tenBaiHat" required>
            </div>

            <div class="col">
                <label for="anhBia" class="form-label">Ảnh Bìa</label>
                <input type="file" class="form-control" id="anhBia" name="anhBia" accept="image/*" required>
            </div>

            <div class="col">
                <label for="thoiLuong" class="form-label">Thời Lượng (giây)</label>
                <input type="number" class="form-control" id="thoiLuong" name="thoiLuong" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="theLoai" class="form-label">Thể Loại</label>
                <select class="form-select" id="musicGenre" name="musicGenre" required>
                    <?php loadTheLoai() ?>
                </select>
            </div>

            <div class="col">
                <label for="quocGia" class="form-label">Quốc Gia</label>
                <select class="form-select" id="country" name="country" required>
                    <?php
                    loadQuocGia();
                    ?>
                </select>
            </div>

            <div class="col">
                <label for="fileAmNhac" class="form-label">File Âm Nhạc</label>
                <input type="file" class="form-control" id="fileAmNhac" name="fileAmNhac" accept="audio/*" required>
            </div>
        </div>

        <button type="submit" name="submitAddMusic" class="btn btn-primary">Thêm Nhạc</button>
    </form>
</div>