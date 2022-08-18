<?php
/*
Copyright 2021 whatever127

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

//get parameters
$updateId = isset($_GET['id']) ? $_GET['id'] : null;
$simple = isset($_GET['simple']) ? $_GET['simple'] : 0;
$aria2 = isset($_GET['aria2']) ? $_GET['aria2'] : 0;
$renameScript = isset($_GET['renscript']) ? $_GET['renscript'] : 0;
$autoDl = isset($_GET['autodl']) ? $_GET['autodl'] : 0;
$usePack = isset($_GET['pack']) ? $_GET['pack'] : 0;
$desiredEdition = isset($_GET['edition']) ? $_GET['edition'] : 0;

//post parameters
$autoDl = isset($_POST['autodl']) ? $_POST['autodl'] : $autoDl;
$desiredVE = isset($_POST['virtualEditions']) ? $_POST['virtualEditions'] : array();

require_once 'api/get.php';
require_once 'api/updateinfo.php';
require_once 'shared/get.php';
require_once 'shared/style.php';
require_once 'shared/ratelimits.php';

if(!$updateId) {
    fancyError('UNSPECIFIED_UPDATE', 'downloads');
    die();
}

if(!checkUpdateIdValidity($updateId)) {
    fancyError('INCORRECT_ID', 'downloads');
    die();
}

$resource = hash('sha1', strtolower("get-$updateId"));
if(checkIfUserIsRateLimited($resource)) {
    fancyError('RATE_LIMITED', 'downloads');
    die();
}

if(is_array($desiredEdition)) {
    $desiredEditionMixed = $desiredEdition;
    $desiredEdition = implode(';', $desiredEdition);
} else {
    $desiredEditionMixed = explode(';', $desiredEdition);

    if(count($desiredEditionMixed) == 1)
        $desiredEditionMixed = $desiredEdition;
}

if($autoDl && !$aria2) {
    $files = uupGetFiles($updateId, $usePack, $desiredEditionMixed, 2);
    if(isset($files['error'])) {
        fancyError($files['error'], 'downloads');
        die();
    }

    $info = uupUpdateInfo($updateId);
    $info = @$info['info'];

    $uSku = isset($info['sku']) ? $info['sku'] : 48;
    $updateBuild = isset($info['build']) ? $info['build'] : 'UNKNOWN';
    $updateArch = isset($info['arch']) ? $info['arch'] : 'UNKNOWN';
    $updateTitle = isset($info['title']) ? $info['title'] : 'UNKNOWN';

    $langDir = $usePack ? $usePack : 'all';

    if(is_array($desiredEditionMixed)) {
        $editDir = count($desiredEditionMixed) == 1 ? strtolower($desiredEditionMixed[0]) : 'multi';
    } else {
        $editDir = $desiredEditionMixed ? strtolower($desiredEditionMixed) : 'all';
    }

    $id = substr($updateId, 0, 8);
    $archiveName = "{$updateBuild}_{$updateArch}_{$langDir}_{$editDir}_{$id}";

    $url = '';
    $app = '';
    if(isset($_SERVER['HTTPS'])) {
        $url .= 'https://';
        $app .= 'https://';
    } else {
        $url .= 'http://';
        $app .= 'http://';
    }

    $url .=  $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $url .= '?id='.$updateId.'&pack='.$usePack.'&edition='.$desiredEdition.'&aria2=2';

    $app .=  $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $app .= '?id='.$updateId.'&pack=neutral&edition=app&aria2=2';

    if(!isset($_GET['autodl'])) {
        $updates = isset($_POST['updates']) ? $_POST['updates'] : 0;
    } else {
        $updates = 1;
    }

    $cleanup = isset($_POST['cleanup']) ? $_POST['cleanup'] : 0;
    $netfx = isset($_POST['netfx']) ? $_POST['netfx'] : 0;
    $esd = isset($_POST['esd']) ? $_POST['esd'] : 0;

    $moreOptions = [];
    $moreOptions['updates'] = $updates;
    $moreOptions['cleanup'] = $cleanup;
    $moreOptions['netfx'] = $netfx;
    $moreOptions['esd'] = $esd;

    $build = explode('.', $updateBuild);
    $build = @$build[0];
    $disableVE = 0;
    if($editDir == 'app' || $build < 17107 || in_array($uSku, [7,8,12,13,79,80,120,145,146,147,148,159,160,406,407,408])) {
        $disableVE = 1;
    }

    if($build > 22557 && preg_match('/Cumulative Update/i', $updateTitle)) {
       $editDir = 'app';
    }

    switch($autoDl) {
        case 1:
            if($build > 22557) {
                if($editDir == 'app' || $langDir == 'neutral') {
                    createAria2Package($url, $archiveName);
                } else {
                    createAria2Package($url, $archiveName, $app);
                }
            } else {
                createAria2Package($url, $archiveName);
            }
            break;

        case 2:
            if($build > 22557) {
                if($editDir == 'app' || $langDir == 'neutral') {
                    createUupConvertPackage($url, $archiveName, 0, ["Enterprise"], $moreOptions);
                } else {
                    createUupConvertPackage($url, $archiveName, 0, ["Enterprise"], $moreOptions, $app);
                }
            } else {
                createUupConvertPackage($url, $archiveName, 0, ["Enterprise"], $moreOptions);
            }
            break;

        case 3:
            if(!count($desiredVE)) {
                fancyError('UNSPECIFIED_VE', 'downloads');
                die();
            }
            if($disableVE) {
                echo 'Not available for this build.';
                break;
            }
            if($build > 22557) {
                if($editDir == 'app' || $langDir == 'neutral') {
                    createUupConvertPackage($url, $archiveName, 1, $desiredVE, $moreOptions);
                } else {
                    createUupConvertPackage($url, $archiveName, 1, $desiredVE, $moreOptions, $app);
                }
            } else {
                createUupConvertPackage($url, $archiveName, 1, $desiredVE, $moreOptions);
            }
            break;

        default:
            echo 'Unknown package';
    }
    die();
}

$files = uupGetFiles($updateId, $usePack, $desiredEditionMixed, 1);

if($aria2) {
    header('Content-Type: text/plain');

    if(isset($files['error'])) {
        if($aria2 == 2) {
            echo '#UUPDUMP_ERROR:';
        } else {
            http_response_code(400);
        }

        echo $files['error'];
        die();
    }

    if($autoDl) {
        header('Content-Disposition: attachment; filename="aria2_script.txt"');
    }

    $files = $files['files'];
    $filesKeys = array_keys($files);

    usort($filesKeys, 'sortBySize');
    foreach($filesKeys as $val) {
        echo $files[$val]['url']."\n";
        echo '  out='.$val."\n";
        echo '  checksum=sha-1='.$files[$val]['sha1']."\n\n";
    }
    /*
    //add debugging information to the file
    echo "# --- BEGIN UUP DUMP DEBUG INFO ---\n";
    foreach($filesKeys as $val) {
        echo "#debug=";
        echo base64_encode($val);
        echo ":";
        echo base64_encode($files[$val]['debug']);
        echo "\n";
    }
    echo "# --- END UUP DUMP DEBUG INFO ---\n";
    */
    die();
}

if(isset($files['error'])) {
    if($files['error'] == 'EMPTY_FILELIST') {
        $oldError = $files['error'];
        $files = uupGetFiles($updateId, $usePack, $desiredEditionMixed, 2);
        if(isset($files['error'])) {
            $files['error'] = 'NOT_FOUND';
        } else {
            $files['error'] = $oldError;
        }
    }

    fancyError($files['error'], 'downloads');
    die();
}

$updateName = $files['updateName'];
$updateBuild = $files['build'];
$updateArch = $files['arch'];
$files = $files['files'];
$filesKeys = array_keys($files);

$request = explode('?', $_SERVER['REQUEST_URI'], 2);

if($renameScript) {
    if($renameScript == 2) {
        header('Content-Type: application/sh');
        header('Content-Disposition: attachment; filename="rename_script.sh"');

        echo "#!/bin/bash\n\n";
        foreach($filesKeys as $val) {
            echo 'mv "'.$files[$val]['uuid'].'" "'.$val."\" 2>/dev/null\n";
        }
        /*
        //add debugging information to the file
        echo "\n# --- BEGIN UUP DUMP DEBUG INFO ---\n";
        foreach($filesKeys as $val) {
            echo "#debug=";
            echo base64_encode($val);
            echo ":";
            echo base64_encode($files[$val]['debug']);
            echo "\n";
        }
        echo "# --- END UUP DUMP DEBUG INFO ---\n";
        */
        die();
    }

    header('Content-Type: application/cmd');
    header('Content-Disposition: attachment; filename="rename_script.cmd"');

    echo "@echo off\r\ncd /d \"%~dp0\"\r\n\r\n";
    foreach($filesKeys as $val) {
        echo "IF EXIST \"{$files[$val]['uuid']}\" ";
        echo 'RENAME "'.$files[$val]['uuid'].'" "'.$val."\"\r\n";
    }
    /*
    //add debugging information to the file
    echo "\n:: --- BEGIN UUP DUMP DEBUG INFO ---\n";
    foreach($filesKeys as $val) {
        echo "::debug=";
        echo base64_encode($val);
        echo ":";
        echo base64_encode($files[$val]['debug']);
        echo "\n";
    }
    echo ":: --- END UUP DUMP DEBUG INFO ---\n";
    */
    die();
}

if($simple) {
    header('Content-Type: text/plain');
    usort($filesKeys, 'sortBySize');
    foreach($filesKeys as $val) {
        echo $val."|".$files[$val]['sha1']."|".$files[$val]['url']."\n";
    }
    die();
}

styleUpper('downloads', sprintf($s['listOfFilesFor'], "$updateName $updateArch"));
?>

<h3 class="ui centered header">
    <div class="content">
        <i class="fitted list icon"></i>&nbsp;
        <?php echo htmlentities($updateName.' '.$updateArch); ?>
    </div>
</h3>

<?php
if(!file_exists('packs/'.$updateId.'.json.gz')) {
    styleNoPackWarn();
}

if($updateArch == 'arm64') {
    styleCluelessUserArm64Warn();
}
?>

<table class="ui celled striped table">
    <thead>
        <tr>
            <th><?php echo $s['file']; ?></th>
            <th><?php echo $s['expires']; ?></th>
            <th><?php echo $s['sha1']; ?></th>
            <th><?php echo $s['size']; ?></th>
        </tr>
    </thead>
<?php
$totalSize = 0;
foreach($filesKeys as $val) {
    $size = $files[$val]['size'];
    $totalSize = $totalSize + $size;
    $size = readableSize($size);

    echo '<tr><td><a href="'.$files[$val]['url'].'">'.$val.'</a></td><td>'.date("Y-m-d H:i:s T", $files[$val]['expire']).'</td>';
    echo '<td><code>'.$files[$val]['sha1'].'</code></td><td>'.$size.'</td></tr>'."\n";
}
$totalSize = readableSize($totalSize, 2);

if(count($filesKeys)+3 > 30) {
    $filesRows = 30;
} else {
    $filesRows = count($filesKeys)+3;
}
?>
</table>
<div class="ui info message">
    <i class="info icon"></i>
    <?php printf($s['totalSizeOfFiles'], $totalSize); ?>
</div>

<div class="ui divider"></div>

<div class="ui icon positive message">
    <i class="terminal icon"></i>
    <div class="content">
        <div class="header"><?php echo $s['fileRenamingScript']; ?></div>
        <p>
            <?php echo $s['fileRenamingScriptDesc1']; ?><br>
            <?php echo $s['fileRenamingScriptDesc2']; ?>
        </p>
    </div>
</div>

<div class="ui form">
    <div class="field">
        <textarea readonly rows="<?php echo $filesRows ?>" style="font-family: monospace;">
@echo off
cd /d "%~dp0"
<?php
foreach($filesKeys as $val) {
    echo 'rename "'.$files[$val]['uuid'].'" "'.$val."\"\n";
}
?>
</textarea>
    </div>
</div>

<div class="ui divider"></div>

<div class="ui icon positive message">
    <i class="check circle outline icon"></i>
    <div class="content">
        <div class="header"><?php echo $s['sha1File']; ?></div>
        <p><?php echo $s['sha1FileDesc']; ?></p>
    </div>
</div>

<div class="ui form">
    <div class="field">
        <textarea readonly rows="<?php echo $filesRows ?>" style="font-family: monospace;">
<?php
foreach($filesKeys as $val) {
    echo $files[$val]['sha1'].' *'.$val."\n";
}
?>
</textarea>
    </div>
</div>

<?php
styleLower();
?>
