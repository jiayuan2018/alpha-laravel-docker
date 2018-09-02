<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class BaseModel
 * @package App\Http\Models
 */
class BaseModel extends Model{

    /**
     * 白名单控制
     * @param array $attributes
     * @param array $fillable
     */
    public function __construct(array $attributes = [], array $fillable = []){
        // 子模型白名单
        if($fillable !== null){
            $this->fillable($fillable);
        }
        // 开启日志Log功能
        app('db')->connection()->enableQueryLog();

        parent::__construct($attributes);
    }

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable(){
        if (isset($this->table)) {
            return $this->table;
        }
        return str_replace('\\', '', Str::snake(preg_replace('#DB$#i', '', class_basename($this))));
    }


    /**
     * @param $page
     * @param $size
     * @return mixed
     * @desc 返回查询开始值
     */
    public function getLimitStart($page,$size){

        return ( max(0, $page -1) ) * $size;

    }

    /**
     * @param $result
     * @return array
     * @desc find-first不可直接跟toArray
     */
    public function objectToArray($result){

        if(is_object($result)){
            return $result->toArray();
        }else{
            return [];
        }
    }


    /**
     * 获取sql
     */
    public  function getLastSql(){
        echo '-------SQL-LOG# <br/>';
        echo print_r(app('db')->getQueryLog(), true);
        echo '<br/> -------END# <br/>';
    }


}