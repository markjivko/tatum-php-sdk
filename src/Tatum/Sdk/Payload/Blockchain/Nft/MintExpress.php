<?php

namespace Tatum\Sdk\Payload\Blockchain\Nft;

use Tatum\Sdk\Exception\InvalidArgumentException;
use Tatum\Sdk\Container\Payload;
use Tatum\Sdk\Enum\Payload\Blockchain\Nft\MintExpress as Enum;

!class_exists('\Tatum\Sdk') && exit();

/**
 * Payload:Blockchain:Nft:MintExpress
 * 
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://github.com/markjivko/tatum-php-sdk
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
class MintExpress extends Payload {

    /**
     * Request path
     */
    const REQUEST_PATH = 'nft/mint';

    /**
     * Data keys
     */
    const DATA_CHAIN = 'chain';
    const DATA_TO    = 'to';
    const DATA_URL   = 'url';

    /**
     * Payload:Blockchain:Nft:MintExpress
     * 
     * @param Enum\Chain $chain Chain to work with
     * @param string     $to    Blockchain address to send the NFT token to; 42 characters long
     * @param string     $url   NFT Metadata URL; less than 256 characters
     * @throws InvalidArgumentException
     */
    public function __construct(Enum\Chain $chain, $to, $url) {
        $this
            ->setChain($chain)
            ->setTo($to)
            ->setUrl($url);
    }

    /**
     * Get the value of the chain
     * 
     * @return string
     */
    public function getChain() {
        return strval($this->_get(self::DATA_CHAIN));
    }

    /**
     * Set chain to work with
     * 
     * @param Enum\Chain $chain
     * @return $this
     */
    public function setChain(Enum\Chain $chain) {
        return $this->_set(self::DATA_CHAIN, $chain->getValue());
    }

    /**
     * Get the blockchain destination address
     * 
     * @return string
     */
    public function getTo() {
        return $this->_get(self::DATA_TO);
    }

    /**
     * Set the blockchain destination address
     * 
     * @param string $address Blockchain address to send the NFT to; 42 characters long
     * @return $this
     * @throws InvalidArgumentException
     */
    public function setTo($address) {
        if (!is_string($address) || 42 !== strlen($address)) {
            throw new InvalidArgumentException('NFT blockchain address must be 42 characters long');
        }

        return $this->_set(self::DATA_TO, $address);
    }

    /**
     * Get the NFT metadata URL
     * 
     * @return string
     */
    public function getUrl() {
        return $this->_get(self::DATA_URL);
    }

    /**
     * Set the NFT metadata URL
     * 
     * @param string $url Symbol of the NFT token; between 1 and 30 characters long
     * @return $this
     * @throws InvalidArgumentException
     */
    public function setUrl($url) {
        if (!is_string($url) || strlen($url) > 256) {
            throw new InvalidArgumentException('NFT metadata URL must be at most 256 characters long');
        }

        return $this->_set(self::DATA_URL, $url);
    }

}

/*EOF*/