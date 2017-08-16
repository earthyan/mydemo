<?php
/**
 * 数组分页函数  核心函数  array_slice
 * 用此函数之前要先将数据库里面的所有数据按一定的顺序查询出来存入数组中
 * $count   每页多少条数据
 * $page   当前第几页
 * $array   查询出来的所有数组
 * order 0 - 不变     1- 反序
 */

function page_array($count,$page,$array,$order){
    global $countpage; #定全局变量
    $page=(empty($page))?'1':$page; #判断当前页面是否为空 如果为空就表示为第一页面
    $start=($page-1)*$count; #计算每次分页的开始位置
    if($order==1){
        $array=array_reverse($array);
    }
    $totals=count($array);
    $countpage=ceil($totals/$count); #计算总页面数
    $pagedata=array();
    $pagedata=array_slice($array,$start,$count);
    return $pagedata;  #返回查询数据
}
/**
 * 分页及显示函数
 * $countpage 全局变量，照写
 * $url 当前url
 */
function show_array($countpage,$url){
    $page=empty($_GET['page'])?1:$_GET['page'];
    if($page > 1){
        $uppage=$page-1;

    }else{
        $uppage=1;
    }

    if($page < $countpage){
        $nextpage=$page+1;

    }else{
        $nextpage=$countpage;
    }

    $str='<div style="border:1px; width:300px; height:30px; color:#9999CC">';
    $str.="<span>共  {$countpage}  页 / 第 {$page} 页</span>";
    $str.="<span><a href='$url?page=1'>   首页  </a></span>";
    $str.="<span><a href='$url?page={$uppage}'> 上一页  </a></span>";
    $str.="<span><a href='$url?page={$nextpage}'>下一页  </a></span>";
    $str.="<span><a href='$url?page={$countpage}'>尾页  </a></span>";
    $str.='</div>';
    return $str;
}








