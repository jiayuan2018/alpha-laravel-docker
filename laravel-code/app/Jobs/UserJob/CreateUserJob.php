<?php
namespace App\Jobs\UserJob;

use App\Http\Models\User\UserModel;
use App\Jobs\Job;

class CreateUserJob extends Job{

    /**
     * @var string
     */
    protected $data = '';


    /**
     * UserJob constructor.
     * @param $data
     */
    public function __construct($data){

        $this->data = $data;

    }

    /**
     *
     */
    public function handle(){

        $data = $this->data;

        $model = new UserModel();
        $model->addUser($data);

    }
}