<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Models\User\UserModel;
use App\Jobs\UserJob\CreateUserJob;
use Illuminate\Support\Facades\Queue;
use Redirect;
/**
 * WebController基础类
 * Class WebController
 * @package App\Http\Controllers\Web
 */
class WebController extends BaseController{

    /**
     *
     *
     */
    public function index(UserModel $userModel){
        $list = $userModel->getAllUser();
        print_r($list);

        $data = [
            'name'     => 'alpha',
            'email'    => 'alpha'.rand(1000,5000).'@webmaster.com',
            'password' => md5(rand(100,1000))
        ];

        Queue::pushOn('default',new CreateUserJob($data));
    }



}
