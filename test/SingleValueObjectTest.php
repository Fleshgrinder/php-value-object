<?php
/**
 * @author Richard Fussenegger <fleshgrinder@users.noreply.github.com>
 * @copyright 2015 Richard Fussenegger
 * @license MIT
 */

namespace Fleshgrinder\Core;

use PHPUnit_Framework_TestCase;
use ReflectionClass;

/**
 * @coversDefaultClass \Fleshgrinder\Core\SingleValueObject
 * @usesDefaultClass \Fleshgrinder\Core\SingleValueObject
 */
class SingleValueObjectTest extends PHPUnit_Framework_TestCase {

    /**
     * Provides all fully qualified interface names that the CUT should implement.
     *
     * @return array
     */
    public function dataProviderImplementsInterface() {
        return [
            'Equalable'         => [ '\Fleshgrinder\Core\Equalable' ],
            'JSON Serializable' => [ '\JsonSerializable' ],
            'Serializable'      => [ '\Serializable' ],
            'Stringable'        => [ '\Fleshgrinder\Core\Stringable' ],
        ];
    }

    /**
     * @coversNothing
     * @dataProvider dataProviderImplementsInterface
     * @param string $fqin Fully qualified interface name.
     */
    public function testClassImplementsInterface($fqin) {
        $this->assertTrue((new ReflectionClass($this->getInstance()))->implementsInterface($fqin));
    }

    /**
     * @coversNothing
     */
    public function testTwoEqualSignComparisonIsTrueForSimpleSingleValueObject() {
        $this->assertTrue($this->getInstance() == $this->getInstance());
    }

    /**
     * @coversNothing
     */
    public function testThreeEqualSignComparisonIsFalse() {
        $this->assertFalse($this->getInstance() === $this->getInstance());
    }

    /**
     * @covers ::__toString
     */
    public function testToStringReturnsValueFromProtectedValueProperty() {
        $this->assertEquals($this->getDefaultValue(), $this->getInstance()->__toString());
    }

    /**
     * @covers ::equals
     */
    public function testEqualsReturnsTrueForSameInstanceAndValue() {
        $this->assertTrue($this->getInstance()->equals($this->getInstance()));
    }

    /**
     * @covers ::equals
     */
    public function testEqualsReturnsTrueForSameScalarValue() {
        $this->assertTrue($this->getInstance()->equals($this->getDefaultValue()));
    }

    /**
     * @covers ::equals
     */
    public function testEqualsReturnsFalseForDifferentInstance() {
        $this->assertFalse($this->getInstance()->equals((object) []));
    }

    /**
     * @covers ::equals
     */
    public function testEqualsReturnsFalseForSameInstanceButDifferentValue() {
        $this->assertFalse($this->getInstance()->equals($this->getInstance($this->getDefaultUnequalValue())));
    }

    /**
     * @covers ::equals
     */
    public function testEqualsReturnsFalseForDifferentScalarValue() {
        $this->assertFalse($this->getInstance()->equals($this->getDefaultUnequalValue()));
    }

    /**
     * @covers ::jsonSerialize
     */
    public function testJsonSerialize() {
        $this->assertEquals(json_encode($this->getDefaultValue()), json_encode($this->getInstance()));
    }

    /**
     * @covers ::jsonSerialize
     */
    public function testJsonSerializeReturnsValue() {
        $this->assertEquals($this->getDefaultValue(), $this->getInstance()->jsonSerialize());
    }

    /**
     * @covers ::serialize
     * @covers ::unserialize
     */
    public function testSerialize() {
        $cut = $this->getInstance();
        $this->assertEquals($cut, unserialize(serialize($cut)));
    }

    /**
     * @covers ::serialize
     * @covers ::unserialize
     */
    public function testUnserializeCallsSetValue() {
        $this->assertEquals($this->getDefaultValue(), unserialize(serialize($this->getInstance()))->getValue());
    }

    /**
     * Can be overwritten by extending test cases to provide a different class.
     *
     * @param mixed $value [optional]
     *     The value to construct the instance with.
     * @return SingleValueObjectDummy
     */
    protected function getInstance($value = null) {
        if ($value === null) {
            $value = $this->getDefaultValue();
        }
        return new SingleValueObjectDummy($value);
    }

    /**
     * Can be overwritten by extending test cases to provide custom default value.
     *
     * @return mixed
     */
    protected function getDefaultValue() {
        return 'Domain-Drive Design';
    }

    /**
     * Can be overwritten by extending test cases to provide custom unequal value.
     *
     * @return mixed
     */
    protected function getDefaultUnequalValue() {
        return 'TDD';
    }

}
