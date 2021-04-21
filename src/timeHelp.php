<?php

namespace PhpHelp;

/**
 * Class timeHelp 时间工具类
 * @package PhpHelp
 */
class timeHelp
{
    //当前年
    public static function currentYear()
    {
        return date("Y");
    }

    //当前月
    public static function currentMonth()
    {
        return date("m");
    }

    //当前天
    public static function currentDay()
    {
        return date("d");
    }

    //当前时
    public static function currentHour()
    {
        return date("H");
    }

    //当前分
    public static function currentMin()
    {
        return date("i");
    }

    //当前秒
    public static function currentSecond()
    {
        return date("s");
    }

    //按照指定格式及指定时间戳计算时间
    public static function dateTime($format = "Y-m-d H:i:s", $currentTime = null)
    {
        if ($currentTime == null) {
            return date($format);
        }
        return date($format, $currentTime);
    }

    //将日期时间转换时间戳
    public static function timeStamp($timer = null)
    {
        if ($timer == null) {
            $timer = date("m/d/Y H:i:s");
        }
        $mode = '/^(\d{4,4})\-(\d{2,2})\-(\d{2,2}) (\d{2,2}):(\d{2,2}):(\d{2,2})$/Uis';
        $res = preg_match($mode, $timer, $arr);
        $timerPre = [];
        if (!$res) {
            $mode = '/^(\d{2,2})\/(\d{2,2})\/(\d{4,4}) (\d{2,2}):(\d{2,2}):(\d{2,2})$/Uis';
            $res = preg_match($mode, $timer, $arr);
            if (!$res) {
                exit('异常!');
            }
            $timerPre = [$arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6]];
        } else {
            $timerPre = [$arr[2], $arr[3], $arr[1], $arr[4], $arr[5], $arr[6]];
        }
        return mktime($timerPre[3], $timerPre[4], $timerPre[5], $timerPre[0], $timerPre[1], $timerPre[2]);
    }

    //两个时间相减
    public static function DValue($timer1, $timer2)
    {
        return self::timeStamp($timer1) - self::timeStamp($timer2);
    }

    public static function fromTime($time, $type = 0)
    {
        $timer = $type == 0 ? time() - $time : $time - time();
        if ($timer < 180) {
            return '不足三分钟';
        } elseif ($timer >= 180 && $timer < 3600) {
            return floor($timer / 60) . '分钟';
        } elseif ($timer >= 3600 && $timer < 86400) {
            return floor($timer / 3600) . '小时';
        } elseif ($timer >= 86400 && $timer < 2592000) {
            return floor($timer / 86400) . '天';
        } else {
            return date("Y-m-d H:i", $time);
        }
    }

    //得到微秒
    public static function getMicroseconds()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

    //将一个Unix时间戳转换成“xx前”模糊时间表达方式
    public static function timeAgo($timestamp)
    {
        $etime = time() - $timestamp;
        if ($etime < 1) {
            return '刚刚';
        }
        $interval = [
            12 * 30 * 24 * 60 * 60 => '年前 (' . date('Y-m-d', $timestamp) . ')',
            30 * 24 * 60 * 60 => '个月前 (' . date('m-d', $timestamp) . ')',
            7 * 24 * 60 * 60 => '周前 (' . date('m-d', $timestamp) . ')',
            24 * 60 * 60 => '天前',
            60 * 60 => '小时前',
            60 => '分钟前',
            1 => '秒前'
        ];
        foreach ($interval as $secs => $str) {
            $d = $etime / $secs;
            if ($d >= 1) {
                $r = round($d);
                return $r . $str;
            }
        }
    }

    /**
     * 获取(天|周|月|季度|年)开始和结束时间戳
     * Created by Mr.亮先生.
     * program: new-saas-api
     * FuncName:getStartAndEnd
     * status:static
     * User: Mr.liang
     * Date: 2021/4/21
     * Time: 17:05
     * Email:1695699447@qq.com
     * @param string $attr :day|week|month|quarter|year
     * @param int    $step :步长 默认0当前(当天|当周|当月|当前季度|当年)负数往前正数往后
     * @return array
     */
    public static function getStartAndEnd(string $attr, int $step = 0): array
    {
        if ($attr === 'day') {
            $currentDay = date('d') + $step;
            $start = mktime(0, 0, 0, date('m'), $currentDay, date('Y'));
            $end = mktime(23, 59, 59, date('m'), $currentDay, date('Y'));
        } elseif ($attr === 'week') {
            $step *= 7;
            $start = mktime(0, 0, 0, date("m"), date("d") - date("w") + 1 + $step, date("Y"));
            $end = mktime(23, 59, 59, date("m"), date("d") - date("w") + 7 + $step, date("Y"));
        } elseif ($attr === 'month') {
            $month = date('m') + $step;
            $start = mktime(0, 0, 0, $month, 1, date('Y'));
            $end = mktime(23, 59, 59, $month, date('t'), date('Y'));
        } elseif ($attr === 'quarter') {
            $season = ceil((date('n')) / 3) + $step;
            $start = mktime(0, 0, 0, $season * 3 - 3 + 1, 1, date('Y'));
            $end = mktime(23, 59, 59, $season * 3, date('t', mktime(0, 0, 0, $season * 3, 1, date("Y"))), date('Y'));
        } else {
            $year = date('Y') + $step;
            $start = mktime(0, 0, 0, 1, 1, $year);
            $end = mktime(23, 59, 59, 12, 31, $year);
        }
        return [$start, $end];
    }
}