<?php

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
}

