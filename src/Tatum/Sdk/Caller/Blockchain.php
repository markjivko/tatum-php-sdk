<?php

namespace Tatum\Sdk\Caller;

use Tatum\Sdk\Exception\BadMethodCallException;
use Tatum\Sdk\Exception\InvalidArgumentException;
use Tatum\Sdk\Request;
use Tatum\Sdk\Container;

/**
 * Caller:Blockchain
 * 
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://github.com/markjivko/tatum-php-sdk
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 * @throws InvalidArgumentException
 */
class Blockchain {

    /**
     * @throws InvalidArgumentException
     */
    use Container\Caller;

    /**
     * NFT requests
     * 
     * @return Request\Blockchain\Nft
     * @throws BadMethodCallException
     */
    public function nft() {
        return new Request\Blockchain\Nft($this->_sdk);
    }

}

/*EOF*/