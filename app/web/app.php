<?php

$path = filter_input(INPUT_GET, "path", FILTER_SANITIZE_URL);
$test = 7;
var_dump($_SERVER);

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/bootstrap.min.css">
</head>
<body>

<H1>Test</H1>

</body>
</html>
