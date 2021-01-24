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

    echo "<table class='table table-dark'><thead><tr>
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
          </tr></thead><tbody><tr>";
    foreach ($flights as $flight) {
        echo "<tr></tr>";
        $array = explode(',', $flight);
        foreach ($array as $item) {
            if ($item != $_POST ['search-btn'] && $array[0] == $_POST['search-flight']) {
                echo "<td>$item</td>";
            }//elseif ($item != $_POST ['search-btn'] && $array[0] == "Ieškoti pagal skrydžio nr"){
              //  echo "<td>$item</td>";
            //}

        }

    }echo "</tbody></tr></table>";

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