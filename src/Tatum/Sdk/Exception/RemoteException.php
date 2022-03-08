<?php

namespace Tatum\Sdk\Exception;

!class_exists('\Tatum\Sdk') && exit();

/**
 * Run-time exception - division by zero, index out of range etc.
 * 
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://github.com/markjivko/tatum-php-sdk
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 */
class RemoteException extends \RuntimeException implements ExceptionInterface {
    
}

/*EOF*/