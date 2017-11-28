<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
call_user_func(
		function($extKey)
		{
			$ModuleIcon = 'Module.svg';
		if (version_compare(TYPO3_version, '8.4.0', '>=')) {
			
			if (TYPO3_MODE=='BE')    {
			
					
		
			\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
					'JBartels.WecMap',
					'tools','txwecmapM1','',array(
					'FEUserMap' => 'index,show,new,create,delete,deleteAll,edit,update,populate',
					
				), array(
							'access' => 'user,group',
							'icon' => 'EXT:wec_map/Resources/Public/Icons/' . $ModuleIcon,
							'labels' => 'LLL:EXT:wec_map/Resources/Private/Language/locallang.xlf',
						)
					);
			
			/*\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
					'JBartels.WecMap',
					'tools','txwecmapM2','',array(
					'Module' => 'index',
				//	'BatchGeocode' => 'index',
				//	'Ajax' => 'index',			
				), array(
							'access' => 'user,group',
							'icon' => 'EXT:wec_map/Resources/Public/Icons/' . $ModuleIcon,
							'labels' => 'LLL:EXT:wec_map/Resources/Private/Language/locallang.xlf',
						)
					);*/
			}
		}
		else{
			if (TYPO3_MODE=='BE')    {
				/* Add the backend modules */
			    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule('tools','txwecmapM1','',\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('wec_map').'Classes/Module/MapAdministration/', array(
							'access' => 'user,group',
							'icon' => 'EXT:wec_map/Resources/Public/Icons/' . $ModuleIcon,
							'labels' => 'LLL:EXT:wec_map/Resources/Private/Language/locallang.xlf',
						));
			    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule('tools','txwecmapM2','',\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('wec_map').'Classes/Module/FEUserMap/', array(
							'access' => 'user,group',
							'icon' => 'EXT:wec_map/Resources/Public/Icons/' . $ModuleIcon,
							'labels' => 'LLL:EXT:wec_map/Resources/Private/Language/locallang.xlf',
						));
			}
		}
		/* Set up the tt_content fields for the two frontend plugins */
		/* DO NOT MOVE TO Configuration/TCA/Overrides/tt_content.php! */
		$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['wec_map_pi1']='layout,select_key,pages,recursive';
		$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['wec_map_pi2']='layout,select_key,pages,recursive';
		$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['wec_map_pi3']='layout,select_key,pages,recursive';
		$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['wec_map_pi1']='pi_flexform';
		$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['wec_map_pi2']='pi_flexform';
		$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['wec_map_pi3']='pi_flexform';
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'tp3 Mods');
		
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wecmap_external');
		},
	    $_EXTKEY
	);
		
?>