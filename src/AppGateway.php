<?php

namespace Omnipay\WxPay;

/**
 * Class AppGateway
 * @package Omnipay\WxPay
 */
class AppGateway extends BaseAbstractGateway
{

    public function getName()
    {
        return 'WxPay App';
    }


    public function getTradeType()
    {
        return 'APP';
    }
}
