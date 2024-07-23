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
    <form action="index.php?page=adduser" method="post" onsubmit="return check()">
        <h2>Đăng Ký</h2>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required />
            <span id="email-error" class="error-message"></span>
        </div>
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
            <label for="confirm_password">Nhập lại mật khẩu:</label>
            <input type="password" id="confirm_password" name="confirm_password" required />
            <span id="confirm_password-error" class="error-message"></span>
        </div>
        <div class="form-group">
            <input name="sub" type="submit" value="Đăng Ký">
        </div>
    </form>
    <div class="other">
        <div class="text">
            <div>Bạn đã có tài khoản? <a href="index.php?page=signin">Đăng nhập ngay!</a></div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const emailInput = document.getElementById("email");
        const usernameInput = document.getElementById("username");
        const passwordInput = document.getElementById("password");
        const confirm_passwordInput = document.getElementById("confirm_password");

        emailInput.addEventListener("blur", validateEmail);
        usernameInput.addEventListener("blur", validateUsername);
        passwordInput.addEventListener("blur", validatePassword);
        confirm_passwordInput.addEventListener("blur", validateConfirmPassword);

        function validateEmail() {
            const emailError = document.getElementById("email-error");
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(emailInput.value)) {
                emailError.textContent = "Email không hợp lệ.";
            } else {
                emailError.textContent = "";
            }
        }

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

        function validateConfirmPassword() {
            const confirmPasswordError = document.getElementById("confirm_password-error");
            if (confirm_passwordInput.value !== passwordInput.value) {
                confirmPasswordError.textContent = "Mật khẩu nhập lại không khớp.";
            } else {
                confirmPasswordError.textContent = "";
            }
        }
    });

    function check() {
        validateEmail();
        validateUsername();
        validatePassword();
        validateConfirmPassword();

        return document.querySelectorAll('.error-message:empty').length === 4;
    }
</script>