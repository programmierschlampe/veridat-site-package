<?php

/*
 * TYPO3 Extension "Sitepackage for website www.veridat.io"
 *
 * Author: Ing. Gerhard Huber <ids.co.at>
 * https://ids.co.at/
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'Sitepackage for website www.veridat.io',
    'description' => 'Site Package with Scripts, Templates and Resources ',
    'category' => 'fe',
    'version' => '11.0.0',
    'state' => 'stable',
    'clearcacheonload' => true,
    'author' => 'Ing. Gerhard Huber <ids.co.at>',
    'author_email' => 'office@ids.co.at',
    'author_company' => 'ids.co.at',
    'constraints' => [
        'depends' => [
            'php' => '7.4.0-7.4.99',
            'typo3' => '11.0.0-11.5.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ]
    ]
];
