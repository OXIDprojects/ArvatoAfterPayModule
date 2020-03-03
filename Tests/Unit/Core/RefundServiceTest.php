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

class RefundServiceTest extends \OxidEsales\TestingLibrary\UnitTestCase
{

    public function test__construct()
    {
        $this->assertInstanceOf(
            \OxidProfessionalServices\ArvatoAfterPayModule\Core\RefundService::class,
            oxNew(\OxidProfessionalServices\ArvatoAfterPayModule\Core\RefundService::class, oxNew(\OxidEsales\Eshop\Application\Model\Order::class))
        );
    }

    public function test_refund_exception()
    {
        $this->setExpectedException(\OxidProfessionalServices\ArvatoAfterPayModule\Core\Exception\CurlException::class);
        $sut = oxNew(\OxidProfessionalServices\ArvatoAfterPayModule\Core\RefundService::class, oxNew(\OxidEsales\Eshop\Application\Model\Order::class));
        $sut->refund(null, 'SomeApiKey');
    }

    public function test_refund_ok()
    {
        $oxOrder = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
        $AfterpayOrder = oxNew(\OxidProfessionalServices\ArvatoAfterPayModule\Application\Model\AfterpayOrder::class, $oxOrder);
        $sut =
            $this->getMockBuilder(\OxidProfessionalServices\ArvatoAfterPayModule\Core\RefundService::class)
                ->setConstructorArgs([$oxOrder, $AfterpayOrder])
                ->setMethods(['_executeRequestFromVatSplittedRefundFields', '_parseResponse'])
                ->getMock();
        $sut
            ->expects($this->once())
            ->method('_executeRequestFromVatSplittedRefundFields')
            ->will($this->returnValue(123));

        $sut
            ->expects($this->once())
            ->method('_parseResponse')
            ->will($this->returnValue('###OK###'));

        // run
        $this->assertEquals('###OK###', $sut->refund(123, 'SomeApiKey'));
    }

}
