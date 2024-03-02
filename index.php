<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Автострахование</title>
    <link rel="stylesheet" href="/mdb/css/mdb.min.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"> -->
    <link rel="stylesheet" href="mdb/css/icons.css">
    <?php session_start(); ?>
</head>
<style>
    .div-1 {
        background-color: #53699e;
        height: 250px;
    }

    .div-2 {
        background-color: #acadd2;
        height: 250px;
    }

    .div-3 {
        background-color: #312c4d;
        height: 250px;
    }
</style>

<body>
    <?php include "header.php"; ?>

    <div class="div-1">

    </div>
    
    <!-- Акции -->
    <div class="container">
        <div class="row">
            <!-- Колонка с текстом -->
            <div class="col-md-4">
                <h2>Акции</h2>
                <p>Здесь может быть описание ваших акций.</p>
            </div>
            <!-- Родительский контейнер для слайдера -->
            <div class="col-md-8">
                <div class="slider">
                    <div id="carouselExampleIndicators" class="carousel slide" data-mdb-ride="carousel" data-mdb-carousel-init>
                        <!-- Ваш слайдер здесь -->
                        <div class="carousel-indicators">
                            <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-mdb-interval="3000">
                                <img src="/img/москвич 3е.jpg" class="d-block w-100" alt="Wild Landscape" style="height: 500px;"/>
                            </div>
                            <div class="carousel-item" data-mdb-interval="3000">
                                <img src="/img/москвич 3.jpg" class="d-block w-100" alt="Camera" style="height: 500px;"/>
                            </div>
                            <div class="carousel-item" data-mdb-interval="3000">
                                <img src="/img/москвич 6.jpg" class="d-block w-100" alt="Exotic Fruits" style="height: 500px;"/>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="prev">
                            <span><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                            <span class="visually-hidden">Предыдущий</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="next">
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            <span class="visually-hidden">Следующий</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="div-2">
    <a href="/calc.php">Калькулятор</a>
    </div>
    <!-- Новости -->
    <div class="container">
        <div class="row justify-content-start mb-4">
            <div class="col-md-12">
                <h2>Новости</h2>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-md-4 mb-3 mt-3">
                <div class="card">
                    <img src="/img/news1.jpg" class="card-img-top" alt="Fissure in Sandstone" />
                    <div class="card-body">
                        <h5 class="card-title">29.02.2024</h5>
                        <p class="card-text">Что должно быть указано в бланке ОСАГО и как проверить, что он не поддельный.</p>
                        <a href="https://www.banki.ru/news/daytheme/?id=11000043" class="btn btn-primary" data-mdb-ripple-init>Читать</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mt-3">
                <div class="card">
                    <img src="/img/news2.jpg" class="card-img-top" alt="Fissure in Sandstone" />
                    <div class="card-body">
                        <h5 class="card-title">15.02.2024</h5>
                        <p class="card-text">Когда для ОСАГО нужен техосмотр и какие штрафы грозят за его отсутствие.</p>
                        <a href="https://www.banki.ru/news/daytheme/?id=10999944" class="btn btn-primary" data-mdb-ripple-init>Читать</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mt-3">
                <div class="card">
                    <img src="/img/news3.jpg" class="card-img-top" alt="Fissure in Sandstone" />
                    <div class="card-body">
                        <h5 class="card-title">07.02.2024</h5>
                        <p class="card-text">Как правильно и безопасно перевозить ребенка в автомобиле.</p>
                        <a href="https://www.banki.ru/news/daytheme/?id=10999522" class="btn btn-primary" data-mdb-ripple-init>Читать</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="div-3"></div>

    <script src="mdb/js/mdb.min.js"></script>
</body>

</html>