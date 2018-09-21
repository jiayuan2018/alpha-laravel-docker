<?php

namespace App\Http\Interfaces\Biz1\Impl;

use App\Http\Interfaces\Biz1\UserRepositoryInterface;

class MongoUserRepository implements  UserRepositoryInterface{


    /**
     * @return mixed
     */
    public function all(){

        return [
            'status' => 1,
            'from'   => 'mongo',
            'data'   => [
                ['u_id' => 11,'u_name'=>'test11'],
                ['u_id' => 12,'u_name'=>'test12'],
                ['u_id' => 13,'u_name'=>'test13'],
                ['u_id' => 14,'u_name'=>'test14'],
                ['u_id' => 15,'u_name'=>'test15'],
            ]
        ];
    }


}