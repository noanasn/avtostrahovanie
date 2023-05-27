<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/auth.css">
    <title>Document</title>
</head>

<body>
        <div class="form_auth_block">
            <div class="form_auth_block_content">
                <p class="form_auth_block_head_text">Авторизация</p>
                <form class="form_auth_style" action="session.php" method="post">
                    <label>Логин</label>
                    <input type="text" name="log" placeholder="Ivan_ivanov" required>
                    <label>Пароль</label>
                    <input type="password" name="pass" placeholder="Pa$$w0rd" required>
                    <button class="form_auth_button" type="submit" name="form_auth_submit">Войти</button>
                </form>
            </div>
        </div>
    
</body>

</html>