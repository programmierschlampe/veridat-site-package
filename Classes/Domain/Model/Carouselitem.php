<?php

namespace IDS\VeridatSitePackage\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Carouselitem extends AbstractEntity
{
    
    /**
     * @var string
     **/
    public $header = '';
    
    /**
     * @var string
     **/
    public $subheader = '';

    /**
     *
     * @var string
     **/
    public $bodytext  = '';
    
    /**
     * The portrait of person
     *
     * @var \TYPO3\CMS\Core\Resource\FileRepository
     **/
    
    public $images = null;
    
    public function __construct($header = '', $subheader = '', $bodytext = '')
    {
        $this->setHeader($header);
        $this->setSubheader($subheader);
        $this->setBodytext($bodytext);
    }
    
    /**
     * Sets the header of the item
     *
     * @param string $header
     */
    public function setHeader(string $header)
    {
        $this->header = $header;
    }
    
    /**
     * Gets the header of the item
     *
     * @return string
     */
    public function getHeader()
    {
        return $this->header;
    }
    
    /**
     * Sets the subheader of the item
     *
     * @param string $subheader
     */
    public function setSubheader(string $subheader)
    {
        $this->subheader = $subheader;
    }
    
    /**
     * Gets the subheader of the item
     *
     * @return string
     */
    public function getSubheader()
    {
        return $this->subheader;
    }
    
    /**
     * Sets the bodytext of the item
     *
     * @param string $bodytext
     */
    public function setBodytext(string $bodytext)
    {
        $this->bodytext = $bodytext;
    }
    
    /**
     * Gets the bodytext of the item
     *
     * @return string
     */
    public function getBodytext()
    {
        return $this->bodytext;
    }

    /**
     * Gets the image function of the item
     *
     * @return void
     */
    public function fillImageData (\TYPO3\CMS\Core\Resource\FileRepository $fileRepository) {
        $this->images = $fileRepository->findByRelation('tx_veridat_domain_model_carouselitem', 'image', $this->uid);
    }

}
