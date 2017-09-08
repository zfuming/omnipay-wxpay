<?php

namespace Omnipay\WxPay;

use Omnipay\Common\AbstractGateway;

abstract class BaseAbstractGateway extends AbstractGateway
{

    public function setTradeType($tradeType)
    {
        $this->setParameter('trade_type', $tradeType);
    }


    public function setAppId($appId)
    {
        $this->setParameter('app_id', $appId);
    }


    public function getAppId()
    {
        return $this->getParameter('app_id');
    }


    public function setApiKey($apiKey)
    {
        $this->setParameter('api_key', $apiKey);
    }


    public function getApiKey()
    {
        return $this->getParameter('api_key');
    }


    public function setMchId($mchId)
    {
        $this->setParameter('mch_id', $mchId);
    }


    public function getMchId()
    {
        return $this->getParameter('mch_id');
    }


    public function setSubMchId($mchId)
    {
        $this->setParameter('sub_mch_id', $mchId);
    }


    public function getSubMchId()
    {
        return $this->getParameter('sub_mch_id');
    }


    public function setNotifyUrl($url)
    {
        $this->setParameter('notify_url', $url);
    }


    public function getNotifyUrl()
    {
        return $this->getParameter('notify_url');
    }


    /**
     * @return mixed
     */
    public function getCertPath()
    {
        return $this->getParameter('cert_path');
    }


    /**
     * @param mixed $certPath
     */
    public function setCertPath($certPath)
    {
        $this->setParameter('cert_path', $certPath);
    }


    /**
     * @return mixed
     */
    public function getKeyPath()
    {
        return $this->getParameter('key_path');
    }


    /**
     * @param mixed $keyPath
     */
    public function setKeyPath($keyPath)
    {
        $this->setParameter('key_path', $keyPath);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WxPay\Message\CreateOrderRequest
     */
    public function purchase($parameters = array ())
    {
        $parameters['trade_type'] = $this->getTradeType();

        return $this->createRequest('\Omnipay\WxPay\Message\CreateOrderRequest', $parameters);
    }


    public function getTradeType()
    {
        return $this->getParameter('trade_type');
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WxPay\Message\CompletePurchaseRequest
     */
    public function completePurchase($parameters = array ())
    {
        return $this->createRequest('\Omnipay\WxPay\Message\CompletePurchaseRequest', $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WxPay\Message\QueryOrderRequest
     */
    public function query($parameters = array ())
    {
        return $this->createRequest('\Omnipay\WxPay\Message\QueryOrderRequest', $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WxPay\Message\CloseOrderRequest
     */
    public function close($parameters = array ())
    {
        return $this->createRequest('\Omnipay\WxPay\Message\CloseOrderRequest', $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WxPay\Message\RefundOrderRequest
     */
    public function refund($parameters = array ())
    {
        return $this->createRequest('\Omnipay\WxPay\Message\RefundOrderRequest', $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WxPay\Message\QueryOrderRequest
     */
    public function queryRefund($parameters = array ())
    {
        return $this->createRequest('\Omnipay\WxPay\Message\QueryRefundRequest', $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WxPay\Message\DownloadBillRequest
     */
    public function downloadBill($parameters = array ())
    {
        return $this->createRequest('\Omnipay\WxPay\Message\DownloadBillRequest', $parameters);
    }
}
