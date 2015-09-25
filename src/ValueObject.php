<?php
/**
 * @author Richard Fussenegger <fleshgrinder@users.noreply.github.com>
 * @copyright 2015 Richard Fussenegger
 * @license MIT
 */

namespace Fleshgrinder\Core;

use JsonSerializable;
use Serializable;

/**
 * Defines the value object head interface.
 */
interface ValueObject extends Equalable, JsonSerializable, Serializable {

    // Intentionally left blank.

}
