<?php
/*
UUP dump translation file.

Translation information:
English language name: Korean
Localized language name: 한국어
Language code: ko-KR
Authors: qta3426
*/

//Language information
$s['code'] = 'ko-KR';
$s['timeZone'] = 'Asia/Seoul'; //시간대 지원: https://www.php.net/manual/en/timezones.php

//shared strings
$s['uupdump'] = 'UUP dump';
$s['uupdumpSub'] = '%s - UUP dump'; //Browse known builds - UUP dump
$s['build'] = '빌드';
$s['arch'] = '아키텍쳐';
$s['ring'] = '링';
$s['updateid'] = '업데이트 ID';
$s['update'] = '업데이트';
$s['lang'] = '언어';
$s['edition'] = '에디션';
$s['seachForBuilds'] = '빌드 검색...';
$s['no'] = '아니오';
$s['yes'] = '예';
$s['yesRecommended'] = '예 (추천)';
$s['next'] = '다음';
$s['ok'] = '확인';
$s['cancel'] = '취소';
$s['information'] = '정보';
$s['totalDlSize'] = '전체 다운로드 크기';
$s['file'] = '파일';
$s['expires'] = '만료';
$s['sha1'] = 'SHA-1';
$s['size'] = '크기';
$s['additionalEdition'] = '추가 에디션';
$s['requiredEdition'] = '필수 에디션';
$s['unknown'] = '알 수 없음';

//global
$s['home'] = '홈';
$s['downloads'] = '다운로드';
$s['lightMode'] = '라이트 모드';
$s['darkMode'] = '다크 모드';
$s['sourceCode'] = '소스 코드';
$s['menu'] = '메뉴';
$s['websiteDesc'] = 'Windows Update 서버에서 UUP 파일을 쉽게 다운로드 할 수 있습니다. 이 프로젝트는 Microsoft Corporation과 관련이 없습니다.';
$s['notAffiliated'] = '이 프로젝트는 Microsoft Corporation과 관련이 없습니다. Windows는 Microsoft Corporation의 등록 상표 입니다.';
$s['copyright'] = '© %d %s와 기여자.'; //© 2019 whatever127 and contributors.
$s['selectLanguage'] = '언어를 선택 해 주십시오';

//index.php
$s['slogan'] = 'Windows Update 서버에서 UUP 파일을 쉽게 다운로드 할 수 있습니다.';
$s['advOptions'] = '고급 옵션';
$s['browseBuilds'] = '알려진 빌드 목록 찾아보기';
$s['browseBuildsSub'] = '로컬 데이터베이스에 이미 알려진 빌드를 선택하고 다운로드 하십시오.';
$s['fetchLatest'] = '최신 빌드 가져오기';
$s['fetchLatestSub'] = 'Windows Update 서버에서 최신 빌드 정보를 검색 하십시오.';
$s['newlyAdded'] = '새로 추가 된 빌드';
$s['dateAdded'] = '추가 된 날짜';

//known.php
$s['browseKnown'] = '알려진 빌드 찾아보기';
$s['chooseBuild'] = '빌드 선택';
$s['weFoundBuilds'] = '<b>%d</b>개의 빌드가 발견 되었습니다.'; //We have found <b>692</b> builds for your query.

//latest.php
$s['latestFetchLatest'] = '최신 빌드 가져오기';
$s['latestTestingOnly'] = '테스트 목적으로만 사용';
$s['latestTestingOnlyWarn'] = '<b>이 페이지는 테스트 목적으로만 제공됩니다.</b> 백엔드 서버에서 처리하지 않은 이 페이지에서 검색한 빌드는 대체 패키지를 사용하여 제공되며, 이는 불완전한 결과를 제공할 수 있습니다. 이미 알려진 빌드를 다운로드 하려면 알려진 빌드 페이지를 사용하십시오.';
$s['latestDoYouWantKnown'] = '알려진 빌드 목록을 탐색하여 계속 하시겠습니까?';
$s['chooseOptions'] = '옵션 선택';
$s['buildOfPretendedClient'] = '모의 Windows Update 클라이언트 빌드 번호';
$s['editionOfPretendedClient'] = '모의 시스템 버전';
$s['skipAheadLabel'] = 'Skip Ahead';
$s['skipAheadOption'] = 'Skip Ahead 사용 (Insider Fast만)';
$s['fetchUpdates'] = '업데이트 가져오기';
$s['fetchUpdatesInfo'] = '<i>업데이트 가져오기</i> 버튼을 클릭하여 Windows Update 서버에 요청을 보냅니다.';

//fetchupd.php
$s['responseFromServer'] = '서버로부터의 응답';
$s['foundUpdates'] = '발견된 %d개의 업데이트'; //Found 1 update(s)
$s['foundTheseUpdates'] = '다음 업데이트가 발견 되었습니다. 계속하려면 원하는 업데이트의 이름을 클릭하십시오.';
$s['buildNumber'] = '빌드 번호: %s'; //Build number: 18890.1000

//selectlang.php
$s['selectLangFor'] = '%s의 언어 선택'; //Select language for Windows 10 Insider Preview 18890.1000 (rs_prerelease) amd64
$s['chooseLang'] = '언어 선택';
$s['chooseLangDesc'] = '원하는 언어를 선택 하십시오.';
$s['allLangs'] = '모든 언어';
$s['selLangFiles'] = '파일';
$s['allFiles'] = '모든 파일';
$s['wubOnly'] = 'WindowsUpdateBox만';
$s['updateOnly'] = '업데이트만';
$s['selectLangInfoText1'] = '<i>다음</i> 버튼을 클릭하여 다운로드 할 에디션을 선택하십시오.';
$s['selectLangInfoText2'] = 'WindowsUpdateBox.exe 및 누적 업데이트는 <i>모든 언어</i>에서 찾을 수 있습니다.';
$s['allLangsWarn'] = '<i>모든 언어</i> 옵션은 에디션 선택을 지원하지 않습니다.';
$s['clickNextToOpenFindFiles'] = '<i>다음</i> 버튼을 클릭하면 파일을 찾을 수 있는 페이지가 열립니다.';
$s['noLangsAvailable'] = '이 빌드에는 사용할 수 있는 언어가 없습니다.';
$s['browseFiles'] = '파일 찾아보기';
$s['browseFilesDesc'] = '선택한 빌드에서 빠르게 파일 찾아보기';
$s['searchFiles'] = '파일 검색';
$s['toSearchForCUUseQuery'] = '누적 업데이트를 검색하려면 <i>%s</i> 검색 쿼리를 사용 하십시오.'; //To search for Cumulative Updates use the <i>Windows10 KB</i> search query.

//selectedition.php
$s['selectEditionFor'] = '%s의 에디션 선택'; //Select edition for Windows 10 Insider Preview 18890.1000 (rs_prerelease) amd64, English (United States)
$s['chooseEdition'] = '에디션 선택';
$s['chooseEditionDesc'] = '원하는 에디션을 선택하십시오.';
$s['allEditions'] = '모든 에디션';
$s['selectEditionInfoText'] = '<i>다음</i> 버튼을 클릭하여 선택한 요약 페이지를 엽니다.';
$s['additionalEditionsInfo'] = '오른쪽 표에서 찾을 수 있는 추가 버전이 필요한 경우 표시된 버전을 선택하고 <i>다음</i>을 클릭하십시오. 요약 페이지에서 적절한 다운로드 옵션으로 원하는 추가 에디션을 선택할 수 있습니다.';

//download.php
$s['summary'] = '개요';
$s['summaryDesc'] = '선택 사항을 검토하고 다운로드 방법을 선택하십시오.';
$s['summaryFor'] = '%s 요약'; //Summary for Windows 10 Insider Preview 18890.1000 (rs_prerelease) amd64, English (United States), Windows 10 Pro
$s['summaryOfSelection'] = '선택 사항 요약';
$s['browseList'] = '파일 목록 찾아보기';
$s['browseListDesc'] = '수동 다운로드를 위해 설정된 UUP에 있는 파일 목록 페이지를 엽니다.';
$s['aria2Opt1'] = 'aria2를 사용하여 다운로드';
$s['aria2Opt1Desc'] = 'aria2를 사용하여 선택한 UUP 세트를 쉽게 다운로드하십시오.';
$s['aria2Opt2'] = 'aria2를 사용하여 다운로드하고 변환';
$s['aria2Opt2Desc'] = 'aria2를 사용하여 선택한 UUP 세트를 쉽게 다운로드하고 ISO로 변환하십시오.';
$s['aria2Opt3'] = 'aria2를 사용하여 다운로드 하고 추가 버전 생성 및 변환';
$s['aria2Opt3Desc'] = 'aria2를 사용하여 선택한 UUP 세트를 쉽게 다운로드하고 변환 및 추가 버전을 만들고 마지막으로 ISO 이미지를 만듭니다.';
$s['jsRequiredToConf'] = '이 옵션을 구성하고 사용하려면 JavaScript가 필요합니다.';
$s['selAdditionalEditions'] = '추가 에디션 선택';
$s['noAdditionalEditions'] = '이 선택 항목에 대한 추가 에디션은 없습니다.';
$s['learnMore'] = '더 알아보기';
$s['learnMoreAdditionalEditions1'] = '이 옵션은 선택된 추가 에디션을 자동으로 생성합니다.';
$s['learnMoreAdditionalEditions2'] = '추가 에디션 목록은 선택한 기본 에디션에 의해 결정됩니다. 아래에서 원하는 추가 에디션을 만드는 데 필요한 기본 에디션 목록을 확인할 수 있습니다.';
$s['learnMoreUpdates1'] = '변환 스크립트가 다음 시스템에서 실행될 때만 업데이트가 변환 된 이미지에 통합됩니다.';
$s['learnMoreUpdates2'] = '다른 시스템에서 변환 스크립트를 실행하면 업데이트가 최종 이미지에 통합되지 않습니다.';
$s['systemWithAdk'] = 'Windows 10 ADK가 설치된 %s'; //Windows 7 with Windows 10 ADK installed
$s['additionalUpdates'] = '추가 업데이트';
$s['additionalUpdatesDesc'] = '이 UUP 세트에는 변환 프로세스 중에 통합되는 추가 업데이트가 포함되어 있어 생성 시간이 상당히 늘어 납니다.';
$s['browseUpdatesList'] = '업데이트 목록 찾아보기';
$s['selectDownloadOptions'] = '다운로드 옵션을 선택하십시오.';
$s['selectDownloadOptionsSub'] = '선택 사항으로 다운로드 방법 구성';
$s['downloadMethod'] = '다운로드 방법';
$s['conversionOptions'] = '변환 옵션';
$s['convOpt1'] = 'install.wim 대신 install.esd를 사용하여 ISO 생성';
$s['convOpt2'] = '사용 가능한 경우 업데이트 통합 (Windows 변환기 만 해당)';
$s['convOpt3'] = '업데이트 통합 후 정리 실행 (Windows 변환기 만 해당)';
$s['convOpt4'] = '.NET Framework 3.5 통합 (Windows 변환기 만 해당)';
$s['startDownload'] = '다운로드 패키지 만들기';

//get.php
$s['listOfFilesFor'] = '%s의 파일 목록'; //List of files for Windows 10 Insider Preview 18890.1000 (rs_prerelease) amd64
$s['totalSizeOfFiles'] = '총 파일 크기 : %s'; //Total size of files: 2.86 GiB
$s['fileRenamingScript'] = '파일 이름 바꾸기 스크립트';
$s['fileRenamingScriptDesc1'] = '아래에 있는 스크립트를 사용하여 다운로드 한 파일의 이름을 빠르게 바꿀 수 있습니다.';
$s['fileRenamingScriptDesc2'] = '아래 양식의 내용을 <code>cmd</code> 확장자로 저장하고 다운로드한 파일이있는 폴더에 넣은 다음 실행하십시오.';
$s['sha1File'] = 'SHA-1 체크섬 파일';
$s['sha1FileDesc'] = '이 파일을 사용하여 파일이 올바르게 다운로드되었는지 빠르게 확인할 수 있습니다.';
$s['aria2NoticeTitle'] = 'aria2 옵션 사용하여 다운로드 주의사항';
$s['aria2NoticeText1'] = 'aria2 옵션을 사용하여 다운로드하면 다운로드해야하는 아카이브가 생성됩니다. 다운로드한 아카이브에는 선택한 작업을 수행하는 데 필요한 모든 파일이 들어 있습니다.';
$s['aria2NoticeText2'] = '다운로드 프로세스를 시작하려면 플랫폼에 맞는 스크립트를 사용하십시오.';
$s['aria2NoticeText3'] = 'Aria2는 오픈 소스 프로젝트입니다. 여기에서 찾을 수 있습니다 : %s.'; //Aria2 is an open source project. You can find it here: https://aria2.github.io/.
$s['aria2NoticeText4'] = 'UUP 변환 스크립트 (Windows 버전)가 %s에 의해 생성되었습니다.'; //UUP Conversion script (Windows version) has been created by abbodi1406.
$s['aria2NoticeText5'] = 'UUP 변환 스크립트 (Linux 버전, macOS 버전) 는 오픈 소스입니다. 여기에서 찾을 수 있습니다 : %s.'; //UUP Conversion script (Linux version, macOS version) is open source. You can find it here: https://github.com/uup-dump/converter.

//findfiles.php
$s['findFilesIn'] = '%s에있는 파일 찾기'; //Find files in Windows 10 Insider Preview 18890.1000 (rs_prerelease) amd64
$s['fileRenamingScriptDescFindFiles'] = '이 페이지에서 다운로드 한 파일의 이름을 바꾸려면 이름 바꾸기 스크립트를 생성하면 자동으로 이 작업이 수행됩니다.';
$s['fileRenamingScriptGenW'] = '이름 바꾸기 스크립트 생성 (Windows)';
$s['fileRenamingScriptGenL'] = '이름 바꾸기 스크립트 생성 (Linux, macOS)';
$s['searchForFiles'] = '파일 검색...';
$s['weFoundFiles'] = '귀하의 검색어에 대해 <b>%d</ b> 파일을 발견했습니다.'; //We have found <b>692</b> files for your query.

//Error pages
$s['error'] = '오류';
$s['requestNotSuccessful'] = '요청이 성공하지 못함';
$s['anErrorHasOccurred'] = '요청을 처리하는 중에 오류가 발생했습니다.';
$s['generatedPackNotAvailable'] = '생성 된 팩을 사용할 수 없음';
$s['generatedPackNotAvailableDesc'] = '다운로드하려는 업데이트는 사용 가능한 언어, 버전 및 파일로 가득합니다. 폴백 팩이 사용되며 정확한 정보를 제공하지 못할 수 있습니다. 이로 인해 다운로드에 실패하면 자동으로 생성 된 팩을 사용할 수있을 때까지 기다려주십시오.';
$s['arm64Warning'] = '<b>ARM64 기반 장치와 호환 가능</b>한 ARM64 빌드를 선택했으며 일반적인 Intel 또는 AMD 기반 PC에서는 작동하지 않습니다. <b>64 비트</b> PC의 경우 <b>amd64</b> 빌드를 사용하십시오. <b>32 비트</ b> PC의 경우 <b>x86</b> 빌드를 사용하십시오. 대상 장치가 ARM64 인 경우 이 메시지를 무시해도 됩니다.';

//Error messages
$s['error_ERROR'] = '일반적인 오류.';
$s['error_UNSUPPORTED_API'] = '설치된 API 버전은 이 버전의 UUP dump와 호환되지 않습니다.';
$s['error_NO_FILEINFO_DIR'] = '<i>fileinfo</i> 디렉토리가 존재하지 않습니다.';
$s['error_NO_BUILDS_IN_FILEINFO'] = '<i>fileinfo</i> 데이터베이스에는 빌드가 포함되어 있지 않습니다.';
$s['error_SEARCH_NO_RESULTS'] = '수행 된 쿼리에 대한 항목을 찾을 수 없습니다.';
$s['error_UNKNOWN_ARCH'] = '알 수 없는 프로세서 아키텍처.';
$s['error_UNKNOWN_RING'] = '알 수 없는 링';
$s['error_UNKNOWN_FLIGHT'] = '알 수 없는 항공편.';
$s['error_UNKNOWN_COMBINATION'] = '항공편과 링조합이 올바르지 않습니다. Skip Ahead는 Insider Fast 링에서만 지원됩니다.';
$s['error_ILLEGAL_BUILD'] = '지정된 빌드 번호가 %d보다 작거나 %d보다 큽니다.'; //Specified build number is less than 9841 or larger than 2147483646.
$s['error_ILLEGAL_MINOR'] = '지정된 빌드 마이너가 올바르지 않습니다.';
$s['error_NO_UPDATE_FOUND'] = '서버가 업데이트를 반환하지 않았습니다.';
$s['error_XML_PARSE_ERROR'] = '응답 XML 구문 분석에 실패했습니다. Microsoft 서버에 문제가 있을 수 있습니다. 나중에 다시 시도하십시오.';
$s['error_EMPTY_FILELIST'] = '서버가 빈 파일 목록을 반환했습니다.';
$s['error_NO_FILES'] = '선택한 파일이 없습니다.';
$s['error_NOT_FOUND'] = '지정된 선택 항목을 찾을 수 없습니다.';
$s['error_MISSING_FILES'] = '선택한 UUP 세트에 누락 된 파일이 있습니다.';
$s['error_NO_METADATA_ESD'] = '선택한 메타 데이터 ESD 파일이 없습니다.';
$s['error_UNSUPPORTED_LANG'] = '지정된 언어는 지원되지 않습니다.';
$s['error_UNSPECIFIED_LANG'] = '언어가 지정되지 않았습니다.';
$s['error_UNSUPPORTED_EDITION'] = '지정된 버전은 지원되지 않습니다.';
$s['error_UNSUPPORTED_COMBINATION'] = '언어 및 버전 조합이 올바르지 않습니다.';
$s['error_NOT_CUMULATIVE_UPDATE'] = '선택한 업데이트에 누적 업데이트가 없습니다.';
$s['error_UPDATE_INFORMATION_NOT_EXISTS'] = '지정한 업데이트에 대한 정보가 데이터베이스에 존재하지 않습니다.';
$s['error_KEY_NOT_EXISTS'] = '업데이트 정보에 지정된 키가 없습니다.';
$s['error_UNSPECIFIED_UPDATE'] = '업데이트 ID가 지정되지 않았습니다.';
$s['error_INCORRECT_ID'] = '지정된 업데이트 ID가 잘못되었습니다. 지정된 업데이트 ID가 올바른지 확인하십시오.';
$s['error_RATE_LIMITED'] = '속도가 제한되고 있습니다. 몇 초 후에 다시 시도하십시오.';
$s['error_UNSPECIFIED_VE'] = '추가 버전을 선택하지 않았습니다. 추가 버전을 만들지 않으려면 <i>aria2를 사용하여 다운로드</i> 옵션을 사용하십시오.';
$s['errorNoMessage'] = '오류 메시지를 사용할 수 없습니다.';

//Languages
$s['lang_ar-sa'] = '아랍어 (사우디 아라비아)';
$s['lang_bg-bg'] = '불가리아어';
$s['lang_cs-cz'] = '체코어';
$s['lang_da-dk'] = '덴마크어';
$s['lang_de-de'] = '독일어';
$s['lang_el-gr'] = '그리스어';
$s['lang_en-gb'] = '영어 (영국)';
$s['lang_en-us'] = '영어 (미국)';
$s['lang_es-es'] = '스페인어 (스페인)';
$s['lang_es-mx'] = '스페인어 (멕시코)';
$s['lang_et-ee'] = '에스토니아어';
$s['lang_fi-fi'] = '핀란드어';
$s['lang_fr-ca'] = '프랑스어 (캐나다)';
$s['lang_fr-fr'] = '프랑스어 (프랑스)';
$s['lang_he-il'] = '히브리어';
$s['lang_hr-hr'] = '크로아티아어';
$s['lang_hu-hu'] = '헝가리어';
$s['lang_it-it'] = '이탈리아어';
$s['lang_ja-jp'] = '일본어';
$s['lang_ko-kr'] = '한국어';
$s['lang_lt-lt'] = '리투아니아어';
$s['lang_lv-lv'] = '라트비아어';
$s['lang_nb-no'] = '노르웨이어 (복말)';
$s['lang_nl-nl'] = '네덜란드어';
$s['lang_pl-pl'] = '폴란드어';
$s['lang_pt-br'] = '포르투갈어 (브라질)';
$s['lang_pt-pt'] = '포르투갈어 (포르투갈)';
$s['lang_qps-ploc'] = 'Pseudo';
$s['lang_ro-ro'] = '루마니아어';
$s['lang_ru-ru'] = '러시아어';
$s['lang_sk-sk'] = '슬로바키아어';
$s['lang_sl-si'] = '슬로베니아어';
$s['lang_sr-latn-rs'] = '세르비아어 (라틴 문자)';
$s['lang_sv-se'] = '스웨덴어';
$s['lang_th-th'] = '태국어';
$s['lang_tr-tr'] = '터키어';
$s['lang_uk-ua'] = '우크라이나어';
$s['lang_zh-cn'] = '중국어 (간체, 중국)';
$s['lang_zh-hk'] = '중국어 (번체, 홍콩)';
$s['lang_zh-tw'] = '중국어 (번체, 대만)';
