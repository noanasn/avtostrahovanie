<form action="insert_my_car.php" method="post">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <input type="text" id="form6Example1" class="form-control" />
                <label class="form-label" for="form6Example1">VIN</label>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <input type="text" id="form6Example2" class="form-control" />
                <label class="form-label" for="form6Example2">Гос.номер</label>
            </div>
        </div>
    </div>

    <!-- Text input -->
    <div class="form-outline mb-4">
        <input type="text" id="form6Example3" class="form-control" />
        <label class="form-label" for="form6Example3">Мощность</label>
    </div>

    <!-- Text input -->
    <div class="form-outline mb-4">
        <!-- <input type="text"  /> -->
        <select name="doc_type" id="form6Example4" class="form-control">
            <option value="СТС">СТС</option>
            <option value="ПТС">ПТС</option>
        </select>
        <label class="form-label" for="form6Example4">Документ</label>
    </div>

    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="text" id="form6Example5" class="form-control" />
        <label class="form-label" for="form6Example5">Серия док-та</label>
    </div>

    <!-- Number input -->
    <div class="form-outline mb-4">
        <input type="text" id="form6Example6" class="form-control" />
        <label class="form-label" for="form6Example5">Номер док-та</label>
    </div>

    <div class="form-outline mb-4">
        <select name="idMarka" id="form6Example7" class="form-control">
            <?
            $marka_row_data  = mysqli_query($db, "SELECT * FROM `marka`");
            while ($marka_data = mysqli_fetch_array($marka_row_data)) {
                echo "<option value = $marka_data[id]>$marka_data[Nazvanie]</option>";
            }
            ?>
        </select>
        <label class="form-label" for="form6Example4">Документ</label>
    </div>

    <div class="form-outline mb-4">
        <select name="idModel" id="form6Example8" class="form-control">
            <?
            $model_row_data = mysqli_query($db, "SELECT * FROM `model`");
            while ($model_data = mysqli_fetch_array($model_row_data)) {
                echo "<option value = $model_data[id]>$model_data[Nazvanie]</option>";
            }
            ?>
        </select>
        <label class="form-label" for="form6Example4">Документ</label>
    </div>

    <!-- Checkbox -->
    <div class="form-check d-flex justify-content-center mb-4">
        <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" checked />
        <label class="form-check-label" for="form6Example8"> Вы используете прицеп? </label>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Добавить авто</button>
</form>