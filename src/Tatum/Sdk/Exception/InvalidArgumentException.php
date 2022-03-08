<?php

namespace Tatum\Sdk\Exception;

!class_exists('\Tatum\Sdk') && exit();

/**
 * Invalid argument exception - thrown if an argument is not of the expected type
 * 
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://github.com/markjivko/tatum-php-sdk
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
class InvalidArgumentException extends \InvalidArgumentException implements ExceptionInterface {
    
}

/*EOF*/