<?php
namespace Tatum\Sdk\Request\Blockchain;
use Tatum\Sdk\Request;
use Tatum\Sdk\Payload;

!class_exists('\Tatum\Sdk') && exit();

/**
 * Request:Blockchain:Nft
 * 
 * @see       https://github.com/markjivko/tatum-php-sdk
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://markjivko.com
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
class Nft extends Request {
    
    /**
     * Deploy an NFT smart contract
     * 
     * @tatum-credit 100 for FLOW, 2 otherwise
     * @param \Tatum\Sdk\Payload\Blockchain\Nft\Deploy $payload Payload
     * @throws \Exception
     * @return string Transaction ID
     */
    public function deploy(Payload\Blockchain\Nft\Deploy $payload) {
        return $this->_run($payload);
    }
    
}

/*EOF*/