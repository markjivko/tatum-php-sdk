<?php
namespace Tatum\Sdk\Enums;
use Tatum\Sdk\Containers\Enums;

!class_exists('\Tatum\Sdk') && exit();

/**
 * NFT Smart Contract chains
 * 
 * @see       https://github.com/markjivko/tatum-php-sdk
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://markjivko.com
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 * 
 * @method static self ETH()
 * @method static self MATIC()
 * @method static self KCS()
 * @method static self ONE()
 * @method static self KLAY()
 * @method static self BSC()
 * @method static self ALGO()
 */
class ChainDeployNft extends Enums {
    
    protected const ETH   = 'ETH';
    protected const MATIC = 'MATIC';
    protected const KCS   = 'KCS';
    protected const ONE   = 'ONE';
    protected const KLAY  = 'KLAY';
    protected const BSC   = 'BSC';
    protected const ALGO  = 'ALGO';
    
}

/*EOF*/