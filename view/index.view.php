<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="view/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8305e96607.js" crossorigin="anonymous"></script>
    <link href="./view/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <?php if (isset($_POST['send']) || isset($_POST['print'])): ?>
        <?php validate($_POST); ?>
    <?php endif ?>
    <?php if (isset($_POST['get-table'])): ?>

        <h2 class="text-center">Rezervuoti skrydžiai</h2>
        <form method="post">
            <div class='form-group row d-flex justify-content-center'>
                <select name="search-flight" class="form-control col-7">
                    <option selected disabled>Ieškoti pagal skrydžio nr</option>
                    <?php foreach ($flight_numbers as $number): ?>
                        <option value="<?= $number; ?>"><?= $number; ?></option>
                    <?php endforeach; ?>
                </select>
                <button name='search-btn' id='search-btn'
                        class='ml-2 btn btn-primary text-center col-lg-1 col-md-2 col-3' type="submit">Ieškoti
                </button>
            </div>
        </form>
        <table class='table table-dark table-sm'>
            <thead>
            <tr>
                <th>Skrydžio nr</th>
                <th>Iš kur</th>
                <th>Į kur</th>
                <th>Bilieto kaina</th>
                <th>Bagažo svoris kg</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Asmens kodas</th>
                <th>El. paštas</th>
                <th>Tel. nr.</th>
                <th>Žinutė</th>
            </tr>
            </thead>
            <tbody>
            <?php printReservations(); ?>
            </tbody>
        </table>
        <?php die(); ?>
    <?php endif; ?>

    <?php if (isset($_POST['send']) & empty($validation)): ?>
        <?php getData(); ?>
        <h2 class="text-center">Rezervuoti skrydžiai</h2>
        <form method="post">
            <div class='form-group row d-flex justify-content-center'>
                <select name="search-flight" class="form-control col-7">
                    <option selected>Ieškoti pagal skrydžio nr</option>
                    <?php foreach ($flight_numbers as $number): ?>
                        <option value="<?= $number; ?>"><?= $number; ?></option>
                    <?php endforeach; ?>
                </select>
                <button name='search-btn' id='search-btn'
                        class='ml-2 btn btn-primary text-center col-lg-1 col-md-2 col-3' type="submit">Ieškoti
                </button>
            </div>
        </form>
        <table class='table table-dark table-sm'>
            <thead>
            <tr>
                <th>Skrydžio nr</th>
                <th>Iš kur</th>
                <th>Į kur</th>
                <th>Bilieto kaina</th>
                <th>Bagažo svoris kg</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Asmens kodas</th>
                <th>El. paštas</th>
                <th>Tel. nr.</th>
                <th>Žinutė</th>
            </tr>
            </thead>
            <tbody>
            <?php printData(); ?>
            </tbody>
        </table>
        <?php die(); ?>
    <?php endif; ?>
    <?php if (isset($_POST['search-btn'])): ?>
        <h2 class="text-center">Rezervuoti skrydžiai</h2>
        <form method="post">
            <div class='form-group row d-flex justify-content-center'>
                <select name="search-flight" class="form-control col-7">
                    <option selected>Ieškoti pagal skrydžio nr</option>
                    <?php foreach ($flight_numbers as $number): ?>
                        <option value="<?= $number; ?>"><?= $number; ?></option>
                    <?php endforeach; ?>
                </select>
                <button name='search-btn' id='search-btn'
                        class='ml-2 btn btn-primary text-center col-lg-1 col-md-2 col-3' type="submit">Ieškoti
                </button>
            </div>
        </form>
        <table class='table table-dark table-sm'>
            <thead>
            <tr>
                <th>Skrydžio nr</th>
                <th>Iš kur</th>
                <th>Į kur</th>
                <th>Bilieto kaina</th>
                <th>Bagažo svoris kg</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Asmens kodas</th>
                <th>El. paštas</th>
                <th>Tel. nr.</th>
                <th>Žinutė</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php search(); ?>
            </tbody>
            </tr></table>
        <?php die(); ?>
    <?php endif; ?>

    <?php if (isset($_POST['print']) & empty($validation)): ?>
        <?php getData(); ?>
    <div class="container w-75 mt-5">
        <div class="row p-2 d-flex justify-content-between bg-warning rounded-top">
            <h3 class="">Airlines</h3>
            <h3 class="">Airlines</h3>
        </div>
        <div class="row p-2 grey-light">
            <h4 class="font-weight-bold"><?= $_POST['flight-from-where']; ?></h4>
            <i class="fas fa-plane-departure fa-2x mx-4"></i>
            <h4 class="font-weight-bold"><?= $_POST['flight-to-where']; ?></h4>
        </div>
        <div class="row grey-light">
            <div class="col-8 border-right border-secondary">
                <div class="row">
                    <div class="col-5 mb-0 font-weight-bold text-secondary">Keleivis</div>
                    <div class="col-4 mb-0 font-weight-bold text-secondary">Skrydžio nr.</div>
                    <div class="col-3 mb-0 font-weight-bold text-secondary">Data</div>
                </div>
                <div class="row">
                    <div class="col-5 font-weight-bold"><?= $_POST['name']; ?> <?= $_POST['last-name']; ?></div>
                    <div class="col-4 font-weight-bold"><?= $_POST['flight-number']; ?></div>
                    <div class="col-3 font-weight-bold"><?= date("j M Y"); ?></div>
                </div>

            <div class="row pl-3 font-weight-bold text-secondary">Asmens kodas</div>
            <div class="row pl-3 font-weight-bold"><?= $_POST['person-id']; ?></div>
            </div>
            <div class="col">
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
                    <?php endif; ?>
                </div>
                <div class="row mt-4 bigger-font">
                    <div class="col font-weight-bold">Bendra suma:</div>
                    <?php
                    if ($baggageWeight > 20): ?>
                        <div class="col-4 font-weight-bold text-right"><?= $price + 30; ?> €</div>
                    <?php else: ?>
                        <div class="col-4 font-weight-bold text-right"><?= $price ?> €</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row bg-warning p-4 rounded-bottom"></div>
    </div>


<?php else: ?>
    <?php foreach ($validation as $errors): ?>
        <div class="alert alert-danger m-2" role="alert">
            <?= $errors; ?>
        </div>
    <?php endforeach; ?>

    <h1 class="py-3 text-center">Bilietų formavimo forma</h1>
    <div class="container">
        <form method="post">
            <div class="row d-flex justify-content-end">
                <button type="submit" name="get-table" id="get-table"
                        class="btn btn-primary text-center col-lg-2 col-md-3 col-4">
                    Rezervacijos
                </button>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-5">
                    <div class="form-group row align-self-center pt-4 mr-2">
                        <select name="flight-number" class="form-control mt-2">
                            <option selected disabled>Pasirinkite skrydžio nr</option>
                            <?php foreach ($flight_numbers as $number): ?>
                                <option value="<?= $number; ?>"><?= $number; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group row align-self-center pt-4 mr-2">
                        <select name="flight-from-where" class="form-control mt-2">
                            <option selected disabled>Pasirinkite iš kur skrydis</option>
                            <?php foreach ($from_where as $from): ?>
                                <option value="<?= $from; ?>"><?= $from; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group row align-self-center pt-4 mr-2">
                        <select name="flight-to-where" class="form-control mt-2">
                            <option selected disabled>Pasirinkite į kur skrydis</option>
                            <?php foreach ($to_where as $to): ?>
                                <option value="<?= $to; ?>"><?= $to; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group row mr-2">
                        <label for="price">Bilieto kaina:</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group row align-self-center pt-4 mr-2">
                        <select name="baggage" class="form-control mt-2">
                            <option selected disabled>Pasirinkite bagažo svorį, kg</option>
                            <?php foreach ($baggage as $weight): ?>
                                <option value="<?= $weight; ?>"><?= $weight; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group row ml-2">
                        <label for="name">Vardas:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group row ml-2">
                        <label for="last-name">Pavardė:</label>
                        <input type="text" name="last-name" id="last-name" class="form-control">
                    </div>
                    <div class="form-group row ml-2">
                        <label for="person-id">Asmens kodas:</label>
                        <input type="number" name="person-id" id="person-id" class="form-control">
                    </div>
                    <div class="form-group row ml-2">
                        <label for="email">El paštas:</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group row ml-2">
                        <label for="tel">Tel nr:</label>
                        <input type="text" name="tel" id="tel" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-center">
                <label for="message" class="col-2 col-lg-1">Pastabos:</label>
                <input type="text" name="message" id="message" class="form-control col-6">
            </div>
            <div class="row d-flex justify-content-center pb-4">
                <button type="submit" name="print" id="print"
                        class="btn btn-primary text-center col-lg-2 col-md-3 col-4 mr-3 ">Spausdinti bilietą
                </button>
                <button type="submit" name="send" id="send"
                        class="btn btn-primary text-center col-lg-2 col-md-3 col-4">
                    Tik įrašyti
                </button>
            </div>
        </form>
    </div>
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
