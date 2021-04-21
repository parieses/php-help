<?php

namespace PhpHelp;

use PhpHelp\weChat\WXBizDataCrypt;

class whChatHelp
{
    //微信解密
    public static function WXBizDataCrypt($appid, $sessionKey, $encryptedData, $iv, $data)
    {
        $weChat = new WXBizDataCrypt($appid, $sessionKey);
        $errCode = $weChat->decryptData($encryptedData, $iv, $data);
        if ($errCode == 0) {
            return json_decode($data, true);
        } else {
            return $errCode;
        }
    }

    public static function GetSessionKey($appid, $secret, $code)
    {
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=$appid&secret=$secret&js_code=$code&grant_type=authorization_code";
        return toolHelp::httpGet($url);
    }
}
