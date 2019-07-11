<?php
namespace PhpHelp;
/**
 * 数组扩展
 * Class arrayHelp
 * @package phpHelp
 */
class arrayHelp
{
    /**
     * Created by Mr.亮先生.
     * Date: 2019/7/11
     * Time: 13:13
     * @Url:
     * @param $data
     * @param $index
     * @return array
     */
    public static function ArrayIndex($data,$index){
        $arr = [];
        foreach ($data as $key=>$val):
            $arr[$val[$index]] = $val;
        endforeach;
        return $arr;
    }

    /**
     * Created by Mr.亮先生.
     * Date: 2019/7/11
     * Time: 13:13
     * @Url:
     * @param $arr
     * @return object|void
     */
    public static function arrayToObject($arr)
    {
        if (!is_array($arr)) return;
        foreach ($arr as $k => $v) {
            if (is_array($v) || is_object($v))
                $arr[$k] = (object)self::arrayToObject($v);
        }
        return (object)$arr;
    }

    /**
     * Created by Mr.亮先生.
     * Date: 2019/7/11
     * Time: 13:15
     * @Url:
     * @param $obj
     * @return array|void
     */
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

    /**
     * Created by Mr.亮先生.
     * Date: 2019/7/11
     * Time: 13:26
     * @Url:
     * @param $arr
     * @return string
     */
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