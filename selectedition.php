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

$updateId = isset($_GET['id']) ? $_GET['id'] : 0;
$selectedLang = isset($_GET['pack']) ? $_GET['pack'] : 0;

require_once 'api/listlangs.php';
require_once 'api/listeditions.php';
require_once 'api/updateinfo.php';
require_once 'shared/style.php';

if(!$updateId) {
    fancyError('UNSPECIFIED_UPDATE', 'downloads');
    die();
}

if(!checkUpdateIdValidity($updateId)) {
    fancyError('INCORRECT_ID', 'downloads');
    die();
}

$updateInfo = uupUpdateInfo($updateId);
$updateInfo = isset($updateInfo['info']) ? $updateInfo['info'] : array();

if(!isset($updateInfo['title'])) {
    $updateTitle = 'Unknown update: '.$updateId;
} else {
    $updateTitle = $updateInfo['title'];
}

if(!isset($updateInfo['arch'])) {
    $updateArch = '';
} else {
    $updateArch = $updateInfo['arch'];
}

if(!isset($updateInfo['sku'])) {
    $uSku = 48;
} else {
    $uSku = $updateInfo['sku'];
}

$build = explode('.', $updateInfo['build']);
$build = @$build[0];
$disableVE = 0;
if($build < 17107 || in_array($uSku, [7,8,12,13,79,80,120,145,146,147,148,159,160,406,407,408])) {
    $disableVE = 1;
}

$updateTitle = $updateTitle.' '.$updateArch;
$build = floor($updateInfo['build']);

if($selectedLang) {
    if(isset($s['lang_'.strtolower($selectedLang)])) {
        $selectedLangName = $s['lang_'.strtolower($selectedLang)];
    } else {
        $langs = uupListLangs($updateId);
        $langs = $langs['langFancyNames'];

        if(isset($langs[strtolower($selectedLang)])) {
            $selectedLangName = $langs[strtolower($selectedLang)];
        } else {
            $selectedLangName = strtolower($selectedLang);
        }
    }

    $editions = uupListEditions($selectedLang, $updateId);
    if(isset($editions['error'])) {
        fancyError($editions['error'], 'downloads');
        die();
    }
    $editions = $editions['editionFancyNames'];
    asort($editions);
} else {
    $editions = array();
    $selectedLangName = $s['allLangs'];
}

$editionsNum = count($editions);

if($editionsNum == 1) foreach($editions as $key => $val) {
    if($key == 'APP') $disableVE = 1;
}

styleUpper('downloads', sprintf($s['selectEditionFor'], "$updateTitle, $selectedLangName"));
?>

<h3 class="ui centered header">
    <div class="content">
        <i class="fitted cubes icon"></i>&nbsp;
        <?php echo htmlentities($updateTitle); ?>
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

<div class="ui equal width mobile stackable grid">
    <div class="column">
        <h3 class="ui header">
            <i class="archive icon"></i>
            <div class="content">
                <?php echo $s['chooseEdition']; ?>
                <div class="sub header"><?php echo $s['chooseEditionDesc']; ?></div>
            </div>
        </h3>
        <form class="ui form" action="prepdl.php" method="post">
            <input type="hidden" name="id" value="<?php echo $updateId; ?>">
            <input type="hidden" name="pack" value="<?php echo $selectedLang; ?>">

            <div class="field">
                <label><?php echo $s['lang']; ?></label>
                <p>
                    <i class="green checkmark icon"></i>
                    <?php echo $selectedLangName; ?>
                </p>
            </div>

            <div class="field">
                <label><?php echo $s['edition']; ?></label>
                <div class="grouped fields">
<?php
foreach($editions as $key => $val) {
if($editionsNum > 1 && $key == 'PPIPRO') {
    echo <<<EOD
<div class="field">
    <div class="ui checkbox">
        <input type="checkbox" name="edition[]" value="$key" class="edition-selection" null>
        <label>$val</label>
    </div>
</div>

EOD;
    } else {
    echo <<<EOD
<div class="field">
    <div class="ui checkbox">
        <input type="checkbox" name="edition[]" value="$key" class="edition-selection" checked>
        <label>$val</label>
    </div>
</div>

EOD;
    }
}
?>
                </div>
            </div>

            <p><?php if(!$disableVE) echo $s['additionalEditionsInfo']; ?></p>

            <button id="edition-selection-confirm" class="ui fluid right labeled icon primary button" type="submit">
                <i class="right arrow icon"></i>
                <?php echo $s['next']; ?>
            </button>
            <div class="ui info message">
                <i class="info icon"></i>
                <?php echo $s['selectEditionInfoText']; ?>
            </div>
        </form>
    </div>

<?php
if(!$disableVE) {
    echo <<<EOD
<div class="column">
    <table class="ui very compact celled table">
        <thead>
            <th>{$s['additionalEdition']}</th>
            <th>{$s['requiredEdition']}</th>
        </thead>
        <tbody>
            <tr>
                <td>Windows Home Single Language</td>
                <td>Windows Home</td>
            </tr>
            <tr>
                <td>Windows Pro for Workstations</td>
                <td>Windows Pro</td>
            </tr>
            <tr>
                <td>Windows Pro Education</td>
                <td>Windows Pro</td>
            </tr>
            <tr>
                <td>Windows Education</td>
                <td>Windows Pro</td>
            </tr>
            <tr>
                <td>Windows Enterprise</td>
                <td>Windows Pro</td>
            </tr>
            <tr>
                <td>Windows Enterprise multi-session / Virtual Desktops</td>
                <td>Windows Pro</td>
            </tr>
            <tr>
                <td>Windows IoT Enterprise</td>
                <td>Windows Pro</td>
            </tr>
            <tr>
                <td>Windows Pro for Workstations N</td>
                <td>Windows Pro N</td>
            </tr>
            <tr>
                <td>Windows Pro Education N</td>
                <td>Windows Pro N</td>
            </tr>
            <tr>
                <td>Windows Education N</td>
                <td>Windows Pro N</td>
            </tr>
            <tr>
                <td>Windows Enterprise N</td>
                <td>Windows Pro N</td>
            </tr>
        </tbody>
    </table>
</div>
EOD;
}
?>

</div>

<div class="ui fluid tiny three steps">
      <div class="completed step">
            <i class="world icon"></i>
            <div class="content">
                <div class="title"><?php echo $s['chooseLang']; ?></div>
                <div class="description"><?php echo $s['chooseLangDesc']; ?></div>
            </div>
      </div>

      <div class="active step">
            <i class="archive icon"></i>
            <div class="content">
                <div class="title"><?php echo $s['chooseEdition']; ?></div>
                <div class="description"><?php echo $s['chooseEditionDesc']; ?></div>
            </div>
      </div>

      <div class="step">
            <i class="briefcase icon"></i>
            <div class="content">
                <div class="title"><?php echo $s['summary']; ?></div>
                <div class="description"><?php echo $s['summaryDesc']; ?></div>
            </div>
      </div>
</div>

<script>
$('.ui.checkbox').checkbox();

function checkEditions() {
    if($('.edition-selection:checked').length == 0) {
        $('#edition-selection-confirm').prop('disabled', 1);
    } else {
        $('#edition-selection-confirm').prop('disabled', 0);
    }
}

$('.edition-selection').on('click change', function() {
    checkEditions();
});

checkEditions();
</script>

<?php
styleLower();
?>
