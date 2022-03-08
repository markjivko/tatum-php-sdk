<?php

namespace Tatum\Sdk\Enum;

use Tatum\Sdk\Container\Enum;

!class_exists('\Tatum\Sdk') && exit();

/**
 * Test network types
 * 
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://github.com/markjivko/tatum-php-sdk
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 * 
 * @method static self ETHEREUM_ROPSTEN()
 * @method static self ETHEREUM_RINKEBY()
 */
class Testnet extends Enum {

    protected const ETHEREUM_ROPSTEN = 'ethereum-ropsten';
    protected const ETHEREUM_RINKEBY = 'ethereum-rinkeby';

}

/*EOF*/