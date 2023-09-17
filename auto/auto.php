<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="../mdb/css/mdb.min.css" />
    <link rel="stylesheet" href="../mdb/css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
</head>

<body>
    <!-- <div class="form_auth_block">
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
    </div> -->
    <form action="session.php" method="post">
        <section class="intro">
            <div class="mask d-flex align-items-center h-100" style="background-color: #D6D6D6">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card" style="border-radius: 1rem;">
<?php require "../header.php"; ?>
                                <div class="card-body p-5 text-center">

                                    <div class="my-md-5 pb-5">

                                        <h1 class="fw-bold mb-0">Добро пожаловать</h1><br>

                                        <!-- <i class="fas fa-user-astronaut fa-3x my-5"></i> -->

                                        <div class="form-outline mb-4">
                                            <input type="text" name="log" id="typeLog" class="form-control form-control-lg" />
                                            <label class="form-label" for="typeLog">Логин</label>
                                        </div>

                                        <div class="form-outline mb-5">
                                            <input type="password" name="pass" id="typePassword" class="form-control form-control-lg" />
                                            <label class="form-label" for="typePassword">Пароль</label>
                                        </div>

                                        <button class="btn btn-primary btn-lg btn-rounded gradient-custom text-body px-5" name="form_auth_submit" type="submit">Войти</button>

                                    </div>

                                    <!-- <div>
                                        <p class="mb-0">Don't have an account? <a href="#!" class="text-body fw-bold">Sign Up</a></p>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>   
    </form>
    <script src="../mdb/js/mdb.min.js"></script>
</body>

</html>