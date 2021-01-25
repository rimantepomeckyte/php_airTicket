<?php
$validation = [];

function validate($data)
{
    global $validation;
    if (!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $_POST['email'])) {
        $validation[] = "El. paštas turi atitikti el. pašto formatą";
    }
    if (!preg_match('/^(\+3706)?\(?([0-9]{2})\)?([ .-]?)([0-9]{5})/', $_POST['tel'])) {
        $validation[] = "Telefono numeris neatitinka formato. Turi būti +37069999999";
    }
    if (!preg_match('/\w{1,100}$/', $_POST['name'])) {
        $validation[] = "Neužpildytas vardo laukelis arba per daug simbolių";
    }
    if (!preg_match('/^\d+(:?[.]\d{2})$/', $_POST['price'])) {
        $validation[] = "Neteisingai įvestas kaina. Kainos įvedimo formatas 100.99";
    }
    if (empty($_POST['message']) & !preg_match('/\w{1,500}$/', $_POST['message'])) {
        $validation[] = "Neužpildytas pastabų laukelis arba viršija 500 simbolių";
    }
    return $validation;
}

function getData (){
    $data = 'data/flights.txt';
    $content = file_get_contents($data);//musu failas content
    $formData = implode(',', $_POST);//cia tiesiog zenkliukas , atskirti reiksmes, konvertuojam i stringa
    $content .= $formData . "/n";//prijungiu prie to failo content duomenis
    file_put_contents($data, $content);//i txt faila as noriu ideti stringa
}

function printData()
{
    $flights = file_get_contents('data/flights.txt', true);
    $flights = explode('/n', $flights);

    foreach ($flights as $flight) {
        echo "<tr>";
        $array = explode(',', $flight);
        foreach ($array as $value) {
            if ($value != $_POST['send'] ) {
                echo "<td>$value</td>";
            }
        }
        echo "</tr>";
    }
}
