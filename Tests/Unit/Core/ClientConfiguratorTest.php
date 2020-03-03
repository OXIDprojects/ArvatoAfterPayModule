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

namespace OxidProfessionalServices\ArvatoAfterPayModule\Tests\Unit\Core;

use \OxidEsales\Eshop\Core\Registry;

/**
 * Class ClientConfiguratorTest: Tests for ClientConfigurator.
 */
class ClientConfiguratorTest extends \OxidEsales\TestingLibrary\UnitTestCase
{

    public function testGetAuthorizePaymentClient()
    {
        $sut = $this->getSUT();
        $sutReturn = $sut->getAuthorizePaymentClient();
        $this->assertEquals(\OxidProfessionalServices\ArvatoAfterPayModule\Core\WebServiceClient::FUNCTION_AUTHORIZE_CHECKOUT, $sutReturn->getFunction());
    }

    public function testgetCaptureClient_ex()
    {
        $this->setExpectedException(\OxidProfessionalServices\ArvatoAfterPayModule\Core\Exception\CurlException::class);
        $sut = $this->getSUT();
        $sut->getCaptureClient(0, 'SomeApiKey');
    }

    public function testGetCaptureClient()
    {
        $sut = $this->getSUT();
        $sutReturn = $sut->getCaptureClient('orderid123', 'SomeApiKey');
        $expected = sprintf(\OxidProfessionalServices\ArvatoAfterPayModule\Core\WebServiceClient::FUNCTION_CAPTURE, 'orderid123');
        $this->assertEquals($expected, $sutReturn->getFunction());
    }

    public function testgetCaptureShippingClient_ex01()
    {
        $this->setExpectedException(\OxidProfessionalServices\ArvatoAfterPayModule\Core\Exception\CurlException::class);
        $sut = $this->getSUT();
        $sut->getCaptureShippingClient(0, 1);
    }

    public function testgetCaptureShippingClient_ex10()
    {
        $this->setExpectedException(\OxidProfessionalServices\ArvatoAfterPayModule\Core\Exception\CurlException::class);
        $sut = $this->getSUT();
        $sut->getCaptureShippingClient(1, 0);
    }

    public function testgetCaptureShippingClient_ok()
    {
        $sut = $this->getSUT();
        $this->assertInstanceOf(
            \OxidProfessionalServices\ArvatoAfterPayModule\Core\WebServiceClient::class,
            $sut->getCaptureShippingClient(1, 1)
        );
    }

    public function testgetValidateBankAccountClient()
    {
        $sut = $this->getSUT();
        $this->assertInstanceOf(
            \OxidProfessionalServices\ArvatoAfterPayModule\Core\WebServiceClient::class,
            $sut->getValidateBankAccountClient()
        );
    }

    public function testgetRefundClient_ex()
    {
        $this->setExpectedException(\OxidProfessionalServices\ArvatoAfterPayModule\Core\Exception\CurlException::class);
        $sut = $this->getSUT();
        $sut->getRefundClient(0);
    }

    public function testgetRefundClient()
    {
        $sut = $this->getSUT();
        $this->assertInstanceOf(
            \OxidProfessionalServices\ArvatoAfterPayModule\Core\WebServiceClient::class,
            $sut->getRefundClient(1)
        );
    }

    public function testgetAvailablePaymentMethodsClient()
    {
        $sut = $this->getSUT();
        $this->assertInstanceOf(
            \OxidProfessionalServices\ArvatoAfterPayModule\Core\WebServiceClient::class,
            $sut->getAvailablePaymentMethodsClient()
        );
    }

    public function testgetCreateContractClient()
    {
        $sut = $this->getSUT();
        $this->assertInstanceOf(
            \OxidProfessionalServices\ArvatoAfterPayModule\Core\WebServiceClient::class,
            $sut->getCreateContractClient(123)
        );
    }

    public function testgetAvailableInstallmentPlansClient()
    {
        $sut = $this->getSUT();
        $this->assertInstanceOf(
            \OxidProfessionalServices\ArvatoAfterPayModule\Core\WebServiceClient::class,
            $sut->getAvailableInstallmentPlansClient()
        );
    }

    public function testgetBaseClient_ex01()
    {
        $this->setExpectedException(\OxidProfessionalServices\ArvatoAfterPayModule\Core\Exception\CurlException::class);
        $sut = $this->getSUT();
        $this->assertInstanceOf(
            \OxidProfessionalServices\ArvatoAfterPayModule\Core\WebServiceClient::class,
            $sut->getBaseClient(null, 'lorem')
        );
    }

    public function testgetBaseClient_ex10()
    {
        $this->setExpectedException(\OxidProfessionalServices\ArvatoAfterPayModule\Core\Exception\CurlException::class);
        $sut = $this->getSUT();
        $this->assertInstanceOf(
            \OxidProfessionalServices\ArvatoAfterPayModule\Core\WebServiceClient::class,
            $sut->getBaseClient('lorem', null)
        );
    }

    public function testgetBaseClient_ok_live()
    {
        $sut = $this->getSUT();
        $this->assertInstanceOf(
            \OxidProfessionalServices\ArvatoAfterPayModule\Core\WebServiceClient::class,
            $sut->getBaseClient('lorem', 'ipsum')
        );
    }

    public function testgetBaseClient_ok_live_fixedurl()
    {
        Registry::getConfig()->setConfigParam('arvatoAfterpayApiUrl', 'http://lorem');
        $sut = $this->getSUT();
        $this->assertInstanceOf(
            \OxidProfessionalServices\ArvatoAfterPayModule\Core\WebServiceClient::class,
            $sut->getBaseClient('lorem', 'ipsum')
        );
    }

    public function testgetBaseClient_ok_sandbox()
    {
        Registry::getConfig()->setConfigParam('arvatoAfterpayApiSandboxMode', true);
        $sut = $this->getSUT();
        $this->assertInstanceOf(
            \OxidProfessionalServices\ArvatoAfterPayModule\Core\WebServiceClient::class,
            $sut->getBaseClient('lorem', 'ipsum')
        );
    }

    public function testgetUserCountryCodeIdFromSession_AT()
    {
        $oUser = oxNew(\OxidEsales\Eshop\Application\Model\User::class);
        $oUser->oxuser__oxcountryid = new \OxidEsales\Eshop\Core\Field('a7c40f6320aeb2ec2.72885259');
        Registry::getSession()->setUser($oUser);
        $sut = $this->getSUT();
        $this->assertEquals('AT', $sut->getUserCountryCodeIdFromSession());
    }

    public function testgetUserCountryCodeIdFromSession_CH()
    {
        $oUser = oxNew(\OxidEsales\Eshop\Application\Model\User::class);
        $oUser->oxuser__oxcountryid = new \OxidEsales\Eshop\Core\Field('a7c40f6321c6f6109.43859248');
        Registry::getSession()->setUser($oUser);
        $sut = $this->getSUT();
        $this->assertEquals('CH', $sut->getUserCountryCodeIdFromSession());
    }

    public function testgetUserCountryCodeIdFromSession_DE()
    {
        $oUser = oxNew(\OxidEsales\Eshop\Application\Model\User::class);
        $oUser->oxuser__oxcountryid = new \OxidEsales\Eshop\Core\Field('somethingelse');
        Registry::getSession()->setUser($oUser);
        $sut = $this->getSUT();
        $this->assertEquals('DE', $sut->getUserCountryCodeIdFromSession());
    }

    /**
     * SUT generator
     *
     * @return ClientConfigurator
     */
    protected function getSUT()
    {
        return oxNew(\OxidProfessionalServices\ArvatoAfterPayModule\Core\ClientConfigurator::class);
    }

}
