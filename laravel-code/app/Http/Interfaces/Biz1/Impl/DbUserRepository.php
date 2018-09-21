<?php

namespace App\Http\Interfaces\Biz1\Impl;

use App\Http\Interfaces\Biz1\UserRepositoryInterface;

class DbUserRepository implements  UserRepositoryInterface{


    /**
     * @return mixed
     */
    public function all(){

        return [
            'status' => 1,
            'from'   => 'db',
            'data'   => [
                ['u_id' => 1,'u_name'=>'test1'],
                ['u_id' => 2,'u_name'=>'test2'],
                ['u_id' => 3,'u_name'=>'test3'],
                ['u_id' => 4,'u_name'=>'test4'],
                ['u_id' => 5,'u_name'=>'test5'],
            ]
        ];
    }


}