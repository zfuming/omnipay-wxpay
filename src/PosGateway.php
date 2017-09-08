<?php

namespace Omnipay\WxPay;

/**
 * Class PosGateway
 * @package Omnipay\WxPay
 */
class PosGateway extends BaseAbstractGateway
{

    public function getName()
    {
        return 'WxPay Pos';
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WxPay\Message\CreateOrderRequest
     */
    public function purchase($parameters = array ())
    {
        $parameters['trade_type'] = $this->getTradeType();

        return $this->createRequest('\Omnipay\WxPay\Message\CreateMicroOrderRequest', $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WxPay\Message\QueryOpenIdByAuthCodeRequest
     */
    public function queryOpenId($parameters = array ())
    {
        return $this->createRequest('\Omnipay\WxPay\Message\QueryOpenIdByAuthCodeRequest', $parameters);
    }
}
