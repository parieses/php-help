<?php

namespace PhpHelp;

/**
 * 字符串扩展
 * Class arrayHelp
 * @package phpHelp
 */
class stringHelp
{
    /**
     * [生成唯一字符串]
     * @E-mial 1695699447@qq.com
     * @TIME   2018-06-06
     * @WEB    https://blog.csdn.net/pariese
     * @ 0-存数字字符串；1-小写字母字符串；2-大写字母字符串；3-大小写数字字符串；4-字符；
     *   5-数字，小写，大写，字符混合
     * @param integer $type   [字符串的类型]
     * @param integer $length [字符串的长度]
     * @param integer $time   [是否带时间1-带，0-不带]
     * @return [string]  $str    [返回唯一字符串]
     */
    public static function randSole($type = 0, $length = 18, $time = 1)
    {
        $str = $time == 0 ? '' : date('YmdHis', time());
        switch ($type) {
            case 0:
                for ((int)$i = 0; $i <= $length; $i++) {
                    if (mb_strlen($str) == $length) {
                        $str = $str;
                    } else {
                        $str .= rand(0, 9);
                    }
                }
                break;
            case 1:
                for ((int)$i = 0; $i <= $length; $i++) {
                    if (mb_strlen($str) == $length) {
                        $str = $str;
                    } else {
                        $rand = "qwertyuioplkjhgfdsazxcvbnm";
                        $str .= $rand{mt_rand(0, 26)};
                    }
                }
                break;
            case 2:
                for ((int)$i = 0; $i <= $length; $i++) {
                    if (mb_strlen($str) == $length) {
                        $str = $str;
                    } else {
                        $rand = "QWERTYUIOPLKJHGFDSAZXCVBNM";
                        $str .= $rand{mt_rand(0, 26)};
                    }
                }
                break;
            case 3:
                for ((int)$i = 0; $i <= $length; $i++) {
                    if (mb_strlen($str) == $length) {
                        $str = $str;
                    } else {
                        $rand = "123456789qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM";
                        $str .= $rand{mt_rand(0, 35)};
                    }
                }
                break;
            case 4:
                for ((int)$i = 0; $i <= $length; $i++) {
                    if (mb_strlen($str) == $length) {
                        $str = $str;
                    } else {
                        $rand = "!@#$%^&*()_+=-~`";
                        $str .= $rand{mt_rand(0, 17)};
                    }
                }
                break;
            case 5:
                for ((int)$i = 0; $i <= $length; $i++) {
                    if (mb_strlen($str) == $length) {
                        $str = $str;
                    } else {
                        $rand = "123456789qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM!@#$%^&*()_+=-~`";
                        $str .= $rand{mt_rand(0, 52)};
                    }
                }
                break;
        }
        return $str;
    }

    /**
     * 字符串提取汉字
     * Created by Mr.亮先生.
     * program: php-help
     * FuncName:strToChineseCharacters
     * status:static
     * User: Mr.liang
     * Date: 2021/4/21
     * Time: 17:10
     * Email:1695699447@qq.com
     * @param $string
     * @return mixed
     */
    public static function strToChineseCharacters($string)
    {
        preg_match_all("/[\x{4e00}-\x{9fa5}]+/u", $string, $chinese);

        return $chinese;
    }

    /**
     * 判断字符串是否包含Emoji
     * Created by Mr.亮先生.
     * program: php-help
     * FuncName:isEmoji
     * status:static
     * User: Mr.liang
     * Date: 2021/4/21
     * Time: 17:16
     * Email:1695699447@qq.com
     * @param $str
     * @return bool
     */
    public static function isEmoji($str): bool
    {
        $is_emoji = false;
        preg_replace_callback(
            '/./u',
            function (array $match) use (&$is_emoji) {
                if (strlen($match[0]) >= 4) {
                    $is_emoji = true;
                }
            },
            $str
        );
        return $is_emoji;
    }
}