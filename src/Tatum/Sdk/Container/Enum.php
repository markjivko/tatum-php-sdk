<?php

namespace Tatum\Sdk\Container;

use Tatum\Sdk\Exception\InvalidArgumentException;

/**
 * Enumerator
 * 
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://github.com/markjivko/tatum-php-sdk
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
abstract class Enum {

    /**
     * Cache for enumerator constants
     * 
     * @var array
     */
    private static $_values = [];

    /**
     * Enumerator instances
     * 
     * @var static[]
     */
    private static $_instances = null;

    /**
     * Enumerator value
     * 
     * @var mixed
     */
    private $_value;

    /**
     * Enumerator key
     * 
     * @var string
     */
    private $_key;

    /**
     * Prepare a static call
     * 
     * @param string $name      Method name
     * @param array  $arguments Method arguments
     * @return static
     * @throws Exception
     */
    final public static function __callStatic($name, $arguments) {
        // Cache constants
        if (!isset(self::$_values[static::class])) {
            self::$_values[static::class] = (new \ReflectionClass(static::class))->getConstants();
        }

        // Validate the key
        if (!array_key_exists($name, self::$_values[static::class])) {
            throw new InvalidArgumentException('No enum constant "' . $name . '" in ' . static::class);
        }

        // Cache objects
        if (!isset(self::$_instances[static::class])) {
            self::$_instances[static::class] = [];
        }
        if (!isset(self::$_instances[static::class][$name])) {
            self::$_instances[static::class][$name] = new static($name);
        }

        return self::$_instances[static::class][$name];
    }

    /**
     * Enumerator constructor
     * 
     * @param string $key
     */
    final protected function __construct($key) {
        $this->_key = $key;
        $this->_value = self::$_values[static::class][$key];
    }

    /**
     * String typecasting
     * 
     * @return string
     */
    final public function __toString() {
        return "{$this->_value}";
    }

    /**
     * Get enumerator key
     * 
     * @return string
     */
    final public function getKey() {
        return $this->_key;
    }

    /**
     * Get enumerator value
     * 
     * @return mixed
     */
    final public function getValue() {
        return $this->_value;
    }

}

/*EOF*/