<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 5/31/15
 * Time: 10:08
 */

namespace app\helpers;


class ArrayHelper extends \yii\helpers\ArrayHelper {

    public static function group($array, $key, $limit = false) {
        if (empty ($array) || !is_array($array)){
            return $array;
        }

        $_result = array ();
        foreach ($array as $item) {
            if ((isset($item[$key]))) {
                $_result[(string)$item[$key]][] = $item;
            } else {
                $_result[count($_result)][] = $item;
            }
        }
        if (!$limit) {
            return $_result;
        }

        $result = array ();
        foreach ($_result as $k => $item) {
            $result[$k] = $item[0];
        }
        return $result;
    }

    public static function uniqueMerge($a, $b)
    {
        return array_unique(array_merge($a, $b));
    }

    /**
     * 返回二维数组某一属性值组成的数组
     * [{"id":123},{"id":456}]
     * @param $array array() 参数： [{"id":123},{"id":456}]
     * @param $key string    参数：    "id"
     * @return array         返回：[123,456]
     */
    public static function columnValuesUnique($array, $key = 'id')
    {
        $group = static::group($array, $key);

        return array_unique(array_keys($group));
    }

    /**
     * 计算二维数组的某一属性值的和
     * columnSum([{"id":1},{"id":2}], 'id') == 3
     * @param $array array()
     * @param $key string
     * @return int
     */
    public static function columnSum($array, $key)
    {
        $sum = 0;
        foreach ($array as $one) {
            $sum += $one[$key];
        }
        return $sum;
    }

}