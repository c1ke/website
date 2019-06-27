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

$updateTitle = $updateTitle.' '.$updateArch;
$build = floor($updateInfo['build']);

if($selectedLang) {
    if(isset($s['lang_'.strtolower($selectedLang)])) {
        $selectedLangName = $s['lang_'.strtolower($selectedLang)];
    } else {
        $langs = uupListLangs($updateId);
        $langs = $langs['langFancyNames'];

        $selectedLangName = $langs[strtolower($selectedLang)];
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

styleUpper('downloads', sprintf($s['selectEditionFor'], "$updateTitle, $selectedLangName"));
?>

<div class="ui horizontal divider">
    <h3><i class="cubes icon"></i><?php echo $updateTitle; ?></h3>
</div>

<?php
if(!file_exists('packs/'.$updateId.'.json.gz')) {
    styleNoPackWarn();
}

if($updateArch == 'arm64') {
    styleCluelessUserArm64Warn();
}
?>

<div class="ui two columns mobile stackable centered grid">
    <div class="column">
        <h3 class="ui header">
            <i class="archive icon"></i>
            <div class="content">
                <?php echo $s['chooseEdition']; ?>
                <div class="sub header"><?php echo $s['chooseEditionDesc']; ?></div>
            </div>
        </h3>
        <form class="ui form" action="./download.php" method="get">
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
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="edition" value="0" checked>
                            <label><?php echo $s['allEditions']; ?></label>
                        </div>
                    </div>

<?php
foreach($editions as $key => $val) {
    echo <<<EOD
<div class="field">
    <div class="ui radio checkbox">
        <input type="radio" name="edition" value="$key">
        <label>$val</label>
    </div>
</div>

EOD;
}
?>
                </div>
            </div>

            <p><?php echo $s['additionalEditionsInfo']; ?></p>

            <button class="ui fluid right labeled icon primary button" type="submit">
                <i class="right arrow icon"></i>
                <?php echo $s['next']; ?>
            </button>
            <div class="ui info message">
                <i class="info icon"></i>
                <?php echo $s['selectEditionInfoText']; ?>
            </div>
        </form>
    </div>

    <div class="column">
        <table class="ui very compact celled table">
            <thead>
                <th><?php echo $s['additionalEdition']; ?></th>
                <th><?php echo $s['requiredEdition']; ?></th>
            </thead>
            <tbody>
                <tr>
                    <td>Windows 10 Home Single Language</td>
                    <td>Windows 10 Home</td>
                </tr>
                <tr>
                    <td>Windows 10 Pro for Workstations</td>
                    <td>Windows 10 Pro</td>
                </tr>
                <tr>
                    <td>Windows 10 Pro for Workstations</td>
                    <td>Windows 10 Pro</td>
                </tr>
                <tr>
                    <td>Windows 10 Pro Education</td>
                    <td>Windows 10 Pro</td>
                </tr>
                <tr>
                    <td>Windows 10 Education</td>
                    <td>Windows 10 Pro</td>
                </tr>
                <tr>
                    <td>Windows 10 Enterprise</td>
                    <td>Windows 10 Pro</td>
                </tr>
                <tr>
                    <td>Windows 10 Enterprise for Virtual Desktops</td>
                    <td>Windows 10 Pro</td>
                </tr>
                <tr>
                    <td>Windows 10 IoT Enterprise</td>
                    <td>Windows 10 Pro</td>
                </tr>
                <tr>
                    <td>Windows 10 Pro for Workstations N</td>
                    <td>Windows 10 Pro N</td>
                </tr>
                <tr>
                    <td>Windows 10 Pro Education N</td>
                    <td>Windows 10 Pro N</td>
                </tr>
                <tr>
                    <td>Windows 10 Education N</td>
                    <td>Windows 10 Pro N</td>
                </tr>
                <tr>
                    <td>Windows 10 Enterprise N</td>
                    <td>Windows 10 Pro N</td>
                </tr>
            </tbody>
        </table>
    </div>
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

<script>$('.ui.checkbox').checkbox();</script>

<?php
styleLower();
?>
