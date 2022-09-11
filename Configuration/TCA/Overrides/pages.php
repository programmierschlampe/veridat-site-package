<?php
defined('TYPO3_MODE') or die();

call_user_func(function () {
    /**
     * Extension key
     */
    $extensionKey = 'veridat-site-package';

    /**
     * Add default TypoScript (constants and setup)
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        $extensionKey,
        'Configuration/TSconfig/Page/page.tsconfig',
        'veridat.io Site Package Contentelements Page Config'
    );
});