<?php

namespace Tatum\Sdk\Payload\Ipfs;

use Tatum\Sdk\Exception\InvalidArgumentException;
use Tatum\Sdk\Container\Request;
use Tatum\Sdk\Container\Payload;

!class_exists('\Tatum\Sdk') && exit();

/**
 * Payload:Ipfs:Get
 * 
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://github.com/markjivko/tatum-php-sdk
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
class Get extends Payload {

    /**
     * Request type
     * 
     * @var string
     */
    const REQUEST_TYPE = Request::TYPE_GET;

    /**
     * Result is a raw data stream
     * 
     * @var boolean
     */
    const REQUEST_RAW = true;

    /**
     * Request path
     */
    const REQUEST_PATH = 'ipfs';

    /**
     * Data keys
     */
    const DATA_ID = 'id';

    /**
     * Payload:Ipfs:Get
     * 
     * @param string $ipfsId IPFS file id
     * @throws InvalidArgumentException
     */
    public function __construct($ipfsId) {
        $this->setId($ipfsId);
    }

    /**
     * Custom argument for CURL's CURLOPT_POSTFIELDS option
     * 
     * @return string
     */
    public function requestData() {
        return null;
    }

    /**
     * Get the request URL path
     * 
     * @return string
     */
    public function requestPath() {
        return self::REQUEST_PATH . '/' . $this->getId();
    }

    /**
     * Get IPFS file id
     * 
     * @return string
     */
    public function getId() {
        return $this->_get(self::DATA_ID);
    }

    /**
     * Set IPFS file id
     * 
     * @param string $ipfsId IPFS file id
     * @throws InvalidArgumentException
     * @return $this
     */
    public function setId($ipfsId) {
        // Wild regex performing loose validation
        if (!is_string($ipfsId) || !preg_match('%\w{46,}%i', $ipfsId)) {
            throw new InvalidArgumentException('IPFS ID must be a non-empty string (46+ chars in v0, 49+ chars in v1)');
        }

        return $this->_set(self::DATA_ID, $ipfsId);
    }

}

/*EOF*/