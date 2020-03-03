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
 * Cert. Manual p.21: Classes that are pure data containers don’t include any logic
 * (only getters and setters), can be excluded from test coverage:
 * @codeCoverageIgnore
 */
class CustomerResponseEntity extends \OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity
{
    /**
     * Getter for customer number property.
     *
     * @return string
     */
    public function getCustomerNumber()
    {
        return $this->_getData('customerNumber');
    }

    /**
     * Setter for customer number property.
     *
     * @param string $customerNumber
     */
    public function setCustomerNumber($customerNumber)
    {
        $this->_setData('customerNumber', $customerNumber);
    }

    /**
     * Getter for first name property.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->_getData('firstName');
    }

    /**
     * Setter for first name property.
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->_setData('firstName', $firstName);
    }

    /**
     * Getter for last name property.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->_getData('lastName');
    }

    /**
     * Setter for last name property.
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->_setData('lastName', $lastName);
    }

    /**
     * Getter for address list property.
     *
     * @return AddressEntity[]
     */
    public function getAddressList()
    {
        return $this->_getData('addressList');
    }

    /**
     * Setter for address list property.
     *
     * @param AddressEntity[] $addressList
     */
    public function setAddressList($addressList)
    {
        $this->_setData('addressList', $addressList);
    }

    /**
     * Adds an address.
     *
     * @param AddressEntity $address
     */
    public function addAddress(AddressEntity $address)
    {
        $this->_addItem('addressList', $address);
    }

    /**
     * Removes an address.
     *
     * @param integer $index
     */
    public function removeAddress($index)
    {
        $this->_addItem('addressList', $index);
    }
}