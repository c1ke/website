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

require_once 'api/listlangs.php';
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

$updateTitle = uupParseUpdateInfo($updateInfo, 'title');
if(isset($updateTitle['error'])) {
    $updateTitle = 'Unknown update: '.$updateId;
} else {
    $updateTitle = $updateTitle['info'];
}

$updateArch = uupParseUpdateInfo($updateInfo, 'arch');
if(isset($updateArch['error'])) {
    $updateArch = '';
} else {
    $updateArch = $updateArch['info'];
}

$updateTitle = $updateTitle.' '.$updateArch;

$langs = uupListLangs($updateId);
$langsTemp = array();

foreach($langs['langList'] as $lang) {
    if(isset($s["lang_$lang"])) {
        $langsTemp[$lang] = $s["lang_$lang"];
    } else {
        $langsTemp[$lang] = $langs['fancyLangNames'][$lang];
    }
}

$langs = $langsTemp;
unset($langsTemp);
locasort($langs, $s['code']);

if(isset($updateInfo['containsCU']) && $updateInfo['containsCU'] = 1) {
    $containsCU = 1;
} else {
    $containsCU = 0;
}

if(in_array(strtolower($s['code']), array_keys($langs))) {
    $defaultLang = strtolower($s['code']);
} else {
    $defaultLang = 'en-us';
}

styleUpper('downloads', sprintf($s['selectLangFor'], $updateTitle));
?>

<div class="ui horizontal divider">
    <h3><i class="world icon"></i><?php echo $s['chooseLang']; ?></h3>
</div>

<?php
if(!file_exists('packs/'.$updateId.'.json.gz')) {
    styleNoPackWarn();
}

if($updateArch == 'arm64') {
    styleCluelessUserArm64Warn();
}
?>

<div class="ui top attached segment">
    <form class="ui form" action="./selectedition.php" method="get" id="langForm">
        <div class="field">
            <label><?php echo $s['update']; ?></label>
            <input type="text" disabled value="<?php echo $updateTitle; ?>">
            <input type="hidden" name="id" value="<?php echo $updateId; ?>">
        </div>

        <div class="field">
            <label><?php echo $s['lang']; ?></label>
            <select class="ui search dropdown" name="pack" onchange="checkLanguage()">
                <option value="0"><?php echo $s['allLangs']; ?></option>
<?php
foreach($langs as $key => $val) {
    if($key == $defaultLang) {
        echo '<option value="'.$key.'" selected>'.$val."</option>\n";
    } else {
        echo '<option value="'.$key.'">'.$val."</option>\n";
    }
}
?>
            </select>
        </div>

        <div class="grouped fields" id="filesSelection" style="display: none;">
            <label><?php echo $s['selLangFiles']; ?></label>
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio" name="q" value="" checked disabled>
                    <label><?php echo $s['allFiles']; ?></label>
                </div>
            </div>
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio" name="q" value="WindowsUpdateBox.exe" disabled>
                    <label><?php echo $s['wubOnly']; ?></label>
                </div>
            </div>
<?php
if($containsCU) {
    echo <<<EOD
<div class="field">
    <div class="ui radio checkbox">
        <input type="radio" name="q" value="Windows10 KB" disabled>
        <label>${s['updateOnly']}</label>
    </div>
</div>
EOD;
}
?>
        </div>

        <button class="ui fluid right labeled icon blue button" id="submitForm" type="submit">
            <i class="right arrow icon"></i>
            <?php echo $s['next']; ?>
        </button>
    </form>
</div>
<div class="ui bottom attached info message" id="userMessage">
    <i class="info icon"></i>
    <?php echo $s['allLangsWarn']; ?>
</div>

<div class="ui fluid tiny three steps">
      <div class="active step">
            <i class="world icon"></i>
            <div class="content">
                <div class="title"><?php echo $s['chooseLang']; ?></div>
                <div class="description"><?php echo $s['chooseLangDesc']; ?></div>
            </div>
      </div>

      <div class="step">
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
    $('select.dropdown').dropdown();
    $('.ui.radio.checkbox').checkbox();

    function checkLanguage() {
        var form = document.getElementById('langForm');
        var btn = document.getElementById('submitForm');
        var msg = document.getElementById('userMessage');
        var file = document.getElementById('filesSelection');

        if(form.pack.value == 0) {
            form.action = './findfiles.php';
            msg.className = "ui bottom attached info message";
            msg.innerHTML = '<i class="info icon"></i>' +
                            '<?php echo $s['clickNextToOpenFindFiles']; ?>';

            file.style.display = "block";
            radioCount = form.q.length;
            for(i = 0; i < radioCount; i++) {
                form.q[i].disabled = false;
            }
        } else {
            form.action = './selectedition.php';
            msg.className = "ui bottom attached icon info message";
            msg.innerHTML = '<i class="paper plane icon"></i>' +
                            '<div class="content">' +
                            '<p class="header">' +
                            '<?php echo $s['information']; ?>' +
                            '</p>' +
                            '<?php echo $s['selectLangInfoText1']; ?>' +
                            '<br/>' +
                            '<?php echo $s['selectLangInfoText2']; ?>' +
                            '</div>';

            file.style.display = "none";
            radioCount = form.q.length;
            for(i = 0; i < radioCount; i++) {
                form.q[i].disabled = true;
            }
        }
    }

    checkLanguage();
</script>

<?php
styleLower();
?>
