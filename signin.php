<nav class="main-menu">
    <ul>
        <li><a href="index.php?page=home">Trang chủ</a></li>
        <li>
            <a href="products.html">Sản phẩm</a>

        </li>
        <li><a href="#">Giới thiệu</a></li>
        <li><a href="#">Liên hệ</a></li>
    </ul>
</nav>
<div class="registration-form">
    <h2>Đăng Nhập</h2>
    <form action="index.php?page=checkuser" method="post" onsubmit="return check()">
        <div class="form-group">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" required />
            <span id="username-error" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required />
            <span id="password-error" class="error-message"></span>
        </div>
        <div class="form-group">
            <input name="sub" type="submit" value="Đăng Nhập">
        </div>
    </form>
    <div class="other">
        <div class="text">
            <div>Bạn chưa có tài khoản? <a href="index.php?page=signup">Đăng ký ngay!</a></div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const usernameInput = document.getElementById("username");
        const passwordInput = document.getElementById("password");

        usernameInput.addEventListener("blur", validateUsername);
        passwordInput.addEventListener("blur", validatePassword);

        function validateUsername() {
            const usernameError = document.getElementById("username-error");
            if (usernameInput.value.length < 8) {
                usernameError.textContent = "Tên đăng nhập phải có ít nhất 8 ký tự.";
            } else {
                usernameError.textContent = "";
            }
        }

        function validatePassword() {
            const passwordError = document.getElementById("password-error");
            if (passwordInput.value.length < 8) {
                passwordError.textContent = "Mật khẩu phải có ít nhất 8 ký tự.";
            } else {
                passwordError.textContent = "";
            }
        }
    });

    function check() {
        validateUsername();
        validatePassword();

        return document.querySelectorAll('.error-message:empty').length === 2;
    }

    function validateUsername() {
        const usernameError = document.getElementById("username-error");
        const usernameInput = document.getElementById("username");
        if (usernameInput.value.length < 8) {
            usernameError.textContent = "Tên đăng nhập phải có ít nhất 8 ký tự.";
        } else {
            usernameError.textContent = "";
        }
    }

    function validatePassword() {
        const passwordError = document.getElementById("password-error");
        const passwordInput = document.getElementById("password");
        if (passwordInput.value.length < 8) {
            passwordError.textContent = "Mật khẩu phải có ít nhất 8 ký tự.";
        } else {
            passwordError.textContent = "";
        }
    }
</script>
