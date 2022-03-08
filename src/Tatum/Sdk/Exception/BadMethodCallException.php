<?php

namespace Tatum\Sdk\Exception;

!class_exists('\Tatum\Sdk') && exit();

/**
 * Bad method call - thrown if a callback refers to an undefined method or if some arguments are missing
 * 
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://github.com/markjivko/tatum-php-sdk
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
class BadMethodCallException extends \BadMethodCallException implements ExceptionInterface {
    
}

/*EOF*/