<?php
call_user_func(
	function ($extKey) {

		// Adds the new content elements to the "Type" dropdown
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tt_content','CType',array('LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_general.xlf:hero.title','hero','content-hero'),'textmedia','after');
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tt_content','CType',array('LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_general.xlf:values.title','values','content-values'),'hero','after');
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tt_content','CType',array('LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_general.xlf:carousel.title','carousel','content-carousel'),'values','after');

		// assign type icons to the new content elements
		\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($GLOBALS['TCA']['tt_content'],['ctrl' => ['typeicon_classes' => ['hero' 		=> 'content-hero']]]);
		\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($GLOBALS['TCA']['tt_content'],['ctrl' => ['typeicon_classes' => ['values' 		=> 'content-values']]]);
		\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($GLOBALS['TCA']['tt_content'],['ctrl' => ['typeicon_classes' => ['carousel' 	=> 'content-carousel']]]);

        //define columns
		$herocolumns = array (
            'backgroundimage' => [
                'label' => 'LLL:EXT:'.$extKey.'/Resources/Private/Language/locallang_general.xlf:backgroundimage.title',
                'exclude' => '1',
                'config' => [
                    'maxitems' => '2',
                    'minitems' => '1',
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                        'enabledControls' => [
                            'delete' => '1',
                            'dragdrop' => '1',
                            'hide' => '1',
                            'info' => '1',
                            'new' => '1',
                            'sort' => '1',
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
                ],
            ],
        );

		$valuescolumns = array (
            'valuerows' => [
                'exclude' => '0',
		        'label' => 'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_general.xlf:valuerows.title',
                'config' => [
                    'type' => 'inline',
                    'foreign_table' => 'tx_veridat_domain_model_valuerow',
                    'foreign_field' => 'parentid',
                    'foreign_sortby' => 'sorting_foreign',
                    'maxitems' => 30,
                    'appearance' => [
                        'useSortable' => 1,
                        'collapseAll' => 1,
                        'expandSingle' => 1,
                        'newRecordLinkTitle' => 'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_general.xlf:valuerows.addNewRecord',
                        'enabledControls' => [
                            'delete' => 1,
                            'dragdrop' => 1,
                            'hide' => 1,
                            'info' => 0,
                            'new' => 1,
                            'sort' => 1,
                        ],
                    ],
                    'behaviour' => [
                        'localizeChildrenAtParentLocalization' => 1,    
                    ],
                    
                ],
            ],
            'valuelayout' => [
                'exclude' => '0',
		        'label' => 'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_general.xlf:valuelayout.title',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        '0' => [
                            '0' => 'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_general.xlf:valuelayout.layout0',
                            '1' => 0
                        ],
                        '1' => [
                            '0' => 'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_general.xlf:valuelayout.layout1',
                            '1' => 1
                        ]
                    ],
                ],
            ],
        );

		$carouselcolumns = array (
            'carouselitems' => [
                'exclude' => '0',
		        'label' => 'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_general.xlf:carousel.title',
                'config' => [
                    'type' => 'inline',
                    'foreign_table' => 'tx_veridat_domain_model_carouselitem',
                    'foreign_field' => 'parentid',
                    'foreign_sortby' => 'sorting_foreign',
                    'maxitems' => 30,
                    'appearance' => [
                        'useSortable' => 1,
                        'collapseAll' => 1,
                        'expandSingle' => 1,
                        'newRecordLinkTitle' => 'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_general.xlf:carouselitem.addNewRecord',
                        'enabledControls' => [
                            'delete' => 1,
                            'dragdrop' => 1,
                            'hide' => 1,
                            'info' => 0,
                            'new' => 1,
                            'sort' => 1,
                        ],
                    ],
                    'behaviour' => [
                        'localizeChildrenAtParentLocalization' => 1,    
                    ],
                    
                ],
            ],
        );

        //add columns to TCA
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content',$herocolumns);
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content',$valuescolumns);
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content',$carouselcolumns);

		//add form fields to palette
		//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content','backgroundimages','backgroundimage','');

        $GLOBALS['TCA']['tt_content']['types']['hero'] = array(
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general, 
                    --palette--;;general, 
                    --palette--;;headers, 
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.images, image, --linebreak--, backgroundimage,
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
        $GLOBALS['TCA']['tt_content']['types']['values'] = array(
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general, 
                    --palette--;;general, 
                    --palette--;;headers, 
                --div--;LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_general.xlf:tabs.valuerows, valuerows, valuelayout,
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
        $GLOBALS['TCA']['tt_content']['types']['carousel'] = array(
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general, 
                    --palette--;;general, 
                    --palette--;;headers, 
                --div--;LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_general.xlf:tabs.carouselitems, carouselitems,
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
	'veridat_site_package'
);
