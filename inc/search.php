<?php

function option (){
    $flights = file_get_contents('data/flights.txt', true);
    $flights = explode('/n', $flights);

    foreach ($flights as $flight) {
        echo "<tr></tr>";
        $flightsAfter = explode(',', $flight);
        if ($flight != $_POST ['send']) {
            echo "<option>$flightsAfter[0]</option>";
        }
    }
}

function search()
{
    $flights = file_get_contents('data/flights.txt', true);
    $flights = explode('/n', $flights);

    foreach ($flights as $flight) {
        echo "<tr></tr>";
        $array = explode(',', $flight);
        foreach ($array as $item) {
            if ($item != $_POST ['search-btn'] && $_POST['search-flight'] == $array[0]) {
                echo "<td>$item</td>";
            }elseif ($item != $_POST ['search-btn'] && $_POST['search-flight'] == "Ieškoti pagal skrydžio nr"){
                echo "<td>$item</td>";
            }

        }

    }

}

/*
function search()
{
    $flights = file_get_contents('data/flights.txt', true);
    $flights = explode('/n', $flights);



            foreach ($flights as $flight) {
            echo "<table>><tr>";
            $array = explode(',', $flight);
            foreach ($array as $value) {
                    echo "<td>$value</td>";
            }
            echo "</tr></table";
            }
}*/