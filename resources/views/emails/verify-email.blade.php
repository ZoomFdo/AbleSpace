<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Підтвердження e-mail</title>
</head>
<body>
    <p>Дякуємо за реєстрацію!</p>
    <p>Щоб підтвердити свій e-mail, перейдіть за посиланням:</p>
    <a href="{{ url('/api/auth/verify-email?token=' . $token . '&email=' . $email) }}">
        Підтвердити e-mail
    </a>
    <p>Якщо це не ви, ігноруйте цей лист.</p>
</body>
</html>