<?php

namespace Tatum\Sdk\Enum\Payload\Blockchain\Nft\Deploy;

use Tatum\Sdk\Container\Enum;
use Tatum\Sdk\Constant;

!class_exists('\Tatum\Sdk') && exit();

/**
 * NFT Smart Contract chains
 * 
 * @copyright (c) 2022 Tatum.io
 * @author    Mark Jivko, https://github.com/markjivko/tatum-php-sdk
 * @license   Apache 2.0 License, http://www.apache.org/licenses/
 * 
 * @method static self ETH() Ethereum
 * @method static self MATIC() Polygon (Matic)
 * @method static self KCS() KuCoin
 * @method static self ONE() Harmony.ONE
 * @method static self KLAY() Klaytn
 * @method static self BSC() BowsCoin
 * @method static self ALGO() Algorand
 */
class Chain extends Enum {

    protected const ETH   = Constant\Chain::ETH;
    protected const MATIC = Constant\Chain::MATIC;
    protected const KCS   = Constant\Chain::KCS;
    protected const ONE   = Constant\Chain::ONE;
    protected const KLAY  = Constant\Chain::KLAY;
    protected const BSC   = Constant\Chain::BSC;
    protected const ALGO  = Constant\Chain::ALGO;

}

/*EOF*/