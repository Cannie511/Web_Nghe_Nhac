<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Content Loading</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <a href="#" class="dashboard-nav-dropdown-item" id="loadThemNhac">Thêm nhạc mới</a>

    <div id="root"></div>

    <script>
        $(document).ready(function () {
            // Gán sự kiện click cho thẻ a
            $("#loadThemNhac").click(function (e) {
                e.preventDefault();
                // Sử dụng jQuery load để include nội dung từ file PHP vào div#root
                $("#root").load("ThemNhac.php");
            });
        });
    </script>

</body>
</html>
