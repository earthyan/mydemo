<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/11
 * Time: 16:02
 */


/*
 * 把value 值作为key
 * */
$arr = ['借款金额'=>'order_amount','使用提额券'=>'promote_money','使用免息券'=>'free_interest','实际到账'=>'arr_money',
    '还款日' =>'end_date','实际应还款额(元)'=>'repay_amount','本金'=>'capital',
    '利息'=>'interest','综合服务费'=>'service_fee','罚息'=>'penalty','逾期管理费'=>'overdue_fee','真实姓名'=>'real_name',
    '手机号码'=>'phone','申请时间'=>'created_time','订单号'=>'apply_id','放款银行'=>'bank_name',
    '放款银行卡号'=>'bank_card',
];
$keys = array_keys(array_flip($arr));
var_dump($keys);die;