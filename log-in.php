<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login page</title>
    <link rel="stylesheet" href="style/log-in.css" />
</head>

<body>
    <div id="container">
        <div id="h">
            <h2>
                Đăng nhập vào TRIVIE
            </h2>
        </div>
        <div id="q1">
            <!-- <div id="g1">
                <img id="g2" src="IMAGE/logogg.png" />
                <a id="g3" href="">
                    Tiếp tục bằng Google</a>
            </div>
            <div id="f1">
                <img id="f2" src="IMAGE/logofb.png" />
                <a id="f3" href="">
                    Tiếp tục bằng Facebook</a>
            </div>
            <div>
                <div id="a1">
                    <img id="a2" src="IMAGE/logoap.png" />
                    <a id="a3" href="">
                        Tiếp tục bằng Apple</a>
                </div>
                <div id="d1">
                    <a id="d3" href="">Tiếp tục bằng số điện thoại</a>
                </div>
            </div> -->
            <!-- <hr id="hr"> -->
            <form id="login-form" action="" method="POST" onsubmit="return handleSubmit(event)">
                <div class="product-item">
                    <div class="down-content">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <br />
                        <div id="login-response">
                           
                        </div>
                        <button class="dn" type="submit">Đăng nhập</button>
                        <p class="mt-2">
                            <a id="mt1" href="Register.php">Đăng ký tài khoản</a>
                            <!-- <a id="mt2" href="forgot_password.php">Quên mật khẩu ?</a> -->
                        </p>
                    </div>
                </div>
            </form>
            <!-- <a href="" id="qmk">Quên mật khẩu của bạn ?</a> -->

        </div>
        <!-- <div id="dctk">
            <p id="lm">Bạn chưa có tài khoản? <a id="td" href=""> Đăng ký Trivie.</a></p>
        </div> -->
    </div>
    <script>
    function handleSubmit(event) {
        event.preventDefault();
        fetch('Xuly/handleLogin.php', {
                method: 'POST',
                body: new FormData(event.target)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.id ) {
                    sessionStorage.setItem("id", data.id);
                    sessionStorage.setItem("role", data.role);
                    window.location = "index-ID.php";
                } else {
                    let resp = document.getElementById("login-response");
                    resp.innerHTML = `<p style="color: red;">${data.message}</p>`;
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });

        return false;
    }
    </script>
     <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    document.addEventListener('DOMContentLoaded', function() {
        let loginForm = document.getElementById('login-form');
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();

        });
    });
    </script>
</body>

</html>