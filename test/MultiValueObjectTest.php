<?php
/**
 * @author Richard Fussenegger <fleshgrinder@users.noreply.github.com>
 * @copyright 2015 Richard Fussenegger
 * @license MIT
 */

namespace Fleshgrinder\Core;

use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass \Fleshgrinder\Core\MultiValueObject
 * @usesDefaultClass \Fleshgrinder\Core\MultiValueObject
 */
class MultiValueObjectTest extends PHPUnit_Framework_TestCase {

    /**
     * Fully qualified class under test name.
     *
     * @var string
     */
    const FQCUTN = '\Fleshgrinder\Core\MultiValueObject';

    /**
     * @covers ::equals
     */
    public function testEqualsCallsActuallyEqualsForSameInstance() {
        $mock = $this->getMockForAbstractClass(static::FQCUTN);
        $mock->expects($this->once())->method('actuallyEquals')->with($mock)->willReturn(true);
        $mock->equals($mock);
    }

    /**
     * @covers ::equals
     */
    public function testEqualsDoesNotCallActuallyEqualsForDifferentInstance() {
        $mock = $this->getMockForAbstractClass(static::FQCUTN);
        $mock->expects($this->never())->method('actuallyEquals');
        $mock->equals($this->prophesize('\Fleshgrinder\Core\ValueObject')->reveal());
    }

    /**
     * @covers ::equals
     */
    public function testEqualsReturnsFalseForDifferentInstance() {
        $this->assertFalse($this->getMockForAbstractClass(static::FQCUTN)->equals(
            $this->prophesize('\Fleshgrinder\Core\ValueObject')->reveal()
        ));
    }

}
