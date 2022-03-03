<?php
namespace Tatum\Sdk\Payload\Blockchain\Nft;
use Tatum\Sdk\Containers\Request;
use Tatum\Sdk\Containers\Payload;
use Tatum\Sdk\Enums;

!class_exists('\Tatum\Sdk') && exit();

/**
 * Payload:Blockchain:Nft:Deploy
 * 
 * @see       https://github.com/markjivko/tatum-php-sdk
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://markjivko.com
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
class Deploy extends Payload {
    
    /**
     * Request path
     */
    const REQUEST_PATH = 'nft/deploy';
    
    /**
     * Data keys
     */    
    const DATA_CHAIN             = 'chain';
    const DATA_NAME              = 'name';
    const DATA_SYMBOL            = 'symbol';
    const DATA_FROM_PRIVATE_KEY  = 'fromPrivateKey';
    const DATA_PROVENANCE        = 'provenance';
    const DATA_CASHBACK          = 'cashback';
    const DATA_PUBLIC_MINT       = 'publicMint';
    const DATA_NONCE             = 'nonce';
    const DATA_FEE               = 'fee';
    
    /**
     * Fee properties
     */
    const KEY_FEE_GAS_LIMIT = 'gasLimit';
    const KEY_FEE_GAS_PRICE = 'gasPrice';
    
    /**
     * Payload:Blockchain:Nft:Deploy
     * 
     * @param Enums\ChainDeployNft $chain Chain to work with
     * @throws \Exception
     */
    public function __construct(Enums\ChainDeployNft $chain, $name, $symbol, $fromPrivateKey) {
        $this
            ->setChain($chain)
            ->setName($name)
            ->setSymbol($symbol)
            ->setFromPrivateKey($fromPrivateKey);
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
     * @param Enums\ChainDeployNft $chain
     * @return $this
     */
    public function setChain(Enums\ChainDeployNft $chain) {
        return $this->_set(self::DATA_CHAIN, $chain->getValue());
    }
    
    /**
     * Get the name of the NFT token
     * 
     * @return string
     */
    public function getName() {
        return $this->_get(self::DATA_NAME);
    }
    
    /**
     * Set the name of the NFT token
     * 
     * @param string $name Name of the NFT token; between 1 and 100 characters long
     * @return $this
     * @throws \Exception
     */
    public function setName($name) {
        if (!is_string($name) || strlen($name) < 1 || strlen($name) > 100) {
            throw new \Exception('Name must be between 1 and 100 characters');
        }
        
        return $this->_set(self::DATA_NAME, $name);
    }

    /**
     * Get the symbol of the NFT token
     * 
     * @return string
     */
    public function getSymbol() {
        return $this->_get(self::DATA_SYMBOL);
    }
    
    /**
     * Set the symbol of the NFT token
     * 
     * @param string $symbol Symbol of the NFT token; between 1 and 30 characters long
     * @return $this
     * @throws \Exception
     */
    public function setSymbol($symbol) {
        if (!is_string($symbol) || strlen($symbol) < 1 || strlen($symbol) > 30) {
            throw new \Exception('Symbol must be between 1 and 30 characters');
        }
        
        return $this->_set(self::DATA_SYMBOL, $symbol);
    }
    
    /**
     * Get the private key of the Ethereum account address
     * 
     * @return string Private key of Ethereum account address, from which gas for deployment of ERC721 will be paid. <br/>
     * Private key, or signature Id must be present
     */
    public function getFromPrivateKey() {
        return $this->_get(self::DATA_FROM_PRIVATE_KEY);
    }
    
    /**
     * Set the private key of the Ethereum account address
     * 
     * @param string $fromPrivateKey Private key of Ethereum account address, from which gas for deployment of ERC721 will be paid. <br/>
     * Private key, or signature Id must be present.<br/>
     * Private key length: 64+ characters
     * @return $this
     * @throws \Exception
     */
    public function setFromPrivateKey($fromPrivateKey) {
        if (!is_string($fromPrivateKey) || strlen($fromPrivateKey) < 64 ) {
            throw new \Exception('Private key must be at least 64 characters long');
        }
        
        return $this->_set(self::DATA_FROM_PRIVATE_KEY, $fromPrivateKey);
    }
    
    /**
     * Get provenance; true if the contract is provenance percentage royalty type; default <b>false</b>
     * 
     * @see https://github.com/tatumio/smart-contracts
     * @return boolean
     */
    public function getProvenance() {
        return $this->_get(self::DATA_PROVENANCE) ?? false;
    }
    
    /**
     * Set provenance; true if the contract is provenance percentage royalty type; default <b>false</b>
     * 
     * @see https://github.com/tatumio/smart-contracts
     * @param boolean $provenance Provenance contract
     * @return $this
     */
    public function setProvenance($provenance) {
        return $this->_set(self::DATA_PROVENANCE, !!$provenance);
    }
    
    /**
     * Get cashback; true if the contract is fixed price royalty type; default <b>false</b>
     * 
     * @see https://github.com/tatumio/smart-contracts
     * @return boolean
     */
    public function getCashback() {
        return $this->_get(self::DATA_CASHBACK) ?? false;
    }
    
    /**
     * Set cashback; true if the contract is fixed price royalty type; default <b>false</b>
     * 
     * @see https://github.com/tatumio/smart-contracts
     * @param boolean $cashback Cashback contract
     * @return $this
     */
    public function setCashback($cashback) {
        return $this->_set(self::DATA_CASHBACK, !!$cashback);
    }
    
    /**
     * Get public mint; true if the contract is public mint type; default <b>false</b>
     * 
     * @see https://github.com/tatumio/smart-contracts
     * @return boolean
     */
    public function getPublicMint() {
        return $this->_get(self::DATA_PUBLIC_MINT) ?? false;
    }
    
    /**
     * Set public mint; true if the contract is public mint type; default <b>false</b>
     * 
     * @see https://github.com/tatumio/smart-contracts
     * @param boolean $publicMint Public mint contract
     * @return $this
     */
    public function setPublicMint($publicMint) {
        return $this->_set(self::DATA_CASHBACK, !!$publicMint);
    }
    
    /**
     * Get nonce to be used for Ethereum transaction<br/>
     * If not present, last known nonce will be used
     * 
     * @return int|null
     */
    public function getNonce() {
        return $this->_get(self::DATA_NONCE);
    }
    
    /**
     * Set nonce to be used for Ethereum transaction<br/>
     * If not present, last known nonce will be used
     * 
     * @param int $nonce Nonce >= 0
     * @throws \Exception
     * @return $this
     */
    public function setNonce($nonce) {
        if (!is_int($nonce) || $nonce < 0) {
            throw new \Exception('Nonce must be a positive integer');
        }
        
        return $this->_set(self::DATA_NONCE, $nonce);
    }
    
    /**
     * Get the custom fee
     * 
     * @return array|null
     */
    public function getFee() {
        return $this->_get(self::DATA_FEE);
    }
    
    /**
     * Set custom defined fee<br/>
     * If not present, it will be calculated automatically
     * 
     * @param string $gasLimit Gas limit for transaction in gas price
     * @param string $gasPrice Gas price in Gwei
     * @return $this
     * @throws \Exception
     */
    public function setFee($gasLimit, $gasPrice) {
        if (!is_string($gasLimit) || !preg_match('%^[+]?\d+$%', $gasLimit)) {
            throw new \Exception('Invalid gas limit string');
        }
        if (!is_string($gasLimit) || !preg_match('%^[+]?\d+$%', $gasLimit)) {
            throw new \Exception('Invalid gas price string');
        }
        
        return $this->_set(
            self::DATA_FEE, 
            [
                self::KEY_FEE_GAS_LIMIT => $gasLimit,
                self::KEY_FEE_GAS_PRICE => $gasPrice,
            ]
        );
    }
}

/*EOF*/