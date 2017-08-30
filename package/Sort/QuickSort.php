<?php
/**
 * @example  快速排序
 * @author   ShaoWei Pu <pushaowei0727@gmail.com>
 * @date     2017/6/17
 * @license  Mozilla
 * -------------------------------------------------------------
 * 思路分析：从数列中挑出一个元素，称为 “基准”（pivot) 
 * -------------------------------------------------------------
 * 重新排序数列，所有元素比基准值小的摆放在基准前面
 * 所有元素比基准值大的摆在基准的后面（相同的数可以到任一边）。
 * 递归地（recursive）把小于基准值元素的子数列和大于基准值元素的子数列排序
 *
 * @param  array $arr
 * @return array|void
 */
function quick_sort(array $arr)
{
    echo " <pre>";
    var_dump($arr);
    echo "<br/><pre>";
    //判断参数是否是一个数组
    if(!is_array($arr)) return false;
    //递归出口:数组长度为1，直接返回数组
    $length=count($arr);
    if($length<=1) return $arr;


    //数组元素有多个,则定义两个空数组
    $left=$right=array();
    //使用for循环进行遍历，把第一个元素当做比较的对象
    for($i=1;$i<$length;$i++)
    {
        //判断当前元素的大小
        if($arr[$i]<$arr[0]){
            $left[]=$arr[$i];
        }else{
            $right[]=$arr[$i];
        }

    }
    //递归调用
    $left=quick_sort($left);
    $right=quick_sort($right);
    echo "<br/><pre>";
    var_dump(json_encode($right));
    echo "<br/>";

    //将所有的结果合并
    return array_merge($left,array($arr[0]),$right);


}

var_dump(json_encode(quick_sort([4, 21, 41, 2, 53, 1, 213, 31, 21, 423])));