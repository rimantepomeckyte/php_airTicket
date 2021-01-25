<?php

/*function option (){
    $flights = file_get_contents('data/flights.txt', true);
    $flights = explode('/n', $flights);

    foreach ($flights as $flight) {
        echo "<tr></tr>";
        $flightsAfter = explode(',', $flight);
        if ($flight != $_POST ['send']) {
            echo "<option>$flightsAfter</option>";
        }
    }
}*/

function search()
{
    $flights = file_get_contents('data/flights.txt', true);
    $flights = explode('/n', $flights);

    foreach ($flights as $flight) {
        echo "<tr>";
        $array = explode(',', $flight);
        foreach ($array as $item) {
            if ($item != $_POST ['search-btn'] && $_POST['search-flight'] == $array[0]) {
                echo "<td>$item</td>";
            }
        }
        echo "</tr>";
    }
}
