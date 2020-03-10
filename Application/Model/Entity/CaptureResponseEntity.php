<?php

/**
 * This Software is the property of OXID eSales and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * @category  module
 * @package   afterpay
 * @author    OXID Professional services
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 */

namespace OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity;

/**
 * Class CaptureResponseEntity: Entitiy for the capture response.
 */
class CaptureResponseEntity extends \OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity
{

    /**
     * Getter for capturedAmount property.
     *
     * @return string
     */
    public function getCapturedAmount()
    {
        return $this->_getData('capturedAmount');
    }

    /**
     * Setter for capturedAmount property.
     *
     * @param double $capturedAmount
     */
    public function setCapturedAmount($capturedAmount)
    {
        return $this->_setData('capturedAmount', $capturedAmount);
    }

    /**
     * Getter for authorizedAmount property.
     *
     * @return string
     */
    public function getAuthorizedAmount()
    {
        return $this->_getData('authorizedAmount');
    }

    /**
     * Setter for authorizedAmount property.
     *
     * @param double $authorizedAmount
     */
    public function setAuthorizedAmount($authorizedAmount)
    {
        return $this->_setData('authorizedAmount', $authorizedAmount);
    }

    /**
     * Getter for remainingAuthorizedAmount property.
     *
     * @return string
     */
    public function getRemainingAuthorizedAmount()
    {
        return $this->_getData('remainingAuthorizedAmount');
    }

    /**
     * Setter for remainingAuthorizedAmount property.
     *
     * @param double $remainingAuthorizedAmount
     */
    public function setRemainingAuthorizedAmount($remainingAuthorizedAmount)
    {
        return $this->_setData('remainingAuthorizedAmount', $remainingAuthorizedAmount);
    }

    /**
     * Getter for captureNumber property.
     *
     * @return string
     */
    public function getCaptureNumber()
    {
        return $this->_getData('captureNumber');
    }

    /**
     * Setter for captureNumber property.
     *
     * @param string $captureNumber
     */
    public function setCaptureNumber($captureNumber)
    {
        return $this->_setData('captureNumber', $captureNumber);
    }
}
