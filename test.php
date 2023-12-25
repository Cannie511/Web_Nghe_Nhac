<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Validation</title>
</head>
<body>

    <label for="passwordInput">Nhập mật khẩu:</label>
    <input type="password" id="passwordInput" oninput="validatePassword()">

    <p id="errorText" style="color: red;"></p>

    <script>
        function validatePassword() {
            var passwordInput = document.getElementById('passwordInput');
            var errorText = document.getElementById('errorText');

            if (passwordInput.value.length < 6) {
                errorText.innerText = 'Mật khẩu phải chứa ít nhất 6 ký tự.';
            } else {
                errorText.innerText = '';
            }
        }
    </script>

</body>
</html>
