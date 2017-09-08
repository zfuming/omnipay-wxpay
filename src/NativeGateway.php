<?php

namespace Omnipay\WxPay;

/**
 * Class NativeGateway
 * @package Omnipay\WxPay
 */
class NativeGateway extends BaseAbstractGateway
{

    public function getName()
    {
        return 'WxPay Native';
    }


    public function getTradeType()
    {
        return 'NATIVE';
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WxPay\Message\ShortenUrlRequest
     */
    public function shortenUrl($parameters = array ())
    {
        return $this->createRequest('\Omnipay\WxPay\Message\ShortenUrlRequest', $parameters);
    }
}
