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

if($autoDl && !$aria2) {
    $files = uupGetFiles($updateId, $usePack, $desiredEdition, 2);
    if(isset($files['error'])) {
        fancyError($files['error'], 'downloads');
        die();
    }

    $info = uupUpdateInfo($updateId);
    $info = @$info['info'];

    $updateBuild = isset($info['build']) ? $info['build'] : 'UNKNOWN';
    $updateArch = isset($info['arch']) ? $info['arch'] : 'UNKNOWN';

    $langDir = $usePack ? $usePack : 'all';
    $editDir = $desiredEdition ? strtolower($desiredEdition) : 'all';

    $id = substr($updateId, 0, 8);
    $archiveName = "{$updateBuild}_{$updateArch}_{$langDir}_{$editDir}_{$id}";

    $url = '';
    if(isset($_SERVER['HTTPS'])) {
        $url .= 'https://';
    } else {
        $url .= 'http://';
    }

    $url .=  $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $url .= '?id='.$updateId.'&pack='.$usePack.'&edition='.$desiredEdition.'&aria2=2';

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

    switch($autoDl) {
        case 1:
            createAria2Package($url, $archiveName);
            break;

        case 2:
            createUupConvertPackage($url, $archiveName, 0, ["Enterprise"], $moreOptions);
            break;

        case 3:
            $build = explode('.', $updateBuild);
            $build = @$build[0];

            if(!count($desiredVE)) {
                fancyError('UNSPECIFIED_VE', 'downloads');
                die();
            }

            if($build < 17107) {
                echo 'Not available for this build.';
            } else {
                createUupConvertPackage($url, $archiveName, 1, $desiredVE, $moreOptions);
            }

            break;

        default:
            echo 'Unknown package';
    }
    die();
}

$files = uupGetFiles($updateId, $usePack, $desiredEdition, 1);

if($aria2) {
    header('Content-Type: text/plain');

    if(isset($files['error'])) {
        if($aria2 == 2) {
            echo '#UUPDUMP_ERROR:';
            echo $files['error'];
            die();
        } else {
            http_response_code(400);
            echo $files['error'];
            die();
        }
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
    die();
}

if(isset($files['error'])) {
    if($files['error'] == 'EMPTY_FILELIST') {
        $oldError = $files['error'];
        $files = uupGetFiles($updateId, $usePack, $desiredEdition, 2);
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

        die();
    }

    header('Content-Type: application/cmd');
    header('Content-Disposition: attachment; filename="rename_script.cmd"');

    echo "@echo off\r\ncd /d \"%~dp0\"\r\n\r\n";
    foreach($filesKeys as $val) {
        echo "IF EXIST \"{$files[$val]['uuid']}\" ";
        echo 'RENAME "'.$files[$val]['uuid'].'" "'.$val."\"\r\n";
    }

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

<div class="ui horizontal divider">
    <h3><i class="list icon"></i><?php echo $updateName.' '.$updateArch; ?></h3>
</div>

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
$prefixes = array('', 'Ki', 'Mi', 'Gi', 'Ti', 'Pi', 'Ei', 'Zi', 'Yi');

foreach($filesKeys as $val) {
    $totalSize = $totalSize + $files[$val]['size'];
    $size = $files[$val]['size'];

    foreach($prefixes as $prefix) {
        if($size < 1024) break;
        $size = $size / 1024;
    }
    $size = round($size);
    $size = "$size {$prefix}B";

    echo '<tr><td><a href="'.$files[$val]['url'].'">'.$val.'</a></td><td>'.date("Y-m-d H:i:s T", $files[$val]['expire']).'</td>';
    echo '<td><code>'.$files[$val]['sha1'].'</code></td><td>'.$size.'</td></tr>'."\n";
}

foreach($prefixes as $prefix) {
    if($totalSize < 1024) break;
    $totalSize = $totalSize / 1024;
}
$totalSize = round($totalSize, 2);
$totalSize = "$totalSize {$prefix}B";

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
