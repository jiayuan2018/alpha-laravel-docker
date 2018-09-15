<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;


/**
 * Class IndexController
 * @package App\Http\Controllers\Api
 */
class IndexController extends BaseController{

    /**
     *
     */
    public function index(){

        $users = [
            [
                'id'       =>  1,
                'name'     => 'test1',
                'nickname' => 'testnick1',
                'time'     => date('Y-m-d H:i:s',time()),
            ],
            [
                'id'       =>  2,
                'name'     => 'test2',
                'nickname' => 'testnick2',
                'time'     => date('Y-m-d H:i:s',time()),
            ],
        ];
        return json_encode($users);
    }

}
