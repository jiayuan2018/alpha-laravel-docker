<?php
/**
 * Created by PhpStorm.
 * User: alpha
 * Date: 2018/9/18
 * Time: 下午4:09
 */

namespace App\Http\Interfaces\Biz2\Impl;

use App\Http\Interfaces\Biz2\BillingNotifierInterface;

class SmsBillingNotifier implements  BillingNotifierInterface{


    /**
     * @param array $users
     * @param $amount
     */
    public function notify(array $users, $amount){


        echo 'SMS Notify to user : '.implode(',',$users).'-'.$amount;



    }


}