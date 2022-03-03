<?php
namespace Tatum\Sdk;
use Tatum\Sdk\Containers;
use Tatum\Sdk\Request;

/**
 * Caller
 * 
 * @see       https://github.com/markjivko/tatum-php-sdk
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://markjivko.com
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
class Caller {
    
    use Containers\Caller;
    
    /**
     * IPFS requests
     * 
     * @return \Tatum\Sdk\Request\Ipfs
     */
    public function ipfs() {
        return new Request\Ipfs($this->_sdk);
    }
    
    /**
     * Blockchain
     * 
     * @return \Tatum\Sdk\Caller\Bockchain
     */
    public function blockchain() {
        return new Caller\Bockchain($this->_sdk);
    }
}

/*EOF*/