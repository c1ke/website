<?php
/*
Copyright 2020 whatever127

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

require_once 'shared/style.php';
styleUpper('faq', $s['faqLong']);
?>

<h3 class="ui centered header">
    <div class="content">
        <i class="fitted question circle icon"></i>&nbsp;
        <?php echo $s['faqLong']; ?>
    </div>
</h3>

<div class="ui styled fluid accordion">
    <div class="title">
        <i class="dropdown icon"></i>
        <?php echo $s['q1']; ?>
    </div>
    <div class="content">
        <p><?php echo $s['a1']; ?></p>
    </div>

    <div class="title">
        <i class="dropdown icon"></i>
        <?php echo $s['q2']; ?>
    </div>
    <div class="content">
        <p><?php echo $s['a2']; ?></p>
    </div>

    <div class="title">
        <i class="dropdown icon"></i>
        <?php echo $s['q3']; ?>
    </div>
    <div class="content">
        <p><?php echo $s['a3']; ?></p>
    </div>

    <div class="title">
        <i class="dropdown icon"></i>
        <?php echo $s['q4']; ?>
    </div>
    <div class="content">
        <p><?php echo $s['a4']; ?></p>
    </div>
   
   <div class="title">
        <i class="dropdown icon"></i>
        <?php echo $s['q5']; ?>
    </div>
    <div class="content">
        <p><?php echo $s['a5']; ?></p>
    </div>

    <div class="title">
        <i class="dropdown icon"></i>
        <?php echo $s['qUnknown']; ?>
    </div>
    <div class="content">
        <p><?php echo $s['aUnknown']; ?></p>
    </div>
</div>

<script>$('.ui.accordion').accordion();</script>

<?php
styleLower();
?>
