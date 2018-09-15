<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Models\User\UserModel;
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
    }



}
