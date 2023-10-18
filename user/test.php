<!-- Форма добавления автомобиля -->
<link rel="stylesheet" href="../../mdb/css/mdb.min.css" />
<link rel="stylesheet" href="../../mdb/css/icons.css">
<link rel="stylesheet" href="../../mdb/css/style.css">

<style>
    input[type="text"] {
        height: 39.2px;
    }
</style>
<form action="insert_my_car.php" method="post" class="d-flex justify-content-center">
    <div style="margin-top: 100px;">
        <h3 class="fw-bold mb-0" style="text-align: center;">Добавить автомобиль</h3><br>
        <!-- марка, модель, мощность -->
        <div class="row">
            <div class="col">
                <select class="form-select" id="el1" name="marka">
                    <option selected disabled>Марка</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="col">
                <select class="form-select" id="el2" name="model">
                    <option selected disabled>Модель</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="col">
                <div class="form-outline mb-4">
                    <input type="text" id="el3" class="form-control" name="power"/>
                    <label class="form-label" for="el3">Мощность</label>
                </div>
            </div>

        </div>
        
        <!-- VIN, гос номер -->
        <div class="row">
            <div class="col-md-8">
                <div class="form-outline mb-4">
                    <input type="text" id="el4" class="form-control" name="VIN" />
                    <label class="form-label" for="el4">VIN</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-outline mb-4">
                    <input type="text" id="el5" class="form-control" name="gos_znak"/>
                    <label class="form-label" for="el5">Гос.номер</label>
                </div>
            </div>
        </div>

        <!-- документ, серия, номер -->
        <div class="row">
            <div class="col">
                <select class="form-select" id="el6" name="doc_type">
                    <option selected disabled>Документ</option>
                    <option value="СТС">СТС</option>
                    <option value="ПТС">ПТС</option>
                </select>
            </div>

            <div class="col">
                <div class="form-outline mb-4">
                    <input type="text" id="el7" class="form-control" name="doc_series"/>
                    <label class="form-label" for="el7">Серия</label>
                </div>
            </div>

            <div class="col">
                <div class="form-outline mb-4">
                    <input type="text" id="el8" class="form-control" name="doc_number"/>
                    <label class="form-label" for="el8">Номер</label>
                </div>
            </div>

        </div>

        <!-- Собственник -->
        <div class="row">
            <label style="text-align: center; padding-bottom: 5px;">Собственник</label>
            <div class="col">
                <div class="form-outline mb-4">
                    <input type="text" id="el9" class="form-control" readonly name="sobstv_surname" value="Иванов"/>
                    <label class="form-label" for="el9">Фамилия</label>
                </div>
            </div>

            <div class="col">
                <div class="form-outline mb-4">
                    <input type="text" id="el10" class="form-control" readonly name="sobstv_name" value="Иван" />
                    <label class="form-label" for="el10">Имя</label>
                </div>
            </div>

            <div class="col">
                <div class="form-outline mb-4">
                    <input type="text" id="el11" class="form-control" readonly name="sobstv_patronymic" value="Иванович" />
                    <label class="form-label" for="el11">Отчество</label>
                </div>
            </div>

        </div>

        <!-- Checkbox -->
        <div class="form-check d-flex justify-content-center mb-4">
            <input class="form-check-input me-2" type="checkbox" value="" id="el12" name="pricep"/>
            <label class="form-check-label" for="el12">
                Вы используете прицеп?
            </label>
        </div>

        <!-- button -->
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class="text-center" style="width: 250px;">
                    <input class="btn btn-primary btn-lg btn-rounded gradient-custom text-body px-5" type="submit" value="Добавить" />
                </div>
            </div>
        </div>

    </div>
</form>
<script src="../../mdb/js/mdb.min.js"></script>