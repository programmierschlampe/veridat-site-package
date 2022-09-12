<?php
namespace IdsCoAt\VeridatSitePackage\DataProcessing;
          

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/* TYPO3\CMS\Frontend\Page\PageRepository; */
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Resource\FileRepository;

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

/**
 * Class for data processing for the content element "My new content element"
 */
class ValuesProcessor implements DataProcessorInterface
{
    
    /**
     * @var PageRepository
     */
    private $pageRepository;
    
    /**
     * @var FileRepository
     */
    private $fileRepository;
    
    /**
     * Process data for the content element "My new content element"
     *
     * @param ContentObjectRenderer $cObj The data of the content element or page
     * @param array $contentObjectConfiguration The configuration of Content Object
     * @param array $processorConfiguration The configuration of this processor
     * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
     * @return array the processed data as key/value store
     */
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
        )
    {
        $additionalData = array();
        $additionalData['test'] = 'test';
        $processedData['ValuesProcessorData'] = $additionalData;
        
        return $processedData;
    }
    
}
