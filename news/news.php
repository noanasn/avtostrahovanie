<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости</title>
    <link rel="stylesheet" href="/mdb/css/mdb.min.css">
    <link rel="stylesheet" href="/mdb/css/icons.css">
    <?session_start();?>

</head>

<body>
    <?php include "../header.php";?>
    <div class="container" style="margin-top: 61px;">
        <div class="row justify-content-start mb-4">
            <div class="col-md-12">
                <h2>Новости</h2>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-md-4 mb-3 mt-3">
                <div class="card">
                    <img src="/news/img_for_news/news1.jpg" class="card-img-top" alt="Fissure in Sandstone" />
                    <div class="card-body">
                        <h5 class="card-title">29.02.2024</h5>
                        <p class="card-text">Что должно быть указано в бланке ОСАГО и как проверить, что он не поддельный.</p>
                        <a href="/news/news-1.php" class="btn btn-outline-dark" data-mdb-ripple-init>Читать</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mt-3">
                <div class="card">
                    <img src="/news/img_for_news/news2.jpg" class="card-img-top" alt="Fissure in Sandstone" />
                    <div class="card-body">
                        <h5 class="card-title">15.02.2024</h5>
                        <p class="card-text">Когда для ОСАГО нужен техосмотр и какие штрафы грозят за его отсутствие.</p>
                        <a href="/news/news-2.php" class="btn btn-outline-dark" data-mdb-ripple-init>Читать</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mt-3">
                <div class="card">
                    <img src="/news/img_for_news/news3.jpg" class="card-img-top" alt="Fissure in Sandstone" />
                    <div class="card-body">
                        <h5 class="card-title">07.02.2024</h5>
                        <p class="card-text">Как правильно и безопасно перевозить ребенка в автомобиле.</p>
                        <a href="/news/news-3.php" class="btn btn-outline-dark" data-mdb-ripple-init>Читать</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mt-3">
                <div class="card">
                    <img src="/news/img_for_news/news4.jpg" class="card-img-top" alt="Fissure in Sandstone" />
                    <div class="card-body">
                        <h5 class="card-title">25.01.2024</h5>
                        <p class="card-text">Как получить максимальную выгоду при оформлении ОСАГО на маркетплейсе.</p>
                        <a href="/news/news-4.php" class="btn btn-outline-dark" data-mdb-ripple-init>Читать</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mt-3">
                <div class="card">
                    <img src="/news/img_for_news/news5.jpg" class="card-img-top" alt="Fissure in Sandstone"/>
                    <div class="card-body">
                        <h5 class="card-title">12.01.2024</h5>
                        <p class="card-text">В России выросли продажи электронных полисов ОСАГО</p>
                        <a href="/news/news-5.php" class="btn btn-outline-dark" data-mdb-ripple-init>Читать</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mt-3">
                <div class="card">
                    <img src="/news/img_for_news/news6.jpg" class="card-img-top" alt="Fissure in Sandstone" />
                    <div class="card-body">
                        <h5 class="card-title">05.01.2024</h5>
                        <p class="card-text">Почему после внесения изменений в ОСАГО полис может подорожать.</p>
                        <a href="/news/news-6.php" class="btn btn-outline-dark" data-mdb-ripple-init>Читать</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../footer.php"; ?>
    <script src="/mdb/js/mdb.min.js"></script>
</body>

</html>