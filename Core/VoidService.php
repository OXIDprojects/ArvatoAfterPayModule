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
 * Class VoidService: Service for voiding autorized payments with AfterPay.
 */
class VoidService extends \OxidProfessionalServices\ArvatoAfterpayModule\Core\Service
{

    /**
     * Standard constructor.
     *
     * @param oxOrder $oxOrder
     *
     * @internal param oxSession $session
     * @internal param oxLang $lang
     *
     * @codeCoverageIgnore Deliberately uncovered since only setter & getter
     */
    public function __construct(\OxidEsales\Eshop\Application\Model\Order $oxOrder)
    {
        $this->_oxOrder = $oxOrder;
        $this->_afterpayOrder = $oxOrder->getAfterpayOrder();
    }

    /**
     * Performs the void call.
     *
     * @param $sRecordedApiKey
     *
     * @param array|null $aOrderItems
     *
     * @return VoidResponseEntity
     */
    public function void($sRecordedApiKey, array $aOrderItems = null)
    {
        $response = $this->_executeRequestFromOrderData($sRecordedApiKey, $aOrderItems);
        $this->_entity = $this->_parseResponse($response);

        if (
            is_numeric($this->_getEntity()->getTotalAuthorizedAmount())
            && is_numeric($this->_getEntity()->getTotalCapturedAmount())
        ) {
            $this->_afterpayOrder->setStatus(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\AfterpayOrder::AFTERPAYSTATUS_AUTHORIZATIONVOIDED);
            $this->_afterpayOrder->save();
        }

        return $this->_getEntity();
    }

    /**
     * @param $sRecordedApiKey
     * @param array|null $aOrderItems
     *
     * @return stdClass|stdClass[]
     *
     * @codeCoverageIgnore Deliberately uncovered since only setter & getter
     */
    protected function _executeRequestFromOrderData($sRecordedApiKey, array $aOrderItems = null)
    {
        $data = $this->getVoidDataForApi($aOrderItems);
        $client = $this->getVoidClientForApi($sRecordedApiKey);
        return $client->execute($data);
    }

    /////////////////////////////////////////////////////
    /// //UNIT TEST HELPER
    /// @CodeCoverageIgnoreStart

    /**
     * Elevating visibility
     *
     * @param $sRecordedApiKey
     *
     * @return stdClass|stdClass[]
     * @codeCoverageIgnore Deliberately uncovered since only setter & getter
     */
    public function test_executeRequestFromOrderData($sRecordedApiKey)
    {
        return $this->_executeRequestFromOrderData($sRecordedApiKey);
    }

    /**
     * @codeCoverageIgnore Deliberately uncovered unit test helper
     *
     * @param array|null $aOrderItems
     *
     * @return stdClass
     */
    protected function getVoidDataForApi(array $aOrderItems = null)
    {
        return oxNew(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\DataProvider\VoidDataProvider::class)->getDataObject($this->_oxOrder, $aOrderItems)->exportData();
    }

    /**
     * @codeCoverageIgnore Deliberately uncovered unit test helper
     *
     * @param $sRecordedApiKey
     *
     * @return WebServiceClient
     */
    protected function getVoidClientForApi($sRecordedApiKey)
    {
        return oxNew(\OxidProfessionalServices\ArvatoAfterpayModule\Core\ClientConfigurator::class)->getVoidClient(
            $this->_oxOrder->oxorder__oxordernr->value,
            $sRecordedApiKey
        );
    }
}
