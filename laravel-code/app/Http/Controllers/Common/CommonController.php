<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Redirect;

/**
 * Class CommonController
 * @package App\Http\Controllers\Common
 */
class CommonController extends BaseController{


    /**
     *
     *
     */
    public function getIndex(Request $request){

        $params = $request->all();

        echo 'This is GET';

        dd($params);

    }


    /**
     *
     *
     */
    public function postIndex(Request $request){

        $params = $request->all();

        echo 'This is POST';

        dd($params);

    }



}
