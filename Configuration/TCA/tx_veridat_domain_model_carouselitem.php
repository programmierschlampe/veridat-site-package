<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:veridat_site_package/Resources/Private/Language/locallang_general.xlf:tx_veridat_domain_model_carouselitem',
        'label' => 'header',
        'delete' => 'deleted',
        'iconfile' => 'EXT:veridat_site_package/Resources/Public/Icons/Carouselitem.svg',
        'searchFields' => 'header,subheader,bodytext',
	    'enablecolumns' => [
		    'disabled' => 'hidden',
	    ]
    ],
    'columns' => [
        'header' => [
            'config' => [
                'max' => 255,
                'size' => 50,
                'type' => 'input',
            ],
            'exclude' => 1,
            'l10n_mode' => 'prefixLangTitle',
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header'           
        ],
        'date' => [
            'config' =>[
                'default' => 0,
                'eval' => 'date,int,required',
                'renderType' => 'inputDateTime',
                'type' => 'input'
            ],
            'exclude' => 1,
            'label' => 'LLL:EXT:veridat_site_package/Resources/Private/Language/locallang_general.xlf:tx_veridat_domain_model_carouselitem.date',
        ],
        'subheader' => [
            'config' => [
                'max' => 255,
                'size' => 50,
                'softref' => 'email[subst]',
                'type' => 'input',
            ],
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.subheader'
        ],
        'header_link' => [
            'config' => [
                'eval' => 'trim',
                'fieldControl' => [
                    'linkPopup' => [
                        'options' => [
                            'title' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_link_formlabel',
                        ],
                    ],
                ],
                'max' => 1024,
                'renderType' => 'inputLink',
                'size' => 50,
                'softref' => 'typolink',
                'type' => 'input',
            ],
            'exclude' => 1,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_link',
        ],
        'bodytext' => [
            'config' => [
                'cols' => 80,
                'rows' => 15,
                'search' => [
                    'andWhere' => "{#CType}='text' OR {#CType}='textpic' OR {#CType}='textmedia'",
                ],
                'softref' => 'typolink_tag,email[subst],url',
                'type' => 'text'
            ],
            'exclude' => 1,
            'l10n_mode' => 'prefixLangTitle',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.text'
        ],
        'image' => [
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
                    'fieldname' => 'image',
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
            'exclude' => '1',
            'label' => 'LLL:EXT:veridat_site_package/Resources/Private/Language/locallang_general.xlf:tx_veridat_domain_model_carouselitem.image',
        ],
        'hidden' => [
            'config' => [
                'items' => [
                    '0' => [
                        '0' => '',
                        'invertStateDisplay' => 1,
                    ]
                ],
                'renderType' => 'checkboxToggle',
                'type' => 'check',
            ],
            'exclude' => '1',
            'label' => ' LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'header, date, subheader, header_link, bodytext, image, hidden']
    ]
];