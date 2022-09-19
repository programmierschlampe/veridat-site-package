<?php

namespace IdsCoAt\VeridatSitePackage\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Valuebox extends AbstractEntity
{

        /**
     * @var string
     **/
    public $label = '';


    public function __construct($label = '')
    {
        $this->setLabel($label);
    }
    
    /**
     * Sets the label of the item
     *
     * @param string $label
     */
    public function setLabel(string $label)
    {
        $this->label = $label;
    }
    
    /**
     * Gets the label of the item
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }
}
