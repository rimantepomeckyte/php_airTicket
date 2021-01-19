<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="view/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <?php $validation_errors = [];

    if (isset($_POST['send'])): ?>
        <?php if (!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $_POST['email'])): ?>
            <?php $validation_errors = "El. paštas turi atitikti el. pašto formatą"; ?>
            <div class="alert alert-danger" role="alert"> <?= $validation_errors ?></div>
        <?php endif ?>
        <?php if (!preg_match('/^(\+3706)?\(?([0-9]{2})\)?([ .-]?)([0-9]{5})/', $_POST['tel'])): ?>
            <?php $validation_errors = "Telefono numeris neatitinka formato. Turi būti +37069999999"; ?>
            <div class="alert alert-danger" role="alert"> <?= $validation_errors ?></div>
        <?php endif ?>
        <?php if (!preg_match('/\w{1,100}$/', $_POST['name'])): ?>
            <?php $validation_errors = "Neužpildytas vardo laukelis arba per daug simbolių"; ?>
            <div class="alert alert-danger" role="alert"> <?= $validation_errors ?></div>
        <?php endif ?>
        <?php if (!preg_match('/^\d+(:?[.]\d{2})$/', $_POST['price'])): ?>
            <?php $validation_errors = "Neteisingai įvestas kaina. Kainos įvedimo formatas 100.99"; ?>
            <div class="alert alert-danger" role="alert"> <?= $validation_errors ?></div>
        <?php endif ?>
        <?php if (empty($_POST['message']) & !preg_match('/\w{1,500}$/', $_POST['message'])): ?>
            <?php $validation_errors = "Neužpildytas pastabų laukelis arba viršija 500 simbolių"; ?>
            <div class="alert alert-danger" role="alert"> <?= $validation_errors ?></div>
        <?php endif ?>
    <?php endif ?>
    <?php if (isset($_POST['send']) & empty($validation_errors)): ?>
    <div class="bg-secondary container w-75 mt-5 rounded">
        <div class="row">
            <h3 class="col text-white">Skrydžio bilieto informacija</h3>
        </div>
        <div class="row mx-1 mb-1">
            <div class="col-8 bg-light">
                <div class="row d-flex justify-content-center"><?= date("j M Y"); ?></div>
                <div class="row mt-1 mb-2">
                    <div class="col-4">Skrydžio numeris: <strong><?= $_POST['flight-number']; ?></strong></div>
                    <div class="col">
                        <div class="row d-flex justify-content-end">Iš kur:</div>
                        <div class="row d-flex justify-content-end">Į kur:</div>
                    </div>
                    <div class="col-5">
                        <div class="row font-weight-bold d-flex justify-content-end"><?= $_POST['flight-from-where']; ?></div>
                        <div class="row font-weight-bold d-flex justify-content-end"><?= $_POST['flight-to-where']; ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">Keleivis:</div>
                    <div class="col font-weight-bold text-right"><?= $_POST['name']; ?> <?= $_POST['last-name']; ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Keleivio asmens kodas:</div>
                    <div class="col font-weight-bold text-right"><?= $_POST['person-id']; ?></div>
                </div>
            </div>
            <div class="col bg-secondary text-white">
                <div class="row d-flex justify-content-center font-weight-bold">Skrydžio kaina</div>
                <div class="row">
                    <div class="col">Skrydis:</div>
                    <div class="col-4 font-weight-bold text-right"><?= $_POST['price']; ?> €</div>
                </div>
                <div class="row">
                    <div class="col">Bagažas:</div>
                    <?php $baggageWeight = $_POST['baggage'];
                    $price = $_POST['price'];
                    if ($baggageWeight > 20): ?>
                        <div class="col-4 font-weight-bold text-right">30.00 €</div>
                    <?php else: ?>
                    <div class="col-4 font-weight-bold text-right">0.00 €</div>
                    <?php endif;?>
                </div>
                <div class="row mt-4 bigger-font">
                    <div class="col font-weight-bold">Bendra suma:</div>
                    <?php
                    if ($baggageWeight > 20): ?>
                        <div class="col-4 font-weight-bold text-right"><?= $price + 30; ?> €</div>
                    <?php else: ?>
                    <div class="col-4 font-weight-bold text-right"><?= $price ?> €</div>
                    <?php endif;?>
                </div>
            </div>
        </div>

    </div>

<?php else: ?>
    <h1 class="py-3">Bilietų formavimo forma</h1>
    <form method="post" class="w-75 ">
        <div class="form-group">
            <select name="flight-number" class="form-control">
                <option selected disabled>Pasirinkite skrydžio nr</option>
                <?php foreach ($flight_numbers as $number): ?>
                    <option value="<?= $number; ?>"><?= $number; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <select name="flight-from-where" class="form-control">
                <option selected disabled>Pasirinkite iš kur skrydis</option>
                <?php foreach ($from_where as $from): ?>
                    <option value="<?= $from; ?>"><?= $from; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <select name="flight-to-where" class="form-control">
                <option selected disabled>Pasirinkite į kur skrydis</option>
                <?php foreach ($to_where as $to): ?>
                    <option value="<?= $to; ?>"><?= $to; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Bilieto kaina:</label>
            <input type="text" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
            <select name="baggage" class="form-control">
                <option selected disabled>Pasirinkite bagažo svorį, kg</option>
                <?php foreach ($baggage as $weight): ?>
                    <option value="<?= $weight; ?>"><?= $weight; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="row mx-2">
        <div class="col-6 mr-2">
        <div class="form-group row">
            <label for="name">Vardas:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group row">
            <label for="last-name">Pavardė:</label>
            <input type="text" name="last-name" id="last-name" class="form-control">
        </div>
        <div class="form-group row">
            <label for="person-id">Asmens kodas:</label>
            <input type="number" name="person-id" id="person-id" class="form-control">
        </div>
        </div>
        <div class="col">
        <div class="form-group row">
            <label for="email">El paštas:</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="form-group row">
            <label for="tel">Tel nr:</label>
            <input type="text" name="tel" id="tel" class="form-control">
        </div>
    </div>
        </div>
        <div class="form-group">
            <label for="message">Pastabos:</label>
            <input type="text" name="message" id="message" class="form-control">
        </div>
        <button type="submit" name="send" id="send" class="mt-3 btn btn-primary btn-lg text-center">Siusti</button>
    </form>
<?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
