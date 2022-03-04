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

$updateId = isset($_GET['id']) ? $_GET['id'] : null;
$search = isset($_GET['q']) ? $_GET['q'] : null;
$aria2 = isset($_GET['aria2']) ? $_GET['aria2'] : null;

require_once 'api/get.php';
require_once 'api/updateinfo.php';
require_once 'shared/get.php';
require_once 'shared/style.php';

if(!$updateId) {
    fancyError('UNSPECIFIED_UPDATE', 'downloads');
    die();
}

if(!checkUpdateIdValidity($updateId)) {
    fancyError('INCORRECT_ID', 'downloads');
    die();
}

$files = uupGetFiles($updateId, 0, 0, 2);
if(isset($files['error'])) {
    fancyError($files['error'], 'downloads');
    die();
}

$updateName = $files['updateName'];
$updateBuild = $files['build'];
$updateArch = $files['arch'];
$files = $files['files'];
$filesKeys = array_keys($files);

if($search) {
    $searchSafe = preg_quote($search, '/');
    if($searchSafe == "Windows KB") {
        $searchSafe = "Windows KB|SSU-";
        if($updateBuild > 21380) $searchSafe = "Windows KB|SSU-|DesktopDeployment|AggregatedMetadata";
    }
    if(preg_match('/^".*"$/', $searchSafe)) {
        $searchSafe = preg_replace('/^"|"$/', '', $searchSafe);
    } else {
        $searchSafe = str_replace(' ', '.*', $searchSafe);
    }

    $removeKeys = preg_grep('/.*'.$searchSafe.'.*/i', $filesKeys, PREG_GREP_INVERT);
    if($search == "Windows KB") {
        $removeKeys = array_merge($removeKeys, preg_grep('/Windows(10|11)\.0-KB.*-EXPRESS|SSU-.*-.{3,5}-EXPRESS|SSU-.*?\.psf/i', $filesKeys));
    }

    foreach($removeKeys as $value) {
        unset($files[$value]);
    }

    if(empty($files)) {
        fancyError('SEARCH_NO_RESULTS', 'downloads');
        die();
    }

    unset($removeKeys);
    $filesKeys = array_keys($files);
}

$urlBase = "getfile.php?id=$updateId";

if($aria2) {
    $urlBase = getBaseUrl()."/".$urlBase;
    header('Content-Type: text/plain');

    usort($filesKeys, 'sortBySize');
    foreach($filesKeys as $val) {
        echo "$urlBase&file=$val\n";
        echo '  out='.$val."\n";
        echo '  checksum=sha-1='.$files[$val]['sha1']."\n\n";
    }

    die();
}

$pageTitle = sprintf($s['findFilesIn'], "$updateName $updateArch");
if($search) {
    $pageTitle = "$search - ".$pageTitle;
}

styleUpper('downloads', $pageTitle);
?>

<h3 class="ui centered header">
    <div class="content">
        <i class="fitted list icon"></i>&nbsp;
        <?php echo htmlentities($updateName.' '.$updateArch); ?>
    </div>
</h3>

<div class="ui top attached segment">
    <form class="ui form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <div class="field">
            <div class="ui big action input">
                <input type="hidden" name="id" value="<?php echo htmlentities($updateId); ?>">
                <input type="text" name="q" value="<?php echo htmlentities($search); ?>" placeholder="<?php echo $s['searchForFiles']; ?>">
                <button class="ui big blue icon button" type="submit"><i class="search icon"></i></button>
            </div>
        </div>
    </form>
</div>
<div class="ui bottom attached success message">
    <i class="search icon"></i>
    <?php printf($s['weFoundFiles'], count($files)); ?>
</div>

<table class="ui fixed celled striped tablet stackable table">
    <thead>
        <tr>
            <th class="eight wide"><?php echo $s['file']; ?></th>
            <th class="six wide"><?php echo $s['sha1']; ?></th>
            <th class="two wide"><?php echo $s['size']; ?></th>
        </tr>
    </thead>
<?php
$totalSize = 0;
foreach($filesKeys as $val) {
    $size = $files[$val]['size'];
    $totalSize = $totalSize + $size;
    $size = readableSize($size, 2);

    echo "<tr><td><a href=\"$urlBase&file=$val\">$val</a></td>";
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

<div class="ui icon message">
    <i class="terminal icon"></i>
    <div class="content">
        <div class="header"><?php echo $s['fileRenamingScript']; ?></div>
        <p><?php echo $s['fileRenamingScriptDescFindFiles']; ?></p>

        <div class="ui two columns stackable grid">
            <div class="column">
                <a class="ui fluid labeled icon button"
                href="./get.php?id=<?php echo $updateId; ?>&renscript=1">
                    <i class="windows icon"></i>
                    <?php echo $s['fileRenamingScriptGenW']; ?>
                </a>
            </div>

            <div class="column">
                <a class="ui fluid labeled icon button"
                href="./get.php?id=<?php echo $updateId; ?>&renscript=2">
                    <i class="linux icon"></i>
                    <?php echo $s['fileRenamingScriptGenL']; ?>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="ui divider"></div>

<div class="ui icon message">
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
