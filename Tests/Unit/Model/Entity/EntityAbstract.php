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

namespace OxidProfessionalServices\ArvatoAfterpayModule\Tests\Unit\Model\Entity;

/**
 * Class EntityTest: Base class for the entity tests.
 */
abstract class EntityAbstract extends \OxidEsales\TestingLibrary\UnitTestCase
{
    /**
     * Tests the setter andd getter methods for consistency.
     *
     * @param Entity $testObject
     * @param mixed[] $testData
     */
    protected function _testGetSet(\OxidProfessionalServices\ArvatoAfterpayModule\Application\Model\Entity\Entity $testObject, $testData)
    {
        foreach ($testData as $key => $value)
        {
            $setter = $this->_getSetterName($key);
            $testObject->$setter($value);
        }

        foreach ($testData as $key => $value)
        {
            $getter = $this->_getGetterName($key);
            if (is_object($value)) {
                $this->assertSame(
                    $value,
                    $testObject->$getter(),
                    $key . ' not equal'
                );
            } else {
                $this->assertEquals(
                    $value,
                    $testObject->$getter(),
                    $key . ' not equal'
                );
            }
        }
    }

    /**
     * Returns the name of the setter method of a property.
     *
     * @param string $property
     * @return string
     */
    protected function _getSetterName($property)
    {
        return 'set' . ucfirst($property);
    }

    /**
     * Returns the name of the getter method of a property.
     *
     * @param string $property
     * @return string
     */
    protected function _getGetterName($property)
    {
        return 'get' . ucfirst($property);
    }
}