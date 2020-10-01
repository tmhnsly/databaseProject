<?php
require_once('functions.php');

$db = connectDB('Siths');

$sithData = getSithData($db);

?>
<html lang="en-GB">
<head>
    <link rel="stylesheet" type="text/css" href="normalize.css" />
    <link rel="stylesheet" type="text/css" href="sithipedia.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sith-ipedia</title>
</head>
<body>
<container>

<header>
    <h1>Sith-ipedia</h1>
</header>
<div class="sithDataBox">
    <?php
        foreach ($sithData as $sith) {
            echo displaySith($sith);
        };
    ?>
</div>
</container>
</body>
</html>




