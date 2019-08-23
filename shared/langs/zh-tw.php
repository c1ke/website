<?php
/*
UUP dump translation file for Chinese (Traditional).
 - UUP dump 正體中文翻譯檔

Translation information:
English language name: Chinese (Traditional)
Localized language name: 中文（正體）
Language code: zh-TW
Authors: pan93412
*/

//Language information
$s['code'] = 'zh-TW';
$s['timeZone'] = 'Asia/Taipei'; //Supported timezones: https://www.php.net/manual/en/timezones.php

//shared strings
$s['uupdump'] = 'UUP dump';
$s['uupdumpSub'] = '%s - UUP dump'; //Browse known builds - UUP dump
$s['build'] = '組建';
$s['arch'] = '架構';
$s['ring'] = '振鈴 (Ring)'; // TRANSLATOR: 我使用 Windows 中國的翻譯代替。若台灣區有對應翻譯，也請幫忙補上，謝謝！:)
$s['updateid'] = '更新 ID';
$s['update'] = '更新';
$s['lang'] = '語言';
$s['edition'] = '版本';
$s['seachForBuilds'] = '搜尋組建...';
$s['no'] = '否';
$s['yes'] = '是';
$s['yesRecommended'] = '確定 (建議)';
$s['next'] = '下一步';
$s['ok'] = '確定';
$s['cancel'] = '取消';
$s['information'] = '資訊';
$s['totalDlSize'] = '總計下載大小';
$s['file'] = '檔案';
$s['expires'] = '過期時間';
$s['sha1'] = 'SHA-1';
$s['size'] = '大小';
$s['additionalEdition'] = '額外版本';
$s['requiredEdition'] = '必須版本';
$s['unknown'] = '未知';

//global
$s['home'] = '首頁';
$s['downloads'] = '下載';
$s['lightMode'] = '亮色模式';
$s['darkMode'] = '暗色模式';
$s['sourceCode'] = '原始程式碼';
$s['menu'] = '選單';
$s['websiteDesc'] = '輕鬆地從 Windows Update 伺服器下載 UUP 檔案。這個專案與 Microsoft Corporation 無關。';
$s['notAffiliated'] = '這個專案與 Microsoft Corporation 無關。Windows 是 Microsoft Corporation 的註冊商標。';
$s['copyright'] = '© %d %s 和貢獻者們。'; //© 2019 whatever127 and contributors.
$s['selectLanguage'] = '請選擇語言';

//index.php
$s['slogan'] = '輕鬆地從 Windows Update 伺服器下載 UUP 檔案。';
$s['advOptions'] = '進階選項';
$s['browseBuilds'] = '瀏覽已知組建列表';
$s['browseBuildsSub'] = '選擇已存在於本機資料庫的組建並下載。';
$s['fetchLatest'] = '取得最新組建';
$s['fetchLatestSub'] = '從 Windows Update 伺服器取得最新的組建資訊。';
$s['newlyAdded'] = '新增加的組建';
$s['dateAdded'] = '加入日期';

//known.php
$s['browseKnown'] = '瀏覽已知組建';
$s['chooseBuild'] = '選擇組建';
$s['weFoundBuilds'] = '我們已依您的搜尋內容找到 <b>%d</b> 個組建。'; //We have found <b>692</b> builds for your query.

//latest.php
$s['latestFetchLatest'] = '取得最新組建';
$s['latestTestingOnly'] = '僅供測試用途';
$s['latestTestingOnlyWarn'] = '<b>這個頁面僅供測試用途。</b> 從這個頁面取得之後端伺服器未處理的組建版本 server will be provided using fallback packs, which may provide incomplete results. If you want to download an already known build, please use the known builds page instead.';
$s['latestDoYouWantKnown'] = '請問你是否要瀏覽已知組件列表？';
$s['chooseOptions'] = '選擇選項';
$s['buildOfPretendedClient'] = 'mock Windows Update 客戶端的組建號碼';
$s['editionOfPretendedClient'] = 'mock 系統版本';
$s['skipAheadLabel'] = 'Skip ahead flight';
$s['skipAheadOption'] = '使用 Skip ahead flight (僅 Insider Fast 可用)';
$s['fetchUpdates'] = '取得更新';
$s['fetchUpdatesInfo'] = '按下 [取得更新] 按鈕以傳送請求至 Windows Update 伺服器。';

//fetchupd.php
$s['responseFromServer'] = '伺服器回應';
$s['foundUpdates'] = '找到 %d 個更新'; //Found 1 update(s)
$s['foundTheseUpdates'] = '找到以下更新。請按下你想要的更新後繼續。';
$s['buildNumber'] = '組建版本: %s'; //Build number: 18890.1000

//selectlang.php
$s['selectLangFor'] = '選擇 %s 的語言'; //Select language for Windows 10 Insider Preview 18890.1000 (rs_prerelease) amd64
$s['chooseLang'] = '選擇語言';
$s['chooseLangDesc'] = '請選擇你想要的語言';
$s['allLangs'] = '所有語言';
$s['selLangFiles'] = '檔案';
$s['allFiles'] = '所有檔案';
$s['wubOnly'] = '僅 WindowsUpdateBox';
$s['updateOnly'] = '僅更新';
$s['selectLangInfoText1'] = '按一下 [下一步] 按鈕以選擇您想下載的版本。';
$s['selectLangInfoText2'] = 'WindowsUpdateBox.exe 及累積更新可在 [所有語言] 語言找到。';
$s['allLangsWarn'] = '[所有語言] 選項不支援版本選取。';
$s['clickNextToOpenFindFiles'] = '按下 [下一步] 按鈕開啟用來搜尋檔案的頁面。';
$s['noLangsAvailable'] = '這個組建沒有可供使用的語言。';
$s['browseFiles'] = '瀏覽檔案';
$s['browseFilesDesc'] = '快速瀏覽選取組建版本的檔案';
$s['searchFiles'] = '搜尋檔案';
$s['toSearchForCUUseQuery'] = '請搜尋 [%s] 以尋找累積更新。'; //To search for Cumulative Updates use the <i>Windows10 KB</i> search query.

//selectedition.php
$s['selectEditionFor'] = '選取 %s 的版本'; //Select edition for Windows 10 Insider Preview 18890.1000 (rs_prerelease) amd64, English (United States)
$s['chooseEdition'] = '選取版本';
$s['chooseEditionDesc'] = '選取您想要的版本';
$s['allEditions'] = '所有版本';
$s['selectEditionInfoText'] = '按下 [下一步] 按鈕開啟選擇項目的摘要頁面。';
// TRANTAG: [Fuzzy]
$s['additionalEditionsInfo'] = '如果你需要可以在右方表格找到的額外版本，請先選擇指示的所需版本後按下 [下一步]。你將可以在摘要頁面的合適下載選項下方選擇所想要的額外版本。';

//download.php
$s['summary'] = '摘要';
$s['summaryDesc'] = '再次確認您的選擇，並選擇下載方式';
$s['summaryFor'] = '%s 的摘要'; //Summary for Windows 10 Insider Preview 18890.1000 (rs_prerelease) amd64, English (United States), Windows 10 Pro
$s['summaryOfSelection'] = '選擇項目的摘要';
$s['browseList'] = '瀏覽檔案列表';
// TRANTAG: [Fuzzy]
$s['browseListDesc'] = '開啟要手動下載之包含在 UUP 集合中檔案的列表。';
$s['aria2Opt1'] = '使用 aria2 下載';
$s['aria2Opt1Desc'] = '使用 aria2 簡單地下載選取的 UUP 集合。';
$s['aria2Opt2'] = '使用 aria2 下載並轉換';
$s['aria2Opt2Desc'] = '使用 aria2 簡單地下載選取的 UUP 集合並轉換成 ISO。';
$s['aria2Opt3'] = '使用 aria2 下載、轉換並建立額外版本';
$s['aria2Opt3Desc'] = '使用 aria2 簡單地下載選取的 UUP 集合，再轉換及建立額外版本，最後建立 ISO 映像。';
$s['jsRequiredToConf'] = '設定及使用此選項需要 JavaScript。';
$s['selAdditionalEditions'] = '選擇額外版本';
$s['noAdditionalEditions'] = '此選取項目沒有可供使用的額外版本。';
$s['learnMore'] = '了解更多';
$s['learnMoreAdditionalEditions1'] = '這個選項會啟用自動建立選擇的額外版本。';
$s['learnMoreAdditionalEditions2'] = '這個額外版本列表基於選取的基礎版本。你能在底下查看要建立所需額外版本所需要的版本：';
$s['learnMoreUpdates1'] = '當轉換指令碼在以下系統執行時，更新將只會整合至轉換映像：';
$s['learnMoreUpdates2'] = '如果在其他系統執行轉換指令碼，更新將不會整合至結果映像。';
$s['systemWithAdk'] = '%s，且安裝了 Windows 10 ADK'; //Windows 7 with Windows 10 ADK installed
$s['additionalUpdates'] = '額外更新';
$s['additionalUpdatesDesc'] = '這個 UUP 集合包含了會在轉換程序整合進去的額外更新，將會顯著增加建立時間。';
$s['browseUpdatesList'] = '瀏覽更新列表';

//get.php
$s['listOfFilesFor'] = '列出 %s 的檔案'; //List of files for Windows 10 Insider Preview 18890.1000 (rs_prerelease) amd64
$s['totalSizeOfFiles'] = '檔案總計大小: %s'; //Total size of files: 2.86 GiB
$s['fileRenamingScript'] = '檔案重新命名指令碼';
$s['fileRenamingScriptDesc1'] = '下方所找到的指令碼可用來快速地重新命名下載檔案。';
$s['fileRenamingScriptDesc2'] = '簡單地將下方表單的內容複製成一個新檔案，副檔名為 <code>cmd</code>，接著把檔案放在下載檔案的資料夾內，之後執行。';
$s['sha1File'] = 'SHA-1 檔案總和檢查';
$s['sha1FileDesc'] = '你可以使用這個檔案簡單地驗證下載的檔案是否正確。';
$s['aria2NoticeTitle'] = 'Download using aria2 options notice';
$s['aria2NoticeText1'] = 'Download using aria2 options create an archive which needs to be downloaded. The downloaded archive contains all needed files to achieve the selected task.';
$s['aria2NoticeText2'] = '請使用適用於您的平台的指令碼來開始下載程序:';
$s['aria2NoticeText3'] = 'Aria2 是個開放原始碼的專案。你可以在這裡找到: %s.'; //Aria2 is an open source project. You can find it here: https://aria2.github.io/.
$s['aria2NoticeText4'] = 'UUP 轉換指令碼 (Windows 版本) 是由 %s 製作的。'; //UUP Conversion script (Windows version) has been created by abbodi1406.
$s['aria2NoticeText5'] = 'UUP 轉換指令碼 (Linux 版本) 是開放原始碼的。你可以在這裡找到: %s。'; //UUP Conversion script (Linux version) is open source. You can find it here: https://github.com/uup-dump/converter.

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
$s['generatedPackNotAvailableDesc'] = 'The update you are attempting to download does not have a generated pack that provides full information about available languages, editions and files. The fallback pack will be used, and it may not provide the correct information. If the download fails because of this, please wait for the automatically generated pack to become available.';
$s['arm64Warning'] = 'You have selected an ARM64 build which is <b>only compatible with ARM64 based devices</b> and will not work with regular Intel or AMD based PCs. For <b>64-bit</b> PCs please use <b>amd64</b> builds. For <b>32-bit</b> PCs please use <b>x86</b> builds. If you are absolutely sure that the destination device is ARM64 based, you can safely ignore this message.';

//Error messages
$s['error_ERROR'] = 'Generic error.';
$s['error_UNSUPPORTED_API'] = 'Installed API version is not compatible with this version of UUP dump.';
$s['error_NO_FILEINFO_DIR'] = 'The <i>fileinfo</i> directory does not exist.';
$s['error_NO_BUILDS_IN_FILEINFO'] = 'The <i>fileinfo</i> database does not contain any build.';
$s['error_SEARCH_NO_RESULTS'] = 'No items found for the performed query.';
$s['error_UNKNOWN_ARCH'] = 'Unknown processor architecture.';
$s['error_UNKNOWN_RING'] = 'Unknown ring.';
$s['error_UNKNOWN_FLIGHT'] = 'Unknown flight.';
$s['error_UNKNOWN_COMBINATION'] = 'The flight and ring combination is not correct. Skip ahead is only supported for Insider Fast ring.';
$s['error_ILLEGAL_BUILD'] = 'Specified build number is less than %d or larger than %d.'; //Specified build number is less than 9841 or larger than 2147483646.
$s['error_ILLEGAL_MINOR'] = 'Specified build minor is incorrect.';
$s['error_NO_UPDATE_FOUND'] = 'The server returned no updates.';
$s['error_XML_PARSE_ERROR'] = 'Response XML parsing failed. There may be a problem with Microsoft servers. Try again later.';
$s['error_EMPTY_FILELIST'] = 'The server has returned an empty file list.';
$s['error_NO_FILES'] = 'There are no files available for your selection.';
$s['error_NOT_FOUND'] = 'Specified selection cannot be found.';
$s['error_MISSING_FILES'] = 'The selected UUP set has missing files.';
$s['error_NO_METADATA_ESD'] = 'There are no metadata ESD files available for your selection.';
$s['error_UNSUPPORTED_LANG'] = 'Specified language is not supported.';
$s['error_UNSPECIFIED_LANG'] = 'Language was not specified.';
$s['error_UNSUPPORTED_EDITION'] = 'Specified edition is not supported.';
$s['error_UNSUPPORTED_COMBINATION'] = 'The language and edition combination is not correct.';
$s['error_NOT_CUMULATIVE_UPDATE'] = 'Selected update does not contain a Cumulative Update.';
$s['error_UPDATE_INFORMATION_NOT_EXISTS'] = 'Information about the specified update doesn\'t exist in the database.';
$s['error_KEY_NOT_EXISTS'] = 'Specified key does not exist in update information.';
$s['error_UNSPECIFIED_UPDATE'] = 'Update ID was not specified.';
$s['error_INCORRECT_ID'] = 'Specified Update ID is incorrect. Please make sure that the specified Update ID is correct.';
$s['error_RATE_LIMITED'] = 'You are being rate limited. Please try again in a few seconds.';
$s['error_UNSPECIFIED_VE'] = 'You have not selected any additional editions. If do not wish to create additional editions, please use the <i>Download using aria2 and convert</i> option.';
$s['errorNoMessage'] = 'Error message unavailable.';

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
