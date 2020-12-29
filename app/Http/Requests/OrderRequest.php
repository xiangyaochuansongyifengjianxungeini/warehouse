<?php

namespace App\Http\Requests;

use App\Exceptions\CheckException;
use App\Models\ProductSku;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $path = \Request::route()->getName();
        switch($path){
            case 'orders.store':
                if(auth('api')->user()->status == 2) throw new CheckException(0,'账号已被冻结');
                return [
                    'list' => 'required',
                ];
                break;
            case 'orders.update':
                return [
                    'num' => 'required',
                    'category' => 'required',
                    'address' => 'required',
                    'cost_price' => 'required',
                    'sale_price' => 'required',
                ];
                break;
            case 'orders.submitConfirm':
                return [
                ];
                break;
            case 'orders.apply':
                return [
                    'return_reason' => 'required',
                ];
                break;
            case 'orders.outuptUpdate':
                return [
                ];
                break;
            default:
                return [

                ];
        }
    }
}
