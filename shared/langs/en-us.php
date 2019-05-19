<?php
/*
UUP dump translation file.

Translation information:
English language name: English (United States)
Localized language name: English (United States)
Language code: en-US
Author: whatever127
*/

//Language information
$s['code'] = 'en-US';
$s['timeZone'] = 'UTC'; //Supported timezones: https://www.php.net/manual/en/timezones.php

//shared strings
$s['uupdump'] = 'UUP dump';
$s['uupdumpSub'] = '%s - UUP dump'; //Browse known builds - UUP dump
$s['build'] = 'Build';
$s['arch'] = 'Architecture';
$s['ring'] = 'Ring';
$s['updateid'] = 'Update ID';
$s['update'] = 'Update';
$s['lang'] = 'Language';
$s['edition'] = 'Edition';
$s['seachForBuilds'] = 'Search for builds...';
$s['no'] = 'No';
$s['yes'] = 'Yes';
$s['yesRecommended'] = 'Yes (recommended)';
$s['next'] = 'Next';
$s['ok'] = 'OK';
$s['cancel'] = 'Cancel';
$s['information'] = 'Information';
$s['totalDlSize'] = 'Total download size';
$s['file'] = 'File';
$s['expires'] = 'Expires';
$s['sha1'] = 'SHA-1';
$s['size'] = 'Size';

//global
$s['home'] = 'Home';
$s['downloads'] = 'Downloads';
$s['lightMode'] = 'Light mode';
$s['darkMode'] = 'Dark mode';
$s['sourceCode'] = 'Source code';
$s['websiteDesc'] = 'Download UUP files from Windows Update servers with ease. This project is not affiliated with Microsoft Corporation.';
$s['notAffiliated'] = 'This project is not affiliated with Microsoft Corporation. Windows is a registered trademark of Microsoft Corporation.';
$s['copyright'] = '© %d %s and contributors.'; //© 2019 whatever127 and contributors.
$s['selectLanguage'] = 'Please select your language';

//index.php
$s['slogan'] = 'Download UUP files from Windows Update servers with ease.';
$s['advOptions'] = 'Advanced options';
$s['browseBuilds'] = 'Browse a full list of known builds';
$s['browseBuildsSub'] = 'Choose a build that is already known in the local database and download it.';
$s['fetchLatest'] = 'Fetch the latest build';
$s['fetchLatestSub'] = 'Retrieve the latest build information from Windows Update servers.';
$s['newlyAdded'] = 'Newly added builds';
$s['dateAdded'] = 'Date added';

//known.php
$s['browseKnown'] = 'Browse known builds';
$s['chooseBuild'] = 'Choose build';
$s['weFoundBuilds'] = 'We have found <b>%d</b> builds for your query.'; //We have found <b>692</b> builds for your query.

//latest.php
$s['latestFetchLatest'] = 'Fetch the latest build';
$s['latestTestingOnly'] = 'Testing purposes only';
$s['latestTestingOnlyWarn'] = '<b>This page is provided for testing purposes only.</b> Builds retrieved by this page that were not processed by the backend server will be provided using fallback packs, which may provide incomplete results. If you want to download an already known build, for the best experience please use the known builds page instead.';
$s['latestDoYouWantKnown'] = 'Would you like to continue by browsing the list of known builds?';
$s['chooseOptions'] = 'Choose options';
$s['buildOfPretendedClient'] = 'Build number of pretended Windows Update client';
$s['editionOfPretendedClient'] = 'Edition of pretended system';
$s['skipAheadLabel'] = 'Skip ahead flight';
$s['skipAheadOption'] = 'Use skip ahead flighting (Insider Fast only)';
$s['fetchUpdates'] = 'Fetch updates';
$s['fetchUpdatesInfo'] = 'Click <i>Fetch updates</i> button to send your request to the Windows Update servers.';

//fetchupd.php
$s['responseFromServer'] = 'Response from the server';
$s['foundUpdates'] = 'Found %d update(s)'; //Found 1 update(s)
$s['foundTheseUpdates'] = 'The following updates were found. Click on the name of desired update to continue.';
$s['buildNumber'] = 'Build number: %s'; //Build number: 18890.1000

//selectlang.php
$s['selectLangFor'] = 'Select language for %s'; //Select language for Windows 10 Insider Preview 18890.1000 (rs_prerelease) amd64
$s['chooseLang'] = 'Choose language';
$s['chooseLangDesc'] = 'Choose your desired language';
$s['allLangs'] = 'All languages';
$s['selLangFiles'] = 'Files';
$s['allFiles'] = 'All files';
$s['wubOnly'] = 'WindowsUpdateBox only';
$s['updateOnly'] = 'Update only';
$s['selectLangInfoText1'] = 'Click <i>Next</i> button to select edition you want to download.';
$s['selectLangInfoText2'] = 'WindowsUpdateBox.exe and Cumulative update can be found in <i>All languages</i> language.';
$s['allLangsWarn'] = '<i>All languages</i> option does not support edition selection.';
$s['clickNextToOpenFindFiles'] = 'Click <i>Next</i> button to open page which allows finding files.';

//selectedition.php
$s['selectEditionFor'] = 'Select edition for %s'; //Select edition for Windows 10 Insider Preview 18890.1000 (rs_prerelease) amd64, English (United States)
$s['chooseEdition'] = 'Choose edition';
$s['chooseEditionDesc'] = 'Choose your desired edition';
$s['allEditions'] = 'All editions';
$s['selectEditionInfoText'] = 'Click <i>Next</i> button to open summary page of your selection.';

//download.php
$s['summary'] = 'Summary';
$s['summaryDesc'] = 'Review your selection and choose download method';
$s['summaryFor'] = 'Summary for %s'; //Summary for Windows 10 Insider Preview 18890.1000 (rs_prerelease) amd64, English (United States), Windows 10 Pro
$s['summaryOfSelection'] = 'Summary of your selection';
$s['browseList'] = 'Browse a list of files';
$s['browseListDesc'] = 'Opens a page with list of files in UUP set for manual download.';
$s['aria2Opt1'] = 'Download using aria2';
$s['aria2Opt1Desc'] = 'Easily download the selected UUP set using aria2.';
$s['aria2Opt2'] = 'Download using aria2 and convert';
$s['aria2Opt2Desc'] = 'Easily download the selected UUP set using aria2 and convert it to ISO.';
$s['aria2Opt3'] = 'Download using aria2, convert and create additional editions';
$s['aria2Opt3Desc'] = 'Easily download the selected UUP set using aria2, convert, create additional editions and finally create an ISO image.';
$s['jsRequiredToConf'] = 'JavaScript is required to configure and use this option.';
$s['selAdditionalEditions'] = 'Select additional editions';
$s['noAdditionalEditions'] = 'No additional editions are available for this selection.';
$s['learnMore'] = 'Learn more';
$s['learnMoreAdditionalEditions1'] = 'This option enables automatic creation of selected additional editions.';
$s['learnMoreAdditionalEditions2'] = 'List of additional editions is determined by selected base editions. Below you can check a list of base editions which are needed to create desired additional editions:';
$s['learnMoreUpdates1'] = 'Updates will be integrated to the converted image only when the conversion script is run on the following systems:';
$s['learnMoreUpdates2'] = 'If you run the conversion script on any other system, then updates will not be integrated to the resulting image.';
$s['systemWithAdk'] = '%s with Windows 10 ADK installed'; //Windows 7 with Windows 10 ADK installed
$s['additionalUpdates'] = 'Additional updates';
$s['additionalUpdatesDesc'] = 'This UUP set contains additional updates which will be integrated during the conversion process significantly increasing the creation time.';
$s['browseUpdatesList'] = 'Browse the list of updates';

//get.php
$s['listOfFilesFor'] = 'List of files for %s'; //List of files for Windows 10 Insider Preview 18890.1000 (rs_prerelease) amd64
$s['totalSizeOfFiles'] = 'Total size of files: %s'; //Total size of files: 2.86 GiB
$s['fileRenamingScript'] = 'File renaming script';
$s['fileRenamingScriptDesc1'] = 'The script that can be found below can be used to quickly rename downloaded files.';
$s['fileRenamingScriptDesc2'] = 'Simply copy contents of the form below to new file with <code>cmd</code> extension, put it in folder with downloaded files and run.';
$s['sha1File'] = 'SHA-1 checksums file';
$s['sha1FileDesc'] = 'You can use this file to quickly verify that files were downloaded correctly.';
$s['aria2NoticeTitle'] = 'Download using aria2 options notice';
$s['aria2NoticeText1'] = 'Download using aria2 options create an archive which needs to be downloaded. The downloaded archive contains all needed files to achieve the selected task.';
$s['aria2NoticeText2'] = 'To start the download process use a script for your platform:';
$s['aria2NoticeText3'] = 'Aria2 is an open source project. You can find it here: %s.'; //Aria2 is an open source project. You can find it here: https://aria2.github.io/.
$s['aria2NoticeText4'] = 'UUP Conversion script (Windows version) has been created by %s.'; //UUP Conversion script (Windows version) has been created by abbodi1406.
$s['aria2NoticeText5'] = 'UUP Conversion script (Linux version) is open source. You can find it here: %s.'; //UUP Conversion script (Linux version) is open source. You can find it here: https://github.com/uup-dump/converter.

//findfiles.php
$s['findFilesIn'] = 'Find files in %s'; //Find files in Windows 10 Insider Preview 18890.1000 (rs_prerelease) amd64
$s['fileRenamingScriptDescFindFiles'] = 'If you want to quickly rename files downloaded from this page, you can generate a renaming script, which will automatically do this for you.';
$s['fileRenamingScriptGenW'] = 'Generate renaming script (Windows)';
$s['fileRenamingScriptGenL'] = 'Generate renaming script (Linux)';
$s['searchForFiles'] = 'Search for files...';
$s['weFoundFiles'] = 'We have found <b>%d</b> files for your query.'; //We have found <b>692</b> files for your query.

//Error pages
$s['error'] = 'Error';
$s['requestNotSuccessful'] = 'Request not successful';
$s['anErrorHasOccurred'] = 'An error has occurred while attempting to process your request.';
$s['generatedPackNotAvailable'] = 'Generated pack not available';
$s['generatedPackNotAvailableDesc'] = 'The update you are attempting to download does not have a generated pack that provides full information about available languages, editions and files. The fallback pack will be used that may not provide the correct information. If download fails because of this, please wait for the automatically generated pack to become available.';
$s['arm64Warning'] = 'You have selected an ARM64 build which is <b>only compatible with ARM64 based devices</b> and will not work with regular Intel or AMD based PCs. For <b>64-bit</b> PCs please use <b>amd64</b> builds. For <b>32-bit</b> PCs please use <b>x86</b> builds. If you are absolutely sure that the destination device is ARM64 based, you can safely ignore this message.';

//Error messages
$s['error_ERROR'] = 'Generic error.';
$s['error_UNSUPPORTED_API'] = 'Installed API version is not compatible with this version of UUP dump.';
$s['error_NO_FILEINFO_DIR'] = 'The <i>fileinfo</i> directory does not exist.';
$s['error_NO_BUILDS_IN_FILEINFO'] = 'The <i>fileinfo</i> database does not contain any build.';
$s['error_SEARCH_NO_RESULTS'] = 'No items could be found for specified query.';
$s['error_UNKNOWN_ARCH'] = 'Unknown processor architecture.';
$s['error_UNKNOWN_RING'] = 'Unknown ring.';
$s['error_UNKNOWN_FLIGHT'] = 'Unknown flight.';
$s['error_UNKNOWN_COMBINATION'] = 'The flight and ring combination is not correct. Skip ahead is only supported for Insider Fast ring.';
$s['error_ILLEGAL_BUILD'] = 'Specified build number is less than %d or larger than %d.'; //Specified build number is less than 9841 or larger than 2147483646.
$s['error_ILLEGAL_MINOR'] = 'Specified build minor is incorrect.';
$s['error_NO_UPDATE_FOUND'] = 'Server did not return any updates.';
$s['error_XML_PARSE_ERROR'] = 'Parsing of response XML has failed. This may indicate a temporary problem with Microsoft servers. Try again later.';
$s['error_EMPTY_FILELIST'] = 'Server has returned an empty list of files.';
$s['error_NO_FILES'] = 'There are no files available for your selection.';
$s['error_NOT_FOUND'] = 'Specified selection cannot be found.';
$s['error_MISSING_FILES'] = 'The selected UUP set has some files missing.';
$s['error_NO_METADATA_ESD'] = 'There are no metadata ESD files available for your selection.';
$s['error_UNSUPPORTED_LANG'] = 'Specified language is not supported.';
$s['error_UNSPECIFIED_LANG'] = 'Language was not specified.';
$s['error_UNSUPPORTED_EDITION'] = 'Specified edition is not supported.';
$s['error_UNSUPPORTED_COMBINATION'] = 'The language and edition combination is not correct.';
$s['error_NOT_CUMULATIVE_UPDATE'] = 'Selected update does not contain Cumulative Update.';
$s['error_UPDATE_INFORMATION_NOT_EXISTS'] = 'Information about specified update doest not exist in database.';
$s['error_KEY_NOT_EXISTS'] = 'Specified key does not exist in update information.';
$s['error_UNSPECIFIED_UPDATE'] = 'Update ID was not specified.';
$s['error_INCORRECT_ID'] = 'Specified Update ID is not correct. Please make sure that specified Update ID is correct.';
$s['error_RATE_LIMITED'] = 'You are being rate limited. Please try again in a few seconds.';
$s['error_UNSPECIFIED_VE'] = 'You have not selected any additional edition. If do not wish to create additional editions, please use <i>Download using aria2 and convert</i> option.';
$s['errorNoMessage'] = 'Error message is not available.';

//Languages
$s['lang_ar-sa'] = 'Arabic (Saudi Arabia)';
$s['lang_bg-bg'] = 'Bulgarian';
$s['lang_cs-cz'] = 'Czech';
$s['lang_da-dk'] = 'Danish';
$s['lang_de-de'] = 'German';
$s['lang_el-gr'] = 'Greek';
$s['lang_en-gb'] = 'English (United Kingdom)';
$s['lang_en-us'] = 'English (United States)';
$s['lang_es-es'] = 'Spanish (Spain)';
$s['lang_es-mx'] = 'Spanish (Mexico)';
$s['lang_et-ee'] = 'Estonian';
$s['lang_fi-fi'] = 'Finnish';
$s['lang_fr-ca'] = 'French (Canada)';
$s['lang_fr-fr'] = 'French (France)';
$s['lang_he-il'] = 'Hebrew';
$s['lang_hr-hr'] = 'Croatian';
$s['lang_hu-hu'] = 'Hungarian';
$s['lang_it-it'] = 'Italian';
$s['lang_ja-jp'] = 'Japanese';
$s['lang_ko-kr'] = 'Korean';
$s['lang_lt-lt'] = 'Lithuanian';
$s['lang_lv-lv'] = 'Latvian';
$s['lang_nb-no'] = 'Norwegian (Bokmal)';
$s['lang_nl-nl'] = 'Dutch';
$s['lang_pl-pl'] = 'Polish';
$s['lang_pt-br'] = 'Portuguese (Brazil)';
$s['lang_pt-pt'] = 'Portuguese (Portugal)';
$s['lang_qps-ploc'] = 'Pseudo';
$s['lang_ro-ro'] = 'Romanian';
$s['lang_ru-ru'] = 'Russian';
$s['lang_sk-sk'] = 'Slovak';
$s['lang_sl-si'] = 'Slovenian';
$s['lang_sr-latn-rs'] = 'Serbian (Latin)';
$s['lang_sv-se'] = 'Swedish';
$s['lang_th-th'] = 'Thai';
$s['lang_tr-tr'] = 'Turkish';
$s['lang_uk-ua'] = 'Ukrainian';
$s['lang_zh-cn'] = 'Chinese (Simplified)';
$s['lang_zh-hk'] = 'Chinese (Hong Kong)';
$s['lang_zh-tw'] = 'Chinese (Traditional)';
