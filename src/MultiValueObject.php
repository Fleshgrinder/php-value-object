<?php
/**
 * @author Richard Fussenegger <fleshgrinder@users.noreply.github.com>
 * @copyright 2015 Richard Fussenegger
 * @license MIT
 */

namespace Fleshgrinder\Core;

/**
 * Defines the abstract multi value object class.
 *
 * Base class for to build domain specific multi valued value objects.
 */
abstract class MultiValueObject implements ValueObject {

    /**
     * @inheritDoc
     */
    public function equals($value) {
        if ($value instanceof $this) {
            return $this->actuallyEquals($value);
        }

        return false;
    }

    /**
     * Check if this object actually equals the other.
     *
     * @param static $other
     *     Other object to check for equality, guarenteed to be of the same instance.
     * @return boolean
     *     `TRUE` if both objects are equal, `FALSE` otherwise.
     */
    abstract protected function actuallyEquals($other);

}
