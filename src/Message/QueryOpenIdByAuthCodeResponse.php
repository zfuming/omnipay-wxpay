<?php

namespace Omnipay\WxPay\Message;

/**
 * Class QueryOpenIdByAuthCodeResponse
 * @package Omnipay\WxPay\Message
 * @link    https://pay.weixin.qq.com/wiki/doc/api/micropay.php?chapter=9_13&index=9
 */
class QueryOpenIdByAuthCodeResponse extends BaseAbstractResponse
{

    public function getOpenId()
    {
        $data = $this->getData();

        return isset($data['openid']) ? $data['openid'] : null;
    }
}
