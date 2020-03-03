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

namespace OxidProfessionalServices\ArvatoAfterpayModule\Tests\Unit\Core;

use \OxidEsales\Eshop\Core\Registry;

/**
 * Class CaptureServiceTest: Tests for CaptureService.
 */
class AvailablePaymentMethodsServiceTest extends \OxidEsales\TestingLibrary\UnitTestCase
{

    public function test__construct()
    {
        $order = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
        $sut = oxNew(\OxidProfessionalServices\ArvatoAfterpayModule\Core\AvailablePaymentMethodsService::class, Registry::getSession(), Registry::getLang(), $order);
        $this->assertInstanceOf(\OxidProfessionalServices\ArvatoAfterpayModule\Core\AvailablePaymentMethodsService::class, $sut);
    }

    public function testgetAvailablePaymentMethods()
    {
        $order = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
        $sut =
            $this
                ->getMockBuilder(\OxidProfessionalServices\ArvatoAfterpayModule\Core\AvailablePaymentMethodsService::class)
                ->setConstructorArgs([Registry::getSession(), Registry::getLang(), $order])
                ->setMethods(['executeRequestFromSessionData', '_parseResponse'])
                ->getMock();

        $entity = oxNew(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity::class);
        $entity->setPaymentMethods('LoremIpsum');

        $sut->method('_parseResponse')->willReturn($entity);
        $this->assertEquals('LoremIpsum', $sut->getAvailablePaymentMethods());
        // Caching:
        $this->assertEquals('LoremIpsum', $sut->getAvailablePaymentMethods());
    }

    public function testisInvoiceAvailable_false()
    {
        $order = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
        $sut =
            $this
                ->getMockBuilder(\OxidProfessionalServices\ArvatoAfterpayModule\Core\AvailablePaymentMethodsService::class)
                ->setConstructorArgs([Registry::getSession(), Registry::getLang(), $order])
                ->setMethods(['executeRequestFromSessionData', '_parseResponse'])
                ->getMock();

        $entity = oxNew(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity::class);
        $entity->setPaymentMethods('LoremIpsum');

        $sut->method('_parseResponse')->willReturn($entity);
        $this->assertFalse($sut->isInvoiceAvailable());
    }

    public function testisInvoiceAvailable_true()
    {
        $order = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
        $sut =
            $this
                ->getMockBuilder(\OxidProfessionalServices\ArvatoAfterpayModule\Core\AvailablePaymentMethodsService::class)
                ->setConstructorArgs([Registry::getSession(), Registry::getLang(), $order])
                ->setMethods(['executeRequestFromSessionData', '_parseResponse'])
                ->getMock();

        $entity = oxNew(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity::class);
        $paymentMethod = new \stdClass();
        $paymentMethod->type = 'Invoice';
        $entity->setPaymentMethods([$paymentMethod]);

        $sut->method('_parseResponse')->willReturn($entity);
        $this->assertTrue($sut->isInvoiceAvailable());
    }

    public function testisSpecificInstallmentAvailable_false()
    {
        $order = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
        $sut =
            $this
                ->getMockBuilder(\OxidProfessionalServices\ArvatoAfterpayModule\Core\AvailablePaymentMethodsService::class)
                ->setConstructorArgs([Registry::getSession(), Registry::getLang(), $order])
                ->setMethods(['executeRequestFromSessionData', '_parseResponse'])
                ->getMock();

        $entity = oxNew(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity::class);
        $paymentMethod = new \stdClass();
        $paymentMethod->type = 'Invoice';
        $paymentMethod->installmentProfileNumber = 1;
        $entity->setPaymentMethods([$paymentMethod]);

        $sut->method('_parseResponse')->willReturn($entity);
        $this->assertFalse($sut->isSpecificInstallmentAvailable(2));
    }

    public function testisSpecificInstallmentAvailable_noMethodsAtAll()
    {
        $order = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
        $sut =
            $this
                ->getMockBuilder(\OxidProfessionalServices\ArvatoAfterpayModule\Core\AvailablePaymentMethodsService::class)
                ->setConstructorArgs([Registry::getSession(), Registry::getLang(), $order])
                ->setMethods(['executeRequestFromSessionData', '_parseResponse'])
                ->getMock();

        $sut->method('_parseResponse')->willReturn(null);
        $this->assertFalse($sut->isSpecificInstallmentAvailable(2));
    }

    public function testisSpecificInstallmentAvailable_true()
    {
        $order = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
        $sut =
            $this
                ->getMockBuilder(\OxidProfessionalServices\ArvatoAfterpayModule\Core\AvailablePaymentMethodsService::class)
                ->setConstructorArgs([Registry::getSession(), Registry::getLang(), $order])
                ->setMethods(['executeRequestFromSessionData', '_parseResponse'])
                ->getMock();

        $entity = oxNew(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity::class);
        $paymentMethod = new \stdClass();
        $paymentMethod->type = 'Installment';
        $paymentMethod->installment = new \stdClass();
        $paymentMethod->installment->installmentProfileNumber = 2;
        $paymentMethod->installment->numberOfInstallments = 1337;
        $paymentMethod->directDebit = new \stdClass();
        $paymentMethod->directDebit->available = true;
        $entity->setPaymentMethods([$paymentMethod]);

        $sut->method('_parseResponse')->willReturn($entity);
        $this->assertTrue($sut->isSpecificInstallmentAvailable(2));
    }

    public function testisDirectDebitAvailable_false()
    {
        $order = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
        $sut =
            $this
                ->getMockBuilder(\OxidProfessionalServices\ArvatoAfterpayModule\Core\AvailablePaymentMethodsService::class)
                ->setConstructorArgs([Registry::getSession(), Registry::getLang(), $order])
                ->setMethods(['executeRequestFromSessionData', '_parseResponse'])
                ->getMock();

        $entity = oxNew(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity::class);
        $paymentMethod = new \stdClass();
        $entity->setPaymentMethods([$paymentMethod]);

        $sut->method('_parseResponse')->willReturn($entity);
        $this->assertFalse($sut->isDirectDebitAvailable());
    }

    public function testisDirectDebitAvailable_true()
    {
        $order = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
        $sut =
            $this
                ->getMockBuilder(\OxidProfessionalServices\ArvatoAfterpayModule\Core\AvailablePaymentMethodsService::class)
                ->setConstructorArgs([Registry::getSession(), Registry::getLang(), $order])
                ->setMethods(['executeRequestFromSessionData', '_parseResponse'])
                ->getMock();

        $entity = oxNew(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity::class);
        $paymentMethod = new \stdClass();
        $paymentMethod->type = 'Invoice';
        $paymentMethod->directDebit = ['lorem'];
        $entity->setPaymentMethods([$paymentMethod]);

        $sut->method('_parseResponse')->willReturn($entity);
        $this->assertTrue($sut->isDirectDebitAvailable());
    }

    public function testgetNumberOfInstallmentsByProfileId_nonefound()
    {
        $order = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
        $sut =
            $this
                ->getMockBuilder(\OxidProfessionalServices\ArvatoAfterpayModule\Core\AvailablePaymentMethodsService::class)
                ->setConstructorArgs([Registry::getSession(), Registry::getLang(), $order])
                ->setMethods(['executeRequestFromSessionData', '_parseResponse'])
                ->getMock();

        $entity = oxNew(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity::class);
        $paymentMethod = new \stdClass();
        $paymentMethod->type = 'Installment';
        $paymentMethod->installment = new \stdClass();
        $paymentMethod->installment->installmentProfileNumber = 1;
        $paymentMethod->installment->numberOfInstallments = 1337;
        $entity->setPaymentMethods([$paymentMethod]);

        $sut->method('_parseResponse')->willReturn($entity);
        $this->assertNull($sut->getNumberOfInstallmentsByProfileId(1));
    }

    public function testgetNumberOfInstallmentsByProfileId_found()
    {
        $order = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
        $sut =
            $this
                ->getMockBuilder(\OxidProfessionalServices\ArvatoAfterpayModule\Core\AvailablePaymentMethodsService::class)
                ->setConstructorArgs([Registry::getSession(), Registry::getLang(), $order])
                ->setMethods(['executeRequestFromSessionData', '_parseResponse'])
                ->getMock();

        $entity = oxNew(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity::class);
        $paymentMethod = new \stdClass();
        $paymentMethod->type = 'Installment';
        $paymentMethod->installment = new \stdClass();
        $paymentMethod->installment->installmentProfileNumber = 2;
        $paymentMethod->installment->numberOfInstallments = 1337;
        $paymentMethod->directDebit = new \stdClass();
        $paymentMethod->directDebit->available = true;
        $entity->setPaymentMethods([$paymentMethod]);

        $sut->method('_parseResponse')->willReturn($entity);

        $this->assertEquals(1337, $sut->getNumberOfInstallmentsByProfileId(2));
    }

}
