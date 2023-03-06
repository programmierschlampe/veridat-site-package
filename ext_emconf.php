<?php

/*
 * TYPO3 Extension "Sitepackage for website www.veridat.io"
 *
 * Author: Ing. Gerhard Huber <ids.co.at>
 * https://ids.co.at/
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'Sitepackage for websites veridat, radmantis, juvatech',
    'description' => 'Site Package with Scripts, Templates and Resources ',
    'category' => 'templates',
    'state' => 'stable',
    'author' => 'Ing. Gerhard Huber <ids.co.at>',
    'author_email' => 'office@ids.co.at',
    'author_company' => 'ids.co.at',
    'constraints' => [
        'depends' => [
            'php' => '7.4.0-7.4.99',
            'typo3' => '11.0.0-11.5.99',
            'fluid' => '11.4.0-11.5.99',
            'fluid_styled_content' => '11.4.0-11.5.99',
            'rte_ckeditor' => '11.4.0-11.5.99'
		],
        'conflicts' => [
        ],
        'suggests' => [
        ]
    ],
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'version' => '11.1.1',
];
