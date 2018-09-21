<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

abstract class AppRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @param Validator $validator
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors  = (new ValidationException($validator))->errors();

        if($this->isAjax()){
            throw new HttpResponseException(
                response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            );
        }else{
            $errorString = $this->getValidationErrorMessge($errors);
            $response = response($errorString,JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
            throw new HttpResponseException($response);
        }

    }


    /**
     * @return bool
     */
    public function isAjax()
    {

        return  $this->ajax();

    }


    /**
     * @param array $errors
     * @return string $retStr
     */
    private function getValidationErrorMessge($errors=[])
    {

        $retStr = '';
        foreach($errors as $key => $value){
            $retStr .= $key.':'.$value[0].'<br />';
        }
        return $retStr;
    }

}
