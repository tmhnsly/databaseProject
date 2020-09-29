<?php

/*
 * Connects 
 * @param
 * @return
 */

function connectDB() :PDO {
    $db = new PDO ('mysql:host=db; dbname=Sith', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/*
 * Requests Sith Data from database
 * @param
 * @return
 */

function getSithData(PDO $db) :array {
    $query = $db->prepare('SELECT `name`, `homeworld`, `height`, `birthyear` FROM `sith`');
    $query->execute();
    return $query-> fetchAll();
}

/*
 * Desc
 * @param
 * @return
 */
function displaySithData(array $sithData) :string {
    $result = '';

    foreach ($sithData as $sith) {
        $result .= '<div class="sithProfile"> <h1>' . $sith['name'] . '</h1>
                    <h2> Homeworld: ' . $sith['homeworld'] . '</h2>
                    <h2> Height: ' . $sith['height'] . 'cm' . '</h2>
                    <h2> Birth Year: ' . $sith['birthyear'] . ' BBY' . '</h2>
                    </div>';
    }

    return $result;
}