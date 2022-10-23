<?php 
/*
Copyright 2022 UUP dump authors

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
if(!isset($templateOk)) die();
?>
<h3 class="ui centered header">
    <div class="content">
        <i class="fitted list icon"></i>&nbsp;
        <?= htmlentities($updateName.' '.$updateArch) ?>
    </div>
</h3>

<div class="ui top attached segment">
    <form class="ui form" action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
        <div class="field">
            <div class="ui big action input">
                <input type="hidden" name="id" value="<?= htmlentities($updateId) ?>">
                <input type="text" name="q" value="<?= $htmlQuery ?>" placeholder="<?= $s['searchForFiles'] ?>">
                <button class="ui big blue icon button" type="submit"><i class="search icon"></i></button>
            </div>
        </div>
    </form>
</div>
<div class="ui bottom attached success message">
    <i class="search icon"></i>
    <?php printf($s['weFoundFiles'], $count); ?>
</div>

<table class="ui fixed celled striped tablet stackable table">
    <thead>
        <tr>
            <th class="eight wide"><?= $s['file'] ?></th>
            <th class="six wide"><?= $s['sha1'] ?></th>
            <th class="two wide"><?= $s['size'] ?></th>
        </tr>
    </thead>
    <?php $totalSize = 0; foreach($filesKeys as $val): ?>
        <?php $size = $files[$val]['size']; ?>
        <?php $totalSize = $totalSize + $size; ?>
        <?php $size = readableSize($size, 2); ?>

        <tr><td>
            <a href="<?= $urlBase ?>&file=<?= $val ?>">
                <?= $val ?>
            </a>
        </td><td>
            <code><?= $files[$val]['sha1'] ?></code>
        </td><td>
            <?= $size ?>
        </td></tr>
    <?php endforeach; ?>

    <?php $totalSize = readableSize($totalSize, 2); ?>
    <?php $filesRows = (count($filesKeys)+3 > 30) ? 30 : count($filesKeys)+3 ?>
</table>

<div class="ui info message">
    <i class="info icon"></i>
    <?php printf($s['sizeOfShownFiles'], $totalSize); ?>
</div>

<div class="ui divider"></div>

<div class="ui icon message">
    <i class="terminal icon"></i>
    <div class="content">
        <div class="header"><?= $s['fileRenamingScript'] ?></div>
        <p><?= $s['fileRenamingScriptDescFindFiles'] ?></p>

        <div class="ui two columns stackable grid">
            <div class="column">
                <a class="ui fluid labeled icon button"
                href="get.php?id=<?= $updateId ?>&renscript=1">
                    <i class="windows icon"></i>
                    <?= $s['fileRenamingScriptGenW'] ?>
                </a>
            </div>

            <div class="column">
                <a class="ui fluid labeled icon button"
                href="get.php?id=<?= $updateId ?>&renscript=2">
                    <i class="linux icon"></i>
                    <?= $s['fileRenamingScriptGenL'] ?>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="ui divider"></div>

<div class="ui icon message">
    <i class="check circle outline icon"></i>
    <div class="content">
        <div class="header"><?= $s['sha1File'] ?></div>
        <p><?= $s['sha1FileDesc'] ?></p>
    </div>
</div>

<div class="ui form">
    <div class="field">
        <textarea readonly rows="<?= $filesRows ?>" style="font-family: monospace;"><?= $sha1TextArea ?></textarea>
    </div>
</div>
