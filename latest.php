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

require_once 'api/listid.php';
require_once 'shared/style.php';
styleUpper('downloads', $s['latestFetchLatest']);

$builds = array(
    '15063.0',
    '15063.674',
    '16251.0',
    '16299.0',
    '16299.15',
    '16299.19',
    '17025.1000',
    '17134.1',
);

$ids = uupListIds();
if(isset($ids['error'])) {
    $ids['builds'] = array();
}

$ids = $ids['builds'];
foreach($ids as $val) {
    $builds[] = $val['build'];
}

$builds = array_unique($builds);
sort($builds);
?>

<div class="ui basic modal">
    <div class="ui icon header">
        <i class="exclamation triangle icon"></i>
        <?php echo $s['latestTestingOnly']; ?>
    </div>
    <div class="content">
        <p><?php echo $s['latestTestingOnlyWarn']; ?></p>
        <p><?php echo $s['latestDoYouWantKnown']; ?></p>
    </div>
    <div class="actions">
        <div class="ui red ok inverted button">
            <i class="close icon icon"></i>
            <?php echo $s['no']; ?>
        </div>
        <a class="ui green inverted button" href="./known.php">
            <i class="checkmark icon"></i>
            <?php echo $s['yesRecommended']; ?>
        </a>
    </div>
</div>

<div class="ui horizontal divider">
    <h3><i class="options icon"></i><?php echo $s['chooseOptions']; ?></h3>
</div>

<div class="ui top attached segment">
    <form class="ui form" action="./fetchupd.php" method="get" id="optionsForm">
        <div class="field">
            <label><?php echo $s['arch']; ?></label>
            <select class="ui dropdown" name="arch">
                <option value="amd64">x64</option>
                <option value="x86">x86</option>
                <option value="arm64">arm64</option>
            </select>
        </div>

        <div class="field">
            <label><?php echo $s['ring']; ?></label>
            <select class="ui dropdown" name="ring" onchange="checkRing()">
                <option value="wif">Insider Fast</option>
                <option value="wis">Insider Slow</option>
                <option value="rp">Release Preview</option>
                <option value="retail">Retail</option>
            </select>
        </div>

        <div class="field">
            <label><?php echo $s['buildOfPretendedClient']; ?></label>
            <select class="ui search dropdown" name="build">
<?php
foreach($builds as $val) {
    if($val == '16299.15') {
        echo '<option value="'.$val.'" selected>'.$val."</option>\n";
    } else {
        echo '<option value="'.$val.'">'.$val."</option>\n";
    }
}
?>
            </select>
        </div>

        <div class="field">
            <label><?php echo $s['editionOfPretendedClient']; ?></label>
            <select class="ui dropdown" name="sku">
                <option value="101">Windows 10 Home</option>
                <option value="48" selected>Windows 10 Pro</option>
                <option value="121">Windows 10 Education</option>
                <option value="4">Windows 10 Enterprise</option>
                <option value="72">Windows 10 Enterprise Evaluation</option>
                <option value="125">Windows 10 Enterprise LTSC</option>
                <option value="129">Windows 10 Enterprise LTSC Evaluation</option>
                <option value="119">Windows 10 Team</option>
                <option value="7">Windows Server Standard</option>
                <option value="8">Windows Server Datacenter</option>
            </select>
        </div>

        <div class="field">
            <label><?php echo $s['skipAheadLabel']; ?></label>
            <div class="ui checkbox">
                <input type="checkbox" name="flight" value="skip">
                <label><?php echo $s['skipAheadOption']; ?></label>
            </div>
        </div>

        <button class="ui fluid right labeled icon red button" type="submit">
            <i class="right arrow icon"></i>
            <?php echo $s['fetchUpdates']; ?>
        </button>
    </form>
</div>

<div class="ui bottom attached warning message">
    <i class="warning icon"></i>
    <?php echo $s['fetchUpdatesInfo']; ?>
</div>

<script>
    $('.ui.checkbox').checkbox();
    $('select.dropdown').dropdown();
    $('.ui.basic.modal')
        .modal('setting', 'closable', false)
        .modal('show')
    ;

    function checkRing() {
        form = document.getElementById('optionsForm');

        if(form.ring.value == 'wif') {
            form.flight.disabled = false;
        } else {
            form.flight.disabled = true;
        }
    }

    checkRing();
</script>

<?php
styleLower();
?>
