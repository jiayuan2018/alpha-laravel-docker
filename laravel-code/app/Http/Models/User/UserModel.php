<?php
namespace App\Http\Models\User;

use App\Http\Models\BaseModel;


class UserModel extends BaseModel{

    protected $table = "users";

    /**
     * @param $userId
     * @return array
     */
    public function getUserByUserId($userId){
        $result =  $this->where('id',$userId)
            ->where('status',200)
            ->first();

        return empty($result)?[]:$result->toArray();
    }

    /**
     * @return mixed
     */
    public function getAllUser(){
        $result =  $this->select('*')
            ->get()
            ->toArray();
        return $result;
    }


    /**
     * @param array $user
     */
    public function addUser($user=[]){

        return $this->insert($user);

    }




}

?>