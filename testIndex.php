<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Tbody on Option Change</title>
    <style>
        .hidden-tbody {
            display: none;
        }
    </style>
</head>
<body>

<select id="selectOption">
    <option value="0">Select an option</option>
    <option value="1">Show tbody</option>
</select>

<table>
    <thead>
        <tr>
            <th>Header 1</th>
            <th>Header 2</th>
        </tr>
    </thead>
    <tbody id="myTbody" class="hidden-tbody">
        <tr>
            <td>Data 1</td>
            <td>Data 2</td>
        </tr>
    </tbody>
</table>

<script>
    // Lắng nghe sự kiện onchange của select
    document.getElementById('selectOption').onchange = function() {
        // Lấy giá trị đã chọn
        var selectedValue = this.value;

        // Lấy thẻ tbody
        var tbody = document.getElementById('myTbody');

        // Kiểm tra giá trị đã chọn và hiển thị/ẩn tbody tương ứng
        if (selectedValue === '1') {
            tbody.classList.remove('hidden-tbody'); // Hiển thị tbody
        } else {
            tbody.classList.add('hidden-tbody'); // Ẩn tbody
        }
    };
</script>

</body>
</html>
