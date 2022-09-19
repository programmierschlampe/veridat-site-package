<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:veridat_site_package/Resources/Private/Language/locallang_general.xlf:tx_veridat_domain_model_valuerow',
        'label' => 'label',
        'delete' => 'deleted',
        'iconfile' => 'EXT:veridat_site_package/Resources/Public/Icons/Valuerow.svg',
        'searchFields' => '',
	    'enablecolumns' => [
		    'disabled' => 'hidden',
	    ]
    ],
    'columns' => [
        'label' => [
            'config' => [
                'max' => 255,
                'size' => 50,
                'type' => 'input',
            ],
            'exclude' => 1,
            'l10n_mode' => 'prefixLangTitle',
            'label' => 'LLL:EXT:veridat_site_package/Resources/Private/Language/locallang_general.xlf:tx_veridat_domain_model_valuerow.label.title',           
            'description' => 'LLL:EXT:veridat_site_package/Resources/Private/Language/locallang_general.xlf:tx_veridat_domain_model_valuerow.label.description',
        ],
        'valueboxes' => [
            'config' => [
                'appearance' => [
                    'collapseAll' => 1,
                    'enabledControls' => [
                        'delete' => 1,
                        'dragdrop' => 1,
                        'hide' => 1,
                        'info' => 1,
                        'new' => 1,
                        'sort' => 1,
                    ],
                    'expandSingle' => 1,
                    'newRecordLinkTitle' => 'LLL:EXT:veridat_site_package/Resources/Private/Language/locallang_general.xlf:tx_veridat_domain_model_valuerow.addNewRecord',
                    'useSortable' => 1,
                ],
                'foreign_field' => 'parentid',
                'foreign_sortby' => 'sorting_foreign',
                'foreign_table' => 'tx_veridat_domain_model_valuebox',
                'maxitems' => 50,
                'type' => 'inline',
            ],
            'exclude' => 0,
            'label' => 'LLL:EXT:veridat_site_package/Resources/Private/Language/locallang_general.xlf:tx_veridat_domain_model_valuerow.selected_valueboxes',
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
        '0' => ['showitem' => 'label,valueboxes, hidden']
    ]
];