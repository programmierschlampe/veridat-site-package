<?php
defined('TYPO3_MODE') or die();

call_user_func(
    function ($extKey) {
        /**
         * Extension key
         */
        $extensionKey = 'veridat_site_package';

        /**
         * Add default TypoScript (constants and setup)
         */
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
            $extensionKey,
            'Configuration/TSconfig/Page/page.tsconfig',
            'veridat.io Site Package Contentelements Page Config'
        );

        //define columns
        $contactcolumns = array (
            'contactform' => [
                'config' => [
                    'renderType' => 'checkboxToggle',
                    'type' => 'check'
                ],
                'exclude' => 1,
                'label' => 'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_general.xlf:contactform.title'
            ],
        );

        //add columns to TCA
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages',$contactcolumns);
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('pages','title','--linebreak--,contactform','');

    },
    'veridat_site_package'
);