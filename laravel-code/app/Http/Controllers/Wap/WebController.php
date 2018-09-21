<?php

namespace App\Http\Controllers\Wap;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Interfaces\Biz2\Impl\SmsBillingNotifier;
use App\Http\Interfaces\Biz2\Impl\StripeBiller;
use App\Http\Requests\Invest\InvestRequest;
use Illuminate\Http\Request;
use Redirect;


/**
 * Class WebController
 * @package App\Http\Controllers\Wap
 */
class WebController extends BaseController{


    /**
     * @param InvestRequest $request
     */
    public function index(InvestRequest $request){

        dd($request);

        $smsBillingNotifier = new SmsBillingNotifier();

        $stripeBiller = new StripeBiller($smsBillingNotifier);

        $stripeBiller->bill(['lily','wang','smith'],500);

    }



    public function getNewsList(Request $request){


        return view('Wap.list',[]);
    }



}
