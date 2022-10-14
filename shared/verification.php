<?php
/*
Copyright 2022 UUP dump authors

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

   http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
*/

require_once 'shared/style.php';

function getVerificationNumber() {
    if(session_status() != PHP_SESSION_ACTIVE && !session_start()) {
        fancyError('ERROR', 'downloads');
        die();
    }

    $rnd1 = rand(0, 10000);
    $rnd2 = rand(1, 25);

    $_SESSION['verification_number'] = $rnd1 + $rnd2;
    return [$rnd1, $rnd2];
}

function checkVerificationNumber() {
    $number = isset($_GET['verify']) ? $_GET['verify'] : null;

    if(!session_start()) {
        fancyError('ERROR', 'downloads');
        die();
    }

    if(!isset($_SESSION['verification_number'])) {
        return false;
    }

    $result = $_SESSION['verification_number'] == $number;
    unset($_SESSION['verification_number']);

    return $result;
}

function printVerificationPage() {
    global $s;

    $url = htmlentities(getUrlWithoutParam('verify'));

    $numbers = getVerificationNumber();
    $add = $numbers[0];
    $num = $numbers[1];

    $templateOk = true;

    styleUpper('downloads', $s['verification']);
    require 'templates/verification.php';
    styleLower();
}
