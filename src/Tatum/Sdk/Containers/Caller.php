<?php
namespace Tatum\Sdk\Containers;

/**
 * Caller Traits
 * 
 * @see       https://github.com/markjivko/tatum-php-sdk
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://markjivko.com
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
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
     */
    final public function __construct(\Tatum\Sdk $sdk) {
        if (!$sdk instanceof \Tatum\Sdk) {
            throw new \Exception('Invalid SDK instance');
        }
        
        $this->_sdk = $sdk;
    }
}

/*EOF*/