<?php


namespace PhpHelp;

/**
 * 工具类
 * Class toolHelp
 * @package PhpHelp
 */
class toolHelp
{
    /**
     * 根据经纬度获取距离
     * Created by Mr.亮先生.
     * Date: 2019/7/11
     * Time: 13:10
     * @Url:
     * @param $lat1 纬度1
     * @param $lng1 经度1
     * @param $lat2 纬度2
     * @param $lng2 经度2
     * @param int $len_type
     * @param int $decimal
     * @return float
     */
    public static function getDistance($lat1, $lng1, $lat2, $lng2, $len_type = 2, $decimal = 2)
    {
        $radLat1 = $lat1 * M_PI / 180.0;
        $radLat2 = $lat2 * M_PI / 180.0;
        $a = $radLat1 - $radLat2;
        $b = ($lng1 * M_PI / 180.0) - ($lng2 * M_PI / 180.0);
        $s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2)));
        $s = $s * 6378.137;
        $s = round($s * 1000);
        if ($len_type > 1) {
            $s /= 1000;
        }
        return round($s, $decimal);
    }

    /**
     * 获取文件后缀
     * Created by Mr.亮先生.
     * Date: 2019/7/11
     * Time: 13:11
     * @Url:
     * @param $filename
     * @return mixed
     */
    public static function  getExtension($filename)
    {
        $myext = substr($filename, strrpos($filename, '.'));
        return str_replace('.', '', $myext);
    }
    /**
     * 输出函数根据类型
     * Created by Mr.亮先生.
     * User: 16956
     * Date: 2019/7/9
     * Time: 16:46
     * @Url:
     * @param $arr
     */
    public static function deBug($arr)
    {
        if (is_array($arr) || is_object($arr)) {
            echo "<pre/>";
            print_r($arr);
        } else if (is_string($arr)) {
            echo $arr . "<br/>";
        }
    }
    /**
     * get请求
     * Created by Mr.亮先生.
     * User: 16956
     * Date: 2019/7/9
     * Time: 16:48
     * @Url:
     * @param $url
     * @return bool|string
     */
    public static  function httpGet($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $res = "";
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }

    /**
     * post请求
     * Created by Mr.亮先生.
     * User: 16956
     * Date: 2019/7/9
     * Time: 16:48
     * @Url:
     * @param $url
     * @param array $query
     * @param array $header
     * @return bool|string
     */
    public static function httpPost($url, $query = array(), $header = array("Content-Type" => "application/x-www-form-urlencoded"))
    {
        $ch = curl_init();
        $query = http_build_query($query);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSLVERSION, 1);
        $ret = curl_exec($ch);
        curl_close($ch);
        return $ret;
    }
    /**
     * 得到微秒
     * Created by Mr.亮先生.
     * User: 16956
     * Date: 2019/7/9
     * Time: 16:52
     * @Url:
     * @return float
     */
    public  static function  getMicroseconds()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
    /**
     * 获取汉字首字母
     * Created by Mr.亮先生.
     * Date: 2019/7/9
     * Time: 16:57
     * @Url:
     * @param $s0
     * @return string|null
     */
    public  static  function getFirstChar($s0)
    {
        $fchar = ord($s0{0});
        if ($fchar >= ord("A") and $fchar <= ord("z")) return strtoupper($s0{0});
        $s1 = iconv("UTF-8", "gb2312", $s0);
        $s2 = iconv("gb2312", "UTF-8", $s1);
        if ($s2 == $s0) {
            $s = $s1;
        } else {
            $s = $s0;
        }
        $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
        if ($asc >= -20319 and $asc <= -20284) return "A";
        if ($asc >= -20283 and $asc <= -19776) return "B";
        if ($asc >= -19775 and $asc <= -19219) return "C";
        if ($asc >= -19218 and $asc <= -18711) return "D";
        if ($asc >= -18710 and $asc <= -18527) return "E";
        if ($asc >= -18526 and $asc <= -18240) return "F";
        if ($asc >= -18239 and $asc <= -17923) return "G";
        if ($asc >= -17922 and $asc <= -17418) return "I";
        if ($asc >= -17417 and $asc <= -16475) return "J";
        if ($asc >= -16474 and $asc <= -16213) return "K";
        if ($asc >= -16212 and $asc <= -15641) return "L";
        if ($asc >= -15640 and $asc <= -15166) return "M";
        if ($asc >= -15165 and $asc <= -14923) return "N";
        if ($asc >= -14922 and $asc <= -14915) return "O";
        if ($asc >= -14914 and $asc <= -14631) return "P";
        if ($asc >= -14630 and $asc <= -14150) return "Q";
        if ($asc >= -14149 and $asc <= -14091) return "R";
        if ($asc >= -14090 and $asc <= -13319) return "S";
        if ($asc >= -13318 and $asc <= -12839) return "T";
        if ($asc >= -12838 and $asc <= -12557) return "W";
        if ($asc >= -12556 and $asc <= -11848) return "X";
        if ($asc >= -11847 and $asc <= -11056) return "Y";
        if ($asc >= -11055 and $asc <= -10247) return "Z";
        return null;
    }
}
