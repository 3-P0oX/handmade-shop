<?php
session_start();

// تأكد من أن النموذج تم إرساله
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    // تفاصيل اتصال قاعدة البيانات
    include('config-db.php');

    // الحصول على بيانات المستخدم من النموذج
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // استعلام للتحقق من صحة بيانات تسجيل الدخول
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    // التحقق من وجود نتيجة واحدة على الأقل
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];
        if (password_verify($password, $stored_password)) {
            // تم التحقق بنجاح
            $_SESSION['user_id'] = $row['user_id'];
            header("Location: index.php");
            exit();
        } else {
            // كلمة المرور غير صحيحة
            $error = "بيانات تسجيل الدخول غير صحيحة";
        }
    } else {
        // فشل التحقق من بيانات تسجيل الدخول
        $error = "بيانات تسجيل الدخول غير صحيحة";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <div class="header-form">
            <div class="login-btn active" onclick="toggleForm('login')">تسجيل الدخول</div>
            <div class="sign-in-btn" onclick="toggleForm('signup')"><a href="signup.php">إنشاء حساب </a></div>
        </div>        
        <div class="form-content login-form active">
            <h2>تسجيل الدخول</h2>
            <?php if (isset($error)) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>
            <form action="#" method="POST">
                <input type="email" placeholder="البريد الإلكتروني" required name="email" autofocus>
                <input type="password" placeholder="كلمة المرور" required name="password" autofocus min="4">
                <button type="submit" name="login">تسجيل الدخول</button>
            </form>
        </div>
    </div>
    
    <script>
        function toggleForm(formType) {
            const loginBtn = document.querySelector('.login-btn');
            const signupBtn = document.querySelector('.sign-in-btn');
            const loginForm = document.querySelector('.login-form');
            const signupForm = document.querySelector('.sign-in-form');

            if (formType === 'login') {
                loginBtn.classList.add('active');
                signupBtn.classList.remove('active');
                loginForm.classList.add('active');
                signupForm.classList.remove('active');
            } else if (formType === 'signup') {
                loginBtn.classList.remove('active');
                signupBtn.classList.add('active');
                loginForm.classList.remove('active');
                signupForm.classList.add('active');
            }
        }
    </script>
</body>
</html>
