<?php
namespace PhpHelp;
/**
 * Class timeHelp 时间工具类
 * @package PhpHelp
 */
class timeHelp{
    //当前年
    public static function currentYear(){
        return date("Y");
    }
     //当前月
    public static function currentMonth(){
        return date("m");
    }
     //当前天
    public static function currentDay(){
        return date("d");
    }
    //当前时
    public static function currentHour(){
        return date("H");
    }

    //当前分
    public static function currentMin(){
        return date("i");
    }

    //当前秒
    public static function currentSecond(){
        return date("s");
    }
    //按照指定格式及指定时间戳计算时间
    public static function dateTime($format = "Y-m-d H:i:s", $currentTime = null){
        if($currentTime == null){return date($format);}
        return date($format, $currentTime);
    }
    //将日期时间转换时间戳
    public static function timeStamp($timer = null){
        if($timer == null){$timer = date("m/d/Y H:i:s");}
        $mode = '/^(\d{4,4})\-(\d{2,2})\-(\d{2,2}) (\d{2,2}):(\d{2,2}):(\d{2,2})$/Uis';
        $res  = preg_match($mode, $timer, $arr);
        $timerPre = array();
        if(!$res){
            $mode = '/^(\d{2,2})\/(\d{2,2})\/(\d{4,4}) (\d{2,2}):(\d{2,2}):(\d{2,2})$/Uis';
            $res  = preg_match($mode, $timer, $arr);
            if(!$res){exit('异常!');}
            $timerPre = array($arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6]);
        }else{
            $timerPre = array($arr[2], $arr[3], $arr[1], $arr[4], $arr[5], $arr[6]);
        }
        return mktime($timerPre[3], $timerPre[4], $timerPre[5], $timerPre[0], $timerPre[1], $timerPre[2]);
    }
    //两个时间相减
    public static function DValue($timer1, $timer2){
        return self::timeStamp($timer1) - self::timeStamp($timer2);
    }
    public static function fromTime($time,$type = 0 ){
        $timer = $type == 0 ? time() - $time: $time - time();
        if($timer < 180){
            return '不足三分钟';
        }elseif($timer >= 180 && $timer < 3600){
            return floor($timer / 60).'分钟';
        }elseif($timer >= 3600 && $timer < 86400){
            return floor($timer / 3600).'小时';
        }elseif($timer >= 86400 && $timer < 2592000){
            return floor($timer / 86400).'天';
        }else{
            return date("Y-m-d H:i", $time);
        }
    }
     //得到微秒
    public  static function  getMicroseconds()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
}