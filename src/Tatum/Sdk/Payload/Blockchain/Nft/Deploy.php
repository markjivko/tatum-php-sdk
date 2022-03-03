<?php
namespace Tatum\Sdk\Payload\Blockchain\Nft;
use Tatum\Sdk\Payload;
use Tatum\Sdk\Request;
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
    const DATA_CHAIN = 'chain';
    
    /**
     * Payload:Blockchain:Nft:Deploy
     * 
     * @param Enums\ChainNft $chain Chain to work with
     * @throws \Exception
     */
    public function __construct(Enums\ChainNft $chain) {
        // @TODO https://tatum.io/apidoc.php#operation/NftDeployErc721
        $this->setChain($chain);
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
     * @param Enums\ChainNft $chain
     * @return $this
     */
    public function setChain(Enums\ChainNft $chain) {
        return $this->_set(self::DATA_CHAIN, $chain);
    }
}

/*EOF*/