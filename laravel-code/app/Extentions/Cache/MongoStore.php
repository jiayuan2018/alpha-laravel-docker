<?php
/**
 * Created by PhpStorm.
 * User: alpha
 * Date: 2018/9/20
 * Time: 下午3:56
 */
namespace App\Extensions\Cache;

use Illuminate\Cache\TaggableStore;
use Illuminate\Contracts\Cache\Store;



class MongoStore extends TaggableStore implements Store{


    public function tags($names){
        return parent::tags($names);
    }


    public function get($key)
    {

    }



    public function many(array $keys)
    {

    }

    public function put($key, $value, $minutes)
    {

    }

    public function putMany(array $values, $minutes)
    {

    }

    public function increment($key, $value = 1)
    {

    }

    public function decrement($key, $value = 1)
    {

    }

    public function forever($key, $value)
    {

    }


    public function forget($key)
    {

    }

    /**
     *
     */
    public function flush()
    {

    }

    /**
     *
     */
    public function getPrefix()
    {

    }


}