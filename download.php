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
$usePack = isset($_GET['pack']) ? $_GET['pack'] : 0;
$desiredEdition = isset($_GET['edition']) ? $_GET['edition'] : 0;

require_once 'api/get.php';
require_once 'api/listlangs.php';
require_once 'api/listeditions.php';
require_once 'shared/style.php';

if(!$updateId) {
    fancyError('UNSPECIFIED_UPDATE', 'downloads');
    die();
}

if(!checkUpdateIdValidity($updateId)) {
    fancyError('INCORRECT_ID', 'downloads');
    die();
}

if(!$usePack) {
    $url = "./findfiles.php?id=$updateId";

    header("Location: $url");
    echo "<h1>Moved to <a href=\"$url\">here</a>.";
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

$desiredEdition = strtolower($desiredEdition);
$url = "./get.php?id=$updateId&pack=$usePack&edition=$desiredEdition";

if($desiredEdition == 'wubfile' || $desiredEdition == 'updateonly') {
    header("Location: $url");
    echo "<h1>Moved to <a href=\"$url\">here</a>.";
    die();
}

$files = uupGetFiles($updateId, $usePack, $desiredEditionMixed, 2);
if(isset($files['error'])) {
    fancyError($files['error'], 'downloads');
    die();
}

$updates = uupGetFiles($updateId, 0, 'updateOnly', 2);
if(isset($updates['error'])) {
    $hasUpdates = 0;
} else {
    $hasUpdates = 1;
}

$uSku = $files['sku'];
$build = explode('.', $files['build']);
$build = @$build[0];
$disableVE = 0;
if($build < 17107 || $uSku == 7 || $uSku == 8 || $uSku == 12 || $uSku == 13 || $uSku == 79 || $uSku == 80 || $uSku == 120 || $uSku == 145 || $uSku == 146 || $uSku == 147 || $uSku == 148 || $uSku == 159 || $uSku == 160 || $uSku == 406 || $uSku == 407 || $uSku == 408) {
    $disableVE = 1;
}

$updateTitle = "{$files['updateName']} {$files['arch']}";
$updateArch = $files['arch'];
$files = $files['files'];

$totalSize = 0;
foreach($files as $file) {
    $totalSize += $file['size'];
}

$prefixes = array('', 'Ki', 'Mi', 'Gi', 'Ti', 'Pi', 'Ei', 'Zi', 'Yi');
foreach($prefixes as $prefix) {
    if($totalSize < 1024) break;
    $totalSize = $totalSize / 1024;
}
$totalSize = round($totalSize, 2);
$totalSize = "$totalSize {$prefix}B";

if($usePack) {
    if(isset($s['lang_'.strtolower($usePack)])) {
        $selectedLangName = $s['lang_'.strtolower($usePack)];
    } else {
        $langs = uupListLangs($updateId);
        $langs = $langs['langFancyNames'];

        $selectedLangName = $langs[strtolower($usePack)];
    }
} else {
    $selectedLangName = $s['allLanguages'];
}

if($usePack && $desiredEdition) {
    $editions = uupListEditions($usePack, $updateId);
    $editions = $editions['editionFancyNames'];

    if(isset($editions[strtoupper($desiredEdition)])) {
        $selectedEditionName = $editions[strtoupper($desiredEdition)];
    } else {
        $fancyNames = [];
        foreach($desiredEditionMixed as $edition) {
            $fancyNames[] = $editions[strtoupper($edition)];
        }

        $selectedEditionName = implode(', ', $fancyNames);
    }
} else {
    $selectedEditionName = $s['allEditions'];
}

$filesKeys = array_keys($files);
$virtualEditions = array();

if(preg_grep('/^Core_.*\.esd/i', $filesKeys)) {
    $virtualEditions['CoreSingleLanguage'] = 'Home Single Language';
}

if(preg_grep('/^Professional_.*\.esd/i', $filesKeys)) {
    $virtualEditions['ProfessionalWorkstation'] = 'Pro for Workstations';
    $virtualEditions['ProfessionalEducation'] = 'Pro Education';
    $virtualEditions['Education'] = 'Education';
    $virtualEditions['Enterprise'] = 'Enterprise';
    $virtualEditions['ServerRdsh'] = 'Enterprise for Virtual Desktops';

    if($build >= 18277) {
        $virtualEditions['IoTEnterprise'] = 'IoT Enterprise';
    }
}

if(preg_grep('/^ProfessionalN_.*\.esd/i', $filesKeys)) {
    $virtualEditions['ProfessionalWorkstationN'] = 'Pro N for Workstations';
    $virtualEditions['ProfessionalEducationN'] = 'Pro Education N';
    $virtualEditions['EducationN'] = 'Education N';
    $virtualEditions['EnterpriseN'] = 'Enterprise N';
}

$chkone = null;
$chktwo = 'checked';
if($uSku == 189 || $uSku == 135) {
    $chkone = 'checked';
    $chktwo = 'disabled';
}

styleUpper('downloads', sprintf($s['summaryFor'], "$updateTitle, $selectedLangName, $selectedEditionName"));
?>

<h3 class="ui centered header">
    <div class="content">
        <i class="fitted briefcase icon"></i>&nbsp;
        <?php echo $s['summaryOfSelection']; ?>
    </div>
</h3>

<div class="ui normal modal virtual-editions-info">
    <div class="header">
        <?php echo $s['learnMore']; ?>
    </div>
    <div class="content">
        <p><?php echo $s['learnMoreAdditionalEditions1']; ?></p>

        <p><b><?php echo $s['learnMoreAdditionalEditions2']; ?></b></p>

        <p><b>Windows 10 Home</b></p>
        <ul>
            <li>Windows 10 Home Single Language</li>
        </ul>
        <p><b>Windows 10 Pro</b></p>
        <ul>
            <li>Windows 10 Pro for Workstations</li>
            <li>Windows 10 Pro Education</li>
            <li>Windows 10 Education</li>
            <li>Windows 10 Enterprise</li>
            <li>Windows 10 Enterprise for Virtual Desktops</li>
            <li>Windows 10 IoT Enterprise</li>
        </ul>
        <p><b>Windows 10 Pro N</b></p>
        <ul>
            <li>Windows 10 Pro for Workstations N</li>
            <li>Windows 10 Pro Education N</li>
            <li>Windows 10 Education N</li>
            <li>Windows 10 Enterprise N</li>
        </ul>
    </div>
    <div class="actions">
        <div class="ui primary ok button">
            <i class="checkmark icon"></i>
            <?php echo $s['ok']; ?>
        </div>
    </div>
</div>

<div class="ui normal tiny modal updates">
    <div class="header">
        <?php echo $s['learnMore']; ?>
    </div>
    <div class="content">
        <p><?php echo $s['learnMoreUpdates1']; ?></p>
        <ul>
            <li>Windows 10</li>
            <li><?php printf($s['systemWithAdk'], 'Windows 8.1'); ?></li>
        </ul>
        <p><?php echo $s['learnMoreUpdates2']; ?></p>
    </div>
    <div class="actions">
        <div class="ui primary ok button">
            <i class="checkmark icon"></i>
            <?php echo $s['ok']; ?>
        </div>
    </div>
</div>

<?php
if(!file_exists('packs/'.$updateId.'.json.gz')) {
    styleNoPackWarn();
}

if($updateArch == 'arm64') {
    styleCluelessUserArm64Warn();
}
?>

<div class="ui two columns mobile reversed stackable centered grid">
    <div class="column">
        <h3 class="ui header">
            <i class="download icon"></i>
            <div class="content">
                <?php echo $s['selectDownloadOptions']; ?>
                <div class="sub header"><?php echo $s['selectDownloadOptionsSub']; ?></div>
            </div>
        </h3>

        <form class="ui form" action="<?php echo $url; ?>" method="post" id="download-options">
            <div class="field">
                <label><?php echo $s['downloadMethod']; ?></label>
                <div class="grouped fields">
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="autodl" value="1"
                            <?php echo $chkone; ?>>
                            <label>
                                <?php echo $s['aria2Opt1']; ?><br/>
                                <small><?php echo $s['aria2Opt1Desc']; ?></small>
                            </label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="autodl" value="2"
                            <?php echo $chktwo; ?>>
                            <label>
                                <?php echo $s['aria2Opt2']; ?><br/>
                                <small><?php echo $s['aria2Opt2Desc']; ?></small>
                            </label>
                        </div>
                    </div>
                    <div class="field">
                        <div id="VEConvertOpt" class="ui radio checkbox">
                            <input type="radio" name="autodl" value="3"
                            <?php if($disableVE) echo 'disabled'; ?>>
                            <label>
                                <?php echo $s['aria2Opt3']; ?><br/>
                                <small>
                                    <?php echo $s['aria2Opt3Desc']; ?>
                                    <span id="VEConvertLearnMoreLink" style="display: none;">
                                        <a href="javascript:void(0)" onClick="learnMoreVE();">
                                            <?php echo $s['learnMore']; ?>
                                        </a>
                                    </span>
                                </small>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field" id="conversion-options">
                <label><?php echo $s['conversionOptions']; ?></label>
                <div class="grouped fields">
                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="updates" value="1" checked class="conversion-option">
                            <label><?php echo $s['convOpt2']; ?></label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="cleanup" value="1" class="conversion-option">
                            <label><?php echo $s['convOpt3']; ?></label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="netfx" value="1" class="conversion-option">
                            <label><?php echo $s['convOpt4']; ?></label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="esd" value="1" class="conversion-option">
                            <label><?php echo $s['convOpt1']; ?></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field" id="additional-editions-list">
                <label><?php echo $s['selAdditionalEditions']; ?></label>
                <div class="grouped fields">
<?php
$printedEditions = 0;
if(!$disableVE) foreach($virtualEditions as $key => $val) {
    echo <<<EOD
<div class="field">
    <div class="ui checkbox">
        <input class="virtual-edition" type="checkbox" name="virtualEditions[]" value="$key" checked>
        <label>Windows 10 $val</label>
    </div>
</div>

EOD;
    $printedEditions++;
}

if(!$printedEditions) echo <<<EOL
<p>{$s['noAdditionalEditions']}</p>

EOL;
?>
                </div>
            </div>

            <button class="ui fluid right labeled icon primary button" type="submit">
                <i class="download icon"></i>
                <?php echo $s['startDownload']; ?>
            </button>
        </form>
    </div>

    <div class="column">
        <h4 class="ui header">
            <i class="cubes icon"></i>
            <div class="content">
                <?php echo $s['update']; ?>
                <div class="sub header"><?php echo htmlentities($updateTitle); ?></div>
            </div>
        </h4>

        <h4 class="ui header">
            <i class="globe icon"></i>
            <div class="content">
                <?php echo $s['lang']; ?>
                <div class="sub header"><?php echo $selectedLangName; ?></div>
            </div>
        </h4>

        <h4 class="ui header">
            <i class="archive icon"></i>
            <div class="content">
                <?php echo $s['edition']; ?>
                <div class="sub header"><?php echo $selectedEditionName; ?></div>
            </div>
        </h4>

        <h4 class="ui header">
            <i class="download icon"></i>
            <div class="content">
                <?php echo $s['totalDlSize']; ?>
                <div class="sub header"><?php echo $totalSize; ?></div>
            </div>
        </h4>

<?php
if($hasUpdates) {
    echo <<<INFO
<h4 class="ui header">
    <i class="info icon"></i>
    <div class="content">
        {$s['additionalUpdates']}
        <div class="sub header">
            {$s['additionalUpdatesDesc']}

            <a href="javascript:void(0)" onClick="learnMoreUpdates();"
            id="LearnMoreUpdatesLink" style="display: none;">
                {$s['learnMore']}
            </a>
        </div>
    </div>
</h4>

<a class="ui tiny labeled icon button"
href="./get.php?id=$updateId&pack=0&edition=updateOnly">
    <i class="folder open icon"></i>
    {$s['browseUpdatesList']}
</a>

<script>
document.getElementById('LearnMoreUpdatesLink').style.display = "inline";
</script>

INFO;
}
?>
        <div class="ui divider"></div>
        <a class="ui fluid right labeled icon button" href="<?php echo $url; ?>">
            <i class="list icon"></i>
            <?php echo $s['browseList']; ?>
        </a>
    </div>
</div>

<div class="ui positive message">
    <div class="header">
        <?php echo $s['aria2NoticeTitle']; ?>
    </div>
    <p><?php echo $s['aria2NoticeText1']; ?></p>

    <p><b><?php echo $s['aria2NoticeText2']; ?></b><br/>
    - Windows: <code>uup_download_windows.cmd</code><br/>
    - Linux: <code>uup_download_linux.sh</code><br/>
    - macOS: <code>uup_download_macos.sh</code><br/>
    </p>

    <p>
<?php
    printf($s['aria2NoticeText3'], '<a href="https://aria2.github.io/">https://aria2.github.io/</a>');
    echo '<br>';
    printf($s['aria2NoticeText4'], '<a href="https://forums.mydigitallife.net/members/abbodi1406.204274/">abbodi1406</a>');
    echo '<br>';
    printf($s['aria2NoticeText5'], '<a href="https://github.com/uup-dump/converter">https://github.com/uup-dump/converter</a>');
?>
    </p>
</div>

<div class="ui fluid tiny three steps">
      <div class="completed step">
            <i class="world icon"></i>
            <div class="content">
                <div class="title"><?php echo $s['chooseLang']; ?></div>
                <div class="description"><?php echo $s['chooseLangDesc']; ?></div>
            </div>
      </div>

      <div class="completed step">
            <i class="archive icon"></i>
            <div class="content">
                <div class="title"><?php echo $s['chooseEdition']; ?></div>
                <div class="description"><?php echo $s['chooseEditionDesc']; ?></div>
            </div>
      </div>

      <div class="active step">
            <i class="briefcase icon"></i>
            <div class="content">
                <div class="title"><?php echo $s['summary']; ?></div>
                <div class="description"><?php echo $s['summaryDesc']; ?></div>
            </div>
      </div>
</div>

<script>
function learnMoreVE() {
    $('.ui.modal.virtual-editions-info').modal('show');
}

function learnMoreUpdates() {
    $('.ui.modal.updates').modal('show');
}

function checkDlOpt() {
    autodl = $('input[name="autodl"]:checked').val();

    if(autodl == 1) {
        $('#conversion-options').slideUp(300);
        disabled_co = true;
    } else {
        $('#conversion-options').slideDown(300);
        disabled_co = false;
    }

    if(autodl == 3) {
        $('#additional-editions-list').slideDown(300);
        disabled_ve = false;
    } else {
        $('#additional-editions-list').slideUp(300);
        disabled_ve = true;
    }

    $('.virtual-edition').prop('disabled', disabled_ve);
    $('.conversion-option').prop('disabled', disabled_co);
}

$('.ui.checkbox').checkbox();

$('input[name="autodl"]').on('click change', function() {
    checkDlOpt();
});

$('#additional-editions-list').hide();
$('#VEConvertLearnMoreLink').css('display', 'inline');
checkDlOpt();
</script>

<?php
styleLower();
?>
