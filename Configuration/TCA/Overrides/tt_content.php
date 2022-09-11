<?php
call_user_func(
	function ($extKey) {

		// Adds the new content elements to the "Type" dropdown
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tt_content','CType',array('LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_db.xlf:hero.title','hero','content-hero'),'uploads','after');
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tt_content','CType',array('LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_db.xlf:values.title','values','content-values'),'hero','after');
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tt_content','CType',array('LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_db.xlf:carousel.title','carousel','content-carousel'),'values','after');

		// assign type icons to the new content elements
		\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($GLOBALS['TCA']['tt_content'],['ctrl' => ['typeicon_classes' => ['hero' 		=> 'content-hero']]]);
		\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($GLOBALS['TCA']['tt_content'],['ctrl' => ['typeicon_classes' => ['values' 		=> 'content-values']]]);
		\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($GLOBALS['TCA']['tt_content'],['ctrl' => ['typeicon_classes' => ['carousel' 	=> 'content-carousel']]]);

        //define columns
		$herocolumns = array (
            'backgroundimage' => [
                'config' => [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                        'enabledControls' => [
                            'delete' => '1',
                            'dragdrop' => '1',
                            'hide' => '1',
                            'info' => '1',
                            'new' => '',
                            'sort' => '',
                        ],
                        'headerThumbnail' => [
                            'field' => 'uid_local',
                            'height' => '45m'
                        ],
                        'showPossibleLocalizationRecords' => 1,
                        'useSortable' => '1',
                    ],
                    'filter' => [
                        '0' => [
                            'parameters' => [
                                'allowedFileExtensions' => 'gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,pdf,ai,svg',
                                'disallowedFileExtensions' => '',
                            ],
                            'userFunc' => 'TYPO3\CMS\Core\Resource\Filter\FileExtensionFilter->filterInlineChildren',
                        ],
                    ],
                    'foreign_field' => 'uid_foreign',
                    'foreign_label' => 'uid_local',
                    'foreign_match_fields' => [
                        'fieldname' => 'backgroundimage',
                    ],
                    'foreign_selector' => 'uid_local',
                    'foreign_sortby' => 'sorting_foreign',
                    'foreign_table' => 'sys_file_reference',
                    'foreign_table_field' => 'tablenames',
                    'overrideChildTca' => [
                        'columns' => [
                            'uid_local' => [
                                'config' => [
                                    'appearance' => [
                                        'elementBrowserAllowed' => 'gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,pdf,ai,svg',
                                        'elementBrowserType' => 'file',
                                    ],
                                ],
                            ],
                        ],
                        'types' => [
                            '0' => [
                                'showitem' => '--palette--;;imageoverlayPalette, --palette--;;filePalette',
                            ],
                            '1' => [
                                'showitem' => '--palette--;;imageoverlayPalette, --palette--;;filePalette',
                            ],
                            '2' => [
                                'showitem' => '--palette--;;imageoverlayPalette, --palette--;;filePalette',
                            ],
                            '3' => [
                                'showitem' => '--palette--;;audioOverlayPalette, --palette--;;filePalette',
                            ],
                            '4' => [
                                'showitem' => '--palette--;;videoOverlayPalette, --palette--;;filePalette',
                            ],
                            '5' => [
                                'showitem' => '--palette--;;imageoverlayPalette, --palette--;;filePalette',
                            ],
                        ],
                    ],
                    'type' => 'inline',
                    'exclude' => '1',
                    'label' => 'LLL:EXT:'.$extKey.'/Resources/Private/Language/locallang_db.xml:backgroundimage.title',
                ],
            ],
        );

   		//add columns to TCA
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content',$herocolumns);

		//add form fields to palette
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content','backgroundimages','backgroundimage','');

        $GLOBALS['TCA']['tt_content']['types']['hero'] = array(
		    'columnsOverrides' => [
                'bodytext' => [
                    'config' => [
                        'enableRichtext' => 1,
                        'richtextConfiguration ' => 'veridat',
                    ],                    
                ],
		    ],
            'previewRenderer' => 'TYPO3\CMS\Frontend\Preview\TextpicPreviewRenderer',
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general, 
                    --palette--;;general, 
                    --palette--;;headers, bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel, 
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.images, image, backgroundimages,
                    --palette--;;mediaAdjustments, 
                    --palette--;;gallerySettings, 
                    --palette--;;imagelinks, 
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance, 
                    --palette--;;frames, 
                    --palette--;;appearanceLinks, 
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, 
                    --palette--;;language, 
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, 
                    --palette--;;hidden, 
                    --palette--;;access, 
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories, categories, 
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes, rowDescription, 
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
            '
		);
	},
	'veridat-site-package'
);
