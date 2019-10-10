<?php
namespace PhpHelp;
/**
 * 数组扩展
 * Class arrayHelp
 * @package phpHelp
 */
class arrayHelp
{
    //数组内容做键
    public static function arrayIndex($data,$index){
        $arr = [];
        foreach ($data as $key=>$val):
            $arr[$val[$index]] = $val;
        endforeach;
        return $arr;
    }
    //数组转对象
    public static function arrayToObject($arr)
    {
        if (!is_array($arr)) return;
        foreach ($arr as $k => $v) {
            if (is_array($v) || is_object($v))
                $arr[$k] = (object)self::arrayToObject($v);
        }
        return (object)$arr;
    }
    //对象转数组
    public static function objectToArray($obj)
    {
        $obj = (array)$obj;
        foreach ($obj as $k => $v) {
            if (is_resource($v)) return;
            if (is_object($v) || is_array($v))
                $obj[$k] = (array)self::objectToArray($v);
        }
        return $obj;
    }
    //二维数组排序
    public  static  function arrayMultiSort($arr, $key, $sort_order = SORT_DESC, $sort_type = SORT_NUMERIC)
    {
        if (is_array($arr)) {
            foreach ($arr as $array) {
                if (is_array($array)) {
                    $key_arrays[] = $array[$key];
                }
            }
            array_multisort($key_arrays, $sort_order, $sort_type, $arr);
        }
        return $arr;
    }
    //数组转xml
    public  static  function arrayToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key => $val) {
            if (is_numeric($val)) {
                $xml .= "<" . $key . ">" . $val . "</" . $key . ">";

            } else
                $xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
        }
        $xml .= "</xml>";
        return $xml;
    }
}