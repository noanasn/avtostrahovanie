<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Автострахование</title>
    <link rel="stylesheet" href="/mdb/css/mdb.min.css">
    <link rel="stylesheet" href="mdb/css/icons.css">
    <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
    session_start();
    $marks_data  = mysqli_query($db, "SELECT * FROM `marka` order by Nazvanie ASC");
    ?>
</head>

<body>
    <?php include "header.php"; ?>
    <!-- Акции -->
    <div class="container" style="margin-top: 61px">
        <div class="row">
            <!-- Колонка с текстом -->
            <div class="col-md-4">
                <h2 style="margin-bottom: 20px;">Акции</h2>
                <p><b>&#171;Безопасное вождение&#187;</b><br>Клиенты, которые успешно завершают курс по безопасному вождению, получают скидку на ОСАГО или дополнительные бонусы.</p>
                <p><b>&#171;Безаварийное вождение&#187;</b><br>При условии отсутствия ДТП за год предоставляется скидка на ОСАГО или дополнительные услуги.</p>
                <p><b>&#171;Бесплатный технический осмотр&#187;</b><br>При оформлении ОСАГО предоставляется бесплатный технический осмотр автомобиля в выбранном сервисном центре.</p>
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
                                <img src="/img/moskvich_text.jpg" class="d-block w-100" alt="Wild Landscape" style="height: 500px;" />
                            </div>
                            <div class="carousel-item" data-mdb-interval="3000">
                                <img src="/img/uaz_text.jpg" class="d-block w-100" alt="Camera" style="height: 500px;" />
                            </div>
                            <div class="carousel-item" data-mdb-interval="3000">
                                <img src="/img/lada_text.jpg" class="d-block w-100" alt="Exotic Fruits" style="height: 500px;" />
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
    <!-- Новости -->
    <div class="container border-top">
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
                        <!-- <a href="https://www.banki.ru/news/daytheme/?id=11000043" class="btn btn-primary" data-mdb-ripple-init>Читать</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mt-3">
                <div class="card">
                    <img src="/news/img_for_news/news2.jpg" class="card-img-top" alt="Fissure in Sandstone" />
                    <div class="card-body">
                        <h5 class="card-title">15.02.2024</h5>
                        <p class="card-text">Когда для ОСАГО нужен техосмотр и какие штрафы грозят за его отсутствие.</p>
                        <!-- <a href="https://www.banki.ru/news/daytheme/?id=10999944" class="btn btn-primary" data-mdb-ripple-init>Читать</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mt-3">
                <div class="card">
                    <img src="/news/img_for_news/news3.jpg" class="card-img-top" alt="Fissure in Sandstone" />
                    <div class="card-body">
                        <h5 class="card-title">07.02.2024</h5>
                        <p class="card-text">Как правильно и безопасно перевозить ребенка в автомобиле.</p>
                        <!-- <a href="https://www.banki.ru/news/daytheme/?id=10999522" class="btn btn-primary" data-mdb-ripple-init>Читать</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="text-end" style="margin-bottom: 20px;">
            <a href="/news/news.php" class="btn btn-outline-dark">Читать новости</a>
        </div>
    </div>
    <!-- Калькулятор -->
    <div class="container border-top">
        <div class="row justify-content-start mb-4">
            <div class="col-md-12">
                <h2>Калькулятор страховки</h2>
                <p>Наш сервис предоставляет возможность расчета примерной стоимости страхового полиса прямо здесь, онлайн.</p>
            </div>
        </div>
        <form id="insuranceForm" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="marka" class="form-label">Марка авто</label>
                    <select class="form-select" name="marka" id="marka" required>
                        <option value="" disabled selected hidden>Выберите марку</option>
                        <?php while ($marks = mysqli_fetch_array($marks_data)) {
                            if ($cars['idMarka'] === $marks['id']) {
                                echo "<option value = $marks[id] selected>$marks[Nazvanie]</option>";
                            } else {
                                echo "<option value = $marks[id]>$marks[Nazvanie]</option>";
                            }
                        } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="model" class="form-label">Модель авто</label>
                    <select class="form-select" name="model" id="model" required>
                        <option value="" disabled selected hidden>Выберите модель</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="carPower" class="form-label">Мощность</label>
                    <input type="text" class="form-control" name="carPower" id="carPower" required />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="driverAge" class="form-label">Возраст водителя (лет)</label>
                    <input type="number" class="form-control" name="driverAge" id="driverAge" min="16" max="100" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="driverExperience" class="form-label">Стаж водителя (лет)</label>
                    <input type="number" class="form-control" name="driverExperience" id="driverExperience" min="0" max="100" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="usagePeriod" class="form-label">Срок страхования</label>
                    <select class="form-select" name="usagePeriod" id="usagePeriod" required>
                        <option value="" disabled selected hidden>Выберите срок</option>
                        <option value="3">3 месяца</option>
                        <option value="4">4 месяца</option>
                        <option value="5">5 месяцев</option>
                        <option value="6">6 месяцев</option>
                        <option value="7">7 месяцев</option>
                        <option value="8">8 месяцев</option>
                        <option value="9">9 месяцев</option>
                        <option value="10">10 месяцев и более</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label">Город регистрации собственника автомобиля</label>
                    <select class="form-select" name="city" id="city" required>
                        <option value="" disabled selected hidden>Выберите город</option>
                        <option value="1.48">Владимир</option>
                        <option value="1.24">Волгоград</option>
                        <option value="1.4">Воронеж</option>
                        <option value="1.64">Екатеринбург</option>
                        <option value="1.8">Казань</option>
                        <option value="1.08">Калининград</option>
                        <option value="1.64">Краснодар</option>
                        <option value="1.64">Красноярск</option>
                        <option value="1.8">Москва</option>
                        <option value="1.64">Нижний Новгород</option>
                        <option value="1.63">Новосибирск</option>
                        <option value="1.48">Омск</option>
                        <option value="1.8">Пермь</option>
                        <option value="1.64">Ростов-на-Дону</option>
                        <option value="1.48">Самара</option>
                        <option value="1.64">Санкт-Петербург</option>
                        <option value="1.48">Саратов</option>
                        <option value="1.64">Уфа</option>
                        <option value="1.88">Челябинск</option>
                        <option value="1.16">Якутск</option>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-outline-dark" name="calc" id="calc">Рассчитать</button>
            </div>
        </form>
        <div id="result" class="mt-4"></div>
    </div>
    <?php include "footer.php"; ?>
    <script src="mdb/js/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#insuranceForm").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: 'calc_sp.php', //путь к файлу, где находится PHP-скрипт для расчета
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        $("#result").html(response); // Выводим результат на экран
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
    <script>
        $("#marka").change(function() {
            var selectedMarkaId = $(this).val();
            $.ajax({
                url: 'get_models.php', //путь к файлу, который будет возвращать данные моделей для выбранной марки
                method: 'GET',
                dataType: 'json',
                data: {
                    marka_id: selectedMarkaId
                },
                success: function(response) {
                    // Очистите текущие варианты моделей и добавьте новые на основе ответа
                    $('#model').empty();
                    $.each(response, function(index, model) {
                        $('#model').append($('<option>', {
                            value: model.id,
                            text: model.Nazvanie
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
</body>

</html>