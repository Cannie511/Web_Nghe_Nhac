<div class='card-body ' id="duyetNhac">
    <div class='card-header'>
        <h1><strong>Quản Lý Duyệt Nhạc</strong></h1>
    </div>
   
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
    
</div>

<script>
function submitForm(button) {
    var maDuyet = button.getAttribute("data-ma-duyet");
    var action = button.getAttribute("data-action");
    document.getElementById("maDuyetInput").value = maDuyet;
    document.getElementById("duyetForm").innerHTML += "<input type='hidden' name='action' value='" + action + "'>";
    document.getElementById("duyetForm").submit();
}
</script>