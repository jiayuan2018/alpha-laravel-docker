<?php
/**
 * Created by PhpStorm.
 * User: alpha
 * Date: 2018/9/18
 * Time: 下午3:16
 */
namespace App\Http\Interfaces\Biz2;

interface BillerInterface{

    public  function bill(array $users,$amount);

}