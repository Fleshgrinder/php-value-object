<?php
/**
 * @author Richard Fussenegger <fleshgrinder@users.noreply.github.com>
 * @copyright 2015 Richard Fussenegger
 * @license MIT
 */

namespace Fleshgrinder\Core;

/**
 * Defines the single value object dummy class.
 *
 * Implements the simples possible implementation that is thinkable for testing the abstract base class.
 */
final class SingleValueObjectDummy extends SingleValueObject {

    /**
     * The scalar identifying value of this dummy that will be used for all operations.
     *
     * @var mixed
     */
    private $value;

    /**
     * Construct new value object dummy instance.
     *
     * @param mixed $value
     *     The scalar identifying value that should be used for this dummy.
     */
    public function __construct($value) {
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    protected function setValue($value) {
        $this->value = $value;

        return $this;
    }

}
