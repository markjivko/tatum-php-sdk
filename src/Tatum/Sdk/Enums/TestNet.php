<?php
namespace Tatum\Sdk\Enums;
use Tatum\Sdk\Containers\Enums;

!class_exists('\Tatum\Sdk') && exit();

/**
 * Test network types
 * 
 * @see       https://github.com/markjivko/tatum-php-sdk
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://markjivko.com
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 * 
 * @method static self ETHEREUM_ROPSTEN()
 * @method static self ETHEREUM_RINKEBY()
 */
class TestNet extends Enums {
    
    protected const ETHEREUM_ROPSTEN = 'ethereum-ropsten';
    protected const ETHEREUM_RINKEBY = 'ethereum-rinkeby';
    
}

/*EOF*/