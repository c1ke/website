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

$buildsAvailable = 1;
$ids = uupListIds(null, 1);

if(isset($ids['error'])) {
    $buildsAvailable = 0;
}

$ids = $ids['builds'];

if(empty($ids)) {
    $buildsAvailable = 0;
}

styleUpper('home');
?>

<div class="welcome-text">
    <p class="header"><?php echo $s['uupdump']; ?></p>
    <p class="sub"><i><?php echo $s['slogan']; ?></i></p>
</div>

<form class="ui form" action="./known.php" method="get">
    <div class="field">
        <div class="ui big action input">
            <input type="text" name="q" placeholder="<?php echo $s['seachForBuilds']; ?>">
            <button class="ui big blue icon button" type="submit"><i class="search icon"></i></button>
        </div>
        </div>
</form>

<h3 class="ui centered header">
    <div class="content">
        <i class="fitted user md icon"></i>&nbsp;
        <?php echo $s['advOptions']; ?>
    </div>
</h3>

<div class="ui two columns stackable centered grid">
    <div class="column">
        <a class="ui top attached fluid labeled icon large blue button" href="./known.php">
            <i class="server icon"></i>
            <?php echo $s['browseBuilds']; ?>
        </a>
        <div class="ui bottom attached segment">
            <?php echo $s['browseBuildsSub']; ?>
        </div>
    </div>

    <div class="column">
        <a class="ui top attached fluid labeled icon large button" href="./latest.php">
            <i class="fire icon"></i>
            <?php echo $s['fetchLatest']; ?>
        </a>
        <div class="ui bottom attached segment">
            <?php echo $s['fetchLatestSub']; ?>
        </div>
    </div>
</div>
<?php
if($buildsAvailable) {
    echo <<<EOD
<h3 class="ui centered header">
    <div class="content">
        <i class="fitted star outline icon"></i>&nbsp;
        ${s['newlyAdded']}
    </div>
</h3>

<table class="ui celled striped table">
    <thead>
        <tr>
            <th>${s['build']}</th>
            <th>${s['arch']}</th>
            <th>${s['dateAdded']}</th>
        </tr>
    </thead>
EOD;

    $i = 0;
    foreach($ids as $val) {
        $i++;
        if($i > 15) break;

        $arch = $val['arch'];
        if($arch == 'amd64') $arch = 'x64';

        echo '<tr><td>';
        echo '<i class="windows icon"></i>';
        echo '<a href="./selectlang.php?id='.htmlentities($val['uuid']).'">'
             .htmlentities($val['title']).' '.htmlentities($val['arch'])."</a>";
        echo '</td><td>';
        echo htmlentities($arch);
        echo '</td><td>';

        if($val['created'] == null) {
            echo 'Unknown';
        } else {
            echo date("Y-m-d H:i:s T", $val['created']);
        }

        echo "</td></tr>\n";
    }
    echo '</table>';
}

styleLower();
?>
