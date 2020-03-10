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

namespace OxidProfessionalServices\ArvatoAfterpayModule\Core;

/**
 * Class AvailableInstallmentPlansService
 */
class AvailableInstallmentPlansService extends \OxidProfessionalServices\ArvatoAfterpayModule\Core\Service
{

    /**
     * @param double $dAmount
     *
     * @return AvailableInstallmentPlansResponseEntity
     * @internal param string $sIBAN
     * @internal param string $sBIC
     *
     */
    public function getAvailableInstallmentPlans($dAmount)
    {
        $dataObject = $this->getAvailableInstallmentPlansDataProvider()->getDataObject($dAmount);
        $data = $dataObject->exportData();
        $client = $this->getAvailableInstallmentPlansClient();
        $response = $client->execute($data);

        $this->_entity = $this->parseResponse($response);

        return $this->getEntity();
    }

    /////////////////////////////////////////////////////
    // UNIT TEST HELPERS - all uncovered
    // @codeCoverageIgnoreStart

    /**
     * @codeCoverageIgnore Deliberately untested, since mocked
     * @return AvailableInstallmentPlansDataProvider
     */
    protected function getAvailableInstallmentPlansDataProvider()
    {
        return oxNew(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\DataProvider\AvailableInstallmentPlansDataProvider::class);
    }

    /**
     * @codeCoverageIgnore Deliberately untested, since mocked
     * @return WebServiceClient
     */
    protected function getAvailableInstallmentPlansClient()
    {
        return oxNew(\OxidProfessionalServices\ArvatoAfterpayModule\Core\ClientConfigurator::class)->getAvailableInstallmentPlansClient();
    }
}
