<?php

namespace Tatum;

use Tatum\Sdk\Exception\InvalidArgumentException;
use Tatum\Sdk\Caller;
use Tatum\Sdk\Enum;

/**
 * Tatum PHP SDK
 * 
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://github.com/markjivko/tatum-php-sdk
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
final class Sdk {

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
     * API URL; default <b>Enum\ApiUrl::API_URL_EU_1()</b>
     * 
     * @var Enum\ApiUrl|null
     */
    protected $_apiUrl = null;

    /**
     * Test network type; default <b>Enum\Testnet::ETHEREUM_ROPSTEN()</b>
     * 
     * @var Enum\Testnet|null
     */
    protected $_apiTestnet = null;

    /**
     * API verbose flag
     * 
     * @var boolean
     */
    protected $_apiVerbose = false;

    /**
     * Caller instance
     * 
     * @var Caller
     */
    protected $_caller = null;

    /**
     * Tatum SDK
     * 
     * @param string $apiKey API Key, minimum 32 characters in length
     * @throws InvalidArgumentException
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
     * @throws InvalidArgumentException
     */
    public function setApiKey($apiKey) {
        if (!is_string($apiKey) || strlen($apiKey) < 32) {
            throw new InvalidArgumentException('API key must be at least 32 characters long');
        }
        $this->_apiKey = $apiKey;

        return $this;
    }

    /**
     * Get the API URL
     * 
     * @return Enum\ApiUrl API URL; default <b>Enum\ApiUrl::API_URL_EU_1()</b>
     */
    public function getApiUrl() {
        return $this->_apiUrl ?? Enum\ApiUrl::API_URL_EU_1();
    }

    /**
     * Set the API URL
     * 
     * @param Enum\ApiUrl $apiUrl API URL
     * @return $this
     */
    public function setApiUrl(Enum\ApiUrl $apiUrl) {
        $this->_apiUrl = $apiUrl;

        return $this;
    }

    /**
     * Get the test network type
     * 
     * @return Enum\Testnet Test network; default <b>Enum\Testnet::ETHEREUM_ROPSTEN()</b>
     */
    public function getTestnet() {
        return $this->_apiTestnet ?? Enum\Testnet::ETHEREUM_ROPSTEN();
    }

    /**
     * Set the test network type
     * 
     * @param Enum\Testnet|null $testNet Test network type
     * @return $this
     */
    public function setTestnet(Enum\Testnet $testNet) {
        $this->_apiTestnet = $testNet;

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
     * @return Caller
     */
    public function call() {
        if (null === $this->_caller) {
            $this->_caller = new Caller($this);
        }

        return $this->_caller;
    }

}

/* EOF */