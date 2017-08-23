<?php
//array_merge
/*array_merge() 将一个或多个数组的单元合并起来，一个数组中的值附加在前一个数组的后面。返回作为结果的数组。
如果输入的数组中有相同的字符串键名，则该键名后面的值将覆盖前一个值。然而，如果数组包含数字键名，后面的值将不会覆盖原来的值，而是附加到后面。
如果只给了一个数组并且该数组是数字索引的，则键名会以连续方式重新索引。*/
$a = array('color'=>'red',5,6);
$b = array('color'=>'blue','type'=>'fruit',6,7);
$arr = array_merge($a,$b);
var_dump($arr);

/*array(6) {
    ["color"]=> string(4) "blue"
    [0]=> int(5)
    [1]=> int(6)
    ["type"]=> string(5) "fruit"
    [2]=> int(6)
    [3]=> int(7)
}*/

//array_merge_recursive
/*如果输入的数组中有相同的字符串键名，则这些值会被合并到一个数组中去，这将递归下去，
因此如果一个值本身是一个数组，本函数将按照相应的条目把它合并为另一个数组。
然而，如果数组具有相同的数组键名，后一个值将不会覆盖原来的值，而是附加到后面。*/
$a = array('color'=>'red',5,6);
$b = array('color'=>'blue','type'=>'fruit',6,7);
$arr = array_merge_recursive($a,$b);
var_dump($arr);
/*array(6) {
    ["color"]=>
  array(2) {
        [0]=> string(3) "red"
        [1]=> string(4) "blue"
  }
  [0]=> int(5)
  [1]=> int(6)
  ["type"]=> string(5) "fruit"
  [2]=> int(6)
  [3]=> int(7)
}*/


//+
//第一个数组的键名将会被保留。在两个数组中存在相同的键名时，第一个数组中的同键名的元素将会被保留，第二个数组中的元素将会被忽略
$a = array('color'=>'red',5,6);
$b = array('color'=>'blue','type'=>'fruit',6,7);
$arr = $a+$b;
var_dump($arr);

/*array(4) {
    ["color"]=> string(3) "red"
    [0]=> int(5)
    [1]=> int(6)
    ["type"]=> string(5) "fruit"
}*/