<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button Click</title>
</head>
<body>

    <!-- Các button có class 'button' và id khác nhau -->
    <button class="button" id="button1">Button 1</button>
    <button class="button" id="button2">Button 2</button>
    <button class="button" id="button3">Button 3</button>

    <!-- Hiển thị kết quả từ PHP -->
    <p id="result"></p>

    <!-- JavaScript -->
    <script>
        // Lấy tất cả các button có class 'button'
        var buttons = document.querySelectorAll('.button');

        // Đặt sự kiện click cho mỗi button
        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Lấy giá trị ID của button được click
                var buttonId = button.id;

                // Sử dụng Ajax để gửi giá trị lên máy chủ
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Hiển thị kết quả từ PHP
                        document.getElementById('result').innerText = 'Kết quả từ PHP: ' + this.responseText;
                    }
                };
                xhr.open("GET", "process.php?buttonId=" + buttonId, true);
                xhr.send();
            });
        });
    </script>

</body>
</html>
