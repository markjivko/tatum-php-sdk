<?php
namespace Tatum;
use Tatum\Sdk\Caller;
use Tatum\Sdk\Enums;

/**
 * Tatum PHP SDK
 * 
 * @see       https://github.com/markjivko/tatum-php-sdk
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://markjivko.com
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
class Sdk {
    
    /**
     * API Version
     */
    const API_VERSION = 'v3';
    
    /**
     * API key
     * 
     * @var string|null
     */
    protected $_apiKey = null;
    
    /**
     * Test network type 
     * 
     * @var Enums\TestNet|null
     */
    protected $_apiTestNet = null;
    
    /**
     * API URL
     * 
     * @var Enums\ApiUrl|null
     */
    protected $_apiUrl = null;
    
    /**
     * API verbose flag
     * 
     * @var boolean
     */
    protected $_apiVerbose = false;
    
    /**
     * Caller instance
     * 
     * @var \Tatum\Sdk\Caller
     */
    protected $_caller = null;
    
    /**
     * Tatum SDK
     * 
     * @param string        $apiKey  API Key; minimum 32 characters in length
     * @param Enums\ApiUrl  $apiUrl  (optional); API URL; default <b>null</b>
     * @param Enums\TestNet $testNet (optional); Test network type; default <b>null</b>
     * @param boolean       $verbose (optional); Verbose logging and exceptions; default <b>false</b>
     */
    public function __construct($apiKey, Enums\ApiUrl $apiUrl = null, Enums\TestNet $testNet = null, $verbose = false) {
        $this->setApiKey($apiKey)
            ->setApiUrl($apiUrl)
            ->setTestNet($testNet)
            ->setApiVerbose($verbose);
    }
    
    /**
     * Get the currently used API key
     * 
     * @return string|null
     */
    public function getApiKey() {
        return $this->_apiKey;
    }
    
    /**
     * Update the API key; minimum 32 characters in length
     * 
     * @param string $apiKey API key; minimum 32 characters in length
     * @return $this
     */
    public function setApiKey($apiKey) {
        $this->_apiKey = is_string($apiKey) && strlen($apiKey)
            ? $apiKey
            : null;
        
        return $this;
    }
    
    /**
     * Get the API URL
     * 
     * @return string
     */
    public function getApiUrl() {
        return strval(
            null === $this->_apiUrl
                ? Enums\ApiUrl::API_URL_EU1()
                : $this->_apiUrl
        );
    }
    
    /**
     * Set the API URL
     * 
     * @param Enums\ApiUrl|null $apiUrl API URL
     * @return $this
     */
    public function setApiUrl(Enums\ApiUrl $apiUrl = null) {
        $this->_apiUrl = $apiUrl;
        
        return $this;
    }
    
    /**
     * Get the test network type
     * 
     * @return string
     */
    public function getTestNet() {
        return strval(
            null === $this->_apiTestNet
                ? Enums\TestNet::ETHEREUM_ROPSTEN()
                : $this->_apiTestNet
        );
    }
    
    /**
     * Set the test network type
     * 
     * @param Enums\TestNet|null $testNet Test network type
     * @return $this
     */
    public function setTestNet(Enums\TestNet $testNet = null) {
        $this->_apiTestNet = $testNet;
        
        return $this;
    }
    
    /**
     * Get verbose flag
     * 
     * @return boolean
     */
    public function getApiVerbose() {
        return $this->_apiVerbose;
    }
    
    /**
     * Set verbose flag
     * 
     * @param boolean $apiVerbose Verbose
     * @return $this
     */
    public function setApiVerbose($apiVerbose) {
        $this->_apiVerbose = !!$apiVerbose;
        
        return $this;
    }
    
    /**
     * Perform an API request<br/>
     * Pay attention to the <b>@tatum-credit</b> attribute for each request
     * 
     * @return \Tatum\Sdk\Caller
     */
    public function call() {
        if (null === $this->_caller) {
            $this->_caller = new Caller($this);
        }
        
        return $this->_caller;
    }

}

/* EOF */