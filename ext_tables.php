
<?php
call_user_func(
	function ($extKey) {

        $defaultDoktype = 1;
 
        // Allow Insert into Table
        $GLOBALS['PAGES_TYPES'][$defaultDoktype] = [ 'type' => 'web' , 'allowedTables' => '*' ];

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_veridat_domain_model_valuerow');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_veridat_domain_model_valuebox');
    },
    'veridat_site_package'
);