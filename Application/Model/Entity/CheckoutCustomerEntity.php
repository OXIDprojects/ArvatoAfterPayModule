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
 * Class arvatoAfterpayCustomerEntity: Entitiy for customer Data.
 */
class CheckoutCustomerEntity extends \OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity
{
    /**
     * Constants for customer category property.
     */
    public const CUSTOMER_CATEGORY_COMPANY = 'Company';
    public const CUSTOMER_CATEGORY_PERSON = 'Person';

    /**
     * Constants for salutation property.
     */
    public const SALUTATION_MR = 'Mr';
    public const SALUTATION_MRS = 'Mrs';
    public const SALUTATION_MISS = 'Miss';

    /**
     * Getter for salutation property.
     *
     * @return string
     */
    public function getSalutation()
    {
        return $this->_getData('salutation');
    }

    /**
     * Setter for salutation property.
     *
     * @param string $salutation
     */
    public function setSalutation($salutation)
    {
        $this->_setData('salutation', $salutation);
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
     * Getter for email property.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->_getData('email');
    }

    /**
     * Setter for email property.
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->_setData('email', $email);
    }

    /**
     * Getter for customer category property.
     *
     * @return string
     */
    public function getCustomerCategory()
    {
        return $this->_getData('customerCategory');
    }

    /**
     * Setter for customer category property.
     *
     * @param string $customerCategory
     */
    public function setCustomerCategory($customerCategory)
    {
        $this->_setData('customerCategory', $customerCategory);
    }

    /**
     * Getter for address property.
     *
     * @return AddressEntity
     */
    public function getAddress()
    {
        return $this->_getData('address');
    }

    /**
     * Setter for address property.
     *
     * @param AddressEntity $address
     */
    public function setAddress(AddressEntity $address)
    {
        $this->_setData('address', $address);
    }

    /**
     * Getter for conversation language property.
     *
     * @return string
     */
    public function getConversationLanguage()
    {
        return $this->_getData('conversationLanguage');
    }

    /**
     * Setter for conversation language property.
     *
     * @param string $conversationLanguage
     */
    public function setConversationLanguage($conversationLanguage)
    {
        $this->_setData('conversationLanguage', $conversationLanguage);
    }

    /**
     * Getter for identification number property.
     *
     * @return string
     */
    public function getIdentificationNumber()
    {
        return $this->_getData('identificationNumber');
    }

    /**
     * Setter for identification number property.
     *
     * @param string $identificationNumber
     */
    public function setIdentificationNumber($identificationNumber)
    {
        $this->_setData('identificationNumber', $identificationNumber);
    }

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
     * Getter for phone property.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->_getData('phone');
    }

    /**
     * Setter for phone property.
     *
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->_setData('phone', $phone);
    }

    /**
     * Getter for mobile phone property.
     *
     * @return string
     */
    public function getMobilePhone()
    {
        return $this->_getData('mobilePhone');
    }

    /**
     * Setter for mobile phone property.
     *
     * @param string $mobilePhone
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->_setData('mobilePhone', $mobilePhone);
    }

    /**
     * Getter for birth date property.
     *
     * @return string
     */
    public function getBirthDate()
    {
        return $this->_getData('birthDate');
    }

    /**
     * Setter for birth date property.
     *
     * @param string $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->_setData('birthDate', $birthDate);
    }
}
