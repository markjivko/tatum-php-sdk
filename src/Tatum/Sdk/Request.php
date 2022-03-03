<?php
namespace Tatum\Sdk;

/**
 * Request - use Payload information to perform cURL requests to Tatum's servers
 * 
 * @see       https://github.com/markjivko/tatum-php-sdk
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://markjivko.com
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
class Request {

    // Authentication key
    const HEADER_X_API_KEY      = 'x-api-key';
    const HEADER_X_TESTNET_TYPE = 'x-testnet-type';
    
    // Request types
    const TYPE_GET    = 'GET';
    const TYPE_POST   = 'POST';
    const TYPE_PUT    = 'PUT';
    const TYPE_DELETE = 'DELETE';
    
    /**
     * Allowed request types
     */
    const TYPES = [
        self::TYPE_GET,
        self::TYPE_POST,
        self::TYPE_PUT,
        self::TYPE_DELETE,
    ];
    
    const API_RES_STATUS_CODE   = 'statusCode';
    const API_RES_ERROR_MESSAGE = 'message';
    
    /**
     * Request API key
     * 
     * @var \Tatum\Sdk
     */
    protected $_sdk = null;
    
    /**
     * Prepare a request object
     * 
     * @param \Tatum\Sdk $sdk SDK object
     * @throws \Exception
     */
    public function __construct(\Tatum\Sdk $sdk) {
        // Null or child instance
        if (!$sdk instanceof \Tatum\Sdk) {
            throw new \Exception('SDK object missing');
        }
        
        // Invalid or missing API key
        if (null === $sdk->getApiKey()) {
            throw new \Exception('SDK API key missing');
        }
        
        // Store the SDK object
        $this->_sdk = $sdk;
    }
    
    /**
     * Execute a payload (run a cURL request)
     * 
     * @param \Tatum\Sdk\Payload $payload SDK Payload
     * @throws \Exception
     * @return array
     */
    protected function _run(Payload $payload) {
        if (!$payload instanceof Payload) {
            throw new Exception('Invalid payload');
        }
        
        // Prepare the request URL
        $requestUrl = $this->_sdk->getApiUrl() . '/' . \Tatum\Sdk::API_VERSION . '/' . $payload->requestPath();
        
        // Prepare the cURL options
        $curlOptions = [
            CURLOPT_URL            => $requestUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => $payload->requestType(),
        ];
        
        // Prepare the data
        switch ($payload->requestType()) {
            case self::TYPE_GET:
                if (is_array($payload->requestData())) {
                    $requestUrl .= (false === strpos($requestUrl, '?') ? '&' : '?')
                        . http_build_query($payload->requestData());
                }
                break;
                
            default:
                $curlOptions[CURLOPT_POSTFIELDS] = $payload->requestData();
        }
        
        // Store additional headers
        $headers = is_array($payload->requestHeaders())
            ? $payload->requestHeaders()
            : [];
        
        // Store the authentication key
        $headers[self::HEADER_X_API_KEY] = $this->_sdk->getApiKey();
        
        // Store the test network type
        $headers[self::HEADER_X_TESTNET_TYPE] = $this->_sdk->getTestNet();
        
        // Prepare the cURL headers
        $curlOptions[CURLOPT_HTTPHEADER] = [];
        foreach ($headers as $headerKey => $headerValue) {
            $curlOptions[CURLOPT_HTTPHEADER][] = "$headerKey: $headerValue";
        }
            
        // Initialize the cURL handler
        $curlHandler = curl_init();
        
        // Add the options
        curl_setopt_array($curlHandler, $curlOptions);
        
        // Get the result
        $result = curl_exec($curlHandler);
        $curlError = curl_errno($curlHandler);
        curl_close($curlHandler);
        
        // Invalid result
        if ($curlError) {
            throw new \Exception(
                "cURL request failed: " . curl_strerror($curlError) 
                . (
                    $this->_sdk->getApiVerbose() 
                        ? (PHP_EOL . "$payload") 
                        : ''
                )
            );
        }
        
        // Not a raw data stream
        if (!$payload->requestRaw()) {
            // Prepare the result
            $result = json_decode($result, true);

            // Error occured
            if (isset($result[self::API_RES_STATUS_CODE]) && 0 !== strpos("{$result[self::API_RES_STATUS_CODE]}", '2')) {
                throw new \Exception(
                    "Code {$result[self::API_RES_STATUS_CODE]}: {$result[self::API_RES_ERROR_MESSAGE]}" 
                    . (
                        $this->_sdk->getApiVerbose() 
                            ? (PHP_EOL . "$payload") 
                            : ''
                    )
                );
            }
        }
        
        return $result;
    }
}

/* EOF */