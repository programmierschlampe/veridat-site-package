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

        $relfield = $processorConfiguration['relfield'];
        $relatedValue = $processedData['data'][$relfield];
        $additionalData = array();
        
        $fileRepository = GeneralUtility::makeInstance(FileRepository::class);
        $valuerowQueryBuilder = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable('tx_veridat_domain_model_valuerow');
        $valuerowitemquery = $valuerowQueryBuilder
        ->select('r.*')
        ->from('tx_veridat_domain_model_valuerow','r')
        ->where(
            $valuerowQueryBuilder->expr()->eq('r.parentid',$valuerowQueryBuilder->createNamedParameter($relatedValue, \PDO::PARAM_INT))
        )
        ->orderBy('r.sorting_foreign', 'ASC');
        
        $rows = $valuerowitemquery->execute()->fetchAll();

        $valuerows = array();
        foreach($rows as $row)
        {
            $valueboxQueryBuilder = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable('tx_veridat_domain_model_valuebox');
            $valueboxitemquery = $valueboxQueryBuilder
            ->select('b.*')
            ->from('tx_veridat_domain_model_valuebox','b')
            ->where(
                $valueboxQueryBuilder->expr()->eq('b.parentid',$valueboxQueryBuilder->createNamedParameter($row['uid'], \PDO::PARAM_INT))
            )->orderBy('b.sorting_foreign', 'ASC');
            $boxes = $valueboxitemquery->execute()->fetchAll();

            $valueboxes = array();
            foreach($boxes as $box)
            {
                $boxFiles = $fileRepository->findByRelation('tx_veridat_domain_model_valuebox', 'image', $box['uid']);
                $boxImages = array();
                foreach ($boxFiles as $key => $value) {
                    //$boxImage = $value->getOriginalFile()->getProperties();
                    $boxImage = $value->getOriginalFile()->getProperties();
                    array_push($boxImages,$boxImage);
                }
                $box['images'] = $boxImages;
                array_push($valueboxes, $box);
            }
            $row['valueboxes'] = $valueboxes;

            array_push($valuerows,$row);
        }
        $processedData['valuerows'] = $valuerows;
        
        return $processedData;
    }
    
}
