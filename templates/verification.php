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
        <i class="fitted question circle icon"></i>&nbsp;
        <?= $s['verification'] ?>
    </div>
</h3>

<h4><?php printf($s['clickNumberedButton'], $num); ?></h4>

<div class="ui top attached buttons">
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 1 ?>">01</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 2 ?>">02</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 3 ?>">03</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 4 ?>">04</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 5 ?>">05</a>
</div>
<div class="ui attached buttons">
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 6 ?>">06</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 7 ?>">07</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 8 ?>">08</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 9 ?>">09</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 10 ?>">10</a>
</div>
<div class="ui attached buttons">
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 11 ?>">11</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 12 ?>">12</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 13 ?>">13</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 14 ?>">14</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 15 ?>">15</a>
</div>
<div class="ui attached buttons">
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 16 ?>">16</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 17 ?>">17</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 18 ?>">18</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 19 ?>">19</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 20 ?>">20</a>
</div>
<div class="ui bottom attached buttons">
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 21 ?>">21</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 22 ?>">22</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 23 ?>">23</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 24 ?>">24</a>
    <a class="ui button" href="<?= $url ?>verify=<?= $add + 25 ?>">25</a>
</div>
