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

$updateId = isset($_POST['id']) ? $_POST['id'] : null;
$usePack = isset($_POST['pack']) ? $_POST['pack'] : 0;
$desiredEdition = isset($_POST['edition']) ? $_POST['edition'] : 0;

if($desiredEdition == null || !is_array($desiredEdition)) {
   fancyError('UNSUPPORTED_COMBINATION');
   die();
}

$desiredEdition = strtolower(implode(';', $desiredEdition));
$url = "download.php?id=$updateId&pack=$usePack&edition=$desiredEdition";

header("Location: $url");
echo "<h1>Moved to <a href=\"$url\">here</a>.";
