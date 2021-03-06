<?php

namespace Tatum\Sdk;

use Tatum\Sdk\Exception\BadMethodCallException;
use Tatum\Sdk\Exception\InvalidArgumentException;

/**
 * Caller
 * 
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://github.com/markjivko/tatum-php-sdk
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 * @throws InvalidArgumentException
 */
class Caller {

    /**
     * @throws InvalidArgumentException
     */
    use Container\Caller;

    /**
     * IPFS requests
     * 
     * @return Request\Ipfs
     * @throws BadMethodCallException
     */
    public function ipfs() {
        return new Request\Ipfs($this->_sdk);
    }

    /**
     * Blockchain
     * 
     * @return Caller\Blockchain
     * @throws InvalidArgumentException
     */
    public function blockchain() {
        return new Caller\Blockchain($this->_sdk);
    }

}

/*EOF*/