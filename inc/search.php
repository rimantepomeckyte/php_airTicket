<?php

/*function option (){
    $flights = file_get_contents('data/flights.txt', true);
    $flights = explode('/n', $flights);

    foreach ($flights as $flight) {
        echo "<tr></tr>";
        $flightsAfter = explode(',', $flight);
        if ($flight != $_POST ['send']) {
            echo "<option>$flightsAfter[0]</option>";
        }
    }
}*/

function search()
{
    $flights = file_get_contents('data/flights.txt', true);
    $flights = explode('/n', $flights);

    foreach ($flights as $flight) {
        echo "<table><tr>";
        $array = explode(',', $flight);
        foreach ($array as $item) {
            if ($item != $_POST ['search-btn'] && $_POST['flight-number'] == $_POST['search-flight']) {
                echo "<td>$item</td>";
            }
            echo "</tr></table>";
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