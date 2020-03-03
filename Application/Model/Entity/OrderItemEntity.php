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
 * Class OrderItemEntity: Entity for order item data.
 */
class OrderItemEntity extends \OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity
{
    /**
     * Constants for vat category property.
     */
    const VAT_CATEGORY_HIGH = 'HighCategory';
    const VAT_CATEGORY_LOW = 'LowCategory';
    const VAT_CATEGORY_NULL = 'NullCategory';
    const VAT_CATEGORY_NO = 'NoCategory';
    const VAT_CATEGORY_MIDDLE = 'MiddleCategory';
    const VAT_CATEGORY_OTHER = 'OtherCategory';

    /**
     * Getter for product id property.
     *
     * @return string
     */
    public function getProductId()
    {
        return $this->_getData('productId');
    }

    /**
     * Setter for product id property.
     *
     * @param string $productId
     */
    public function setProductId($productId)
    {
        $this->_setData('productId', $productId);
    }

    /**
     * Getter for description property.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->_getData('description');
    }

    /**
     * Setter for description property.
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->_setData('description', $description);
    }

    /**
     * Getter for gross unit price property.
     *
     * @return float
     */
    public function getGrossUnitPrice()
    {
        return $this->_getData('grossUnitPrice');
    }

    /**
     * Setter for gross unit price property.
     *
     * @param float $grossUnitPrice
     */
    public function setGrossUnitPrice($grossUnitPrice)
    {
        $this->_setData('grossUnitPrice', $grossUnitPrice);
    }

    /**
     * Getter for quantity property.
     *
     * @return float
     */
    public function getQuantity()
    {
        return $this->_getData('quantity');
    }

    /**
     * Setter for quantity property.
     *
     * @param float $quantity
     */
    public function setQuantity($quantity)
    {
        $this->_setData('quantity', $quantity);
    }

    /**
     * Getter for group id property.
     *
     * @return string
     */
    public function getGroupId()
    {
        return $this->_getData('groupId');
    }

    /**
     * Setter for group id property.
     *
     * @param string $groupId
     */
    public function setGroupId($groupId)
    {
        $this->_setData('groupId', $groupId);
    }

    /**
     * Getter for net unit price property.
     *
     * @return float
     */
    public function getNetUnitPrice()
    {
        return $this->_getData('netUnitPrice');
    }

    /**
     * Setter for net unit price property.
     *
     * @param float $netUnitPrice
     */
    public function setNetUnitPrice($netUnitPrice)
    {
        $this->_setData('netUnitPrice', $netUnitPrice);
    }

    /**
     * Getter for unit code property.
     *
     * @return string
     */
    public function getUnitCode()
    {
        return $this->_getData('unitCode');
    }

    /**
     * Setter for unit code property.
     *
     * @param string $unitCode
     */
    public function setUnitCode($unitCode)
    {
        $this->_setData('unitCode', $unitCode);
    }

    /**
     * Getter for vat category property.
     *
     * @return string
     */
    public function getVatCategory()
    {
        return $this->_getData('vatCategory');
    }

    /**
     * Setter for vat category property.
     *
     * @param string $vatCategory
     */
    public function setVatCategory($vatCategory)
    {
        $this->_setData('vatCategory', $vatCategory);
    }

    /**
     * Getter for vat percent property.
     *
     * @return float
     */
    public function getVatPercent()
    {
        return $this->_getData('vatPercent');
    }

    /**
     * Setter for vat percent property.
     *
     * @param float $vatPercent
     */
    public function setVatPercent($vatPercent)
    {
        $this->_setData('vatPercent', $vatPercent);
    }

    /**
     * Getter for vat amount property.
     *
     * @return float
     */
    public function getVatAmount()
    {
        return $this->_getData('vatAmount');
    }

    /**
     * Setter for vat amount property.
     *
     * @param float $vatAmount
     */
    public function setVatAmount($vatAmount)
    {
        $this->_setData('vatAmount', $vatAmount);
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
     * Getter for google product category id property.
     *
     * @return integer
     */
    public function getGoogleProductCategoryId()
    {
        return $this->_getData('googleProductCategoryId');
    }

    /**
     * Setter for google product category id property.
     *
     * @param integer $googleProductCategoryId
     */
    public function setGoogleProductCategoryId($googleProductCategoryId)
    {
        $this->_setData('googleProductCategoryId', $googleProductCategoryId);
    }

    /**
     * Getter for google product category property.
     *
     * @return string
     */
    public function getGoogleProductCategory()
    {
        return $this->_getData('googleProductCategory');
    }

    /**
     * Setter for google product category property.
     *
     * @param string $googleProductCategory
     */
    public function setGoogleProductCategory($googleProductCategory)
    {
        $this->_setData('googleProductCategory', $googleProductCategory);
    }

    /**
     * Getter for merchant product type property.
     *
     * @return string
     */
    public function getMerchantProductType()
    {
        return $this->_getData('merchantProductType');
    }

    /**
     * Setter for merchant product type property.
     *
     * @param string $merchantProductType
     */
    public function setMerchantProductType($merchantProductType)
    {
        $this->_setData('merchantProductType', $merchantProductType);
    }

    /**
     * Getter for line number id property.
     *
     * @return integer
     */
    public function getLineNumber()
    {
        return $this->_getData('lineNumber');
    }

    /**
     * Setter for line number id property.
     *
     * @param integer $lineNumber
     */
    public function setLineNumber($lineNumber)
    {
        $this->_setData('lineNumber', $lineNumber);
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

    /**
     * Getter for product url property.
     *
     * @return string
     */
    public function getProductUrl()
    {
        return $this->_getData('productUrl');
    }

    /**
     * Setter for product url property.
     *
     * @param string $productUrl
     */
    public function setProductUrl($productUrl)
    {
        $this->_setData('productUrl', $productUrl);
    }

    /**
     * Getter for market place seller id property.
     *
     * @return string
     */
    public function getMarketPlaceSellerId()
    {
        return $this->_getData('marketPlaceSellerId');
    }

    /**
     * Setter for market place seller id property.
     *
     * @param string $marketPlaceSellerId
     */
    public function setMarketPlaceSellerId($marketPlaceSellerId)
    {
        $this->_setData('marketPlaceSellerId', $marketPlaceSellerId);
    }
}