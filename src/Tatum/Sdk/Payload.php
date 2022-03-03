<?php
namespace Tatum\Sdk;

/**
 * Payloads are an organized data store for requests; they perform no action<br/>
 * Data keys are defined by <b>DATA_*</b> class constants<br/>
 * Use <b>_get()</b> and <b>_set()</b> methods to interact with the data table<br/>
 * Override <b>REQUEST_*</b> class constants and <b>request*()</b> methods as needed<br/>
 * 
 * @see       https://github.com/markjivko/tatum-php-sdk
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://markjivko.com
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
class Payload {

    /**
     * Request type
     * 
     * @var string
     */
    const REQUEST_TYPE = Request::TYPE_POST;
    
    /**
     * Request path
     * 
     * @var string
     */
    const REQUEST_PATH = '';
    
    /**
     * Result is a raw data stream<br/>
     * Defaults to <b>false</b> to JSON-decode the result
     * 
     * @var boolean
     */
    const REQUEST_RAW = false;
    
    /**
     * Data store for this payload
     * 
     * @var array
     */
    protected $_data;
    
    /**
     * List of extra headers to append <b>after</b> requestHeaders() is called
     * 
     * @var array
     */
    protected $_extraHeaders = [];
    
    /**
     * Common headers
     */
    const HEADER_CONTENT_TYPE = 'Content-Type';
    
    /**
     * String typecasting
     * 
     * @return string
     */
    public function __toString() {
        return str_replace(
                ['Tatum\Sdk\\', '\\'], 
                ['', '-'], 
                static::class
            )
            . ': ' . $this->requestPath() 
            . ', ' . print_r($this->requestData(), true);
    }
    
    /**
     * Data store getter
     * 
     * @param string $key Key
     * @return mixed|null Value or null for invalid key
     */
    final protected function _get($key) {
        $this->_init();
        
        return array_key_exists($key, $this->_data)
            ? $this->_data[$key]
            : null;
    }
    
    /**
     * Data store setter
     * 
     * @param string $key   Key
     * @param mixed  $value Value
     * @return $this
     */
    final protected function _set($key, $value) {
        $this->_init();
        
        if (array_key_exists($key, $this->_data)) {
            $this->_data[$key] = $value;
        }
        
        return $this;
    }
    
    /**
     * Initialize the data store
     */
    final private function _init() {
        if (!isset($this->_data)) {
            foreach ((new \ReflectionClass(static::class))->getConstants() as $constantName => $constantValue) {
                if (0 === strpos($constantName, 'DATA_')) {
                    $this->_data[$constantValue] = null;
                }
            }
        }
    }
    
    /**
     * Get the current request type
     * 
     * @return string
     */
    final public function requestType() {
        return in_array(static::REQUEST_TYPE, Request::TYPES)
            ? static::REQUEST_TYPE
            : Request::TYPE_POST;
    }
    
    /**
     * Whether to return the result as raw data stream (no JSON decoding)
     * 
     * @return boolean
     */
    final public function requestRaw() {
        return !!static::REQUEST_RAW;
    }
    
    /**
     * Get the request headers<br/>
     * Set the content-type to JSON
     * 
     * @return string[] Associative array of header name => header value
     */
    public function requestHeaders() {
        return [
            self::HEADER_CONTENT_TYPE => 'application/json',
        ];
    }
    
    /**
     * Get extra request headers
     * 
     * @return string[] Associative array of header name => header value
     */
    final public function requestHeadersExtra() {
        return is_array($this->_extraHeaders)
            ? $this->_extraHeaders
            : [];
    }
    
    /**
     * Get the request URL path
     * 
     * @return string
     */
    public function requestPath() {
        return static::REQUEST_PATH;
    }
    
    /**
     * Get the request data<br/>
     * Pass the non-null data as such for GET requests
     * or encode data as a JSON string for other request types
     * 
     * @return array|string Request data - associative array or JSON-encoded string
     */
    public function requestData() {
        // Filter-out null values
        $data = array_filter(
            $this->_data,
            function($item) {
                return null !== $item;
            }
        );
        
        return Request::TYPE_GET === $this->requestType
            ? $data
            : json_encode($data);
    }
}

/* EOF */