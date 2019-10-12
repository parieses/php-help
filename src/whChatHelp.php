<?php
namespace PhpHelp;

use PhpHelp\weChat\WXBizDataCrypt;

class whChatHelp{
    //微信解密
    public static function WXBizDataCrypt($appid, $sessionKey,$encryptedData,$iv,$data){
        $weChat  = new WXBizDataCrypt($appid, $sessionKey);
        $errCode = $weChat->decryptData($encryptedData, $iv, $data );
        if ($errCode == 0) {
            return json_decode($data,true);
        } else {
            return $errCode ;
        }
    }
}
