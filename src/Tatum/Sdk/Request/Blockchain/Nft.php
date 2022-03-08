<?php

namespace Tatum\Sdk\Request\Blockchain;

use Tatum\Sdk\Exception\BadMethodCallException;
use Tatum\Sdk\Exception\RuntimeException;
use Tatum\Sdk\Exception\RemoteException;
use Tatum\Sdk\Container\Request;
use Tatum\Sdk\Payload;

!class_exists('\Tatum\Sdk') && exit();

/**
 * Request:Blockchain:Nft
 * 
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://github.com/markjivko/tatum-php-sdk
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 * @throws BadMethodCallException
 */
class Nft extends Request {
    
    /**
     * Deploy an NFT smart contract
     * 
     * @tatum-credit 100 for FLOW, 2 otherwise
     * @param Payload\Blockchain\Nft\Deploy $payload Payload
     * @throws RuntimeException
     * @throws RemoteException
     * @return string Transaction ID
     */
    public function deploy(Payload\Blockchain\Nft\Deploy $payload) {
        $response = $this->_call($payload);
        
        if (!is_array($response) || !isset($response[self::RESPONSE_TXID])) {
            throw new RemoteException('Transaction ID not provided');
        }
        
        return $response[self::RESPONSE_TXID];
    }
    
    /**
     * Quickly mint an NFT using one of the prepared smart contracts
     * 
     * @tatum-credit 100 for FLOW, 2 otherwise
     * @param Payload\Blockchain\Nft\MintExpress $payload Payload
     * @throws RuntimeException
     * @throws RemoteException
     * @return string Transaction ID
     */
    public function mintExpress(Payload\Blockchain\Nft\MintExpress $payload) {
        $response = $this->_call($payload);
        
        if (!is_array($response) || !isset($response[self::RESPONSE_TXID])) {
            throw new RemoteException('Transaction ID not provided');
        }
        
        return $response[self::RESPONSE_TXID];
    }

}

/*EOF*/