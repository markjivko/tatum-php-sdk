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
     * @var string
     */
    protected $_apiKey;
    
    /**
     * API URL; default <b>Enums\ApiUrl::API_URL_EU_1()</b>
     * 
     * @var Enums\ApiUrl|null
     */
    protected $_apiUrl = null;
    
    /**
     * Test network type; default <b>Enums\TestNet::ETHEREUM_ROPSTEN()</b>
     * 
     * @var Enums\TestNet|null
     */
    protected $_apiTestNet = null;
    
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
     * @param string $apiKey API Key, minimum 32 characters in length
     * @throws \Exception
     */
    public function __construct($apiKey) {
        $this->setApiKey($apiKey);
    }
    
    /**
     * Get the currently used API key
     * 
     * @return string
     */
    public function getApiKey() {
        return $this->_apiKey;
    }
    
    /**
     * Set the API key; minimum 32 characters in length
     * 
     * @param string $apiKey API key, minimum 32 characters in length
     * @return $this
     * @throws \Exception
     */
    public function setApiKey($apiKey) {
        if (!is_string($apiKey) || strlen($apiKey) < 32) {
            throw new \Exception('API key must be at least 32 characters long');
        }
        $this->_apiKey = $apiKey;
        
        return $this;
    }
    
    /**
     * Get the API URL
     * 
     * @return Enums\ApiUrl API URL; default <b>Enums\ApiUrl::API_URL_EU_1()</b>
     */
    public function getApiUrl() {
        return $this->_apiUrl ?? Enums\ApiUrl::API_URL_EU_1();
    }
    
    /**
     * Set the API URL
     * 
     * @param Enums\ApiUrl $apiUrl API URL
     * @return $this
     */
    public function setApiUrl(Enums\ApiUrl $apiUrl) {
        $this->_apiUrl = $apiUrl;
        
        return $this;
    }
    
    /**
     * Get the test network type
     * 
     * @return Enums\TestNet Test network; default <b>Enums\TestNet::ETHEREUM_ROPSTEN()</b>
     */
    public function getTestNet() {
        return $this->_apiTestNet ?? Enums\TestNet::ETHEREUM_ROPSTEN();
    }
    
    /**
     * Set the test network type
     * 
     * @param Enums\TestNet|null $testNet Test network type
     * @return $this
     */
    public function setTestNet(Enums\TestNet $testNet) {
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
     * Pay attention to the <b>@tatum-credit</b> attribute for each request!
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