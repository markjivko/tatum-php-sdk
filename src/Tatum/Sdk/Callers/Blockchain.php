<?php
namespace Tatum\Sdk\Callers;
use Tatum\Sdk\Request;
use Tatum\Sdk\Containers;

/**
 * Caller:Blockchain
 * 
 * @see       https://github.com/markjivko/tatum-php-sdk
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://markjivko.com
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
class Blockchain {
    
    use Containers\Caller;
    
    /**
     * NFT requests
     * 
     * @return \Tatum\Sdk\Request\Blockchain\Nft
     */
    public function nft() {
        return new Request\Blockchain\Nft($this->_sdk);
    }

}

/*EOF*/