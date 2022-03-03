# Blockchain SDK by Tatum for PHP

<p align="center">
    <a href="https://tatum.io/">
        <img src="https://repository-images.githubusercontent.com/465640082/11f101ad-a1bd-480e-a6e1-ae852810d4bb"/>
    </a>
</p>

Create complex blockchain applications using the PHP programming language.

[Learn more](https://tatum.io/) about the Tatum blockchain development platform.

This is an implementation of the official [Tatum API](https://tatum.io/apidoc.php) written in PHP.

### Resources

* [Tatum Docs](https://docs.tatum.io/)

### Table of Contents

* [Compatibility](#compatibility)
* [Installation](#installation)
* [Quick Start](#quick-start)
* [Contributing](#contributing)
    * [Issues](#issues)
    * [Pull Requests](#pull-requests)
* [Copyright and Licensing](#copyright-and-licensing)

## Compatibility

The Tatum PHP SDK requires at a minimum **PHP 7.2**.

## Installation

Simply clone this Git repository and use a PSR-4 Autoloader.

## Quick Start

This example showcases how to quickly upload a ERC-1155 compatible NFT to the IPFS network.

Pay attention to the **@tatum-credit** used for each method call.

```php
// Tatum Platform SDK for PHP
use \Tatum\Sdk\Payload;

// Get the SDK object
$sdk = new \Tatum\Sdk('00000000-0000-0000-0000-000000000000');

// Store an NFT on the IPFS
$fileId = $sdk->call()->ipfs()->nft(
    new Payload\Ipfs\Nft(
        '/path/to/file.png',
        'Name',
        'Description',
        [
            'extra' => 'values',
        ]
    )
);
```

The only entry point to the entire SDK is ``$sdk->call()``. 

Each method expects a payload with an intuitive naming structure. In the above example, the ``->ipfs()->nft()`` method expects a payload instance of class ``Payload\Ipfs\Nft``.

Your IDE will help you navigate through the SDK.

<a href="https://github.com/markjivko/tatum-php-sdk/blob/main/assets/tatum-sdk.gif">
    <img src="./assets/tatum-sdk.gif"/>
</a>


## Contributing

This SDK is currently **incomplete**!

Contributions to the SDK are appreciated!

Continuous efforts are made to bring it in line with the latest Tatum API.

### Issues

You can open issues for bugs and enhancement requests.

### Pull Requests

If you make any changes or improvements to the SDK, which you believe are beneficial to others, consider making a pull
request to merge your changes to be included in the next release.

Be sure to include your name in the list of contributors.

## Copyright and Licensing

The license summary below may be copied.

```text
Copyright 2022 Tatum Blockchain Services s.r.o.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
```
