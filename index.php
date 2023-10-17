<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test-Quest</title>
</head>
<body>
    <form action="" method="get">
        <label for="phone">Enter number phone you need: </label>
        <input type="tel" id="phone" name="phone">
    </form>
</body>
</html>

<?php

$ch = curl_init("https://cdn.jsdelivr.net/gh/andr-04/inputmask-multi@master/data/phone-codes.json");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$html = curl_exec($ch);
curl_close($ch);

$html_objects = json_decode($html);

$phone = $_GET["phone"];

foreach ($html_objects as $value) {
    $mask_first_number = str_replace(["(","#",")","-"], "", $value->mask);
    $phone_cutted = "+" . str_replace(["(","#",")","-", " ", "+"], "" , $phone);
    echo $mask_first_number . " $value->name_en " . '<br>';
    if (mb_strstr($phone_cutted, $mask_first_number)){
        echo $value->name_en . "<br>";
        break;
    }
}
?>
