<?php

namespace  App\Http\Requests\Invest;


use App\Http\Requests\AppRequest;

class InvestRequest extends AppRequest{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'cash'                  => 'required|numeric|min:0',
            'trade_password'        => 'required',
        ];
    }


    public function attributes(){

        return [
            'cash'                => 'The cash must etg 0',
            'trade_password'      => 'The trade password must not empty',
        ];
    }
}