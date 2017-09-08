# Omnipay: WxPay

**WxPay driver for the Omnipay PHP payment processing library**

[![Build Status](https://travis-ci.org/lokielse/omnipay-WxPay.png?branch=master)](https://travis-ci.org/zfuming/omnipay-wxpay)
[![Latest Stable Version](https://poser.pugx.org/lokielse/omnipay-WxPay/version.png)](https://packagist.org/packages/zfuming/omnipay-wxpay)
[![Total Downloads](https://poser.pugx.org/lokielse/omnipay-WxPay/d/total.png)](https://packagist.org/packages/zfuming/omnipay-wxpay)

> The WxPay gateway can be accessed from outside of China

[Omnipay](https://github.com/omnipay/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements UnionPay support for Omnipay.

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

    "zfuming/omnipay-wxpay": "^1.0",

And run composer to update your dependencies:

    $ composer update -vvv

## Basic Usage

The following gateways are provided by this package:


* WxPay (Wechat Common Gateway) 微信支付通用网关
* WxPay_App (Wechat App Gateway) 微信APP支付网关
* WxPay_Native (Wechat Native Gateway) 微信原生扫码支付支付网关
* WxPay_Js (Wechat Js API/MP Gateway) 微信网页、公众号、小程序支付网关
* WxPay_Pos (Wechat Micro/POS Gateway) 微信刷卡支付网关

## Usage

### Create Order [doc](https://pay.weixin.qq.com/wiki/doc/api/app/app.php?chapter=9_1)

```php
//gateways: WxPay_App, WxPay_Native, WxPay_Js, WxPay_Pos
$gateway    = Omnipay::create('WxPay_App');
$gateway->setAppId($config['app_id']);
$gateway->setMchId($config['mch_id']);
$gateway->setSubMchId($config['sub_mch_id']);
$gateway->setApiKey($config['api_key']);

$order = [
    'body'              => 'The test order',
    'out_trade_no'      => date('YmdHis').mt_rand(1000, 9999),
    'total_fee'         => 1, //=0.01
    'spbill_create_ip'  => 'ip_address',
    'fee_type'          => 'CNY'
];

/**
 * @var Omnipay\WxPay\Message\CreateOrderRequest $request
 * @var Omnipay\WxPay\Message\CreateOrderResponse $response
 */
$request  = $gateway->purchase($order);
$response = $request->send();

//available methods
$response->isSuccessful();
$response->getData(); //For debug
$response->getAppOrderData(); //For WxPay_App
$response->getJsOrderData(); //For WxPay_Js
$response->getCodeUrl(); //For Native Trade Type
```

### Notify [doc](https://pay.weixin.qq.com/wiki/doc/api/app/app.php?chapter=9_7&index=3)
```php
$gateway    = Omnipay::create('WxPay');
$gateway->setAppId($config['app_id']);
$gateway->setMchId($config['mch_id']);
$gateway->setSubMchId($config['sub_mch_id']);
$gateway->setApiKey($config['api_key']);

$response = $gateway->completePurchase([
    'request_params' => file_get_contents('php://input')
])->send();

if ($response->isPaid()) {
    //pay success
    var_dump($response->getData());
}else{
    //pay fail
}
```

### Query Order [doc](https://pay.weixin.qq.com/wiki/doc/api/app/app.php?chapter=9_1)
```php
$response = $gateway->query([
    'transaction_id' => '1217752501201407033233368018', //The wechat trade no
])->send();

var_dump($response->isSuccessful());
var_dump($response->getData());
```


### Close Order [doc](https://pay.weixin.qq.com/wiki/doc/api/app/app.php?chapter=9_3&index=5)
```php
$response = $gateway->close([
    'out_trade_no' => '201602011315231245', //The merchant trade no
])->send();

var_dump($response->isSuccessful());
var_dump($response->getData());
```

### Refund [doc](https://pay.weixin.qq.com/wiki/doc/api/app/app.php?chapter=9_4&index=6)
```php
$gateway->setCertPath($certPath);
$gateway->setKeyPath($keyPath);

$response = $gateway->refund([
    'transaction_id' => '1217752501201407033233368018', //The wechat trade no
    'out_refund_no' => $outRefundNo,
    'total_fee' => 1, //=0.01
    'refund_fee' => 1, //=0.01
])->send();

var_dump($response->isSuccessful());
var_dump($response->getData());
```

### QueryRefund [doc](https://pay.weixin.qq.com/wiki/doc/api/app/app.php?chapter=9_5&index=7)
```php
$response = $gateway->queryRefund([
    'refund_id' => '1217752501201407033233368018', //Your site trade no, not union tn.
])->send();

var_dump($response->isSuccessful());
var_dump($response->getData());
```

### Shorten URL (for `WxPay_Native`) [doc](https://pay.weixin.qq.com/wiki/doc/api/micropay.php?chapter=9_9&index=8)
```php
$response = $gateway->shortenUrl([
    'long_url' => $longUrl
])->send();

var_dump($response->isSuccessful());
var_dump($response->getData());
var_dump($response->getShortUrl());
```

### Query OpenId (for `WxPay_Pos`) [doc](https://pay.weixin.qq.com/wiki/doc/api/micropay.php?chapter=9_13&index=9)
```php
$response = $gateway->shortenUrl([
    'auth_code' => $authCode
])->send();

var_dump($response->isSuccessful());
var_dump($response->getData());
var_dump($response->getOpenId());
```

For general usage instructions, please see the main [Omnipay](https://github.com/omnipay/omnipay)
repository.