<?php

namespace Tatum\Sdk\Container;

use Tatum\Sdk\Exception\InvalidArgumentException;

/**
 * Caller Traits
 * 
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://github.com/markjivko/tatum-php-sdk
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 * @throws InvalidArgumentException
 */
trait Caller {

    /**
     * SDK reference
     * 
     * @var \Tatum\Sdk
     */
    protected $_sdk;

    /**
     * Request caller
     * 
     * @param \Tatum\Sdk $sdk
     * @throws InvalidArgumentException
     */
    final public function __construct(\Tatum\Sdk $sdk) {
        if (!$sdk instanceof \Tatum\Sdk) {
            throw new InvalidArgumentException('Invalid SDK instance');
        }

        $this->_sdk = $sdk;
    }

}

/*EOF*/