<?php

/*
 * Connects to database "Sith" from host "db" and creates new PDO.
 * @param
 * @return
 */
function connectDB($dbname): PDO {
    $db = new PDO ('mysql:host=db; dbname='.$dbname, 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/*
 * Gets Sith Data from database
 * @param PDO $db Gives PDO info from database
 * @return array Info from SQL database
 */
function getSithData(PDO $db): array {
    $query = $db->prepare('SELECT `name`, `homeworld`, `height`, `birthyear`, `photo` FROM `sith`');
    $query->execute();
    return $query-> fetchAll();
}

/*
 * Displays "Sith" database info as HTML.
 * @param array $sithData An indexed array of associated arrays of information about different Sith
 * @return string A div containing the outputted info
 */
function displaySith(array $sith) {
    $result = '';
    if (isset($sith['photo'])) {
        $result .= '<div class="sithProfile">
                    <img src="' . $sith['photo'] . '" alt="Picture of ' . $sith['name'] . '">
                    <h1>' . $sith['name'] . '</h1>
                    <h2> Homeworld: ' . $sith['homeworld'] . '</h2>
                    <h2> Height: ' . $sith['height'] . 'cm' . '</h2>
                    <h2> Birth Year: ' . $sith['birthyear'] . ' BBY' . '</h2>
                    </div>';

    } else {
        return false;
    }
    return $result;
}