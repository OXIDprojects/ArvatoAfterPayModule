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
 * Class AuthorizePaymentEntity: Entity for authorize payment call.
 */
class AuthorizePaymentEntity extends \OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity
{
    /**
     * Getter for payment property.
     *
     * @return PaymentEntity
     */
    public function getPayment()
    {
        return $this->_getData('payment');
    }

    /**
     * Setter for payment property.
     *
     * @param PaymentEntity $payment
     */
    public function setPayment(PaymentEntity $payment)
    {
        $this->_setData('payment', $payment);
    }

    /**
     * Getter for checkout id property.
     *
     * @return string
     */
    public function getCheckoutId()
    {
        return $this->_getData('checkoutId');
    }

    /**
     * Setter for checkout id property.
     *
     * @param string $checkoutId
     */
    public function setCheckoutId($checkoutId)
    {
        $this->_setData('checkoutId', $checkoutId);
    }

    /**
     * Getter for merchant id property.
     *
     * @return string
     */
    public function getMerchantId()
    {
        return $this->_getData('merchantId');
    }

    /**
     * Setter for merchant id property.
     *
     * @param string $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->_setData('merchantId', $merchantId);
    }

    /**
     * Getter for customer property.
     *
     * @return CheckoutCustomerEntity
     */
    public function getCustomer()
    {
        return $this->_getData('customer');
    }

    /**
     * Setter for customer property.
     *
     * @param CheckoutCustomerEntity $customer
     */
    public function setCustomer(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\CheckoutCustomerEntity $customer)
    {
        $this->_setData('customer', $customer);
    }

    /**
     * Getter for delivery customer property.
     *
     * @return CheckoutCustomerEntity
     */
    public function getDeliveryCustomer()
    {
        return $this->_getData('deliveryCustomer');
    }

    /**
     * Setter for delivery customer property.
     *
     * @param CheckoutCustomerEntity $deliveryCustomer
     */
    public function setDeliveryCustomer(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\CheckoutCustomerEntity $deliveryCustomer)
    {
        $this->_setData('deliveryCustomer', $deliveryCustomer);
    }

    /**
     * Getter for order property.
     *
     * @return OrderEntity
     */
    public function getOrder()
    {
        return $this->_getData('order');
    }

    /**
     * Setter for order property.
     *
     * @param OrderEntity $order
     */
    public function setOrder(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\OrderEntity $order)
    {
        $this->_setData('order', $order);
    }

    /**
     * Getter for parent transaction property.
     *
     * @return string
     */
    public function getParentTransactionReference()
    {
        return $this->_getData('parentTransactionReference');
    }

    /**
     * Setter for parent transaction property.
     *
     * @param string $parentTransactionReference
     */
    public function setParentTransactionReference($parentTransactionReference)
    {
        $this->_setData('parentTransactionReference', $parentTransactionReference);
    }
}
