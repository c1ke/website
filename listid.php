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

header('Content-Type: text/plain');

require_once 'shared/utils.php';
require_once 'api/listid.php';

$baseUrl = getBaseUrl();
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$bannedAgents = array(
    'UUP dump downloader/1.2.4+ci.31',
    'UUP dump downloader/1.3.0-alpha.3+ci.50',
    'UUP dump downloader/1.3.0-alpha.4+ci.52',
);

if(!in_array($userAgent, $bannedAgents)) {
    echo "0||00000000-0000-0000-0000-000000000000|Deprecated endpoint. Please use $baseUrl";
    die();
}

$ids = uupListIds();
if(isset($ids['error'])) {
    die($ids['error']);
}

foreach($ids['builds'] as $val) {
    echo $val['build'];
    echo '|';
    echo $val['arch'];
    echo '|';
    echo $val['uuid'];
    echo '|';
    echo $val['title'];
    echo "\n";
}
