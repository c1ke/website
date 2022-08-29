<?php
/*
Copyright 2020 whatever127

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

require_once dirname(__FILE__).'/main.php';

function styleUpper($pageType = 'home', $subtitle = '') {
    global $websiteVersion, $s, $languageCoreSelectorModal;

    if($subtitle) {
        $title = sprintf($s['uupdumpSub'], $subtitle);
        $description = htmlentities(sprintf($s['uupDumpDescSub'], $subtitle));
        $subTitleOnly = htmlentities($subtitle);
    } else {
        $title = $s['uupdump'];
        $description = htmlentities($s['uupDumpDesc']);
        $subTitleOnly = htmlentities($s['uupdump']);
    }

    $darkModeOptions = array(
        'expires' => time()+60*60*24*30,
        'path' => '/',
        'domain' => $_SERVER['SERVER_NAME'],
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Strict'
    );

    $enableDarkMode = -1;
    if(isset($_COOKIE['Dark-Mode'])) {
        switch($_COOKIE['Dark-Mode']) {
            case 0:
                setcookie('Dark-Mode', 0, $darkModeOptions);
                $enableDarkMode = 0;
                break;

            case 1:
                setcookie('Dark-Mode', 1, $darkModeOptions);
                $enableDarkMode = 1;
                break;

            default:
                setcookie('Dark-Mode', 0, $darkModeOptions);
                $enableDarkMode = -1;
                break;
        }
    }

    if(isset($_GET['dark'])) {
        switch($_GET['dark']) {
            case 0:
                setcookie('Dark-Mode', 0, $darkModeOptions);
                $enableDarkMode = 0;
                break;

            case 1:
                setcookie('Dark-Mode', 1, $darkModeOptions);
                $enableDarkMode = 1;
                break;

            default:
                setcookie('Dark-Mode', 0, $darkModeOptions);
                $enableDarkMode = -1;
                break;
        }
    }

    $baseUrl = getBaseUrl();
    $fullUrl = htmlentities(getBaseUrl().$_SERVER['REQUEST_URI']);
    $url = htmlentities(getUrlWithoutParam('dark'));

    $darkSwitch = <<<EOD
<a class="item light-mode-btn" href="{$url}dark=0">
    <i class="eye slash icon"></i>
    {$s['lightMode']}
</a>
<a class="item dark-mode-btn" href="{$url}dark=1">
    <i class="eye icon"></i>
    {$s['darkMode']}
</a>
EOD;

    $darkMode = '';
    if($enableDarkMode == 1) {
        $darkMode = '<link rel="stylesheet" href="css/darkmode.css">'."\n";
    } elseif($enableDarkMode < 0) {
        $darkMode = '<style>@import url(\'css/darkmode.css\') (prefers-color-scheme: dark);</style>';
    }

    switch ($pageType) {
        case 'home':
            $navbarLink = '<a class="active item" href="./"><i class="home icon"></i>'.$s['home'].'</a>'.
                          '<a class="item" href="known.php"><i class="download icon"></i>'.$s['downloads'].'</a>'.
                          '<a class="item" target=_blank href="https://github.com/uup-dump/website/blob/master/FAQ.md"><i class="question circle icon"></i>'.$s['faq'].'</a>';
        break;

        case 'downloads':
            $navbarLink = '<a class="item" href="./"><i class="home icon"></i>'.$s['home'].'</a>'.
                          '<a class="active item"><i class="download icon"></i>'.$s['downloads'].'</a>'.
                          '<a class="item" target=_blank href="https://github.com/uup-dump/website/blob/master/FAQ.md"><i class="question circle icon"></i>'.$s['faq'].'</a>';
        break;

        default:
            $navbarLink = '<a class="active item" href="./">'.$s['home'].'</a>';
        break;
    }

    $langSelect = '<a class="item" onClick="openLanguageSelector();"><i class="globe icon"></i>'.$s['currentLanguage'].'</a>';
    $sourceCodeLink = '<a class="item" href="https://github.com/uup-dump"><i class="code icon"></i>'.$s['sourceCode'].'</a>';
    $discordInvite = '<a class="item" href="https://discord.gg/yVRbtb2"><i class="discord icon"></i>Discord</a>';

    $navbarRight = $langSelect.$darkSwitch.$sourceCodeLink.$discordInvite;
    $navbarMobile = $darkSwitch.$sourceCodeLink.$discordInvite.$langSelect;

    $iso639lang = preg_replace("/-.*/i", "", $s['code']);
    $title = htmlentities($title);

    echo <<<HTML
<!DOCTYPE html>
<html lang="$iso639lang">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="description" content="$description">

        <meta property="twitter:card" content="summary_large_image">
        <meta property="og:site_name" content="{$s['uupdump']}">
        <meta property="og:title" content="$subTitleOnly">
        <meta property="og:type" content="website">
        <meta property="og:description" content="$description">
        <meta property="og:image" content="$baseUrl/img/cover.png">
        <meta property="og:url" content="$fullUrl">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2/dist/semantic.min.css">
        <link rel="stylesheet" href="css/style.css">
        $darkMode
        <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2/dist/semantic.min.js"></script>

        <title>$title</title>

        <script>
            function openLanguageSelector() {
                $('.ui.modal.select-language').modal('show');
                $('.ui.sidebar').sidebar('hide');
            }

            function sidebar() {
                $('.ui.sidebar').sidebar('setting', 'transition', 'overlay');
                $('.ui.sidebar').sidebar('setting', 'mobileTransition', 'overlay');
                $('.ui.sidebar').sidebar('toggle');
            }
        </script>
    </head>
    <body>
        <div class="ui sidebar inverted vertical menu">
            <div class="ui container">
                $navbarLink $navbarMobile
            </div>
        </div>
        <div class="pusher">
            <div class="page-header">
                <div class="ui title container">
                    <h1 title="{$s['uupdump']} v$websiteVersion">
                        <img src="img/logo.svg" class="logo" alt="">{$s['uupdump']}
                    </h1>
                </div>

                <div class="ui one column grid page-header-menu">
                    <div class="ui attached secondary menu computer only column">
                        <div class="ui container">
                            $navbarLink
                            <div class="right menu">
                                $navbarRight
                            </div>
                        </div>
                    </div>
                    <div class="ui attached secondary menu mobile tablet only column">
                        <div class="ui container">
                            <a class="item" onClick="sidebar();"><i class="bars icon"></i>{$s['menu']}</a>
                        </div>
                    </div>
                </div>

                <div class="shadow"></div>
            </div>

            $languageCoreSelectorModal

            <div class="ui container">
HTML;
}

function styleLower() {
    global $websiteVersion, $s;
    $api = uupApiVersion();

    $config = uupDumpApiGetConfig();
    $renderText = '';
    if(isset($config['show_render_time']) && $config['show_render_time']) {
        $render = floor((microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"])*1000);
        $renderText = "Page rendered in $render ms.";
    }

    $copyright = sprintf(
        $s['copyrightNew'],
        date('Y')
    );

    echo <<<HTML
                <div class="footer">
                    <div class="ui divider"></div>
                    <p><i>$renderText
                        <b>{$s['uupdump']}</b> v$websiteVersion
                        (<b>API</b> v$api)
                        $copyright
                        <span class="info">{$s['notAffiliated']}</span>
                    </i></p>
                </div>
            </div>
        </div>
    </body>
</html>
HTML;
}

function fancyError($errorCode = 'ERROR', $pageType = 'home', $moreText = 0) {
    global $s;

    $errorNumber = 500;
    switch ($errorCode) {
        case 'ERROR':
            $errorFancy = $s['error_ERROR'];
            break;
        case 'UNSUPPORTED_API':
            $errorFancy = $s['error_UNSUPPORTED_API'];
            break;
        case 'NO_FILEINFO_DIR':
            $errorFancy = $s['error_NO_FILEINFO_DIR'];
            break;
        case 'NO_BUILDS_IN_FILEINFO':
            $errorFancy = $s['error_NO_BUILDS_IN_FILEINFO'];
            break;
        case 'SEARCH_NO_RESULTS':
            $errorNumber = 400;
            $errorFancy = $s['error_SEARCH_NO_RESULTS'];
            break;
        case 'UNKNOWN_ARCH':
            $errorNumber = 400;
            $errorFancy = $s['error_UNKNOWN_ARCH'];
            break;
        case 'UNKNOWN_RING':
            $errorNumber = 400;
            $errorFancy = $s['error_UNKNOWN_RING'];
            break;
        case 'UNKNOWN_FLIGHT':
            $errorNumber = 400;
            $errorFancy = $s['error_UNKNOWN_FLIGHT'];
            break;
        case 'UNKNOWN_COMBINATION':
            $errorNumber = 400;
            $errorFancy = $s['error_UNKNOWN_COMBINATION'];
            break;
        case 'ILLEGAL_BUILD':
            $errorNumber = 400;
            $errorFancy = sprintf($s['error_ILLEGAL_BUILD'], 9841, PHP_INT_MAX-1);
            break;
        case 'ILLEGAL_MINOR':
            $errorNumber = 400;
            $errorFancy = $s['error_ILLEGAL_MINOR'];
            break;
        case 'NO_UPDATE_FOUND':
            $errorFancy = $s['error_NO_UPDATE_FOUND'];
            break;
        case 'XML_PARSE_ERROR':
            $errorFancy = $s['error_XML_PARSE_ERROR'];
            break;
        case 'EMPTY_FILELIST':
            $errorFancy = $s['error_EMPTY_FILELIST'];
            break;
        case 'NO_FILES':
            $errorNumber = 404;
            $errorFancy = $s['error_NO_FILES'];
            break;
        case 'NOT_FOUND':
            $errorNumber = 404;
            $errorFancy = $s['error_NOT_FOUND'];
            break;
        case 'MISSING_FILES':
            $errorFancy = $s['error_MISSING_FILES'];
            break;
        case 'NO_METADATA_ESD':
            $errorFancy = $s['error_NO_METADATA_ESD'];
            break;
        case 'UNSUPPORTED_LANG':
            $errorNumber = 400;
            $errorFancy = $s['error_UNSUPPORTED_LANG'];
            break;
        case 'UNSPECIFIED_LANG':
            $errorNumber = 400;
            $errorFancy = $s['error_UNSPECIFIED_LANG'];
            break;
        case 'UNSUPPORTED_EDITION':
            $errorNumber = 400;
            $errorFancy = $s['error_UNSUPPORTED_EDITION'];
            break;
        case 'UNSUPPORTED_COMBINATION':
            $errorNumber = 400;
            $errorFancy = $s['error_UNSUPPORTED_COMBINATION'];
            break;
        case 'NOT_CUMULATIVE_UPDATE':
            $errorNumber = 400;
            $errorFancy = $s['error_NOT_CUMULATIVE_UPDATE'];
            break;
        case 'UPDATE_INFORMATION_NOT_EXISTS':
            $errorFancy = $s['error_UPDATE_INFORMATION_NOT_EXISTS'];
            break;
        case 'KEY_NOT_EXISTS':
            $errorNumber = 400;
            $errorFancy = $s['error_KEY_NOT_EXISTS'];
            break;
        case 'UNSPECIFIED_UPDATE':
            $errorNumber = 400;
            $errorFancy = $s['error_UNSPECIFIED_UPDATE'];
            break;
        case 'INCORRECT_ID':
            $errorNumber = 400;
            $errorFancy = $s['error_INCORRECT_ID'];
            break;
        case 'RATE_LIMITED':
            $errorNumber = 429;
            $errorFancy = $s['error_RATE_LIMITED'];
            break;
        case 'UNSPECIFIED_VE':
            $errorNumber = 400;
            $errorFancy = $s['error_UNSPECIFIED_VE'];
            break;
        case 'VE_UNAVAILABLE':
            $errorNumber = 400;
            $errorFancy = $s['error_VE_UNAVAILABLE'];
            break;
        default:
            $errorFancy = "<i>{$s['errorNoMessage']}</i><br><br>$errorCode";
            break;
    }

    if($moreText) {
        $errorFancy = $errorFancy.'<br>'.$moreText;
    }

    http_response_code($errorNumber);
    if($errorNumber == 429) {
        header('Retry-After: 10');
    }

    styleUpper($pageType, $s['error']);

    echo <<<ERROR
<h3 class="ui centered header">
    <div class="content">
        <i class="fitted exclamation triangle icon"></i>&nbsp;
        {$s['requestNotSuccessful']}
    </div>
</h3>

<div class="ui negative icon message">
    <i class="remove circle icon"></i>
    <div class="content">
        <div class="header">{$s['error']}</div>
        <p>{$s['anErrorHasOccurred']}<br>
        $errorFancy</p>
    </div>
</div>
ERROR;

    styleLower();
}

function styleNoPackWarn() {
    global $s;

    echo <<<INFO
<table class="ui very basic very compact table">
    <td class="center aligned"><i class="big red exclamation icon"></i></td>
    <td><p>{$s['generatedPackNotAvailableDesc']}</p></td>
</table>
<div class="ui divider"></div>

INFO;
}

function styleCluelessUserArm64Warn() {
    global $s;

    echo <<<INFO
<table class="ui very basic very compact table">
    <td class="center aligned"><i class="big bomb icon"></i></td>
    <td><p>{$s['arm64Warning']}</p></td>
</table>
<div class="ui divider"></div>

INFO;
}
