<?php
/**
 * @author Richard Fussenegger <fleshgrinder@users.noreply.github.com>
 * @copyright 2015 Richard Fussenegger
 * @license MIT
 */

namespace Fleshgrinder\Core;

/**
 * Defines the abstract single value object class.
 *
 * Base class for to build domain specific single valued value objects.
 */
abstract class SingleValueObject implements ValueObject, Stringable {


    // ----------------------------------------------------------------------------------------------------------------- Abstract Methods


    /**
     * Get the value object's identifying value.
     *
     * This method must return a single scalar value that uniquely identifies this value object.
     *
     * @return mixed
     */
    abstract public function getValue();

    /**
     * Set the value object's identifying value.
     *
     * Value objects might require complicated rules to seed themselves from their uniquely identifying single scalar
     * value and this method may do so.
     *
     * @see ValueObject::unserialize()
     * @param string $value
     *     Value as string to set.
     * @return $this
     */
    abstract protected function setValue($value);


    // ----------------------------------------------------------------------------------------------------------------- Magic Methods


    /**
     * @inheritDoc
     */
    public function __toString() {
        return (string) $this->getValue();
    }


    // ----------------------------------------------------------------------------------------------------------------- Public Methods


    /**
     * @inheritDoc
     */
    public function equals($value) {
        if ($value instanceof $this) {
            return $value->getValue() === $this->getValue();
        }

        return $value === $this->getValue();
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize() {
        return $this->getValue();
    }

    /**
     * @inheritDoc
     */
    public function serialize() {
        return serialize($this->getValue());
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized) {
        $this->setValue(unserialize($serialized));
    }

}
