<?php
namespace Tatum\Sdk\Payload\Ipfs;

!class_exists('\Tatum\Sdk') && exit();

/**
 * Payload:Ipfs:Nft
 * 
 * @see       https://github.com/markjivko/tatum-php-sdk
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://markjivko.com
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
class Nft extends Store {
    
    /**
     * Data keys
     */
    const DATA_ERC_NAME        = 'name';
    const DATA_ERC_DESCRIPTION = 'description';
    const DATA_ERC_PROPERTIES  = 'properties';
    
    /**
     * Payload:Ipfs:Nft
     * 
     * @param string $filePath       Path to file; maximum file size is <b>50MB</b>
     * @param string $ercName        ERC-721 and ERC-1155 asset metadata name
     * @param string $ercDescription ERC-721 and ERC-1155 asset metadata description
     * @throws \Exception
     */
    public function __construct($filePath, $ercName, $ercDescription) {
        $this
            ->setFilePath($filePath)
            ->setErcName($ercName)
            ->setErcDescription($ercDescription);
    }
    
    /**
     * Get ERC-721 and ERC-1155 asset metadata name
     * 
     * @return string
     */
    public function getErcName() {
        return $this->_get(self::DATA_ERC_NAME);
    }
    
    /**
     * Set ERC-721 and ERC-1155 asset metadata name
     * 
     * @param string $name Asset name
     * @return $this
     */
    public function setErcName($name) {
        return $this->_set(self::DATA_ERC_NAME, trim($name));
    }
    
    /**
     * Get ERC-721 and ERC-1155 asset metadata description
     * 
     * @return string
     */
    public function getErcDescription() {
        return $this->_get(self::DATA_ERC_DESCRIPTION);
    }
    
    /**
     * Set ERC-721 and ERC-1155 asset metadata description
     * 
     * @param string $description Asset description
     * @return $this
     */
    public function setErcDescription($description) {
        return $this->_set(self::DATA_ERC_DESCRIPTION, trim($description));
    }
    
    /**
     * Get ERC-1155 asset metadata properties
     * 
     * @return array|null
     */
    public function getErcProperties() {
        return $this->_get(self::DATA_ERC_PROPERTIES);
    }
    
    /**
     * Set ERC-1155 asset metadata properties; values can be only one of the following:<ul>
     * <li>Integer</li>
     * <li>Float</li>
     * <li>Boolean</li>
     * <li>String</li>
     * </ul>
     * 
     * @param array $properties Asset properties
     * @return $this
     * @throws \Exception
     */
    public function setErcProperties($properties) {
        if (!is_array($properties)) {
            $properties = [];
        }
        
        foreach ($properties as $property) {
            if (!is_int($property) 
                && !is_float($property) 
                && !is_bool($property) 
                && !is_string($property)) {
                throw new \Exception(
                    'Properties must be an array of int, float, boolean or string values'
                );
            }
        }
        
        return $this->_set(
            self::DATA_ERC_PROPERTIES, 
            count($properties) 
                ? $properties 
                : null
        );
    }
}

/*EOF*/