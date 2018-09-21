<?php
/**
 * Created by PhpStorm.
 * User: alpha
 * Date: 2018/9/18
 * Time: 下午3:18
 */

namespace App\Http\Interfaces\Biz2;

interface BillingNotifierInterface{

    public function notify(array $users,$amount);

}