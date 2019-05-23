<?php
/*
UUP dump translation file.

Translation information:
English language name: French (France)
Localized language name: Français (France)
Language code: fr-FR
Author: Zardoc (https://forums.mydigitallife.net/members/zardoc.18278/)
*/

// Informations linguistiques
$s['code'] = 'fr-fr';
$s['timeZone'] = 'Europe/Paris'; //Fuseaux horaires supportés: https://www.php.net/manual/en/timezones.php

//shared strings
$s['uupdump'] = ' UUP dump';
$s['uupdumpSub'] = '%s - UUP dump'; //Parcourir les builds connues - UUP dump
$s['build'] = 'Build';
$s['arch'] = ' Architecture';
$s['ring'] = 'Anneau';
$s['updateid'] = 'ID de mise à jour';
$s['update'] = 'Mis à jour';
$s['lang'] = 'Langue';
$s['edition'] = 'Édition';
$s['seachForBuilds'] = 'Recherche de builds...';
$s['no'] = 'Non';
$s['yes'] = 'Oui';
$s['yesRecommended'] = 'Oui (recommandé)';
$s['next'] = 'Suivant';
$s['ok'] = 'OK';
$s['cancel'] = 'Annuler';
$s['information'] = 'Information';
$s['totalDlSize'] = 'Taille totale du téléchargement';
$s['file'] = 'Fichier';
$s['expires'] = 'Expire';
$s['sha1'] = 'SHA-1';
$s['size'] = 'Taille';

//global
$s['home'] = 'Accueil';
$s['downloads'] = 'Téléchargement';
$s['lightMode'] = 'Mode clair';
$s['darkMode'] = 'Mode sombre';
$s['sourceCode'] = 'Code source';
$s['menu'] = 'Menu';
$s['websiteDesc'] = 'Télécharger les fichiers UUP à partir des serveurs Windows Update en toute simplicité. Ce projet n’est pas affilié à Microsoft Corporation.';
$s['notAffiliated'] = 'Ce projet n’est pas affilié à Microsoft Corporation. Windows est une marque déposée de Microsoft Corporation.';
$s['copyright'] = '© %d %s et contributeurs.'; //© 2019 whatever127 et contributeurs
$s['selectLanguage'] = 'Veuillez sélectionner votre langue';

//index.php
$s['slogan'] = 'Télécharger les fichiers UUP à partir des serveurs Windows Update en toute simplicité.';
$s['advOptions'] = 'Options avancées';
$s['browseBuilds'] = 'Browse the list of known builds';
$s['browseBuildsSub'] = 'Choisissez une build déjà connue dans la base de données locale et téléchargez-la.';
$s['fetchLatest'] = 'Extraire la dernière build';
$s['fetchLatestSub'] = 'Récupère les dernières informations de build des serveurs Windows Update.';
$s['newlyAdded'] = 'Builds nouvellement ajoutées';
$s['dateAdded'] = 'Date d’ajout';

//known.php
$s['browseKnown'] = 'Parcourir les builds connues';
$s['chooseBuild'] = 'Choisir une build';
$s['weFoundBuilds'] = 'Nous avons trouvé <b>%d</b> builds pour votre requête.'; //Nous avons trouvé <b>692</b> builds pour votre requête.

//latest.php
$s['latestFetchLatest'] = 'Extraire la dernière Build';
$s['latestTestingOnly'] = 'Fin de test uniquement';
$s['latestTestingOnlyWarn'] = '<b>Cette page est fournie à des fins de test uniquement.</b> les Builds récupérées par cette page qui n’ont pas été traitées par le serveur back-end seront fournies à l’aide de packs de secours (fall-back), ce qui peut fournir des résultats incomplets. Si vous souhaitez télécharger une Build déjà connue, veuillez utiliser la page des Builds connues à la place.';
$s['latestDoYouWantKnown'] = 'Aimeriez-vous continuer en parcourant la liste des builds connues ?';
$s['chooseOptions'] = 'Choisir les options';
$s['buildOfPretendedClient'] = 'Numéro de build de mock Windows Update client';
$s['editionOfPretendedClient'] = 'Edition du système mock';
$s['skipAheadLabel'] = 'Évaluation (flight) Skip ahead';
$s['skipAheadOption'] = 'Utiliser Évaluation (flight) Skip ahead (Insider Fast seulement)';
$s['fetchUpdates'] = 'Récupérer les mises à jour';
$s['fetchUpdatesInfo'] = 'Cliquez sur le bouton <i>Récupérer les mises à jour</i> pour envoyer votre demande aux serveurs Windows Update.';

//fetchupd.php
$s['responseFromServer'] = 'Réponse du serveur';
$s['foundUpdates'] = 'Trouvé %d mise à jour(s)'; //Trouvé 1 mis à jour(s)
$s['foundTheseUpdates'] = 'Les mises à jour suivantes ont été trouvées. Cliquez sur le nom de la mise à jour souhaitée pour continuer.';
$s['buildNumber'] = 'Numéro de Build: %s'; //Numéro de Build: 18890.1000

//selectlang.php
$s['selectLangFor'] = 'Sélectionner la langue pour%s'; //Sélectionnez la langue pour Windows 10 Insider Preview 18890,1000 (rs_prerelease) amd64
$s['chooseLang'] = 'Choisir la langue';
$s['chooseLangDesc'] = 'Choisir la langue souhaitée';
$s['allLangs'] ='Toutes les langues';
$s['selLangFiles'] = 'Fichiers';
$s['allFiles'] = 'Tous les fichiers';
$s['wubOnly'] = 'WindowsUpdateBox uniquement';
$s['updateOnly'] = 'Mettre à jour uniquement';
$s['selectLangInfoText1'] = 'Cliquez sur <i>Suivant</i> bouton pour sélectionner l’édition que vous souhaitez télécharger.';
$s['selectLangInfoText2'] = 'WindowsUpdateBox.exe et les mises à jour cumulatives se trouvent dans le <i>All toutes les langues</i> langue.';
$s['allLangsWarn'] = 'Le <i>toutes les langues</i> option ne prend pas en charge la sélection d’édition.';
$s['clickNextToOpenFindFiles'] = 'Cliquez sur le <i>Suivant</i> bouton pour ouvrir la page, qui permet de rechercher des fichiers.';

//selectedition.php
$s['selectEditionFor'] = 'Sélectionner l’édition pour %s'; //Sélectionnez l’édition pour Windows 10 Insider Preview 18890,1000 (rs_prerelease) amd64, anglais (États-Unis)
$s['chooseEdition'] = 'Choisir l’édition';
$s['chooseEditionDesc'] = 'Choisir l’édition souhaitée';
$s['allEditions'] = 'Toutes les éditions';
$s['selectEditionInfoText'] = 'Cliquez sur le bouton <i> suivant</i> pour ouvrir la page récapitulative de votre sélection.';

//download.php
$s['summary'] = 'Résumé';
$s['summaryDesc'] = 'Examinez votre sélection et choisissez la méthode de téléchargement';
$s['summaryFor'] = 'Résumé pour %s'; //Résumé pour Windows 10 Insider Preview 18890,1000 (rs_prerelease) amd64, anglais (États-Unis), Windows 10 Pro
$s['summaryOfSelection'] = 'Résumé de votre sélection';
$s['browseList'] = 'Parcourir une liste de fichiers';
$s['browseListDesc'] = 'Opens the page with a list of files in the UUP set for manual download.';
$s['aria2Opt1 '] = 'Télécharger en utilisant aria2.';
$s['aria2Opt1Desc'] = 'Télécharger facilement le jeu UUP sélectionné à l’aide de aria2.';
$s['aria2Opt2 '] = 'Télécharger en utilisant aria2 et convertir';
$s['aria2Opt2Desc'] = 'Téléchargez facilement le jeu UUP sélectionné à l’aide de aria2 et convertissez-le en ISO.';
$s['aria2Opt3 '] = 'Télécharger en utilisant aria2, convertir et créer des éditions supplémentaires';
$s['aria2Opt3Desc'] = 'télécharger facilement le jeu UUP sélectionné à l’aide de aria2, convertir, créer des éditions supplémentaires et enfin créer une image ISO.';
$s['jsRequiredToConf'] = 'JavaScript est requis pour configurer et utiliser cette option.';
$s['selAdditionalEditions'] = 'Sélectionner des éditions supplémentaires';
$s['noAdditionalEditions'] = 'Aucune autre édition n’est disponible pour cette sélection.';
$s['learnMore'] = 'En savoir plus';
$s['learnMoreAdditionalEditions1'] = 'Cette option permet la création automatique d’éditions supplémentaires sélectionnées.';
$s['learnMoreAdditionalEditions2'] = 'La liste des éditions supplémentaires est déterminée par les éditions de base sélectionnées. Ci-dessous vous pouvez vérifier la liste des éditions de base qui sont nécessaires pour créer les éditions supplémentaires souhaitées:';
$s['learnMoreUpdates1'] = 'Les mises à jour ne seront intégrées à l’image convertie que lorsque le script de conversion est exécuté sur les systèmes suivants:';
$s['learnMoreUpdates2'] = 'Si vous exécutez le script de conversion sur un autre système, les mises à jour ne seront pas intégrées à l’image résultante.';
$s['systemWithAdk'] = '% s avec Windows 10 ADK installé'; //Windows 7 avec Windows 10 ADK installé
$s['additionalUpdates'] = 'Mises à jour supplémentaires';
$s['additionalUpdatesDesc'] = 'Cet ensemble UUP contient des mises à jour supplémentaires qui seront intégrées au cours du processus de conversion, augmentant significativement le temps de création.';
$s['browseUpdatesList'] = 'Parcourir la liste des mises à jour';

//get.php
$s['listOfFilesFor'] = 'Liste des fichiers pour% s'; //Liste des fichiers pour Windows 10 Insider Preview 18890,1000 (rs_prerelease) amd64
$s['totalSizeOfFiles'] = 'Taille totale des fichiers: %s'; //Taille totale des fichiers: 2,86 Giga
$s['fileRenamingScript'] = 'Script de renommage de fichier';
$s['fileRenamingScriptDesc1'] = 'Le script trouvé ci-dessous peut être utilisé pour renommer rapidement les fichiers téléchargés.';
$s['fileRenamingScriptDesc2'] = 'Copiez simplement le contenu du formulaire ci-dessous dans un nouveau fichier avec < code > cmd </code > extension, mettez-le dans le dossier avec les fichiers téléchargés et exécutez.';
$s['sha1File'] = 'Fichier de totaux de contrôle SHA-1';
$s['sha1FileDesc'] = 'Vous pouvez utiliser ce fichier pour vérifier rapidement que les fichiers ont été téléchargés correctement.';
$s['aria2NoticeTitle'] = 'Télécharger en utilisant l’avis d’options aria2';
$s['aria2NoticeText1'] = 'Télécharger en utilisant les options aria2 créer une archive qui doit être téléchargée. L’archive téléchargée contient tous les fichiers nécessaires pour atteindre la tâche sélectionnée.';
$s['aria2NoticeText2'] = 'Pour démarrer le processus de téléchargement, utilisez un script pour votre plateforme:';
$s['aria2NoticeText3'] = 'Aria2 est un projet open source. Vous pouvez le trouver ici: %s.'; //Aria2 est un projet open source. Vous pouvez le trouver ici: https://aria2.github.io/.
$s['aria2NoticeText4'] = 'Le script de conversion UUP (version Windows) a été créé par %s.'; //UUP script de conversion (version Windows) a été créé par abbodi1406.
$s['aria2NoticeText5'] = 'Le script de conversion UUP (version Linux) est open source. Vous pouvez le trouver ici: %s.'; //UUP script de conversion (version Linux) est open source. Vous pouvez le trouver ici: https://github.com/uup-dump/converter.

//findfiles.php
$s['Findfilesin'] = 'Rechercher des fichiers dans %s'; //Trouver des fichiers dans Windows 10 Insider Preview 18890,1000 (rs_prerelease) amd64
$s['fileRenamingScriptDescFindFiles'] = 'Si vous voulez renommer rapidement les fichiers téléchargés à partir de cette page, vous pouvez générer un script de renommage, qui le fera automatiquement pour vous.';
$s['fileRenamingScriptGenW'] = 'Générer un script de renommage (Windows)';
$s['fileRenamingScriptGenL'] = 'Générer un script de renommage (Linux)';
$s['searchForFiles'] = 'Rechercher des fichiers...';
$s['weFoundFiles'] = 'Nous avons trouvé <b>% d</b> fichiers pour votre requête.'; //Nous avons trouvé <b >692</b> fichiers pour votre requête.

//Error pages
$s['error'] = 'Erreur';
$s['requestNotSuccessful'] = 'Requête non réussie';
$s['anErrorHasOccurred'] = 'Une erreur s’est produite lors de la tentative de traitement de votre demande.';
$s['generatedPackNotAvailable'] = 'Paquet généré non disponible';
$s['generatedPackNotAvailableDesc'] = 'La mise à jour que vous tentez de télécharger n’a pas de Pack généré qui fournit des informations complètes sur les langues, les éditions et les fichiers disponibles. Le Pack de secours sera utilisé, et il peut ne pas fournir les informations correctes. Si le téléchargement échoue à cause de cela, veuillez attendre que le Pack généré automatiquement devienne disponible.';
$s['arm64Warning'] = 'Vous avez sélectionné une build ARM64 qui est <b>uniquement compatible avec les appareils basés sur ARM64</b> et ne fonctionnera pas avec les ordinateurs Intel ou AMD basés régulièrement. Pour les <b>64 bits</b> PC, veuillez utiliser les <b>amd64</b> builds. Pour <b>32 bits</b> PC, veuillez utiliser <b>x86</b> builds. Si vous êtes absolument sûr que le périphérique de destination est basé sur ARM64, vous pouvez ignorer ce message en toute sécurité.';

//Error messages
$s['error_ERROR'] = 'Erreur générique.';
$s['error_UNSUPPORTED_API'] = 'La version de l’API installée n’est pas compatible avec cette version d’UUP dump.';
$s['error_NO_FILEINFO_DIR'] = 'Le répertoire <i>FileInfo</i> n’existe pas.';
$s['error_NO_BUILDS_IN_FILEINFO'] = 'La base de données <i>FileInfo</i> ne contient aucune Build.';
$s['error_SEARCH_NO_RESULTS'] = 'Aucun élément trouvé pour la requête exécutée.';
$s['error_UNKNOWN_ARCH'] = 'Architecture de processeur inconnue.';
$s['error_UNKNOWN_RING'] = 'Anneau inconnu.';
$s['error_UNKNOWN_FLIGHT'] = 'Vol inconnu.';
$s['error_UNKNOWN_COMBINATION'] = 'La combinaison de vol et d’anneau n’est pas correcte. Skip Ahead est uniquement pris en charge pour Insider Fast Ring.';
$s['error_ILLEGAL_BUILD'] = 'Le nombre de build spécifié est inférieur à %d ou supérieur à %d.'; //Le numéro de build spécifié est inférieur à 9841 ou supérieur à 2147483646.
$s['error_ILLEGAL_MINOR'] = 'La build mineure spécifiée est incorrecte.';
$s['error_NO_UPDATE_FOUND'] = 'Le serveur n’a retourné aucune mise à jour.';
$s['error_XML_PARSE_ERROR'] = 'L’analyse XML de la réponse a échoué. Il peut y avoir un problème avec les serveurs Microsoft. Réessayez plus tard.';
$s['error_EMPTY_FILELIST'] = 'Le serveur a retourné une liste de fichiers vide.';
$s['error_NO_FILES'] = 'Aucun fichier n’est disponible pour votre sélection.';
$s['error_NOT_FOUND'] = 'La sélection spécifiée est introuvable.';
$s['error_MISSING_FILES'] = 'Le jeu UUP sélectionné a des fichiers manquants.';
$s['error_NO_METADATA_ESD'] = 'Il n’y a pas de fichiers ESD de métadonnées disponibles pour votre sélection.';
$s['error_UNSUPPORTED_LANG'] = 'Le langage spécifié n’est pas pris en charge.';
$s['error_UNSPECIFIED_LANG'] = 'La langue n’a pas été spécifiée.';
$s['error_UNSUPPORTED_EDITION'] = 'L’édition spécifiée n’est pas prise en charge.';
$s['error_UNSUPPORTED_COMBINATION'] = 'La combinaison de langue et d’édition n’est pas correcte.';
$s['error_NOT_CUMULATIVE_UPDATE'] = 'La mise à jour sélectionnée ne contient pas de mise à jour cumulative.';
$s['error_UPDATE_INFORMATION_NOT_EXISTS'] = 'Les informations relatives à la mise à jour spécifiée n’existent pas dans la base de données.';
$s['error_KEY_NOT_EXISTS'] = 'La clé spécifiée n’existe pas dans les informations de mise à jour.';
$s['error_UNSPECIFIED_UPDATE'] = 'L’ID de mise à jour n’a pas été spécifié.';
$s['error_INCORRECT_ID'] = 'L’ID de mise à jour spécifié est incorrect. Assurez-vous que l’ID de mise à jour spécifié est correct.';
$s['error_RATE_LIMITED'] = 'Vous êtes à un taux limité. Veuillez réessayer en quelques secondes.';
$s['error_UNSPECIFIED_VE'] = 'Vous n’avez pas sélectionné d’éditions supplémentaires. Si vous ne souhaitez pas créer d’éditions supplémentaires, veuillez utiliser le <i>Téléchargement en utilisant aria2 et conversion</i> option.';
$s['errorNoMessage'] = 'Message d’erreur indisponible.';

//Languages
$s['lang_ar-sa'] = 'Arabe (Arabie saoudite)';
$s['lang_bg-bg'] = 'Bulgare';
$s['lang_cs-cz'] = 'Tchèque';
$s['lang_da-dk'] = 'Danois';
$s['lang_de-de'] = 'Allemand';
$s['lang_el-gr'] = 'Grec';
$s['lang_en-gb'] = 'Anglais (Royaume-Uni)';
$s['lang_en-us'] = 'Anglais (États-Unis)';
$s['lang_es-es'] = 'Espagnol (Espagne)';
$s['lang_es-mx'] = 'Espagnol (Mexique)';
$s['lang_et-ee'] = 'Estonien';
$s['lang_fi-fi'] = 'Finnois';
$s['lang_fr-ca'] = 'Français (Canada)';
$s['lang_fr-fr'] = 'Français (France)';
$s['lang_he-il'] = 'Hébreu';
$s['lang_hr-hr'] = 'Croate';
$s['lang_hu-hu'] = 'Hongrois';
$s['lang_it-it'] = 'Italien';
$s['lang_ja-jp'] = 'Japonais';
$s['lang_ko-kr'] = 'Coréen';
$s['lang_lt-lt'] = 'Lituanien';
$s['lang_lv-lv'] = 'Letton';
$s['lang_nb-no'] = 'Norvégien (Bokmal)';
$s['lang_nl-en'] = 'Néerlandais';
$s['lang_pl-pl'] = 'Polonais';
$s['lang_pt-br'] = 'Portugais (Brésil)';
$s['lang_pt-pt'] = 'Portugais (Portugal)';
$s['lang_qps-ploc'] = 'Pseudo';
$s['lang_ro-en'] = 'Roumain';
$s['lang_ru-ru'] = 'Russe';
$s['lang_sk-en'] = 'Slovac';
$s['lang_sl-si'] = 'Slovène';
$s['lang_sr-latn-rs'] = 'Serbe (latin)';
$s['lang_sv-se'] = 'Suédois';
$s['lang_th-th'] = 'Thaï';
$s['lang_tr-tr'] = 'Turc';
$s['lang_uk-ua'] = 'Ukrainien';
$s['lang_zh-cn'] = 'Chinois (simplifié)';
$s['lang_zh-hk'] = 'Chinois (Hong Kong)';
$s['lang_zh-tw'] = 'Chinois (traditionnel)';
