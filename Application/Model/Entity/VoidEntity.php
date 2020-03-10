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
 * Class VoidEntity
 */
class VoidEntity extends \OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity
{
    /**
     * @return stdClass $cancellationDetails
     */
    public function getCancellationDetails()
    {
        return $this->_getData('cancellationDetails');
    }

    /**
     * @param stdClass $cancellationDetails
     */
    public function setCancellationDetails($cancellationDetails)
    {
        $this->_setData('cancellationDetails', $cancellationDetails);
    }
}
