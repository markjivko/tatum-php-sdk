<?php
namespace Tatum\Sdk\Enums;
use Tatum\Sdk\Containers\Enums;

!class_exists('\Tatum\Sdk') && exit();

/**
 * API URLs
 * 
 * @see       https://github.com/markjivko/tatum-php-sdk
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://markjivko.com
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 * 
 * @method static self API_URL_EU1()
 * @method static self API_URL_EU2()
 */
class ApiUrl extends Enums {
    
    protected const API_URL_EU1 = 'https://api-eu1.tatum.io';
    protected const API_URL_EU2 = 'https://api-eu2.tatum.io';
}

/*EOF*/