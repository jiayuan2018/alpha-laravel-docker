<?php
/**
 * Created by PhpStorm.
 * User: alpha
 * Date: 2018/9/18
 * Time: 下午3:19
 */
namespace App\Http\Interfaces\Biz2\Impl;

use App\Http\Interfaces\Biz2\BillerInterface;
use App\Http\Interfaces\Biz2\BillingNotifierInterface;

class StripeBiller implements BillerInterface{


    /**
     * @var BillingNotifierInterface
     */
    protected $notifier;


    public  function __construct(BillingNotifierInterface $notifier){

        $this->notifier = $notifier;

    }


    public function bill(array $users, $amount){

        $this->notifier->notify($users,$amount);
    }


}