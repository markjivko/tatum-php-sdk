<?php

namespace Tatum\Sdk\Payload\Ipfs;

use Tatum\Sdk\Exception\InvalidArgumentException;
use Tatum\Sdk\Exception\RuntimeException;
use Tatum\Sdk\Container\Payload;
use Tatum\Sdk\Container\Request;

!class_exists('\Tatum\Sdk') && exit();

/**
 * Payload:Ipfs:Store
 * 
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://github.com/markjivko/tatum-php-sdk
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
class Store extends Payload {

    /**
     * Request type
     */
    const REQUEST_TYPE = Request::TYPE_POST;

    /**
     * Request path
     */
    const REQUEST_PATH = 'ipfs';

    /**
     * Data keys
     */
    const DATA_FILE_PATH = 'filePath';

    /**
     * Maximum file size (50MB)
     */
    const MAX_FILE_SIZE = 52428800;

    /**
     * Payload:Ipfs:Store
     * 
     * @param string $filePath Path to file; maximum file size is <b>50MB</b>
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function __construct($filePath) {
        $this->setFilePath($filePath);
    }

    /**
     * Custom argument for CURL's CURLOPT_POSTFIELDS option
     * 
     * @return string
     */
    public function requestData() {
        return [
            'file' => new \CURLFile(
                $this->getFilePath(),
                mime_content_type($this->getFilePath()) ?: null,
                basename($this->getFilePath())
            )
        ];
    }

    /**
     * Custom request headers
     * 
     * @return string[] Associative array
     */
    public function requestHeaders() {
        return [
            self::HEADER_CONTENT_TYPE => 'multipart/form-data',
        ];
    }

    /**
     * Get path to file
     * 
     * @return string
     */
    public function getFilePath() {
        return $this->_get(self::DATA_FILE_PATH);
    }

    /**
     * Set path to file
     * 
     * @param string $filePath File path
     * @throws InvalidArgumentException
     * @throws RuntimeException
     * @return $this
     */
    public function setFilePath($filePath) {
        clearstatcache();

        if (!is_file($filePath)) {
            throw new InvalidArgumentException('Not a valid file');
        }

        if (filesize($filePath) > self::MAX_FILE_SIZE) {
            throw new RuntimeException('IPFS: File too large');
        }

        return $this->_set(self::DATA_FILE_PATH, $filePath);
    }

}

/*EOF*/