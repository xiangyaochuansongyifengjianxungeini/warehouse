<?php

namespace App\Http\Requests;

use App\Exceptions\CheckException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
       if(auth('api')->user()->status==2){
        throw new CheckException('0','您的账号已被冻结!');
    }
       switch($path)
       {
           case 'products.store':
                return [
                    'name' => 'required',
                    'model' => 'required|unique:products',
                    'model' => ['required',Rule::unique('products')->where('warehouse_id',request('warehouse_id'))],
                    'sku' => 'required',
                    'warehouse_id' => 'required',
                ];
                break;

            case 'products.update':
                return [
                    'name' => 'required',
                    'model' => ['required',Rule::unique('products')->where('warehouse_id',request('warehouse_id'))->ignore($this->route('product')->id)],
                    'sku' => 'required',
                    'warehouse_id' => 'required',
                ];
                break;

            case 'products.status':
                return [
                    'status' => 'required',
                ];
                break;

            case 'products.skuUpdate':
                return [
                    'name' => 'required',
                    'model' => ['required',Rule::unique('products')->where('warehouse_id',request('warehouse_id'))->ignore($this->route('productSku')->product_id)],
                    'cost_price' => 'required',
                    'sale_price' => 'required',
                    'stock' => 'required',
                    'item_value' => 'required',
                    'warehouse_id' => 'required',
                ];
                break;

            case 'products.skuStockUpdate':
                return [
                    'incrStock' => 'required',
                ];
            break;

            default:
                return [
                    
                ];
       }
    }
}
