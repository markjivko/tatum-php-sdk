<?php

namespace Tatum\Sdk\Enum;

use Tatum\Sdk\Container\Enum;

!class_exists('\Tatum\Sdk') && exit();

/**
 * API URLs
 * 
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://github.com/markjivko/tatum-php-sdk
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 * 
 * @method static self API_URL_EU_1()
 * @method static self API_URL_US_WEST_1()
 */
class ApiUrl extends Enum {

    protected const API_URL_EU_1      = 'https://api-eu1.tatum.io';
    protected const API_URL_US_WEST_1 = 'https://api-us-west1.tatum.io';

}

/*EOF*/