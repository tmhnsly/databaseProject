<?php

/*
* connects database to PHP
*/

function connectDB() :PDO {
    $db = new PDO ('mysql:host=db; dbname=Sith', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/* requests Sith Cards details from db
 *
 */

function getSithData(PDO $db) :array {
    $query = $db->prepare('SELECT `name`, `homeworld`, `height`, `birthyear` FROM `sith`');
    $query->execute();
    $result = $query-> fetchAll();
    return $result;
}

function displaySithData(array $cards) :string {
    $result = '';

    if (is_array($cards[0]) == true) {
        if (array_key_exists("name", $cards[0])) {
            foreach ($cards as $card){
                $result .= '<div class="characterCard"> <h1>' . $card['name'] . '</h1>
                    <h2> Homeworld: ' . $card['homeworld'] . '</h2>
                    <h2> Height: ' . $card['height'] . 'cm' . '</h2>
                    <h2> Birth Year: ' . $card['birthyear'] . ' BBY' . '</h2>
                    </div>';
            }
        } else {
            return 'Incorrect SQL data entered; check database';
        }
    }
    return $result;
}
