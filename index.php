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
<style>
    .div-1 {
        margin-top: 49px;
        background-color: #53699e;
        height: 100px;
    }

    .div-2 {
        background-color: #acadd2;
        height: 100px;
    }

    .div-3 {
        background-color: #312c4d;
        height: 100px;
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
                                <img src="/img/москвич 3е.jpg" class="d-block w-100" alt="Wild Landscape" style="height: 500px;" />
                            </div>
                            <div class="carousel-item" data-mdb-interval="3000">
                                <img src="/img/москвич 3.jpg" class="d-block w-100" alt="Camera" style="height: 500px;" />
                            </div>
                            <div class="carousel-item" data-mdb-interval="3000">
                                <img src="/img/москвич 6.jpg" class="d-block w-100" alt="Exotic Fruits" style="height: 500px;" />
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
    <!-- Калькулятор -->
    <div class="container">
        <h2>Калькулятор страховки</h2>
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
            <button type="submit" class="btn btn-outline-primary" name="calc" id="calc">Рассчитать</button>
        </form>
        <div id="result" class="mt-4"></div>
    </div>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Company name
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
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