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

$arch = isset($_GET['arch']) ? $_GET['arch'] : 'amd64';
$ring = isset($_GET['ring']) ? $_GET['ring'] : 'WIF';
$flight = isset($_GET['flight']) ? $_GET['flight'] : 'Active';
$build = isset($_GET['build']) ? $_GET['build'] : 16251;
$minor = isset($_GET['minor']) ? $_GET['minor'] : 0;
$sku = isset($_GET['sku']) ? $_GET['sku'] : 48;
$type = isset($_GET['type']) ? $_GET['type'] : 'Production';

require_once 'api/fetchupd.php';
require_once 'shared/style.php';
require_once 'shared/ratelimits.php';

$resource = hash('sha1', strtolower("fetch-$arch-$ring-$flight-$build-$minor-$sku-$type"));
if(checkIfUserIsRateLimited($resource)) {
    fancyError('RATE_LIMITED', 'downloads');
    die();
}

$fetchUpd = uupFetchUpd($arch, $ring, $flight, $build, $minor, $sku, $type, 1);
if(isset($fetchUpd['error'])) {
    fancyError($fetchUpd['error'], 'downloads');
    die();
}

$updateArray = $fetchUpd['updateArray'];
styleUpper('downloads', $s['responseFromServer']);
?>

<h3 class="ui centered header">
    <div class="content">
        <i class="fitted wizard icon"></i>&nbsp;
        <?php echo $s['responseFromServer']; ?>
    </div>
</h3>

<div class="ui icon info message">
    <i class="check info circle icon"></i>
    <div class="content">
        <div class="header">
            <?php printf($s['foundUpdates'], count($updateArray)); ?>
        </div>
        <p><?php echo $s['foundTheseUpdates']; ?></p>
    </div>
</div>
<table class="ui celled striped table">
    <thead>
        <tr>
            <th><?php echo $s['update']; ?></th>
            <th><?php echo $s['arch']; ?></th>
            <th><?php echo $s['updateid']; ?></th>
        </tr>
    </thead>
<?php
foreach($updateArray as $update) {
    echo '<tr><td>';
    echo '<a href="./selectlang.php?id='.$update['updateId'].'"><big><b>';
    echo $update['updateTitle'];
    echo "</b></big></a>";
    echo '<p><i>';
    printf($s['buildNumber'], $update['foundBuild']);
    echo '</i></p>';
    echo '</td><td>';
    echo $update['arch'];
    echo '</td><td>';
    echo '<code>'.$update['updateId'].'</code>';
    echo "</td></tr>\n";
}
?>
</table>

<?php
styleLower();
?>
