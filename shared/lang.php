<?php
/*
Copyright 2019 whatever127

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

require_once "langs/en-us.php";
$lang = 'en-us';

if(isset($_GET['lang'])) {
    $lang = strtolower($_GET['lang']);
    setcookie('Page-Language', $lang, time()+2592000);
} elseif(isset($_COOKIE['Page-Language'])) {
    $lang = strtolower($_COOKIE['Page-Language']);
    setcookie('Page-Language', $lang, time()+2592000);
}

$supportedLangs = array(
    'en-us',
    'qps-ploc',
    'pl-pl',
    'de-de',
    'pt-br',
    'pt-pt',
    'nl-nl',
    'fr-fr',
    'zh-cn',
    'es-ar',
    'it-it',
    'ar-sa',
    'ko-kr',
    'zh-tw',
);

if(in_array("$lang", $supportedLangs)) {
    require_once "langs/$lang.php";
} else {
    $lang = 'en-us';
}

$url = getUrlWithoutParam('lang');
$languageCoreSelectorModal = <<<EOD
<div class="ui normal mini modal select-language">
    <div class="header">
        {$s['selectLanguage']}
    </div>
    <div class="content">
        <p><a href="{$url}lang=de-de"><i class="de flag"></i>Deutsch</a></p>
        <p><a href="{$url}lang=en-us"><i class="us flag"></i>English (United States)</a></p>
        <p><a href="{$url}lang=es-ar"><i class="ar flag"></i>Español (Argentina)</a></p>
        <p><a href="{$url}lang=fr-fr"><i class="fr flag"></i>Français (France)</a></p>
        <p><a href="{$url}lang=it-it"><i class="it flag"></i>Italiano</a></p>
        <p><a href="{$url}lang=nl-nl"><i class="nl flag"></i>Nederlands</a></p>
        <p><a href="{$url}lang=pl-pl"><i class="pl flag"></i>polski</a></p>
        <p><a href="{$url}lang=pt-br"><i class="br flag"></i>Português (Brasil)</a></p>
        <p><a href="{$url}lang=pt-pt"><i class="pt flag"></i>Português (Portugal)</a></p>
        <p><a href="{$url}lang=ar-sa"><i class="sa flag"></i>العربية</a></p>
        <p><a href="{$url}lang=ko-kr"><i class="kr flag"></i>한국어</a></p>
        <p><a href="{$url}lang=zh-cn"><i class="cn flag"></i>中文（中国）</a></p>
        <p><a href="{$url}lang=zh-tw"><i class="tw flag"></i>中文（台灣）</a></p>
    </div>
    <div class="actions">
        <div class="ui ok button">
            <i class="close icon"></i>
            {$s['cancel']}
        </div>
    </div>
</div>

EOD;

$s['currentLanguage'] = $s["lang_$lang"];
date_default_timezone_set($s['timeZone']);
