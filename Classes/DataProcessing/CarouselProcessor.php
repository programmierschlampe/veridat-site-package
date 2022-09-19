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
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Resource\FileRepository;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

/**
 * Class for data processing for the content element "My new content element"
 */
class CarouselProcessor implements DataProcessorInterface
{
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

        $relfield = $processorConfiguration['relfield'];
        $relatedValue = $processedData['data'][$relfield];
        $additionalData = array();
        
        $fileRepository = GeneralUtility::makeInstance(FileRepository::class);
        $carouselQueryBuilder = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable('tx_veridat_domain_model_carouselitem');
        $carouselitemquery = $carouselQueryBuilder
        ->select('c.*')
        ->from('tx_veridat_domain_model_carouselitem','c')
        ->where(
            $carouselQueryBuilder->expr()->eq('c.parentid',$carouselQueryBuilder->createNamedParameter($relatedValue, \PDO::PARAM_INT))
        )
        ->orderBy('c.sorting_foreign', 'ASC');
        
        $items = $carouselitemquery->execute()->fetchAll();

        $carouselitems=array();
        foreach($items as $item)
        {
            $itemFiles = $fileRepository->findByRelation('tx_veridat_domain_model_carouselitem', 'image', $item['uid']);
            $itemImages = array();
            foreach ($itemFiles as $key => $value) {
                $itemImage = $value->getOriginalFile()->getProperties();
                array_push($itemImages,$itemImage);
            }
            $item['images'] = $itemImages;
            array_push($carouselitems, $item);
        }
        $processedData['carouselitems'] = $carouselitems;
        
        return $processedData;
    }
    
}
