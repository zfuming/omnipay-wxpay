<?php

namespace Omnipay\WxPay;

/**
 * Class JsGateway
 * @package Omnipay\WxPay
 */
class JsGateway extends BaseAbstractGateway
{

    public function getName()
    {
        return 'WxPay JS API/MP';
    }


    public function getTradeType()
    {
        return 'JSAPI';
    }
}
