<?php
session_start();

// تأكد من أن النموذج تم إرساله
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
    // تفاصيل اتصال قاعدة البيانات
    include('config-db.php');

    // الحصول على بيانات المستخدم من النموذج
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
    $number = isset($_POST['number']) ? $_POST['number'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';

    // استعلام للتحقق مما إذا كان البريد الإلكتروني مستخدمًا بالفعل
    $check_email_query = "SELECT * FROM users WHERE email = '$email'";
    $check_email_result = $conn->query($check_email_query);

    if ($check_email_result->num_rows > 0) {
        // إذا تم العثور على بريد إلكتروني متطابق، يعرض رسالة الخطأ
        $error = "البريد الإلكتروني مستخدم بالفعل";
    } else {
        // التحقق من تطابق كلمة المرور وتأكيد كلمة المرور
        if ($password !== $confirm_password) {
            $error = "كلمة المرور وتأكيد كلمة المرور غير متطابقتين";
        } else {
            // تنفيذ استعلام إضافة مستخدم جديد إلى قاعدة البيانات
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $insert_user_query = "INSERT INTO users (user_name, email, password, number, location) VALUES ('$name', '$email', '$hashed_password', '$number', '$location')";
            $insert_user_result = $conn->query($insert_user_query);

            if ($insert_user_result) {
                // تم إضافة المستخدم بنجاح
                $success = "تم إنشاء حساب المستخدم بنجاح";
                header("Location: index.php");
                exit();
            } else {
                // فشل في إضافة المستخدم
                $error = "حدث خطأ أثناء إنشاء حساب المستخدم";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>إنشاء حساب</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <div class="header-form">
            <div class="login-btn" onclick="toggleForm('login')">تسجيل الدخول</div>
            <div class="sign-in-btn active" onclick="toggleForm('signup')">إنشاء حساب</div>
        </div>        
        <div class="form-content login-form">
            <h2>تسجيل الدخول</h2>
            <form action="login.php" method="POST">
                <input type="email" placeholder="البريد الإلكتروني" required name="email" autofocus>
                <input type="password" placeholder="كلمة المرور" required name="password" autofocus min="4">
                <button type="submit" name="login">تسجيل الدخول</button>
            </form>
        </div>
        <div class="form-content sign-in-form active">
            <h2>إنشاء حساب</h2>
            <?php if (isset($error)) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>
            <form action="#" method="POST">
                <input type="text" placeholder="الاسم" required name="name" autofocus>
                <input type="email" placeholder="البريد الإلكتروني" required name="email" autofocus>
                <input type="password" placeholder="كلمة المرور" required name="password" autofocus min="4">
                <input type="password" placeholder="تأكيد كلمة المرور" required name="confirm_password" autofocus min="4">
                <input type="text" placeholder="الرقم" required name="number" autofocus>
                <input type="text" placeholder="الموقع" required name="location" autofocus>
                <button type="submit" name="signup">إنشاء الحساب</button>
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
