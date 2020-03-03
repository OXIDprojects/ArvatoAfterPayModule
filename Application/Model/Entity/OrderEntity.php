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

namespace OxidProfessionalServices\ArvatoAfterPayModule\Application\Model\Entity;

/**
 * Class OrderEntity: Entity for order data.
 */
class OrderEntity extends \OxidProfessionalServices\ArvatoAfterPayModule\Application\Model\Entity\Entity
{
    /**
     * Constants for currency property.
     */
    const CURRENCY_EUR = 'EUR';
    const CURRENCY_NOK = 'NOK';
    const CURRENCY_SEK = 'SEK';
    const CURRENCY_DKK = 'DKK';
    const CURRENCY_CHF = 'CHF';

    /**
     * Getter for order number property.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->_getData('number');
    }

    /**
     * Setter for order number property.
     *
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->_setData('number', $number);
    }

    /**
     * Getter for total gross amount property.
     *
     * @return float
     */
    public function getTotalGrossAmount()
    {
        return $this->_getData('totalGrossAmount');
    }

    /**
     * Setter for total gross amount property.
     *
     * @param float $totalGrossAmount
     */
    public function setTotalGrossAmount($totalGrossAmount)
    {
        $this->_setData('totalGrossAmount', $totalGrossAmount);
    }

    /**
     * Getter for currency property.
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->_getData('currency');
    }

    /**
     * Setter for currency property.
     *
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->_setData('currency', $currency);
    }

    /**
     * Getter for items property.
     *
     * @return OrderItemEntity[]
     */
    public function getItems()
    {
        return $this->_getData('items');
    }

    /**
     * Setter for items property.
     *
     * @param OrderItemEntity[] $items
     */
    public function setItems($items)
    {
        $this->_setData('items', $items);
    }

    /**
     * Getter for total net amount property.
     *
     * @return float
     */
    public function getTotalNetAmount()
    {
        return $this->_getData('totalNetAmount');
    }

    /**
     * Setter for total net amount property.
     *
     * @param float $totalNetAmount
     */
    public function setTotalNetAmount($totalNetAmount)
    {
        $this->_setData('totalNetAmount', $totalNetAmount);
    }

    /**
     * Getter for image url property.
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->_getData('imageUrl');
    }

    /**
     * Setter for image url property.
     *
     * @param string $imageUrl
     */
    public function setImageUrl($imageUrl)
    {
        $this->_setData('imageUrl', $imageUrl);
    }

    /**
     * Getter for google analytics user id property.
     *
     * @return string
     */
    public function getGoogleAnalyticsUserId()
    {
        return $this->_getData('googleAnalyticsUserId');
    }

    /**
     * Setter for google analytics user id property.
     *
     * @param string $googleAnalyticsUserId
     */
    public function setGoogleAnalyticsUserId($googleAnalyticsUserId)
    {
        $this->_setData('googleAnalyticsUserId', $googleAnalyticsUserId);
    }

    /**
     * Getter for google analytics client id property.
     *
     * @return string
     */
    public function getGoogleAnalyticsClientId()
    {
        return $this->_getData('googleAnalyticsClientId');
    }

    /**
     * Setter for google analytics client id property.
     *
     * @param string $googleAnalyticsClientId
     */
    public function setGoogleAnalyticsClientId($googleAnalyticsClientId)
    {
        $this->_setData('googleAnalyticsClientId', $googleAnalyticsClientId);
    }

    /**
     * Getter for discount amount property.
     *
     * @return float
     */
    public function getDiscountAmount()
    {
        return $this->_getData('discountAmount');
    }

    /**
     * Setter for discount amount property.
     *
     * @param float $discountAmount
     */
    public function setDiscountAmount($discountAmount)
    {
        $this->_setData('discountAmount', $discountAmount);
    }

}