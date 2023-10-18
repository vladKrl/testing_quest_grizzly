<?php

$ch = curl_init("https://cdn.jsdelivr.net/gh/andr-04/inputmask-multi@master/data/phone-codes.json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$html = curl_exec($ch);
curl_close($ch);

$html_objects = json_decode($html);

$phone = $_GET["phone"];

$is_phone_found = false;

foreach ($html_objects as $value) {
    $mask_first_number = str_replace(["(","#",")","-"], "", $value->mask);
    $phone_cutted = "+" . str_replace(["(","#",")","-", " ", "+"], "" , $phone);
    if (mb_strstr($phone_cutted, $mask_first_number)){
        echo "$phone - $value->name_en. <br>";
        $is_phone_found = true;
        break;
    }
}

if (!$is_phone_found){
    echo "Country is undefined.<br>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test-Quest</title>
    <link rel="stylesheet" href="css/reset_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/main.js"></script>
    <body>
        <form class="number-phone-form" action="" method="get">
            <label for="phone">Enter number phone you need: </label>
            <input type="tel" id="phone" name="phone">
        </form>

        <div class="cookie-popup pt-3">
            <div class="text">
                This page uses cookie. Accept it please.
            </div>
            <div class="mt-3 d-flex flex-row justify-content-around buttons">
                <button class="close-btn btn-danger">Close</button>
                <button class="accept-btn btn-success">Accept</button>
            </div>
        </div>
        <div class="wrapper">
            <div class="wrapper-content d-flex flex-column">
                <div class="logo-text">
                    Korzyści ze współpracy z nami
                </div>
                <div class="benefit-list d-flex flex-column justify-content-around">
                    <div class="benefit-row d-flex flex-row justify-content-between">
                        <div class="benefit d-flex flex-column justify-content-around">
                            <img class="benefit-img" src="img/Frame 1889.svg" alt="Przechowywanie towarów ponadgabarytowych">
                            <p class="benefit-desc">Przechowywanie towarów ponadgabarytowych</p>
                            <p class="benefit-opis">Opis</p>
                        </div>
                        <div class="benefit d-flex flex-column justify-content-around">
                            <img class="benefit-img" src="img/Frame 1891.svg" alt="Elastyczne warunki współpracy">
                            <p class="benefit-desc">Elastyczne warunki współpracy</p>
                            <p class="benefit-opis">Opis</p>
                        </div>
                        <div class="benefit d-flex flex-column justify-content-around">
                            <img class="benefit-img" src="img/Frame 1892.svg" alt="Integracja i zarządzanie zamówieniami">
                            <p class="benefit-desc">Integracja i zarządzanie zamówieniami</p>
                            <p class="benefit-opis">Opis</p>
                        </div>
                        <div class="benefit d-flex flex-column justify-content-around">
                            <img class="benefit-img" src="img/Frame 1890.svg" alt="Wysyłka zamówień w dniu kompletacji">
                            <p class="benefit-desc">Wysyłka zamówień w dniu kompletacji</p>
                            <p class="benefit-opis">Opis</p>
                        </div>
                    </div>
                    <div class="benefit-row d-flex flex-row justify-content-between">
                        <div class="benefit d-flex flex-column justify-content-around">
                            <img class="benefit-img" src="img/Frame 1887.svg" alt="Niskie koszty dostawy">
                            <p class="benefit-desc">Niskie koszty dostawy</p>
                            <p class="benefit-opis">Opis</p>
                        </div>
                        <div class="benefit d-flex flex-column justify-content-around">
                            <img class="benefit-img" src="img/Frame 1888.svg" alt="Gwarancja bezpieczeństwa towarów">
                            <p class="benefit-desc">Gwarancja bezpieczeństwa towarów</p>
                            <p class="benefit-opis">Opis</p>
                        </div>
                        <div class="benefit d-flex flex-column justify-content-around">
                            <img class="benefit-img" src="img/Frame 1894.svg" alt="Całodobowy wideo monitoring">
                            <p class="benefit-desc">Całodobowy wideo monitoring</p>
                            <p class="benefit-opis">Opis</p>
                        </div>
                        <div class="benefit d-flex flex-column justify-content-around">
                            <img class="benefit-img" src="img/Frame 1893.svg" alt="Wysyłka zamówień do różnych krajów">
                            <p class="benefit-desc">Wysyłka zamówień do różnych krajów</p>
                            <p class="benefit-opis">Opis</p>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    </body>
</html>
